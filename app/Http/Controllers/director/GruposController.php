<?php

namespace App\Http\Controllers\director;

use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\Calificacion;
use App\Http\Controllers\director\IdiomasController;
use App\Http\Controllers\director\SistemasController;
use App\Http\Controllers\director\CategoriasController;
use App\Http\Controllers\director\PlantelesController;
use App\Models\Idioma;
use App\Models\Plantel;
use App\Http\Controllers\director\CatalogosController;
use App\Models\User;
use App\Rules\AtLeastOneDay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::orderBy('id_grupo', 'desc')->paginate(10);
        return view('director.grupos-list', compact('grupos'));
    }

    public function getGroupById(string $id)
    {
        $selectedGroup = Grupo::query()->where('id_grupo', $id)->first();
        $students = Calificacion::where('id_grupo', $id)->orderBy('curp')->get();
        $categorias = CategoriasController::getCategoriasPorIdioma($selectedGroup->id_idioma);
        return response()->view('director.group-detail', compact('selectedGroup', 'students', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $horas = array('07:00','08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00',);
        $salidas = array('07:50','08:50', '09:50', '10:50', '11:50', '12:50', '13:50', '14:50', '15:50', '16:50', '17:50', '18:50', '19:50', '20:50',);
        $idiomas = IdiomasController::populateList();
        $sistemas = SistemasController::populateList();
        $categorias = CategoriasController::populateList();
        $planteles = PlantelesController::populateList();
        return view('director.create-grupo', compact('idiomas', 'sistemas','categorias', 'planteles', 'horas','salidas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'id_idioma' => 'required',
                'id_sistema' => 'required',
                'id_categoria' => 'required',
                'id_plantel' => 'required',
                'id_nivel' => 'required',
                'fecha_inicio' => 'required',
                'hora_entrada' => 'required',
                'lunes' => ['nullable', 'boolean', new AtLeastOneDay($request->lunes , $request->martes, $request->miercoles, $request->jueves, $request->viernes, $request->sabado)]
            ]
        );

        Grupo::create([
            'id_idioma' => $request->id_idioma,
            'id_sistema' => $request->id_sistema,
            'id_categoria' => $request->id_categoria,
            'id_plantel' => $request->id_plantel,
            'id_nivel' => $request->id_nivel,
            'id_modulo' => $request->id_modulo,
            'fecha_inicio' => $request->fecha_inicio,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
            'lunes' => $request->lunes,
            'martes' => $request->martes,
            'miercoles' => $request->miercoles,
            'jueves' => $request->jueves,
            'viernes' => $request->viernes,
            'sabado' => $request->sabado,
            'estado' => 'A',
            'modificado_por' => Auth::user()->email
        ]);

        return redirect('direccion-academica/grupos-registrados');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getTeachers(){
        $teachers = Empleado::all();
        return json_encode($teachers);
    }

    public function addTeacherToGroup(Request $request){
        $idTeacher = $request->idTeach;
        $techer =
        $idGroup   = $request->idGr;
        echo($idGroup);
        Grupo::where('id_grupo', '=', $idGroup)
            ->update(['id_empleado' => $idTeacher]);
        redirect('grupos-registrados');
        return json_encode('Se ha asignado al profesor');
    }

    public function groupQuery(Request $request){
        $campusId   = $request->input('campus');
        $languageId = $request->input('language');

        $languages = Idioma::all();
        $campus = Plantel::all();

        $groups = Grupo::where('id_plantel', '=', $campusId)
            ->orWhere('id_idioma', '=', $languageId)
            ->paginate(10);
        session(['grupos' => $groups]);
        return view('dataViewer.groups.groups-list', compact('groups','languages', 'campus'));
    }
}
