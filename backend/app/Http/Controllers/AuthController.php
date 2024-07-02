<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use App\Http\Requests\CreateUtilisateurRequest;
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
    
    public function register(CreateUtilisateurRequest $request)
    {
        $validated = $request->validated();

        $validated['mot_de_passe'] = Hash::make($validated['mot_de_passe']);

        $utilisateur = Utilisateur::create($validated);

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