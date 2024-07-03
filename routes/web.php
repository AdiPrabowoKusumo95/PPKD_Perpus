<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\Admin;

Route::get('/', [LoginController::class, 'index'])->name('/');
Route::post('aksilogin', [LoginController::class, 'aksilogin'])->name('aksilogin');
Route::get('aksilogout', [LoginController::class, 'aksilogout'])->name('aksilogout');
Route::resource('dashboard', DashboardController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('buku', BukuController::class);


Route::middleware(['auth', 'Admin'])->group(function (){
    Route::resource('user', UserController::class);
    Route::resource('level', LevelController::class);
});


Route::get('peminjaman', [TransaksiController::class, 'Peminjaman'])->name('peminjaman');
Route::get('tambah-peminjaman', [TransaksiController::class, 'TambahPeminjaman'])->name('tambah-peminjaman');
Route::post('tambah-peminjaman', [TransaksiController::class, 'AksiTambahPeminjaman'])->name('aksitambah-peminjaman');
Route::get('show-peminjaman/{id}', [TransaksiController::class, 'ShowPeminjaman'])->name('show-peminjaman');
Route::get('delete-peminjaman/{id}', [TransaksiController::class, 'DeletePeminjaman'])->name('delete-peminjaman');

