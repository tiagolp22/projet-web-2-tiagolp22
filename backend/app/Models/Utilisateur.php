<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_utilisateur';
    public $timestamps = false;

    protected $fillable = [
        'prenom', 'nom', 'date_naissance', 'adresse', 'code_postal', 
        'numero_telephone', 'numero_portable', 'courriel', 
        'privileges_id', 'nom_utilisateur', 'mot_de_passe', 
        'derniere_connexion', 'villes_id_ville'
    ];

   
}