@extends('layouts.navbar')
@section('contentnav')
    <div>
        <form role="search" action="{{route('buscar-alumno')}}" method="GET">
            <div class="d-flex flex-row">
                <div class="col-3">
                    <input class="form-control me-2" name="curp" type="search" placeholder="Ingresa la CURP" aria-label="curp">
                </div>
                <div class="col-3">
                    <input class="form-control me-2" name="name" type="search" placeholder="Ingresa el nombre" aria-label="name">
                </div>
                <div>
                    <button class="btn btn-danger" type="submit">Buscar</button>
                </div>
            </div>
        </form>
        <br/>
        <div class="container-fluid">
            @component('components.card')
                @slot('title')
                    Estudiantes Registrados
                @endslot
                @slot('cardbody')
                    @if(count($students)>0)
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">CURP</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido Paterno</th>
                                    <th scope="col">Apellido Materno</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{$student->curp}}</td>
                                            <td>{{$student->nombre}}</td>
                                            @if(is_null($student->apellido_paterno))
                                                <td>N/A</td>
                                            @else
                                                <td>{{ $student->apellido_paterno }}</td>
                                            @endif
                                            @if(is_null($student->apellido_materno))
                                                <td>N/A</td>
                                            @else
                                                <td>{{ $student->apellido_materno }}</td>
                                            @endif
                                            <td>
                                                <a href="{{route('detalle-alumno', $student->curp)}}" class="btn btn-danger">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>Ingresa información en los campos de búsqueda</span>
                        @endif
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
