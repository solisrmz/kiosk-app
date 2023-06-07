<?php

namespace App\Http\Controllers\director;

use App\Models\Categoria;
use App\Models\Modulo;
use App\Models\Nivel;
use App\Models\Calificacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    public function categoriasList(Request $request)
    {
        $datos['categorias'] = Categoria::where('id_idioma', $request->id_idioma)
        ->get(['categoria', 'id_categoria']);
        return response()->json($datos);
    }

    public function modulosList(Request $request)
    {
         $datos['modulos'] = Modulo::where('id_categoria', $request->id_categoria)
        ->get(['modulo', 'id_modulo']);
        return response()->json($datos);
    }

    public function nivelesList(Request $request)
    {
        $datos['niveles'] = Nivel::where('id_modulo', $request->id_modulo)
        ->get(['nivel', 'id_nivel']);
        return response()->json($datos);
    }

    public function groupStudents(Request $request){
        $students = Calificacion::where('id_grupo', $request->id_grupo)->get();
        $html = '';
        $i=0;
        foreach ($students as $student) {
            $html = $html . '<tr>'.
                            '<td>'.$student->relacionAlumno->nombre .' '. $student->relacionAlumno->apellido_paterno .' '. $student->relacionAlumno->apellido_materno.'</td>'.
                            '<td>'.$student->relacionAlumno->telefono.'</td>'.
                            '<td>'.$student->relacionAlumno->telefono_emergencia.'</td>'.
                            '<td>'.$student->calificacion_final.'</td>'.
                            '</tr>';
        }
        
        return ($html);
    }
}
