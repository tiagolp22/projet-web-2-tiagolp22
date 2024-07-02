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
        return inertia('Auth/Register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'courriel' => 'required|string|email|max:255|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:8|confirmed',
        ]);

        $utilisateur = Utilisateur::create([
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'courriel' => $validated['courriel'],
            'mot_de_passe' => Hash::make($validated['mot_de_passe']),
        ]);

        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès. Veuillez vous connecter.');
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
                'message' => 'Email and Password do not match',
                'data' => []
            ]);
        }

        // Verifica se a senha está correta
        if (Hash::check($request->mot_de_passe, $loginUser->mot_de_passe)) {
            // Cria um token para o usuário :)
            $token = $loginUser->createToken('mytoken')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Utilisateur logged in',
                'token' => $token,
                'data' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Password Invalid',
                'data' => []
            ]);
 }
}
}