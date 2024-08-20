<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceTransactionController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['check.user.ip', 'throttle:60,1'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    
    Route::get('/product/category_id={id}', [ProductTransactionController::class, 'index'])->name('productTransaction.index')->middleware('auth');
    Route::get('/product', [ProductTransactionController::class, 'show'])->name('productTransaction.show')->middleware('auth');
    Route::get('/order-service', [ServiceTransactionController::class, 'index'])->name('serviceTransaction.index')->middleware('auth');
    Route::post('/order-service', [ServiceTransactionController::class, 'store'])->name('serviceTransaction.store')->middleware('auth');
    Route::get('/order-product/product_id=${id}', [ProductTransactionController::class, 'create'])->name('productTransaction.create')->middleware('auth');
    Route::post('/order-product', [ProductTransactionController::class, 'store'])->name('productTransaction.store')->middleware('auth');
    
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('/admin/product', ProductController::class);
        Route::resource('/admin/category', CategoryController::class);
        Route::resource('/admin/about', AboutController::class);
        Route::resource('/admin/service', ServiceController::class);
        Route::resource('/admin/user', UserController::class);
        Route::get('/admin', [HomeController::class, 'admin'])->name('adminPanel');
        Route::get('/admin/serviceTransaction', [ServiceTransactionController::class, 'adminIndex']);
        Route::get('/admin/productTransaction', [ProductTransactionController::class, 'adminIndex']);
    });

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
    
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
    
    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
});


