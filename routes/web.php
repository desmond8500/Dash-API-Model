<?php

use App\Http\Livewire\Material\Index as MaterialIndex;
use App\Http\Livewire\Pages\Personne;
use App\Http\Livewire\Pages\Personnes;
use App\Http\Livewire\Tabler\Index;
use App\Http\Livewire\Tabler\Pages\Docs;
use App\Http\Livewire\Tabler\Pages\Forgotten;
use App\Http\Livewire\Tabler\Pages\Login;
use App\Http\Livewire\Tabler\Pages\Profile;
use App\Http\Livewire\Tabler\Pages\Register;
use App\Http\Livewire\Tabler\Pages\Reglages;
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
    Route::get('/profile',              Profile::class)->name('profile');
    Route::get('/reglages',             Reglages::class)->name('reglages');
    Route::get('/manuals/{fichier?}',   Docs::class)->name('manuals');
    // Auth
    Route::get('/connexion',    Login::class)->name('login');
    Route::get('/inscription',  Register::class)->name('register');
    Route::get('/forgotten',    Forgotten::class)->name('forgotten');
});

// CV
Route::name('cv.')->group(function () {
    // Réglages
    Route::get('/personnes',        Personnes::class)->name('personnes');
    Route::get('/personne/{id}',    Personne::class)->name('personne');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post( 'generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile' )->name('io_generator_builder_generate_from_file');


// Route::resource('personnes', App\Http\Controllers\PersonneController::class);
// Route::resource('foormations', App\Http\Controllers\FoormationController::class);
// Route::resource('formations', App\Http\Controllers\FormationController::class);
// Route::resource('experiences', App\Http\Controllers\ExperienceController::class);
// Route::resource('competences', App\Http\Controllers\CompetenceController::class);
// Route::resource('langues', App\Http\Controllers\LangueController::class);
// Route::resource('interets', App\Http\Controllers\InteretController::class);
