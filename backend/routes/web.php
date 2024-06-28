<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoituresController;
use App\Http\Controllers\UtilisateursController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
// Route public vers la page d'accueil
Route::get('/', [VoituresController::class, 'index'])->name('Accueil');

// Routes authentifiés
Route::middleware([EnsureFrontendRequestsAreStateful::class, 'auth:sanctum'])->group(function () {
    //  Routes pour le VoituresController
    Route::resource('/voitures', VoituresController::class)->except(['index', 'show']);

    // Routes pour le UtilisateursController
    Route::resource('/utilisateurs', UtilisateursController::class);
});