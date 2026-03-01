<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoController; // ✅ Tambahan baru

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Route Public (Tidak Perlu Login)
|--------------------------------------------------------------------------
*/

// Route Modul 5 - Controller Dasar
Route::get('/halo', [InfoController::class, 'halo']);
Route::get('/ikmi', [InfoController::class, 'kampus']);

/*
|--------------------------------------------------------------------------
| Route Yang Butuh Login
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile (Breeze)
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Mata Kuliah CRUD
    |--------------------------------------------------------------------------
    */
    Route::resource('matakuliah', MataKuliahController::class);

    Route::get('/matakuliah/{kode_mk}/mahasiswa',
        [MataKuliahController::class, 'mahasiswa']
    )->name('mata_kuliah.mahasiswa');

    /*
    |--------------------------------------------------------------------------
    | Mahasiswa CRUD
    |--------------------------------------------------------------------------
    */

    // Route Cetak PDF
    Route::get('/mahasiswa/cetak-pdf',
        [MahasiswaController::class, 'cetak_pdf']
    )->name('mahasiswa.cetak_pdf');

    Route::resource('mahasiswa', MahasiswaController::class)
        ->except(['destroy']);

    Route::delete('/mahasiswa/{mahasiswa}',
        [MahasiswaController::class, 'destroy']
    )->middleware('ikmi.email')
     ->name('mahasiswa.destroy');

});

/*
|--------------------------------------------------------------------------
| Auth Breeze
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';