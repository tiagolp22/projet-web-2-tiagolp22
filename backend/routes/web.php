<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoituresController;

// function nouveautes dans le controller qui va retourner les voitures  récemment ajoutées
Route::get('/', [VoituresController::class, 'nouveautes'])->name('home'); 


Route::get('/voitures', [VoituresController::class, 'index'])->name('voitures.index');