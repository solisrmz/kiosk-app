<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Semanal extends Model
{
    use HasFactory;

    protected $table = 'evaluacion_semanal';

    protected $fillable = [
        'id_grupo',
        'curp',
        'pronunciacion1',
        'fluidez1',
        'vocabulario1',
        'gramatica1',
        'participacion1',
        'pronunciacion2',
        'fluidez2',
        'vocabulario2',
        'gramatica2',
        'participacion2',
        'pronunciacion3',
        'fluidez3',
        'vocabulario3',
        'gramatica3',
        'participacion3',
        'pronunciacion4',
        'fluidez4',
        'vocabulario4',
        'gramatica4',
        'participacion4',
        'modificado_por'
    ];

    public function relacionAlumno(): HasOne
    {
        return $this->HasOne(Alumno::class, 'curp','curp');
    }
}
