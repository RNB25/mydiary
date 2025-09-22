<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto-create 1 bulan trial subscription
        Subscription::create([
            'user_id' => $user->id,
            'status' => 'trial',
            'subscription_plan_id' => 1,
            'starts_at' => now(),
            'ends_at' => now()->addMonth(), // 30 hari trial
        ]);

        session(['user' => $user]);
        Auth::login($user);

        Log::info('User daftar: ' . $user->email . ' - Slug: ' . $user->slug);

        return redirect()->route('dashboard', ['user' => $user->slug])->with('success', 'Pendaftaran berhasil!');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau password salah');
        }
        
        // session(['user' => $user]);
        Auth::login($user);

        return redirect()->route('dashboard', ['user' => $user->slug])->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        Auth::logout(); // logout user dari auth system
        session()->invalidate(); // invalidate session saat ini
        session()->regenerateToken(); // mencegah CSRF reuse

        return redirect()->route('login.form')->with('success', 'Logout berhasil!');
    }
}
