<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\UtilisateurController;


Route::get('/', [VoitureController::class, 'index'])->name('Accueil');
Route::resource('/voitures', VoitureController::class);
Route::resource('/utilisateurs', UtilisateurController::class);
