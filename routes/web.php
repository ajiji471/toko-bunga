<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


// halaman login 
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
// proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 


// protect halaman product
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});