<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class UtilisateursController extends Controller
{
    public function index()
    {
        return Utilisateur::all();
    }

    public function show($id)
    {
        return Utilisateur::find($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:8',
            'role' => 'required|string'
        ]);

        $utilisateur = new Utilisateur();
        $utilisateur->nom = $validated['nom'];
        $utilisateur->email = $validated['email'];
        $utilisateur->mot_de_passe = Hash::make($validated['mot_de_passe']);
        $utilisateur->role = $validated['role'];
        $utilisateur->save();

        return response()->json($utilisateur, 201);
    }

    public function update(Request $request, $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:utilisateurs,email,'.$utilisateur->id,
            'mot_de_passe' => 'sometimes|string|min:8',
            'role' => 'sometimes|string'
        ]);

        if (isset($validated['mot_de_passe'])) {
            $validated['mot_de_passe'] = Hash::make($validated['mot_de_passe']);
        }

        $utilisateur->update($validated);

        return response()->json($utilisateur, 200);
    }

    public function destroy($id)
    {
        Utilisateur::destroy($id);
        return response()->json(null, 204);
    }
}

