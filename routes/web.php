<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CandidateRegistrationController;
use App\Http\Controllers\Auth\EntrepriseRegistrationController;
use App\Http\Controllers\Entreprise\DashboardController as EntrepriseDashboard;
use App\Http\Controllers\Entreprise\ProfilController as EntrepriseProfil;
use App\Http\Controllers\Entreprise\OffresController as EntrepriseOffres;
use App\Http\Controllers\Entreprise\CandidaturesController as EntrepriseCandidatures;
use App\Http\Controllers\Candidat\DashboardController as CandidatDashboard;
use App\Http\Controllers\Candidat\ProfilController as CandidatProfil;
use App\Http\Controllers\Candidat\CandidaturesController as CandidatCandidatures;


use App\Http\Controllers\OffreController;




use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/offres', [OffreController::class, 'store'])->name('offres.store');
});

Route::get('/decision', function () { return view('auth.decision'); })->middleware('guest')->name('decision');


Route::middleware(['auth','verified'])->get('/dashboard', DashboardController::class)->name('dashboard');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware('guest')->group(function () {
    // Candidat
    Route::get('/register/candidat', [CandidateRegistrationController::class, 'create'])
        ->name('register.candidat.create');
    Route::post('/register/candidat', [CandidateRegistrationController::class, 'store'])
        ->name('register.candidat.store');

    // Entreprise
    Route::get('/register/entreprise', [EntrepriseRegistrationController::class, 'create'])
        ->name('register.entreprise.create');
    Route::post('/register/entreprise', [EntrepriseRegistrationController::class, 'store'])
        ->name('register.entreprise.store');
});

// Route::get('/', function () {
//     return view('welcome-dashboards');
// })->name('home');

/*
 | Routes Entreprise (sans auth pour test ; ajoute middleware('auth') plus tard)
 */
Route::prefix('entreprise')->name('entreprise.')->group(function () {
    Route::get('/dashboard', [EntrepriseDashboard::class, 'index'])->name('dashboard');
    Route::get('/profil',    [EntrepriseProfil::class, 'index'])->name('profil');
    Route::get('/offres',    [EntrepriseOffres::class, 'index'])->name('offres');
    Route::get('/candidatures',    [EntrepriseCandidatures::class, 'index'])->name('candidatures');
});

/*
 | Routes Candidat
 */
Route::prefix('candidat')->name('candidat.')->group(function () {
    Route::get('/dashboard',    [CandidatDashboard::class, 'index'])->name('dashboard');
    Route::get('/profil',       [CandidatProfil::class, 'index'])->name('profil');
    Route::get('/candidatures', [CandidatCandidatures::class, 'index'])->name('candidatures');
});