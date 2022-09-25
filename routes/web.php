<?php

use App\Http\Livewire\Material\Index as MaterialIndex;
use App\Http\Livewire\Tabler\Index;
use App\Http\Livewire\Tabler\Pages\Docs;
use App\Http\Livewire\Tabler\Pages\Forgotten;
use App\Http\Livewire\Tabler\Pages\Login;
use App\Http\Livewire\Tabler\Pages\Profile;
use App\Http\Livewire\Tabler\Pages\Register;
use App\Http\Livewire\Tabler\Pages\Reglages;
use App\Http\Livewire\Tabler\Stock\Article;
use App\Http\Livewire\Tabler\Stock\Articles;
use App\Http\Livewire\Tabler\Stock\Brands;
use App\Http\Livewire\Tabler\Stock\Import;
use App\Http\Livewire\Tabler\Stock\Providers;
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
    // Route::get('/api/docs', function () {
    //     return redirect("");
    // })->name('docs');

    // Auth
    Route::get('/connexion',    Login::class)->name('login');
    Route::get('/inscription',  Register::class)->name('register');
    Route::get('/forgotten',    Forgotten::class)->name('forgotten');
    // Stock
    Route::get('/articles',    Articles::class)->name('articles');
    Route::get('/article',    Article::class)->name('article');
    Route::get('/providers',    Providers::class)->name('providers');
    Route::get('/brands',    Brands::class)->name('brands');
    Route::get('/import',    Import::class)->name('import');

});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post( 'generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile' )->name('io_generator_builder_generate_from_file');

// Route::resource('tags', TagController::class);
// Route::resource('brands', BrandController::class);
// Route::resource('providers', ProviderController::class);
// Route::resource('manuals', ManualController::class);
// Route::resource('priorities', PriorityController::class);
// Route::resource('articles', ArticleController::class);
