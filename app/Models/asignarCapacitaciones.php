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

    public function capacitaciones()
    {
        return $this->belongsTo(capacitaciones::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
