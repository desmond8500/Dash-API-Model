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


Route::resource('personnes', App\Http\Controllers\API\PersonneAPIController::class);


Route::resource('foormations', App\Http\Controllers\API\FoormationAPIController::class);


Route::resource('formations', App\Http\Controllers\API\FormationAPIController::class);


Route::resource('experiences', App\Http\Controllers\API\ExperienceAPIController::class);


Route::resource('competences', App\Http\Controllers\API\CompetenceAPIController::class);


Route::resource('langues', App\Http\Controllers\API\LangueAPIController::class);


Route::resource('interets', App\Http\Controllers\API\InteretAPIController::class);
