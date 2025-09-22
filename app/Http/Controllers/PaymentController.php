<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Subscription;
use Carbon\Carbon;

class PaymentController extends Controller
{
    private function isValidSignature(Request $request): bool
    {
        $clientId = env('DOKU_CLIENT_ID');
        $secretKey = env('DOKU_SECRET_KEY');

        $requestBody = $request->getContent();
        $digest = base64_encode(hash('sha256', $requestBody, true));

        $headers = $request->headers;
        $requestId = $headers->get('request-id');
        $requestTimestamp = $headers->get('request-timestamp');
        $signature = $headers->get('signature');

        $rawSignature = "Client-Id:$clientId\n"
            ."Request-Id:$requestId\n"
            ."Request-Timestamp:$requestTimestamp\n"
            ."Request-Target:/payment/callback\n"
            ."Digest:$digest";

        $computedSignature = "HMACSHA256=" . base64_encode(hash_hmac('sha256', $rawSignature, $secretKey, true));

        return hash_equals($computedSignature, $signature);
    }
    public function createPayment()
    {
        $user = auth()->user();
        $url = "https://api-sandbox.doku.com/checkout/v1/payment";

        $clientId = env('DOKU_CLIENT_ID');
        $secretKey = env('DOKU_SECRET_KEY');
        $requestId = uniqid();
        $requestTimestamp = gmdate("Y-m-d\TH:i:s\Z");
        $invoiceNumber = "INV-" . time();
        $body = [
            "order" => [
                "amount" => 20000,
                "invoice_number" => $invoiceNumber,
                "currency" => "IDR",
                "callback_url" => route('payment.success', [
                    'invoice' => $invoiceNumber
                ]),                
                "failed_url" => route('payment.failed'),
                "notification_url" => route('payment.callback'),
                "auto_redirect" => false,
            ],
            "payment" => [
                "payment_due_date" => 60 // dalam menit
            ],
            "customer" => [
                "id" => "CUST-001",
                "name" => $user->name,
                "email" => $user->email
            ]
        ];

        $bodyJson = json_encode($body);

        // --- BUAT SIGNATURE ---
        $digest = base64_encode(hash('sha256', $bodyJson, true));

        $rawSignature = "Client-Id:$clientId\n"
            ."Request-Id:$requestId\n"
            ."Request-Timestamp:$requestTimestamp\n"
            ."Request-Target:/checkout/v1/payment\n"
            ."Digest:$digest";

        $signature = base64_encode(hash_hmac('sha256', $rawSignature, $secretKey, true));

        // --- REQUEST KE DOKU ---
        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Client-Id" => $clientId,
            "Request-Id" => $requestId,
            "Request-Timestamp" => $requestTimestamp,
            "Signature" => "HMACSHA256=".$signature,
        ])->post($url, $body);

        if (isset($response['response']['payment']['url'])) {
            // simpan ke DB dulu
            $payment = Payment::create([
                'user_id' => $user->id,
                'subscription_id' => $user->subscription->id,
                'invoice_number' => $invoiceNumber,
                'amount' => 20000,
                'payment_method' => 'doku',
                'payment_status' => 'pending',
                'paid_at' => null,
            ]);

            return redirect()->away($response['response']['payment']['url']);
        }

        // Kalau gagal
        return back()->with('error', 'Gagal membuat link pembayaran.');
    }

    public function success(Request $request)
    {
        $user = auth()->user();
        $invoice = $request->input('invoice');

        // cari subscription yang aktif sekarang
        $subscription = Subscription::where('user_id', $user->id)->first();

        if ($subscription) {
            // update subscription yang sudah ada
            $subscription->status = 'active';
            $subscription->starts_at = Carbon::now();
            $subscription->ends_at = Carbon::now()->addDays(28);
            $subscription->save();

            $payment = Payment::where('invoice_number', $invoice)->first();
            if ($payment) {
                $payment->payment_status = 'paid';
                $payment->paid_at = now();
                $payment->save();
            }
        } else {
            // kalau belum ada, buat baru
            Subscription::create([
                'user_id' => $user->id,
                'status' => 'active',
                'starts_at' => Carbon::now(),
                'ends_at' => Carbon::now()->addDays(28),
            ]);
        }

        // redirect ke dashboard
        return redirect()->route('dashboard2', ['user' => $user->slug])
            ->with('success', 'Pembayaran berhasil! Langganan aktif sampai ' . Carbon::now()->addDays(28)->format('d F Y'));
    }

    public function failed()
    {
        return redirect()->route('pricing')->with('error', 'Pembayaran gagal atau dibatalkan.');
    }

    public function callback(Request $request)
    {
        $data = $request->all();

        // Validasi signature biar aman (opsional tapi direkomendasikan)
        if ($this->isValidSignature($request)) {
            $invoice = $data['order']['invoice_number'] ?? null;

            $payment = Payment::where('invoice_number', $invoice)->first();
            if ($payment) {
                $payment->payment_status = 'paid';
                $payment->paid_at = now();
                $payment->save();
            }
        }

        return response()->json(['message' => 'OK']);
    }
}
