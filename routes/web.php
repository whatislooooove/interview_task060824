<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductsController::class, 'index'])->name('product.index');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('product.show');
Route::get('/import', [ImportController::class, 'index'])->name('import.index');
Route::post('/import/upload', [ImportController::class, 'upload'])->name('import.upload');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
