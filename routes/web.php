<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// Route untuk CRUD Mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);

// Route default Laravel
Route::get('/', function () {
    return view('welcome');
});