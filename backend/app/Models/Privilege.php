<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;

    protected $table = 'privileges';
    protected $primaryKey = 'id_privilege';
    public $timestamps = false;

    protected $fillable = ['nom_privilege', 'description'];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'privileges_id', 'id_privilege');
    }
}