<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// rute akses produk (resource controller)
Route::resource('products', ProductController::class);