<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignarCapacitaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'capacitacion_id',
        'userACapacitar_id',
        'userCapacitador_id',
        'estado'
    ];

    public function capacitacion()
    {
        return $this->belongsTo(capacitaciones::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
