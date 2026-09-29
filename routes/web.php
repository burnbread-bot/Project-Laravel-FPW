<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PosController;

// Route Publik
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return '<h1>Profil Toko POS</h1><p>Selamat datang di Toko Kami. Kami menyediakan berbagai kebutuhan harian Anda.</p>';
});

// Route Tamu (Hanya bisa diakses jika belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Route Terproteksi (Harus Login)
Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Khusus Admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');
        Route::get('/users', function () {
            return 'Halaman Kelola Akun Kasir (Khusus Admin)';
        });
    });

    // Khusus Admin & Kasir
    Route::middleware('role:admin,kasir')->group(function () {
        Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
        Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
    });

    // Khusus Kasir
    Route::middleware('role:kasir')->group(function () {
        Route::get('/pos/history', function () {
            return 'Halaman Riwayat Transaksi Saya';
        })->name('pos.history');
    });
});