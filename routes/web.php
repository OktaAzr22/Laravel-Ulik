<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProductController;

Route::resource('barangs', BarangController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
Route::resource('barangs', BarangController::class);
Route::resource('tokos', TokoController::class)->except(['create', 'edit']);
Route::resource('products', ProductController::class);
