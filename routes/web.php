<?php

use App\Http\Livewire\Material\Index as MaterialIndex;
use App\Http\Livewire\Tabler\Erp\Building;
use App\Http\Livewire\Tabler\Erp\Client;
use App\Http\Livewire\Tabler\Erp\Clients;
use App\Http\Livewire\Tabler\Erp\Devis;
use App\Http\Livewire\Tabler\Erp\Projet;
use App\Http\Livewire\Tabler\Erp\Room;
use App\Http\Livewire\Tabler\File\Files;
use App\Http\Livewire\Tabler\Index;
use App\Http\Livewire\Tabler\Pages\Docs;
use App\Http\Livewire\Tabler\Pages\Forgotten;
use App\Http\Livewire\Tabler\Pages\Login;
use App\Http\Livewire\Tabler\Pages\Profile;
use App\Http\Livewire\Tabler\Pages\Register;
use App\Http\Livewire\Tabler\Pages\Reglages;
use App\Http\Livewire\Tabler\Stock\Achat;
use App\Http\Livewire\Tabler\Stock\Achats;
use App\Http\Livewire\Tabler\Stock\Article;
use App\Http\Livewire\Tabler\Stock\Articles;
use App\Http\Livewire\Tabler\Stock\Brands;
use App\Http\Livewire\Tabler\Stock\Providers;
use App\Http\Livewire\Tabler\Stock\Stock;
use App\Http\Livewire\Tabler\Task\Task;
use App\Http\Livewire\Tabler\Task\Tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/',     Index::class)->name('index');
Route::get('mat',   MaterialIndex::class)->name('material.index');

Route::get('/swagger', function () {
    return Redirect::to(asset('/api/docs'));
})->name('swagger');


// Tabler
Route::name('tabler.')->group(function () {
    // Réglages
    Route::get('/profile',                  Profile::class)->name('profile');
    Route::get('/reglages',                 Reglages::class)->name('reglages');
    Route::get('/manuals/{fichier?}',       Docs::class)->name('manuals');
    // Auth
    Route::get('/connexion',                Login::class)->name('login');
    Route::get('/inscription',              Register::class)->name('register');
    Route::get('/forgotten',                Forgotten::class)->name('forgotten');
    // ERP
    Route::get('/clients',                  Clients::class)->name('clients');
    Route::get('/client/{client_id}',       Client::class)->name('client');
    Route::get('/projet/{projet_id}',       Projet::class)->name('projet');
    Route::get('/devis/{devis_id}',         Devis::class)->name('devis');
    Route::get('/building/{building_id}',   Building::class)->name('building');
    Route::get('/room/{room_id}',           Room::class)->name('room');
    // Stock
    Route::get('/stock',                    Stock::class)->name('stock');
    Route::get('/achats',                   Achats::class)->name('achats');
    Route::get('/achat/{achat_id}',         Achat::class)->name('achat');
    Route::get('/articles',                 Articles::class)->name('articles');
    Route::get('/article/{article_id}',     Article::class)->name('article');
    Route::get('/providers',                Providers::class)->name('providers');
    Route::get('/brands',                   Brands::class)->name('brands');
    //Taches
    Route::get('/tasks',                    Tasks::class)->name('tasks');
    Route::get('/task/{task_id}',           Task::class)->name('task');
    //Fichiers
    Route::get('/files',                    Files::class)->name('files');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post('generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile' )->name('io_generator_builder_generate_from_file');
