<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article', [ArticleController::class,'store'])->name('article.store');

Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/article/{id}', [ArticleController::class, 'update'])->name('article.update');

Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');


// Categories
Route::get('/categories', [CategorieController::class, 'index'])->name('category.index');

Route::get('/categories/create', [CategorieController::class, 'create'])->name('category.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('category.store');

Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('category.edit');
Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('category.update');

Route::delete('/categories/{category}', [CategorieController::class, 'destroy'])->name('category.destroy');
