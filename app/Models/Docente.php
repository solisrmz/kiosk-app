<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_empleado',
        'id_idioma1',
        'id_idioma2',
        'id_idioma3',
        'id_idioma4',
        'modificado_por'
    ];

}
