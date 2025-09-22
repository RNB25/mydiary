<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Buat atau login user berdasarkan $googleUser
            $user = User::firstOrNew([
                'email' => $googleUser->getEmail(),
            ]);

            $user->name = $googleUser->getName();
            // $user->avatar = $googleUser->getAvatar();
            // $user->google_id = $googleUser->getId();
            $user->photo = $googleUser->getAvatar(); // tambahkan ini
            $user->password = $user->password ?? bcrypt(Str::random(16)); // jaga-jaga biar nggak overwrite

            $user->save(); // trigger slug generation dari sluggable
            if (!$user->subscription) {
                Subscription::create([
                    'user_id' => $user->id,
                    'status' => 'trial',
                    'starts_at' => now(),
                    'ends_at' => now()->addDays(17),
                ]);
            }
            Log::info('Checkpoint login google: ' . $user->email);
            
            Auth::login($user);
            Log::info('User login dengan Google: ' . $user->email . ' - Slug: ' . $user->slug);
            return redirect()->route('dashboard2', ['user' => $user->slug])->with('success', 'Login berhasil dengan Google!');

        } catch (\Exception $e) {
            Log::error('User login dengan Google gagal: ' . $e->getMessage());

            return redirect('/login')->withErrors(['google_login' => 'Gagal login dengan Google.']);
        }
    }

}
