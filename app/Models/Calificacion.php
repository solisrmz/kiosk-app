<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Calificacion extends Model
{
    use HasFactory;

    protected $table = 'calificacion_final';

    protected $fillable = [
        'id_grupo',
        'curp',
        'semanal',
        'tareas',
        'habilidad_escrita',
        'evaluación_oral',
        'calificacion_final',
        'registrada_por',
        'registrada_el',
        'modificado_por'
    ];

    public function relacionAlumno(): HasOne
    {
        return $this->HasOne(Alumno::class, 'curp','curp');
    }
}
