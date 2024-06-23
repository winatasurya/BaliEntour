<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// // Route untuk login
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);

// Route untuk register
Route::get('/registerUser', [userController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/cek_login', [Registrasi::class, 'cekLogin'])->name('cekLogin');
Route::post('/ProReg', [Registrasi::class, 'ProReg'])->name('ProReg');
Route::get('/Verif/{token}', [Registrasi::class, 'Verif'])->name('Verif');

// Route untuk halaman welcome
Route::get('/user', function () {
    return view('registeruser');
})->name('registeruser');

Route::get('/login', function () {
    return view('login');
})->name('login');


// Route untuk halaman register
Route::get('/pilihan', function () {
    return view('pilihan');
})->name('pilihan');

// Route untuk halaman register
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');