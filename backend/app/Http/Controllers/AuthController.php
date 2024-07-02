<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
class AuthController extends Controller
{
    public function index()
    {
        return Inertia::render('Login');
    } 
//
    public function showRegistrationForm()
    {
        return inertia('Register');
    }
    
    public function register(Request $request)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:50',
            'nom' => 'required|string|max:50',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
            'numero_telephone' => 'required|string|max:20',
            'numero_portable' => 'nullable|string|max:20',
            'courriel' => 'required|string|email|max:100|unique:utilisateurs',
            'privileges_id' => 'required|integer',
            'nom_utilisateur' => 'required|string|max:50|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:8',
            'villes_id_ville' => 'required|integer', 
        ]);
    
       
        $utilisateur = Utilisateur::create([
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'date_naissance' => $validated['date_naissance'],
            'adresse' => $validated['adresse'],
            'code_postal' => $validated['code_postal'],
            'numero_telephone' => $validated['numero_telephone'],
            'numero_portable' => $validated['numero_portable'],
            'courriel' => $validated['courriel'],
            'privileges_id' => $validated['privileges_id'],
            'nom_utilisateur' => $validated['nom_utilisateur'],
            'mot_de_passe' => Hash::make($validated['mot_de_passe']),
            'villes_id_ville' => $validated['villes_id_ville'],
        ]);
    
        return Inertia::location(route('login.index'));
    }
    
//    
public function userLogin(Request $request)
{
    $request->validate([
        'courriel' => 'required|email',
        'mot_de_passe' => 'required',
    ]);

    // Verifica se o usuário existe
    $loginUser = Utilisateur::where('courriel', $request->courriel)->first();

    if (!$loginUser) {
        return response()->json([
            'status' => false,
            'message' => 'Email e senha não correspondem',
            'data' => []
        ], 401);
    }

    // test sna hash
    if ($request->mot_de_passe == $loginUser->mot_de_passe) {
        $token = 'dummy_token';
        
        return response()->json([
            'status' => true,
            'message' => 'Usuário conectado',
            'token' => $token,
            'data' => []
        ]);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Senha inválida',
            'data' => []
        ], 401);
}
}

}