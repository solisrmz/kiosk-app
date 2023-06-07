<?php

namespace App\Http\Controllers\director;

use App\Models\Grupo;
use App\Models\Lista;
use App\Models\Semanal;
use App\Models\Calificacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectorController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        return view('director.home');
    }
    
    public function groupOptions(string $id, string $opcion)
    {
        $grupo = Grupo::query()->where('id_grupo', $id)->first();
        
        switch ($opcion) {
            case 'A':
                $students = Lista::where('id_grupo', $id)->orderBy('curp')->get();
                return view('director.group-assistance', compact('students','grupo'));
                break;
            case 'S':
                $students = Semanal::where('id_grupo', $id)->orderBy('curp')->get();
                return view('director.weekly-report', compact('students','grupo'));
                break;
            case 'F':
                $students = Calificacion::where('id_grupo', $id)->orderBy('curp')->get();
                return view('director.report-card', compact('students','grupo'));
                break;
        }
        
    }

    public function storeFinalReport(Request $request)
    {
        $records = count($request->id_grupo);
        $rows = 0;
        
        for ($i=0; $i<count($request->id_grupo); $i++) {

            $result = Calificacion::whereraw('id_grupo=? and curp=?', [$request->id_grupo[$i], $request->curp[$i]])
                        ->update(['tareas' => $request->tareas[$i],
                                  'habilidad_escrita' => $request->habilidad_escrita[$i],
                                  'evaluacion_oral' => $request->evaluacion_oral[$i],
                                  'calificacion_final' => $this->nvl($request->semanal[$i],0) + $this->nvl($request->tareas[$i],0) + $this->nvl($request->habilidad_escrita[$i],0) + $this->nvl($request->evaluacion_oral[$i],0),
                                  'modificado_por' => Auth::user()->email
                                ]);                   
            $rows = $rows + $result;
    
        } 

        return redirect()->back()->with('success', 'Los registros fueron actualizados exitosamente');
    }

    public function nvl($var, $value)
    {
        if (is_null($var)){
            return $value;
        }else{
            return $var;
        }
    }

    public function projectGroup(request $request)
    {
        $base = Grupo::query()->where('id_grupo', $request->id_grupo)->first();
        $students = Calificacion::whereraw('id_grupo=? and calificacion_final >= 70', [$request->id_grupo])->get('curp');

        
        $id = Grupo::insertGetId([
                'id_idioma' => $base->id_idioma,
                'id_sistema' => $base->id_sistema,
                'id_categoria' => $request->id_categoria,
                'id_plantel' => $base->id_plantel,
                'id_nivel' => $request->id_nivel,
                'id_modulo' => $request->id_modulo,
                'fecha_inicio' => $request->fecha_inicio,
                'hora_entrada' => $base->hora_entrada,
                'hora_salida' => $base->hora_salida,
                'lunes' => $base->lunes,
                'martes' => $base->martes,
                'miercoles' => $base->miercoles,
                'jueves' => $base->jueves,
                'viernes' => $base->viernes,
                'sabado' => $base->sabado,
                'estado' => 'A',
                'modificado_por' => Auth::user()->email
            ]);

        foreach ($students as $student) 
        {     
            Lista::create([
                'id_grupo' => $id,
                'curp' => $student->curp,
                'modificado_por' => Auth::user()->email
            ]);
    
            Semanal::create([
                'id_grupo' => $id,
                'curp' => $student->curp,
                'modificado_por' => Auth::user()->email
            ]);
    
            Calificacion::create([
                'id_grupo' => $id,
                'curp' => $student->curp,
                'modificado_por' => Auth::user()->email
            ]);
        }

        return redirect('direccion-academica/grupos-registrados');
    }

    public function closeGroup(string $id_grupo)
    {  
        Grupo::where('id_grupo', '=', $id_grupo)
             ->update(['estado' => 'C']);
        
        return redirect('direccion-academica/detalle-grupo/'. $id_grupo);
    }
}
