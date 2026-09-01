<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\DashboardController;

// Materi 2

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return ('Halaman Profile');
}) ->name('biodata');

Route::get('/home', function () {
    return '<a href="' . route('biodata') . '"> ke Profile</a>';
});

// Praktikum 2
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/about', function () {
    return 'Selamat datang di Barokah Mart. Barokah Mart adalah toko yang menyediakan berbagai kebutuhan sehari-hari.';
});

// Materi 3
Route::get('/mahasiswa', function (){
    return 'Hello, Muhammad Maulana Evandra. Selamat Datang!!!';
});


