<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreperusahaanRequest;
use App\Http\Requests\UpdateperusahaanRequest;
use App\Models\perusahaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('email', auth()->user()->email)->first();
        $perusahaan = perusahaan::where('id_users', $user->id)->first();

        return view('perusahaan.db_perusahaan', compact('user','perusahaan'));
    }

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
    public function store(StoreperusahaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateperusahaanRequest $request, perusahaan $perusahaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(perusahaan $perusahaan)
    {
        //
    }
}
