<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductsController::class, 'index']);
Route::get('/import', [ImportController::class, 'index']);
Route::post('/import/upload', [ImportController::class, 'upload']);
