<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Commande;
use App\Models\Utilisateur;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVoitures = Voiture::count();
        $totalCommandes = Commande::count();
        $totalUtilisateurs = Utilisateur::count();
        $dernieresCommandes = Commande::with('utilisateur')->latest()->take(5)->get();
        $voituresRecentes = Voiture::with('modele')->latest()->take(5)->get();

        return inertia('Dashboard', compact('totalVoitures', 'totalCommandes', 'totalUtilisateurs', 'dernieresCommandes', 'voituresRecentes'));
    }
}
