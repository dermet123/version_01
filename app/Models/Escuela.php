<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'facultad_id'
    ];
    public function facultades()
    {
        return $this->belongsTo(Facultad::class, 'facultad_id');
    }
}
