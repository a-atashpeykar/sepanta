<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::resource('/products', ProductController::class);

Route::middleware('auth')->prefix('/admin')->group( function (){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/product', AdminProductController::class);
    Route::resource('/detail', AdminProductDetailController::class);
});
