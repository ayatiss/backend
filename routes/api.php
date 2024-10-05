<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
/*Route::get('/categories', [CategorieController::class,"index"]);
Route::get('/categories/{id}', [CategorieController::class,"show"]);
Route::post('/categorie', [CategorieController::class,"store"]);
Route::delete('/categorieDelete/{id}', [CategorieController::class,"destroy"]);
Route::put('/categorieUpdate/{id}', [CategorieController::class,"update"]);*/
Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
    });
Route::middleware('api')->group(function () {
        Route::resource('scategories', ScategorieController::class);
        });
Route::get('/listsCat/{id}', [ScategorieController::class,"showSCategorieByCAT"]);

Route::middleware('api')->group(function () {
    Route::resource('articles', ArticleController::class);
    });

Route::get('/listsArt/{id}', [ArticleController::class,"showArticlesBySCAT"]);
Route::get('/articles/art/articlespaginate', [ArticleController::class,
'articlesPaginate']);