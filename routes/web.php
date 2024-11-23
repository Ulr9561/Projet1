<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return redirect()->route('articles.index');
// });


// Route::middleware(['guest'])->group(function () {
//     Route::get('/register', [RegisterController::class, 'create'])->name('register');
//     Route::post('/user/register', [RegisterController::class, 'store'])->name('user.register');

//     Route::get('/login', [LoginController::class, 'index'])->name('login');
//     Route::post('/user/login', [LoginController::class, 'authenticate'])->name('user.authenticate');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
//     Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

//     Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');

//     Route::middleware(['role:admin'])->group(function () {
//         Route::resource('article', ArticleController::class)->except(['index']);

//         Route::get('/categories/create', [CategorieController::class, 'create'])->name('category.create');
//         Route::post('/categories', [CategorieController::class, 'store'])->name('category.store');

//         Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('category.edit');
//         Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('category.update');

//         Route::delete('/categories/{category}', [CategorieController::class, 'destroy'])->name('category.destroy');
//     });
// });

// Route::resource('article', ArticleController::class);

// // Categories
// Route::get('/categories', [CategorieController::class, 'index'])->name('category.index');

