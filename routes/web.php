<?php

use App\Http\Controllers\CompteController;
use App\Http\Controllers\EncadrantController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\StatistiquesController;
use App\Http\Controllers\StructuresIAPController;
use App\Http\Controllers\StructuresAffectationController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('subadmin/index', [HomeController::class, 'subadmin'])
    ->middleware(['auth', 'subadmin'])
    ->name('subadmin');


Route::get('user/index', [HomeController::class, 'user'])
    ->middleware(['auth', 'user'])
    ->name('user');

Route::get('security/index', [HomeController::class, 'security'])
    ->middleware(['auth', 'security'])
    ->name('security');


require __DIR__ . '/auth.php';

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('index', [HomeController::class, 'admin'])->name('admin');
    Route::resource('stages', StageController::class);
    Route::resource('stagiares', StagiaireController::class);
    Route::post('/quotaVerification', [StageController::class, 'quotaVerification'])->name('quotaVerification');
    Route::get('/statistiques', [StatistiquesController::class, 'statistiquesAdmin'])->name('statistiquesAdmin');
    Route::get('/recherche', [SearchController::class, 'index'])->name('search.index');
    Route::post('/recherche/resultat', [SearchController::class, 'search'])->name('search.search');
});



Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->group(function () {
    Route::get('index', [HomeController::class, 'superadmin'])->name('superadmin');
    Route::resource('comptes', CompteController::class);
    Route::resource('structuresIAP', StructuresIAPController::class);
    Route::resource('structuresAffectation', StructuresAffectationController::class);
    Route::resource('encadrants', EncadrantController::class);
    Route::resource('etablissements', EtablissementController::class);
});
