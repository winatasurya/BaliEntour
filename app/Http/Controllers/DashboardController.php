<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perusahaan;
use App\Models\user;
use App\Models\penawaran;

class DashboardController extends Controller
{
    public function index()
    {
        $perusahaan = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'setuju');
        })->with('perusahaan')->orderByRaw('RAND()')/*->limit(2)*/->get();

        return view('welcome', compact('perusahaan'));
    }
    public function allplace(Request $request)
    {
        // Ambil parameter pencarian dari permintaan
        $search = $request->input('search');
        
        // Mulai query untuk mengambil data perusahaan
        $query = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'setuju');
        })->with('perusahaan');
        
        // Terapkan pencarian jika parameter pencarian ada
        if ($search) {
            $query->whereHas('perusahaan', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            });
        }
        
        // Ambil hasil query
        $perusahaan = $query->get();
        
        // Kembalikan view dengan data perusahaan
        return view('landing.viewall', compact('perusahaan'));
    }
}
