<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SparepartsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\DrivingPackagesController;
use App\Http\Controllers\user\SparepartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::get('/spareparts', [SparepartController::class, 'index'])->name('dashboard.sparepart.index');

Route::get('/servis', [HomeController::class, 'servis'])->name('dashboard.servis');


Route::get('/spareparts/{id}', [SparepartController::class, 'show'])->name('sparepart.show');

Route::resource('user', UsersController::class);
Route::resource('sparepart', SparepartsController::class);
Route::resource('carbrand', CarBrandController::class);
Route::resource('drivingpackage', DrivingPackagesController::class);
Route::resource('carmodel', CarModelController::class);