@extends('layouts.navbar')
@section('contentnav')
    <div>
        @component('components.card')
            @slot('title')
                Listado de docentes
            @endslot
            @slot('cardbody')   
                <div class="container p-3 my-3 border">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido Paterno</th>
                                    <th scope="col">Apellido Materno</th>
                                    <th scope="col">Correo</th>
                            </thead> 
                            <tbody class="table-group-divider">   
                                @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->nombre }}</td>
                                    <td>{{ $empleado->apellido_paterno }}</td>
                                    <td>{{ $empleado->apellido_materno }}</td>
                                    <td>{{ $empleado->correo }}</td>
                                </tr>    
                                @endforeach
                            </tbody>    
                        </table>
                    </div>
                </div>
            @endslot
        @endcomponent
    </div>       
@endsection