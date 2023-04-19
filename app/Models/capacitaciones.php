<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capacitaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreDeCapacitacion',
        'descripcion',
        'enlaceDeYoutube'
    ];
}
