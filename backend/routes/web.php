<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoituresController;
use App\Http\Controllers\UtilisateurController;


Route::get('/', [VoituresController::class, 'index'])->name('Accueil');
Route::resource('/voitures', VoituresController::class);
Route::resource('/utilisateurs', UtilisateurController::class);
