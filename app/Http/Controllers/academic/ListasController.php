<?php

namespace App\Http\Controllers\academic;

use App\Models\Lista;
use App\Models\Semanal;
use App\Models\Grupo;
use App\Models\Empleado;
use App\Models\Calificacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ListasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleado = Empleado::query()->where('correo', Auth::user()->email)->first();
        $grupos = Grupo::where('id_empleado', $empleado->id_empleado)->paginate(10);
        return view('academic.grupos-docente', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $opcion)
    {
        $grupo = Grupo::query()->where('id_grupo', $id)->first();
        
        switch ($opcion) {
            case 'A':
                $students = Lista::where('id_grupo', $id)->orderBy('curp')->get();
                return view('academic.group-assistance', compact('students','grupo'));
                break;
            case 'S':
                $students = Semanal::where('id_grupo', $id)->orderBy('curp')->get();
                return view('academic.weekly-report', compact('students','grupo'));
                break;
            case 'F':
                $students = Calificacion::where('id_grupo', $id)->orderBy('curp')->get();
                return view('academic.report-card', compact('students','grupo'));
                break;
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAssistance(Request $request)
    {

        $records = count($request->id_grupo);
        $rows = 0;
        
        for ($i=0; $i<count($request->id_grupo); $i++) {

            $result = Lista::whereraw('id_grupo=? and curp=?', [$request->id_grupo[$i], $request->curp[$i]])
                        ->update(['sesion1' => $request->sesion1[$i],
                                  'sesion2' => $request->sesion2[$i],
                                  'sesion3' => $request->sesion3[$i],
                                  'sesion4' => $request->sesion4[$i],
                                  'sesion5' => $request->sesion5[$i],
                                  'sesion6' => $request->sesion6[$i],
                                  'sesion7' => $request->sesion7[$i],
                                  'sesion8' => $request->sesion8[$i],
                                  'modificado_por' => Auth::user()->email,  
                                ]);
            $rows = $rows + $result;
    
        } 

        if( $records == $rows  ) {
            return redirect()->back()->with('success', 'Los registros fueron actualizados exitosamente');
        } else {
            return redirect()->back()->with('error', 'Hubo un error al actualizar los registros');
        }
    }

    public function updateWeeklyReport(Request $request)
    {
        $records = count($request->id_grupo);
        $rows = 0;
        
        for ($i=0; $i<count($request->id_grupo); $i++) {

            $result = Semanal::whereraw('id_grupo=? and curp=?', [$request->id_grupo[$i], $request->curp[$i]])
                        ->update(['pronunciacion1' => $request->pronunciacion1[$i],
                                  'fluidez1' => $request->fluidez1[$i],
                                  'vocabulario1' => $request->vocabulario1[$i],
                                  'gramatica1' => $request->gramatica1[$i],
                                  'participacion1' => $request->participacion1[$i],
                                  'modificado_por' => Auth::user()->email
                                ]);
            Calificacion::whereraw('id_grupo=? and curp=?', [$request->id_grupo[$i], $request->curp[$i]])
                ->update(['semanal' => $this->nvl($request->pronunciacion1[$i],0) + $this->nvl($request->fluidez1[$i],0) + $this->nvl($request->vocabulario1[$i],0) + $this->nvl($request->gramatica1[$i],0) + $this->nvl($request->participacion1[$i],0),
                          'modificado_por' => Auth::user()->email
                        ]);                    
            $rows = $rows + $result;
    
        } 

        if( $records == $rows  ) {
            return redirect()->back()->with('success', 'Los registros fueron actualizados exitosamente');
        } else {
            return redirect()->back()->with('error', 'Hubo un error al actualizar los registros');
        }
        //return dd($request);
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
                                  'registrada_por' => Auth::user()->email,
                                  'registrada_el' => Carbon::today()->toDateString()
                                ]);                   
            $rows = $rows + $result;
    
        } 

        if( $records == $rows  ) {
            return redirect()->back()->with('success', 'Los registros fueron actualizados exitosamente');
        } else {
            return redirect()->back()->with('error', 'Hubo un error al actualizar los registros');
        }
        //return dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function nvl($var, $value)
    {
        if (is_null($var)){
            return $value;
        }else{
            return $var;
        }
    }
}
