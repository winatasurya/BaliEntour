<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Route untuk login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Route untuk register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Route untuk halaman welcome
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Route untuk halaman register
Route::get('/pilihan', function () {
    return view('pilihan');
})->name('pilihan');

// Route untuk halaman register
Route::get('/aboutus', function () {
    return view('about');
})->name('aboutus');