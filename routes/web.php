<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index'])->name('product.list');
Route::get('/create-item', [ProductController::class, 'create'])->name('product.create');
Route::post('/create-item', [ProductController::class, 'store'])->name('product.store');
