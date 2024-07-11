<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request)
    {
        # Validate
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5' ,'confirmed'],
            'role' => ['required']
        ]);

        // Register
        $user = User::create($data);

        // Email verif
        event(new Registered($user));

        // Redirect
        return redirect()->route('verification.notice', ['email' => $user->email])->with('success', 'Registrasi berhasil. Silakan verifikasi email Anda.');
    }

    public function login(Request $request)
    {
        # Validate
        $data = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $data['email'])->first();
        
        if ($user && !$user->hasVerifiedEmail()) {
            event(new Registered($user));
            return redirect()->route('verification.notice', ['email' => $user->email])->with('warning', 'Anda harus memverifikasi email terlebih dahulu. Email verifikasi telah dikirim ulang.');
        }

        // Try to login user
        if (Auth::attempt($data)){
            $request->session()->regenerate();
            if ($user->role === 'wisatawan') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'perusahaan') {
                // Redirect other roles (e.g., admin) to their respective dashboards
                return redirect()->route('db_perusahaan');
            }
        } else {
            return back()->withErrors([
                'failed' => 'Email atau password salah.'
            ]);
        }
    }

    // Logout user
    public function logout(Request $request)
    {   
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
