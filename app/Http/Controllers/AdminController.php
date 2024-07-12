<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\admin;
use App\Models\User;
use App\Models\perusahaan;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function wisatawan()
    {
        $users = User::where('role', 'wisatawan')->paginate(10);
        $totalUsers = User::where('role', 'wisatawan')->count();

        return view('admin.content.daftaruser', compact('users', 'totalUsers'));
    }

    public function perusahaan()
    {
        $users = User::where('role', 'perusahaan')->paginate(10);
        $totalUsers = User::where('role', 'perusahaan')->count();

        return view('admin.content.daftar', compact('users', 'totalUsers'));
    }

    public function antrian()
    {
        $users = User::where('role', 'perusahaan')->paginate(10);
        $totalUsers = User::where('role', 'perusahaan')->count();

        return view('admin.content.daftar', compact('users', 'totalUsers'));
    }

    // public function perizinan(Request $request)
    // {
    //     # Validate
    //     $data = $request->validate([
    //         'name' => ['required', 'max:255'],
    //         'email' => ['required', 'max:255', 'email', 'unique:users,email'],
    //         'password' => ['required', 'min:5' ,'confirmed'],
    //         'role' => ['required']
    //     ]);

    //     // Register
    //     $user = User::create($data);

    //     // Redirect
    //     return redirect()->route('verification.notice', ['email' => $user->email])->with('success', 'Registrasi berhasil. Silakan verifikasi email Anda.');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
