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
    Route::get('/lihat-sppdStatus/{uuid}', [Dashboard::class, 'lihatSppdStatus'])->name('lihatSppdStatus')->where('uuid', '[0-9a-f-]{36}');
    Route::get('/lihat-sppdKonfirm/{uuid}', [Dashboard::class, 'lihatSppdKonfirm'])->name('lihatSppdKonfirm')->where('uuid', '[0-9a-f-]{36}');
    Route::get('/status', [Dashboard::class, 'status'])->name('status');
    Route::get('/konfirmasiSppd', [Dashboard::class, 'konfirmasiSppd'])->name('konfirmasiSppd');
    Route::post('/doKonfirmSppd', [Dashboard::class, 'doKonfirmSppd'])->name('doKonfirmSppd');
    Route::post('/doEditSppd', [Dashboard::class, 'doEditSppd'])->name('doEditSppd');
    Route::post('/doKonfirmSppdSekretaris', [Dashboard::class, 'doKonfirmSppdSekretaris'])->name('doKonfirmSppdSekretaris');
    Route::post('/doTolakSppd', [Dashboard::class, 'doTolakSppd'])->name('doTolakSppd');
    Route::post('/doBatalSppd', [Dashboard::class, 'doBatalSppd'])->name('doBatalSppd');
    Route::get('/riwayatSppd', [Dashboard::class, 'riwayatSppd'])->name('riwayatSppd');

    // MOBIL DINAS ROUTE
    Route::get('/submitMobilDinas', [Dashboard::class, 'submitMobilDinas'])->name('submitMobilDinas');
    Route::get('/statusMobilDinas', [Dashboard::class, 'statusMobilDinas'])->name('statusMobilDinas');
    Route::get('/konfirmasiMobilDinas', [Dashboard::class, 'konfirmasiMobilDinas'])->name('konfirmasiMobilDinas');
    Route::get('/manageDriver', [Dashboard::class, 'manageDriver'])->name('manageDriver');
    Route::post('/doKonfirmasiDriver', [Dashboard::class, 'doKonfirmasiDriver'])->name('doKonfirmasiDriver');
    Route::post('/doSubmitMobilDinas', [Dashboard::class, 'doSubmitMobilDinas'])->name('doSubmitMobilDinas');
});
