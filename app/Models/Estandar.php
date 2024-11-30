<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estandar extends Model
{
    use HasFactory;

    protected $table = 'estandar';
    protected $fillable = [
        'dimension',
        'factor',
        'estandar',
        'escala_avance',
        'contextualizacion',
        'identificacion_brechas',
        'actividades',
        'otros_estandares',
        'avance',
        'sustentacion',
        'comentario',
        'recomendacion',
    ];
}