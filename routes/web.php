<?php

use App\Http\Controllers\Auth\Auth;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', [Auth::class, 'index'])->name('login');
Route::get('/register', [Auth::class, 'register'])->name('register');
Route::post('/doLogin', [Auth::class, 'doLogin'])->name('doLogin');
Route::get('/doLogout', [Auth::class, 'doLogout'])->name('doLogout');
Route::post('/doRegist', [Auth::class, 'doRegist'])->name('doRegist');

// Dashboard
Route::prefix('/dashboard')->name('dashboard.')->middleware('is.user')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('index');
    Route::get('/submit', [Dashboard::class, 'submit'])->name('submit');
    Route::post('/doSubmit', [Dashboard::class, 'doSubmit'])->name('doSubmit');
    Route::get('/profile', [Dashboard::class, 'profile'])->name('profile');
    Route::get('/konfirmasiakun', [Dashboard::class, 'konfirmasiAkun'])->name('konfirmasiAkun');
    Route::post('/doKonfirmasiAkun', [Dashboard::class, 'doKonfirmasiAkun'])->name('doKonfirmasiAkun');

    // SPPD ROUTE
    Route::get('/lihat-sppd/{uuid}', [Dashboard::class, 'lihatSppd'])->name('lihatSppd')->where('uuid', '[0-9a-f-]{36}');
    Route::get('/status', [Dashboard::class, 'status'])->name('status');
    Route::get('/konfirmasiSppd', [Dashboard::class, 'konfirmasiSppd'])->name('konfirmasiSppd');
    Route::post('/doKonfirmSppd', [Dashboard::class, 'doKonfirmSppd'])->name('doKonfirmSppd');
});
