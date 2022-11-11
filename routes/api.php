<?php

use App\Http\Controllers\ErpController;
use App\Http\Controllers\ListController;
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

Route::post('client_projects',  [ErpController::class, 'client_projects'])->name('client_projects');
Route::post('projet_buildings', [ErpController::class, 'projet_buildings'])->name('projet_buildings');
Route::post('building_stages',  [ErpController::class, 'building_stages'])->name('building_stages');
Route::post('stage_rooms',      [ErpController::class, 'stage_rooms'])->name('stage_rooms');
Route::get('priorities',      [ListController::class, 'priorities'])->name('priorities');

Route::resource('clients',          ClientAPIController::class);
Route::resource('projets',          ProjetAPIController::class);
Route::resource('invoices',         InvoiceAPIController::class);
Route::resource('invoice_rows',     InvoiceRowAPIController::class);
Route::resource('invoice_sections', InvoiceSectionAPIController::class);
Route::resource('contacts',         ContactAPIController::class);
Route::resource('contact_tels',     ContactTelAPIController::class);
Route::resource('contact_mails',    ContactMailAPIController::class);
Route::resource('buildings',        BuildingAPIController::class);
Route::resource('stages',           StageAPIController::class);
Route::resource('rooms',            RoomAPIController::class);
Route::resource('room_articles',    RoomArticleAPIController::class);
Route::resource('room_article_details', RoomArticleDetailAPIController::class);
Route::resource('reports',          ReportAPIController::class);
Route::resource('report_sections',  ReportSectionAPIController::class);
Route::resource('report_peoples',   ReportPeopleAPIController::class);
Route::resource('report_devis',     ReportDevisAPIController::class);
Route::resource('report_modalites', ReportModaliteAPIController::class);


Route::resource('articles',         ArticleAPIController::class);
Route::resource('providers',        ProviderAPIController::class);
Route::resource('provider_tels',    ProviderTelAPIController::class);
Route::resource('provider_mails',   ProviderMailAPIController::class);
Route::resource('brands',           BrandAPIController::class);
Route::resource('catalogues',       CatalogueAPIController::class);
Route::resource('achats',           AchatAPIController::class);
Route::resource('achat_articles',   AchatArticleAPIController::class);
Route::resource('article_docs',     ArticleDocAPIController::class);
