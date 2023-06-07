<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lista extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_grupo',
        'curp',
        'sesion1',
        'sesion2',
        'sesion3',
        'sesion4',
        'sesion5',
        'sesion6',
        'sesion7',
        'sesion8',
        'calificacion',
        'modificado_por'
    ];

    public function relacionAlumno(): HasOne
    {
        return $this->HasOne(Alumno::class, 'curp','curp');
    }
}