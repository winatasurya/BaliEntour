<?php

namespace App\Http\Controllers;

use App\Models\penawaran;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Penawaran $penawaran){

        dd($penawaran);
        return view('landing.payment', compact('penawaran'));
    }
}
