<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    use HasFactory;

    protected $table = 'transmissions';
    protected $primaryKey = 'id_transmission';
    protected $fillable = ['type_transmission', 'description'];
}