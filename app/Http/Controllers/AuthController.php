<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\perusahaan;
use App\Models\wisatawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

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
        if ($data['role'] === 'perusahaan') {
            $perusahaanData = $request->validate([
                'wa_perusahaan' => ['required','max:20'],
                'deskripsi' => ['required', 'max:1000'],
                'bidang' => ['required', 'max:255'],
                'logo' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp,jpeg'] 
            ]);
        }

        // Register
        $user = User::create($data);
        $logo = null;
        if ($user->role === 'perusahaan') {
            if ($request->hasFile('logo')) {
                $logo = Storage::disk('public')->put('gambar_perusahaan', $request->logo);
            }

            Perusahaan::create([
                'id_users' => $user->id,
                'wa_perusahaan' => $perusahaanData['wa_perusahaan'],
                'deskripsi' => $perusahaanData['deskripsi'],
                'bidang' => $perusahaanData['bidang'],
                'logo' => $logo
            ]);
        } elseif ($user->role === 'wisatawan'){
            Wisatawan::create([
                'id_users' => $user->id,
            ]);
        }


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
