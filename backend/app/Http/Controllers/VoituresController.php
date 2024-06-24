<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoituresController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all();
        // return view('voitures.index', compact('voitures'));
    }
}