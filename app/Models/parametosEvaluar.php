<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parametosEvaluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'niveldeIniciativa',
        'generaciondeIdeas',
        'cumplimientodeObjetivo',
        'calidaddeTrabajo',
        'userEvaluado_id',
        'userEvaluador_id'

    ];
}
