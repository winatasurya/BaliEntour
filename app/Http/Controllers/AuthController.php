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

        // Login
        Auth::login($user);

        // Email verif
        event(new Registered($user));

        // Redirect
        return redirect()->route('login')->with('success', 'Account created successfully');
    }

    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        return redirect()->route('dashboard');
    }

    public function verifyHandler(Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }

    public function login(Request $request)
    {
        # Validate
        $data = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);

        // Try to login user
        if (Auth::attempt($data, $request -> remember)){
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'Akun belum terdaftar atau belum terverivikasi'
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
