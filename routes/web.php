<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PosController;

Route::get('/', function () {
     return view('welcome');
});

Route::get('/about', function () {
    return '<h1>Profil Toko POS</h1><p>Selamat datang di Toko Kami. Kami menyediakan berbagai kebutuhan harian Anda.</p>';
});

 
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); 

Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');
 
Route::post('/login', [LoginController::class, 'store'])

    ->middleware('guest')
    ->name('login.store');
 
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');
});
 
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', function () {
        return 'Halaman Kelola Akun Kasir (Khusus Admin)';
    });
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/pos/history', function () {
        return 'Halaman Riwayat Transaksi Saya';
    })->name('pos.history');
});