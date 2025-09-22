<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Pastikan user sudah login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        // Cek apakah user masih dalam masa trial/subscription aktif
        if (!$user->hasActiveSubscription()) {
            return redirect()->route('pricing')
                             ->with('error', 'Masa trial sudah habis, silakan berlangganan untuk melanjutkan.');
        }

        return $next($request);
    }
}
