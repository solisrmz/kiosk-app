@extends('layouts.navbar')
@section('contentnav')
    <div>
        @component('components.card')
            @slot('title')
                Alumnos registrados
            @endslot
            @slot('cardbody')
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
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">CURP</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($alumns as $alumn)
                        <tr>
                            <td>{{ $alumn->curp }}</td>
                            <td>{{ $alumn->nombre }}</td>
                            <td>{{ $alumn->apellido_paterno }}</td>
                            <td>{{ $alumn->apellido_materno }}</td>
                            <td>{{ $alumn->correo }}</td>
                            <td>{{ $alumn->telefono }}</td>
                            <td>
                                <a href="{{route('detalle-alumno', $alumn->curp)}}" class="btn btn-danger">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            @endslot
        @endcomponent


    </div>
@endsection
