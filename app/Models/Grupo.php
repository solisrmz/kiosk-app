<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_idioma',
        'id_sistema',
        'id_categoria',
        'id_plantel',
        'id_nivel',
        'id_modulo',
        'fecha_inicio',
        'hora_entrada',
        'hora_salida',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'id_empleado',
        'estado',
        'modificado_por'];

    public function relacionIdioma(): HasOne
    {
        return $this->HasOne(Idioma::class, 'id_idioma','id_idioma');
    }

    public function relacionSistema(): HasOne
    {
        return $this->HasOne(Sistema::class, 'id_sistema','id_sistema');
    }

    public function relacionCategoria(): HasOne
    {
        return $this->HasOne(Categoria::class, 'id_categoria','id_categoria');
    }

    public function relacionPlantel(): HasOne
    {
        return $this->HasOne(Plantel::class, 'id_plantel','id_plantel');
    }

    public function relacionEmpleado(): HasOne
    {
        return $this->HasOne(Empleado::class, 'id_empleado', 'id_empleado');
    }

    public function relacionModulo(): HasOne
    {
        return $this->HasOne(Modulo::class, 'id_modulo','id_modulo');
    }

    public function relacionNivel(): HasOne
    {
        return $this->HasOne(Nivel::class, 'id_nivel', 'id_nivel');
    }

}
