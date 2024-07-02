<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\AuthController;

use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Route public vers la page d'accueil
Route::get('/', [VoitureController::class, 'index'])->name('Accueil');

//login
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'userLogin'])->name('login.userLogin');

// Route logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

// Routes authentifiées
Route::middleware([EnsureFrontendRequestsAreStateful::class, 'auth:sanctum'])->group(function () {
    // Routes pour le VoituresController
    Route::resource('/voitures', VoitureController::class)->except(['index', 'show']);

    // Routes pour le UtilisateursController
    Route::resource('/utilisateurs', UtilisateurController::class);
});
// Route::post('/register', [UtilisateurController::class, 'store'])->name('register.store');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

