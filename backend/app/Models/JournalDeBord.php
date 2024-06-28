<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalDeBord extends Model
{
    use HasFactory;

    protected $table = 'journaldebord';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom_utilisateur', 'prenom_utilisateur', 'operation', 'message',
        'description', 'date', 'utilisateur_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id', 'id_utilisateur');
    }
}