<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;
    protected $table = 'auditorias';
    protected $fillable = ['nombre', 'observacion', 'descripcion', 'porcentaje_auditoria'];
}