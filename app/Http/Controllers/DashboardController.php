<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\User;
use App\Models\Penawaran;

class DashboardController extends Controller
{
    public function index()
    {
        $perusahaan = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'setuju');
        })->with('perusahaan')->orderByRaw('RAND()')->get();

        return view('welcome', compact('perusahaan'));
    }

    public function allplace(Request $request)
    {
        $search = $request->input('search');
        $bidang = $request->input('bidang');
        
        $perusahaan = User::whereHas('perusahaan', function ($query) use ($search, $bidang) {
            $query->where('perizinan', 'setuju');

            if ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }

            if ($bidang) {
                $query->where('bidang', $bidang);
            }
        })->with('perusahaan')->paginate(10);

        $bidangs = Perusahaan::select('bidang')->distinct()->get();

        return view('landing.viewall', compact('perusahaan', 'search', 'bidangs', 'bidang'));
    }
}
