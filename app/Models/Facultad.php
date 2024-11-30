<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultades';
    protected $fillable = [
        'nombre',
    ];
    use HasFactory;
    public function escuelas()
    {
        return $this->hasMany(Escuela::class, 'facultad_id');
    }
}
