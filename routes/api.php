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

Route::resource('clients', ClientAPIController::class);
Route::resource('projets', ProjetAPIController::class);
Route::resource('invoices', InvoiceAPIController::class);
Route::resource('invoice_rows', InvoiceRowAPIController::class);
Route::resource('invoice_sections', InvoiceSectionAPIController::class);
Route::resource('contacts', ContactAPIController::class);
Route::resource('contact_tels', ContactTelAPIController::class);
Route::resource('contact_mails', ContactMailAPIController::class);
Route::resource('buildings', BuildingAPIController::class);
Route::resource('stages', StageAPIController::class);
Route::resource('rooms', RoomAPIController::class);
Route::resource('room_articles', RoomArticleAPIController::class);
Route::resource('room_article_details', RoomArticleDetailAPIController::class);
Route::resource('reports', ReportAPIController::class);
Route::resource('report_sections', ReportSectionAPIController::class);
Route::resource('report_peoples', ReportPeopleAPIController::class);
Route::resource('report_devis', ReportDevisAPIController::class);
Route::resource('report_modalites', ReportModaliteAPIController::class);
