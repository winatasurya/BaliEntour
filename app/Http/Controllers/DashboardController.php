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

    public function allplace()
    {
        $perusahaan = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'setuju');
        })->with('perusahaan')->get();

        return view('landing.viewall', compact('perusahaan'));
    }
}
