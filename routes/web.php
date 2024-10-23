<?php

use App\Http\Controllers\Auth\Auth;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', [Auth::class, 'index'])->name('login');
Route::get('/register', [Auth::class, 'register'])->name('register');

// Dashboard
Route::prefix('/dashboard')->name('dashboard.')->middleware('is.user')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('index');
    Route::get('/submit', [Dashboard::class, 'submit'])->name('submit');
    Route::get('/status', [Dashboard::class, 'status'])->name('status');
    Route::get('/profile', [Dashboard::class, 'profile'])->name('profile');
    Route::get('/konfirmasi', [Dashboard::class, 'konfirmasiAkun'])->name('konfirmasiAkun');
});
