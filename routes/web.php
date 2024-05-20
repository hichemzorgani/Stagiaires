<?php

use App\Http\Controllers\AttestationController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\EncadrantController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\StatistiquesController;
use App\Http\Controllers\StructuresIAPController;
use App\Http\Controllers\StructuresAffectationController;
use App\Http\Controllers\SubadminController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'subadmin'])->prefix('subadmin')->group(function () {
    Route::get('index', [HomeController::class, 'subadmin'])->name('subadmin');
    Route::get('domaines', [SubadminController::class, 'domaines'])->name('domaines');
});



Route::get('user/index', [HomeController::class, 'user'])
    ->middleware(['auth', 'user'])
    ->name('user');

Route::get('security/index', [HomeController::class, 'security'])
    ->middleware(['auth', 'security'])
    ->name('security');


require __DIR__ . '/auth.php';



Route::middleware(['auth', 'security'])->prefix('security')->group(function () {
    Route::get('/stagiaires', [StagiaireController::class, 'indexSecurity'])->name('indexSecurity');
    Route::post('/stagiaires/resultat', [StagiaireController::class, 'searchSecurity'])->name('searchSecurity');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('index', [HomeController::class, 'admin'])->name('admin');

    Route::resource('stagiares', StagiaireController::class);
    Route::match(['get', 'post'], 'searchResultsStagiares1', [SearchController::class, 'searchResultsStagiares1'])->name('searchResultsStagiares1');
    Route::get('/attestation', [AttestationController::class, 'index'])->name('attestation');
    Route::match(['get', 'post'], 'searchResultsStagiares2', [SearchController::class, 'searchResultsStagiares2'])->name('searchResultsStagiares2');
    Route::get('/attestation/download/{stagiaire}', [AttestationController::class, 'imprimer'])->name('attestation.download');

    Route::resource('stages', StageController::class);
    Route::post('/quotaVerification', [StageController::class, 'quotaVerification'])->name('quotaVerification');
    Route::get('searchStages', [SearchController::class, 'searchStages'])->name('stages.searchStages');
    Route::match(['get', 'post'], 'searchResults1', [SearchController::class, 'searchResults1'])->name('stages.searchResults1');
    Route::match(['get', 'post'], 'searchResults2', [SearchController::class, 'searchResults2'])->name('stages.searchResults2');


    Route::get('/statistiques', [StatistiquesController::class, 'statistiquesAdmin'])->name('statistiquesAdmin');
});







Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->group(function () {
    Route::get('index', [HomeController::class, 'superadmin'])->name('superadmin');

    Route::resource('comptes', CompteController::class);
    Route::match(['get', 'post'], 'searchComptes', [SearchController::class, 'searchComptes'])->name('comptes.searchComptes');

    Route::resource('structuresIAP', StructuresIAPController::class);
    Route::match(['get', 'post'], 'searchIAP', [SearchController::class, 'searchIAP'])->name('structuresIAP.searchIAP');

    Route::resource('structuresAffectation', StructuresAffectationController::class);
    Route::match(['get', 'post'], 'searchAffectation', [SearchController::class, 'searchAffectation'])->name('structuresAffectation.searchAffectation');

    Route::resource('encadrants', EncadrantController::class);
    Route::match(['get', 'post'], 'searchEncadrant', [SearchController::class, 'searchEncadrant'])->name('encadrants.searchEncadrant');

    Route::resource('etablissements', EtablissementController::class);
    Route::match(['get', 'post'], 'searchEtablissement', [SearchController::class, 'searchEtablissement'])->name('etablissements.searchEtablissement');

    Route::resource('domaines', DomaineController::class);
    Route::match(['get', 'post'], 'searchDomaine', [SearchController::class, 'searchDomaine'])->name('domaines.searchDomaine');

    Route::resource('specialites', SpecialiteController::class);
    Route::match(['get', 'post'], 'searchSpecialite', [SearchController::class, 'searchSpecialite'])->name('specialites.searchSpecialite');
});
