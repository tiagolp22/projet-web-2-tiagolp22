<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function logout()
    {
        auth()->user()->tokens()->delete();
        
        return response()->json([
            "status" => true,
            "message" => "User Logged out",
            "data" => []
        ]);
    }
}