<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CandidateRegistrationController;
use App\Http\Controllers\Auth\EntrepriseRegistrationController;
use App\Http\Controllers\Entreprise\DashboardController as EntrepriseDashboard;
use App\Http\Controllers\Entreprise\ProfilController as EntrepriseProfil;
use App\Http\Controllers\Entreprise\OffresController as EntrepriseOffres;
use App\Http\Controllers\Entreprise\CandidaturesController as EntrepriseCandidatures;
use App\Http\Controllers\Entreprise\ChatboxController as EntrepriseChatbox;
use App\Http\Controllers\Entreprise\NotificationsController as EntrepriseNotifications;

use App\Http\Controllers\Candidat\DashboardController as CandidatDashboard;
use App\Http\Controllers\Candidat\OffresController as CandidatOffres;
use App\Http\Controllers\Candidat\ProfilController as CandidatProfil;
use App\Http\Controllers\Candidat\ChatboxController as CandidatChatbox;
use App\Http\Controllers\Candidat\CandidaturesController as CandidatCandidatures;
use App\Http\Controllers\Candidat\NotificationsController as CandidatNotifications;


use App\Http\Controllers\OffreController;


use App\Http\Controllers\ForgotPasswordController; //otp

use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

Route::get('/test-otp-mail', function () {
    $otp = rand(100000, 999999); // générer un code de test

    Mail::to('founkengbavel@gmail.com')->send(new OtpMail($otp));

    return "Email OTP envoyé à founkengbavel@gmail.com. Vérifie ta boîte mail !";
});





// Formulaire email
Route::get('/forgot-password', [ForgotPasswordController::class, 'showEmailForm'])->name('password.request');

// Envoi OTP
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp'])->name('password.sendOtp');

// Formulaire OTP
Route::get('/verify-otp/{email}', [ForgotPasswordController::class, 'showOtpForm'])->name('password.verifyOtpForm');

// Vérification OTP
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('password.verifyOtp');

// Formulaire reset password
// Avant (si tu as) : Route::get('/reset-password/{email}', ...)
Route::get('/reset-password/{email?}', [ForgotPasswordController::class, 'showResetForm'])
    ->name('password.resetForm');

// Enregistrement du nouveau mot de passe
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/a-propos', function () {
    return view('a-propos');
})->name('a-propos');



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
    Route::get('/offres',    [EntrepriseOffres::class, 'index'])->name('offres');
    Route::get('/candidatures',    [EntrepriseCandidatures::class, 'index'])->name('candidatures');
    Route::get('/chatbox',    [EntrepriseChatbox::class, 'index'])->name('chatbox');
    Route::get('/notifications',    [EntrepriseNotifications::class, 'index'])->name('notifications');
    Route::get('/profil',    [EntrepriseProfil::class, 'index'])->name('profil');    
});

/*
 | Routes Candidat
 */
Route::prefix('candidat')->name('candidat.')->group(function () {
    Route::get('/dashboard',    [CandidatDashboard::class, 'index'])->name('dashboard');
    Route::get('/offres', [CandidatOffres::class, 'index'])->name('offres');
    Route::get('/candidatures', [CandidatCandidatures::class, 'index'])->name('candidatures');
    Route::get('/chatbox', [CandidatChatbox::class, 'index'])->name('chatbox');
    Route::get('/notifications', [CandidatNotifications::class, 'index'])->name('notifications');
    Route::get('/profil',       [CandidatProfil::class, 'index'])->name('profil');
    
});