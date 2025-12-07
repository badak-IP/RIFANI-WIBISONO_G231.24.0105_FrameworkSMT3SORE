<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgdiController;
use App\Http\Controllers\PribadiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

/* ROUTE PROGDI */
Route::resource('progdis', ProgdiController::class);

/* ROUTE PRIBADI */
Route::resource('pribadi', PribadiController::class);

/* ROUTE MAHASISWA */
Route::get('/mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/mahasiswa/daftar/{id_pribadi}', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');


/* ROUTE HOME */
Route::get('/', [HomeController::class, 'index'])->name('home.index');
