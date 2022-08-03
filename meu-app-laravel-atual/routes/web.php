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



//Route::get("/user/team/{id}", [TeamController::class, 'show'])->name('team.show')->middleware('auth');
//Route::get("/team/{id}", [TeamController::class, 'show'])->name('team.show');
//Route::get("/user/team/{id}", [TeamController::class, 'show'])->name('team.team'); colocando o arquivo chamado team.blade dentro da pasta users

Route::middleware(['auth'])->group(function () {
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [UserController::class, 'admin'])->name('admin');
    Route::get('/admin', [ProductController::class, 'admin'])->name('admin');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
});
//VIA CEP WEB SERVICE
//Route::get('/viacep',[ViaCepController::class, 'index'])->name('viacep.index');
//Route::post('/viacep',[ViaCepController::class, 'index'])->name('viacep.index.post');
//Route::get('/viacep/{cep}', [ViaCepController::class, 'show'])->name('viacep.show');

//CODIGO PARA CLICAR EM ESQUECI MINHA SENHA USAR NO .ENV
//MAIL_MAILER=smtp
//MAIL_HOST=smtp.gmail.com
//MAIL_PORT=587
//MAIL_USERNAME=risysintegrator@gmail.com
//MAIL_PASSWORD=92392105
//MAIL_ENCRYPTION=tls
//MAIL_FROM_ADDRESS=risysintegrator@gmail.com
