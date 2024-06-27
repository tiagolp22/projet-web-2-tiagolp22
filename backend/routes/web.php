<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoituresController;
use App\Http\Controllers\UtilisateursController;


Route::get('/', [VoituresController::class, 'index'])->name('Accueil'); 
Route::resource('/voitures', VoituresController::class);
Route::resource('/utilisateurs', UtilisateursController::class);