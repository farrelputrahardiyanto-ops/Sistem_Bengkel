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
use App\Http\Controllers\user\DrivingCourseController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\ServiceController;
use App\Http\Controllers\tutor\DrivingSessionController;


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');



Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::get('/spareparts', [SparepartController::class, 'index'])->name('dashboard.sparepart.index');
Route::get('/spareparts/{id}', [SparepartController::class, 'show'])->name('sparepart.show');


Route::get('/servis', [HomeController::class, 'servis'])->name('dashboard.servis');

Route::get('/belajar-mengemudi', [HomeController::class, 'driving_course'])->name('dashboard.driving-course');

Route::get('/contact', [HomeController::class, 'contact'])->name('dashboard.contact');


Route::middleware(['auth', 'isUser'])->group(function () {


    Route::get('/servis/servis-car', [ServiceController::class, 'index'])->name('servis.car');
    Route::post('/servis/servis-car', [ServiceController::class, 'store'])->name('servis.car.store');
    Route::get('/servis/booking/{id}', [ServiceController::class, 'booking'])->name('servis.booking');
    Route::post('/servis/booking/', [ServiceController::class, 'booking_store'])->name('booking.service.store');



    Route::get('/belajar-mengemudi/register/{id}',[DrivingCourseController::class, 'checkout'])->name('register.course');
    Route::post('/belajar-mengemudi/register',[DrivingCourseController::class, 'store'])->name('register.course.store');
    Route::get('/belajar-mengemudi-payment-success', [DrivingCourseController::class, 'paymentSuccess'])->name('course.payment.success');
    Route::get('/driving-session/{id}',[DrivingCourseController::class, 'sessionForm'])->name('driving.session.form');
    Route::post('/driving-session/store',[DrivingCourseController::class, 'sessionStore'])->name('driving.session.store');


    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{id}', [CartController::class, 'delete']) ->name('cart.delete');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/process', [CartController::class, 'processCheckout'])->name('checkout.process');



});



Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::resource('admin/user', UsersController::class)->names([
        'index' => 'user.index',
        'create' => 'user.create',
        'store' => 'user.store',
        'edit' => 'user.edit',
        'update' => 'user.update',
        'destroy' => 'user.destroy',
    ]);
    Route::resource('admin/sparepart', SparepartsController::class)->names([
        'index' => 'sparepart.index',
        'create' => 'sparepart.create',
        'store' => 'sparepart.store',
        'edit' => 'sparepart.edit',
        'update' => 'sparepart.update',
        'destroy' => 'sparepart.destroy',
    ]);
    Route::resource('admin/carbrand', CarBrandController::class)->names([
        'index' => 'carbrand.index',
        'create' => 'carbrand.create',
        'store' => 'carbrand.store',
        'edit' => 'carbrand.edit',
        'update' => 'carbrand.update',
        'destroy' => 'carbrand.destroy',
    ]);
    Route::resource('admin/drivingpackage', DrivingPackagesController::class)->names([
        'index' => 'drivingpackage.index',
        'create' => 'drivingpackage.create',
        'store' => 'drivingpackage.store',
        'edit' => 'drivingpackage.edit',
        'update' => 'drivingpackage.update',
        'destroy' => 'drivingpackage.destroy',
    ]);
    Route::resource('admin/carmodel', CarModelController::class)->names([
        'index' => 'carmodel.index',
        'create' => 'carmodel.create',
        'store' => 'carmodel.store',
        'edit' => 'carmodel.edit',
        'update' => 'carmodel.update',
        'destroy' => 'carmodel.destroy',
    ]);

});

Route::middleware(['auth', 'isTutor'])->group(function () {

    // Route untuk tutor
    Route::resource('tutor/driving-session', DrivingSessionController::class)->names([
        'index' => 'tutor.driving-session.index',
        'create' => 'tutor.driving-session.create',
        'store' => 'tutor.driving-session.store',
        'edit' => 'tutor.driving-session.edit',
        'update' => 'tutor.driving-session.update',
        'destroy' => 'tutor.driving-session.destroy',
    ]);

});


