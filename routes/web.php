<?php

use App\Http\Controllers\CompteController;
use App\Http\Middleware\SuperAdmin;

use App\Http\Controllers\EcoleController;
use App\Http\Controllers\EncadrantController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StructuresIAPController;
use App\Http\Controllers\StructuresAffectation;
use App\Http\Controllers\StructuresAffectationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('subadmin/index', [HomeController::class, 'subadmin'])
    ->middleware(['auth', 'subadmin'])
    ->name('subadmin');

Route::get('admin/index', [HomeController::class, 'admin'])
    ->middleware(['auth', 'admin'])
    ->name('admin');

Route::get('user/index', [HomeController::class, 'user'])
    ->middleware(['auth', 'user'])
    ->name('user');

Route::get('security/index', [HomeController::class, 'security'])
    ->middleware(['auth', 'security'])
    ->name('security');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->group(function () {
    Route::get('index', [HomeController::class, 'superadmin'])->name('superadmin');
    Route::resource('comptes', CompteController::class);
    Route::resource('structuresIAP', StructuresIAPController::class);
    Route::resource('structuresAffectation', StructuresAffectationController::class);
    Route::resource('encadrants', EncadrantController::class);
    Route::resource('etablissements', EtablissementController::class);
});
