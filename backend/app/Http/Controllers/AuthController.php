<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
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