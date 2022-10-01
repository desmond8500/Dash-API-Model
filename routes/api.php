<?php

use App\Http\Controllers\ScrapperController;
use App\Http\Controllers\StockController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/scrapper', [ScrapperController::class, 'scrapper'])->name('scrapper');
Route::post('/article_url', [StockController::class, 'article_url'])->name('article_url');

Route::resource('tags',         TagAPIController::class);
Route::resource('brands',       BrandAPIController::class);
Route::resource('providers',    ProviderAPIController::class);
Route::resource('manuals',      ManualAPIController::class);
Route::resource('priorities',   PriorityAPIController::class);
Route::resource('articles',     ArticleAPIController::class);
Route::resource('storages',     StorageAPIController::class);
