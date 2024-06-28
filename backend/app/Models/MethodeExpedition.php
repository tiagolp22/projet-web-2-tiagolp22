<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodeExpedition extends Model
{
    use HasFactory;

    protected $table = 'methodesexpedition';
    protected $primaryKey = 'id_methode_expedition';
    protected $fillable = ['nom_methode_expedition', 'prix_fixe', 'description'];
}
