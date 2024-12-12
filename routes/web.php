<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index'])->name('product.list');
Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
Route::post('/store-product', [ProductController::class, 'store'])->name('product.store');
Route::get('/edit-product', [ProductController::class, 'edit'])->name('product.edit');
