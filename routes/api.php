<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('tags', TagAPIController::class);
Route::resource('brands', BrandAPIController::class);
Route::resource('providers', ProviderAPIController::class);
Route::resource('manuals', ManualAPIController::class);
Route::resource('priorities', PriorityAPIController::class);
Route::resource('articles', ArticleAPIController::class);
Route::resource('storages', StorageAPIController::class);
