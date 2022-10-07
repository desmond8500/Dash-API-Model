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


Route::resource('clients', App\Http\Controllers\API\ClientAPIController::class);


Route::resource('projets', App\Http\Controllers\API\ProjetAPIController::class);


Route::resource('invoices', App\Http\Controllers\API\InvoiceAPIController::class);


Route::resource('invoice_rows', App\Http\Controllers\API\InvoiceRowAPIController::class);


Route::resource('invoice_sections', App\Http\Controllers\API\InvoiceSectionAPIController::class);


Route::resource('contacts', App\Http\Controllers\API\ContactAPIController::class);


Route::resource('contact_tels', App\Http\Controllers\API\ContactTelAPIController::class);


Route::resource('contact_mails', App\Http\Controllers\API\ContactMailAPIController::class);


Route::resource('buildings', App\Http\Controllers\API\BuildingAPIController::class);


Route::resource('stages', App\Http\Controllers\API\StageAPIController::class);


Route::resource('rooms', App\Http\Controllers\API\RoomAPIController::class);


Route::resource('room_articles', App\Http\Controllers\API\RoomArticleAPIController::class);


Route::resource('room_article_details', App\Http\Controllers\API\RoomArticleDetailAPIController::class);
