<?php

namespace App\Http\Controllers\adviser;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Lista;
use App\Models\Semanal;
use App\Models\Calificacion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\director\IdiomasController;
use App\Http\Controllers\director\PlantelesController;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function findAlumnsByAdviser()
    {
        $alumns = Alumno::where('modificado_por', Auth::user()->email)->orderBy('created_at', 'desc')->paginate(10);
        return view('adviser.alumnos-asesor-list', compact('alumns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAlumn()
    {
        return view('adviser.create-alumno');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'curp' => ['required','unique:alumnos,curp','regex:/^[A-Za-z0-9]+$/'],
                'nombre' => ['required','regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]+$/'],
                'apellido_paterno' => ['nullable','regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/'],
                'apellido_materno' => ['nullable','regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/'],
                'direccion' => ['required','regex:/^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ# -.]+$/'],
                'correo' => 'required|email',
                'telefono' => ['nullable','regex:/^[0-9-]*$/'],
                'tutor' => ['nullable','regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/'],
                'telefono_emergencia' => ['required','regex:/^[0-9-]*$/'],
            ]
        );

        Alumno::create([
            'curp' => $request->curp,
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'direccion' => $request->direccion,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'tutor' => $request->tutor,
            'telefono_emergencia' => $request->telefono_emergencia,
            'modificado_por' => Auth::user()->email
        ]);

        return redirect('asesor/alumnos-registrados');
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

    public function groupSelect($curp, Request $request): Response
    {

        if (empty($request)){
            $id = $curp;
        }else{
            $id =$request->curp;
        }

        $idiomas = IdiomasController::populateList();
        $planteles = PlantelesController::populateList();
        $selectedAlumn = Alumno::query()->where('curp', $id)->first();
        $age = Carbon::parse($selectedAlumn->fecha_nacimiento)->age;

        $query = Grupo::query();
        $query -> whereraw('id_idioma=ifnull(?,id_idioma) and id_plantel=ifnull(?,id_plantel)',
                           [$request->id_idioma, $request->id_plantel]);
        $grupos = $query->get();

        return response()->view('adviser.group-assign', compact('idiomas', 'planteles', 'grupos', 'selectedAlumn', 'age'));
    }

    public function groupAssign($curp, $grupo)
    {
        Lista::create([
            'id_grupo' => $grupo,
            'curp' => $curp,
            'modificado_por' => Auth::user()->email
        ]);

        Semanal::create([
            'id_grupo' => $grupo,
            'curp' => $curp,
            'modificado_por' => Auth::user()->email
        ]);

        Calificacion::create([
            'id_grupo' => $grupo,
            'curp' => $curp,
            'modificado_por' => Auth::user()->email
        ]);

        $enrolledStudent = Alumno::query()->where('curp', $curp)->first();
        $selectedGroup = Grupo::query()->where('id_grupo', $grupo)->first();

        return view('adviser.enrolled-Student', compact('enrolledStudent','selectedGroup'));
    }

    public function studentsQuery(Request $request){
        $curp = $request->input('curp');
        $name = $request->input('name');

        $students = Alumno::query()
            ->where('curp', 'LIKE', "%{$curp}%")
            ->where('nombre', 'LIKE', "%{$name}%")
            ->paginate(10);
        return view('dataViewer.students.students-list', compact('students'));
    }

    public function studentDetails($curp){
        $student = Alumno::where('curp', 'LIKE', "%{$curp}%")->first();
        return view('students.student-details', compact('student'));
    }
}
