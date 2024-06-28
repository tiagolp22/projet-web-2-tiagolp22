<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $primaryKey = 'id_photo';
    protected $fillable = ['voitures_id_voiture', 'url_photo'];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class, 'voitures_id_voiture', 'id_voiture');
    }
}
