<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SparepartsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CarBrandController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/user/create', [UsersController::class, 'create']);
// Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
Route::resource('user', UsersController::class);
Route::resource('sparepart', SparepartsController::class);
Route::resource('carbrand', CarBrandController::class);