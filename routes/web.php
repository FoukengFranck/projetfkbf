<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CandidateRegistrationController;
use App\Http\Controllers\Auth\EntrepriseRegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/decision', function () { return view('auth.decision'); })->middleware('guest')->name('decision');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

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
