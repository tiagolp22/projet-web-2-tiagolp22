<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoituresController;

Route::get('/', [VoituresController::class, 'index'])->name('Accueil'); 
Route::resource('/voitures', VoituresController::class);