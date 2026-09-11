<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

// Materi 2

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/profile', function () {
//     return ('Halaman Profile');
// }) ->name('biodata');

// Route::get('/home', function () {
//     return '<a href="' . route('biodata') . '"> ke Profile</a>';
// });

// Praktikum 2
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/about', function () {
    return 'Selamat datang di Barokah Mart. Barokah Mart adalah toko yang menyediakan berbagai kebutuhan sehari-hari.';
});

// Materi 3
// Route::get('/mahasiswa', function (){
//     return 'Hello, Muhammad Maulana Evandra. Selamat Datang!!!';
// });


// Praktikum 4
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
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');
    Route::resource('products', ProductController::class);
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');
});

Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
});

Route::resource('users', UserController::class)
    ->middleware(['auth', 'role:admin']);




