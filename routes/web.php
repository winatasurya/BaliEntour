<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/perusahaan', function () {
//     return view('registerperusahaan');
// })->name('registerperusahaan');

// Route untuk halaman register
Route::get('/pilihan', function () {
    return view('pilihan');
})->name('pilihan');

// // Route untuk halaman register
// Route::get('/about', function () {
//     return view('aboutus');
// });

// // Route untuk halaman register
// Route::get('/abut', function () {
//     return view('about');
// });

// Route untuk halaman register
Route::get('/main', function () {
    return view('admin/main');
});
