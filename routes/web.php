<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', [LoginController::class, 'index'])->name('/');
Route::post('aksilogin', [LoginController::class, 'aksilogin'])->name('aksilogin');
Route::get('aksilogout', [LoginController::class, 'aksilogout'])->name('aksilogout');
Route::resource('dashboard', DashboardController::class);
Route::resource('user', UserController::class);
Route::resource('level', LevelController::class);

