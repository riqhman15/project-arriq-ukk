<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Auth Routes (Login & Logout)
|--------------------------------------------------------------------------
*/

// Halaman login (hanya untuk tamu)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Logout (hanya untuk user yang login)
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| Protected Routes (Harus Login)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Root -> dashboard
    Route::get('/', fn() => redirect('/dashboard'));

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Kategori
    Route::resource('kategori', KategoriController::class);

    // CRUD Tempat
    Route::resource('tempat', TempatController::class);

    // Contoh halaman profil
    Route::get('/profile', function () {
        return auth()->user();
    })->name('profile');
});


/*
|--------------------------------------------------------------------------
| Developer Utility — Buat User Admin (HAPUS NANTI)
|--------------------------------------------------------------------------
*/

Route::get('/buat-admin', function () {

    if (User::where('email', 'admin@gmail.com')->exists()) {
        return "Admin sudah ada!";
    }

    User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
    ]);

    return "User admin berhasil dibuat!<br>Email: admin@gmail.com<br>Password: 123456";
});


/*
|--------------------------------------------------------------------------
| Fallback jika URL tidak ditemukan
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return redirect('/dashboard');
});
