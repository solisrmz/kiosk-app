<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Docente;
use App\Models\Idioma;
use App\Http\Controllers\users\UsersController;
use App\Http\Controllers\director\IdiomasController;
use App\Rules\MutuallyExclusiveLanguages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocentesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::orderBy('id_empleado', 'desc')->paginate(10);
        return view('director.docentes', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idiomas = IdiomasController::populateList();
        return view('director.create-docente', compact('idiomas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
            'nombre' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/',
            'apellido_paterno' => ['nullable','regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/'],
            'apellido_materno' => ['nullable','regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]*$/'],
            'correo' => 'required|email|unique:empleados,correo',
            'telefono' => ['nullable','regex:/^[0-9-]*$/'],
            'antiguedad' => 'nullable|integer|numeric',
            'id_idioma1' => ['required', new MutuallyExclusiveLanguages($request->id_idioma1, $request->id_idioma2,$request->id_idioma3,$request->id_idioma4)]],
            ['id_idioma1.required' => 'El campo Idioma 1 es obligatorio']
        );

        $id = Empleado::insertGetId([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'antiguedad' => $request->antiguedad,
            'activo' => true,
            'modificado_por' => Auth::user()->email,
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now()
        ]);

        $id_empleado=$id;

        Docente::create([
            'id_empleado' => $id_empleado,
            'id_idioma1' => $request->id_idioma1,
            'id_idioma2' => $request->id_idioma2,
            'id_idioma3' => $request->id_idioma3,
            'id_idioma4' => $request->id_idioma4,
            'modificado_por' => Auth::user()->email
        ]);

        $password = Str::random(8);
        User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => Hash::make($password),
            'role' => 'docente',
            'active' => true
        ]);

        $sendMail = (new UsersController())->sendEmail($request->correo, $request->nombre, $password);
        return redirect('direccion-academica/docentes-registrados');
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
}
