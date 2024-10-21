<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', function () {
    return view('login');
});

// Dashboard
Route::prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('index');
    Route::get('/submit', [Dashboard::class, 'submit'])->name('submit');
});
