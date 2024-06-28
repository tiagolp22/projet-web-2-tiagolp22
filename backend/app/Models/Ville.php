<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $table = 'villes';
    protected $primaryKey = 'id_ville';
    public $timestamps = false;

    protected $fillable = ['nom_ville', 'province_id'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id_province');
    }

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'villes_id_ville', 'id_ville');
    }
}
