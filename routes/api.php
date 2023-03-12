<?php

use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\api\TacheController;
use App\Http\Controllers\API\TaskAPIController;
use App\Http\Controllers\API\TaskDocumentAPIController;
use App\Http\Controllers\API\TaskPhotoAPIController;
use App\Http\Controllers\ErpController;
use App\Http\Controllers\ListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('client_projects',  [ErpController::class, 'client_projects'])->name('client_projects');
Route::post('projet_buildings', [ErpController::class, 'projet_buildings'])->name('projet_buildings');
Route::post('building_stages',  [ErpController::class, 'building_stages'])->name('building_stages');
Route::post('stage_rooms',      [ErpController::class, 'stage_rooms'])->name('stage_rooms');
Route::post('projet_invoices',  [ErpController::class, 'projet_invoices'])->name('projet_invoices');
Route::post('room_invoices',    [ErpController::class, 'room_invoices'])->name('room_invoices');
Route::get('priorities',        [ListController::class, 'priorities'])->name('priorities');

// Invoice
Route::post('get_invoice_rows',  [InvoiceController::class, 'getInvoiceRows'])->name('getInvoiceRows');
Route::post('get_invoice_sections',  [InvoiceController::class, 'getInvoiceSection'])->name('getInvoiceSection');
Route::post('get_section_rows',  [InvoiceController::class, 'getSectionRows'])->name('getSectionRows');

// Report
Route::post('get_projet_report',  [ReportController::class, 'getReports'])->name('getReports');
Route::post('get_report_section',  [ReportController::class, 'getSection'])->name('getSection');

// Tasks
Route::post('get_tasks',  [TacheController::class, 'get_tasks'])->name('get_tasks');

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

Route::resource('tasks',            TaskAPIController::class);
Route::resource('task_photos',      TaskPhotoAPIController::class);
Route::resource('task_documents',   TaskDocumentAPIController::class);


Route::resource('systems', App\Http\Controllers\API\SystemAPIController::class);


Route::resource('fichiers', App\Http\Controllers\API\FichierAPIController::class);


Route::resource('report_files', App\Http\Controllers\API\ReportFilesAPIController::class);


Route::resource('personnels', App\Http\Controllers\API\PersonnelAPIController::class);


Route::resource('comptes', App\Http\Controllers\API\CompteAPIController::class);
