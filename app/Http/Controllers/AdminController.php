<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\admin;
use App\Models\User;
use App\Models\perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized action.');
        }
    }

    public function index()
    {
        $totalwisatawan = User::whereHas('wisatawan')->with('wisatawan')->count();
        $totalperusahaan = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'setuju');
        })->count();
        $totalantrian = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'tidak');
        })->count();

        return view('admin.content.admin', compact('totalwisatawan', 'totalperusahaan', 'totalantrian'));
    }

    public function wisatawan()
    {
        $users = User::whereHas('wisatawan', function ($query) {
        })->with('wisatawan')->paginate(10);

        $totalUsers = User::whereHas('wisatawan', function ($query) {
        })->count();
        return view('admin.content.daftaruser', compact('users', 'totalUsers'));
    }

    public function searchWisatawan(Request $request)
    {
        $searchQuery = $request->input('query');

        $users = User::whereHas('wisatawan', function ($query) use ($searchQuery) {
            $query->where('name', 'like', "%$searchQuery%")
                ->orWhere('email', 'like', "%$searchQuery%");
        })->with('wisatawan')->paginate(10);

        $totalUsers = User::whereHas('wisatawan', function ($query) use ($searchQuery) {
            $query->where('name', 'like', "%$searchQuery%")
                ->orWhere('email', 'like', "%$searchQuery%");
        })->with('wisatawan')->count();

        return view('admin.content.daftaruser', compact('users', 'totalUsers'));
    }
    public function getWisatawanDetails($id)
    {
        $user = User::with('wisatawan')->find($id);
        if ($user) {
            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
                'tgl_lahir' => $user->wisatawan->tgl_lahir,
                'wa_wisatawan' => $user->wisatawan->wa_wisatawan,
                'gambar' => $user->wisatawan->gambar,
            ]);
        }
        return response()->json(['error' => 'Wisatawan not found'], 404);
    }


    public function perusahaan()
    {
        $users = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'setuju');
        })->with('perusahaan')->paginate(10);

        $totalUsers = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'setuju');
        })->count();

        return view('admin.content.daftar', compact('users', 'totalUsers'));
    }

    public function searchPerusahaan(Request $request)
    {
        $searchQuery = $request->input('query');

        $users = User::whereHas('perusahaan', function ($query) use ($searchQuery) {
            $query->where('perizinan', 'setuju')
                ->where(function ($query) use ($searchQuery) {
                    $query->where('name', 'like', "%$searchQuery%")
                        ->orWhere('email', 'like', "%$searchQuery%");
                });
        })->with('perusahaan')->paginate(10);

        $totalUsers = User::whereHas('perusahaan', function ($query) use ($searchQuery) {
            $query->where('perizinan', 'setuju')
                ->where(function ($query) use ($searchQuery) {
                    $query->where('name', 'like', "%$searchQuery%")
                        ->orWhere('email', 'like', "%$searchQuery%");
                });
        })->with('perusahaan')->count();

        return view('admin.content.daftar', compact('users', 'totalUsers'));
    }

    public function getPerusahaanDetails($id)
    {
        $user = User::with('perusahaan')->find($id);
        return response()->json([
            'name' => $user->name,
            'bidang' => $user->perusahaan->bidang,
            'deskripsi' => $user->perusahaan->deskripsi,
            'logo' => $user->perusahaan->logo,
            'latitude' => $user->perusahaan->latitude,
            'longitude' => $user->perusahaan->longitude,
        ]);
    }

    public function antrian()
    {
        $users = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'tidak');
        })->with('perusahaan')->paginate(10);

        $totalUsers = User::whereHas('perusahaan', function ($query) {
            $query->where('perizinan', 'tidak');
        })->count();

        return view('admin.content.antrian', compact('users', 'totalUsers'));
    }

    public function searchAntrian(Request $request)
    {
        $searchQuery = $request->input('query');

        $users = User::whereHas('perusahaan', function ($query) use ($searchQuery) {
            $query->where('perizinan', 'tidak')
                ->where(function ($query) use ($searchQuery) {
                    $query->where('name', 'like', "%$searchQuery%")
                        ->orWhere('email', 'like', "%$searchQuery%");
                });
        })->with('perusahaan')->paginate(10);

        $totalUsers = User::whereHas('perusahaan', function ($query) use ($searchQuery) {
            $query->where('perizinan', 'tidak')
                ->where(function ($query) use ($searchQuery) {
                    $query->where('name', 'like', "%$searchQuery%")
                        ->orWhere('email', 'like', "%$searchQuery%");
                });
        })->with('perusahaan')->count();

        return view('admin.content.antrian', compact('users', 'totalUsers'));
    }


    public function create()
    {
        //
    }

    public function store(StoreadminRequest $request)
    {
        //
    }

    public function show(admin $admin)
    {
        //
    }

    public function edit(admin $admin)
    {
        //
    }

    public function update(UpdateadminRequest $request, perusahaan $perusahaan)
    {
        //
    }

    public function approve(User $user)
    {
        $perusahaan = $user->perusahaan;
        if ($perusahaan) {
            $perusahaan->perizinan = 'setuju';
            $perusahaan->save();
            return redirect()->back()->with('success', 'Perizinan perusahaan telah disetujui.');
        }
        return redirect()->back()->with('error', 'Perusahaan tidak ditemukan.');
    }

    public function destroyPerusahaan(User $user)
    {
        $perusahaan = $user->perusahaan;

        if ($perusahaan && $perusahaan->logo) {
            Storage::disk('public')->delete($perusahaan->logo);
        }

        $user->delete();

        return back()->with('delete', 'Perusahaan berhasil dihapus!');
    }

    public function destroyWisatawan(User $user)
    {
        $wisatawan = $user->wisatawan;

        if ($wisatawan && $wisatawan->gambar) {
            Storage::disk('public')->delete($wisatawan->gambar);
        }

        $user->delete();

        return back()->with('delete', 'Wisatawan berhasil dihapus!');
    }
}
