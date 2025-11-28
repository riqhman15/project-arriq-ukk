<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/dashboard');
});


// Jika mau pakai /dashboard juga bisa tetap ada
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Kategori
Route::resource('kategori', KategoriController::class);

// Tempat
Route::resource('tempat', TempatController::class);
