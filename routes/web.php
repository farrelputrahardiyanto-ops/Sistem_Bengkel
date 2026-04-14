<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user/create', [UsersController::class, 'create']);
// Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
Route::resource('user', UsersController::class);