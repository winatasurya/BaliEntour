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
        $penawaran = Penawaran::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'setuju');
        })->orderByRaw('RAND()')/*->limit(2)*/->get();

        return view('welcome', compact('penawaran'));

    }

    public function perusahaan()
    {
        return view('layout.dashboard');
    }
}
