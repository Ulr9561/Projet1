<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\ArticleController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/categories', [CategorieController::class, 'index']);
// Route::get('/categories/create', [CategorieController::class, 'create']);

Route::apiResource('/articles', ArticleController::class);
