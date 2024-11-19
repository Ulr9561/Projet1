<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;



Route::resource('article', ArticleController::class);

Route::get("/", function () {
    return redirect()->route('article.index');
});

// Categories
Route::get('/categories', [CategorieController::class, 'index'])->name('category.index');

Route::get('/categories/create', [CategorieController::class, 'create'])->name('category.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('category.store');

Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('category.edit');
Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('category.update');

Route::delete('/categories/{category}', [CategorieController::class, 'destroy'])->name('category.destroy');
