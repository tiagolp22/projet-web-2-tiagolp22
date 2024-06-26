<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all(); 
        return response()->json($voitures);
    }

    public function store(Request $request)
    {
        $validated = $request->validated(); //tableau contenant les champs validés
        $voiture = Voiture::create($validated);
        return response()->json($voiture, 201);
    }

    public function show($id)
    {
        $voiture = Voiture::findOrFail($id);
        return response()->json($voiture);
    }

    public function update(Request $request, $id)
    {     
        $validated = $request->validated(); 
        $voiture = Voiture::findOrFail($id);
        $voiture->update($validated);

        return response()->json($voiture, 200);
    }

    public function destroy($id)
    {
        $voiture = Voiture::findOrFail($id);
        $voiture->delete();

        return response()->json(null, 204);
    }
}