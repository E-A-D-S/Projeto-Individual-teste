<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('home');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    
   


 
    
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [UserController::class, 'admin'])->name('admin');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    Route::get('/admin', [ProductController::class, 'admin'])->name('admin');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    
    Route::get('/admin', [CategoryController::class, 'admin'])->name('admin');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
});

