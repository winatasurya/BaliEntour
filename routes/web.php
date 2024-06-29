<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login'); //->middleware(['auth']); 


// // Route untuk login
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);

// Route untuk register
// Route::get('/registerUser', [userController::class, 'showLoginForm'])->name('showLoginForm');
// Route::post('/cek_login', [Registrasi::class, 'cekLogin'])->name('cekLogin');
// Route::post('/ProReg', [Registrasi::class, 'ProReg'])->name('ProReg');
// Route::get('/Verif/{token}', [Registrasi::class, 'Verif'])->name('Verif');

// // Route untuk regis user

// Route::get('/user', [usercontroller::class, 'index']);
// Route::post('/user', [usercontroller::class, 'store']);

// Route::get('/welcome', function () {
//     return view('welcome');
// })->name('welcome');

// Route::get('/perusahaan', function () {
//     return view('registerperusahaan');
// })->name('registerperusahaan');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// // Route untuk halaman register
// Route::get('/pilihan', function () {
//     return view('pilihan');
// })->name('pilihan');

// // Route untuk halaman register
// Route::get('/about', function () {
//     return view('aboutus');
// });

// // Route untuk halaman register
// Route::get('/abut', function () {
//     return view('about');
// });