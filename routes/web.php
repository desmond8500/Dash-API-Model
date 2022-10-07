<?php

use App\Http\Livewire\Material\Index as MaterialIndex;
use App\Http\Livewire\Tabler\Index;
use App\Http\Livewire\Tabler\Pages\Docs;
use App\Http\Livewire\Tabler\Pages\Forgotten;
use App\Http\Livewire\Tabler\Pages\Login;
use App\Http\Livewire\Tabler\Pages\Profile;
use App\Http\Livewire\Tabler\Pages\Register;
use App\Http\Livewire\Tabler\Pages\Reglages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',     Index::class)->name('index');
Route::get('mat',   MaterialIndex::class)->name('material.index');

// Tabler
Route::name('tabler.')->group(function () {
    // Réglages
    Route::get('/profile',              Profile::class)->name('profile');
    Route::get('/reglages',             Reglages::class)->name('reglages');
    Route::get('/manuals/{fichier?}',   Docs::class)->name('manuals');
    // Auth
    Route::get('/connexion',    Login::class)->name('login');
    Route::get('/inscription',  Register::class)->name('register');
    Route::get('/forgotten',    Forgotten::class)->name('forgotten');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post( 'generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile' )->name('io_generator_builder_generate_from_file');


Route::resource('clients', App\Http\Controllers\ClientController::class);


Route::resource('projets', App\Http\Controllers\ProjetController::class);


Route::resource('invoices', App\Http\Controllers\InvoiceController::class);


Route::resource('invoiceRows', App\Http\Controllers\InvoiceRowController::class);


Route::resource('invoiceSections', App\Http\Controllers\InvoiceSectionController::class);


Route::resource('contacts', App\Http\Controllers\ContactController::class);


Route::resource('contactTels', App\Http\Controllers\ContactTelController::class);


Route::resource('contactMails', App\Http\Controllers\ContactMailController::class);


Route::resource('buildings', App\Http\Controllers\BuildingController::class);


Route::resource('stages', App\Http\Controllers\StageController::class);


Route::resource('rooms', App\Http\Controllers\RoomController::class);


Route::resource('roomArticles', App\Http\Controllers\RoomArticleController::class);


Route::resource('roomArticleDetails', App\Http\Controllers\RoomArticleDetailController::class);
