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

    public function asignarCapacitaciones()
    {
        return $this->hasMany(asignarCapacitaciones::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
