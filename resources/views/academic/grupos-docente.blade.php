@extends('layouts.navbar')
@section('contentnav')
    <div>
        @component('components.card')
            @slot('title')
                Grupos asignados
            @endslot
            @slot('cardbody')
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                    <a class="navbar-brand"></a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                    </div>
                </nav>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Idioma</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Plantel</th>
                        <th scope="col">Sistema</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Hora de entrada</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">   
                        @foreach ($grupos as $grupo)
                        <tr>
                            <td>{{ $grupo->relacionIdioma->idioma }}</td>
                            <td>{{ $grupo->relacionCategoria->categoria }}</td>
                            <td>{{ $grupo->relacionPlantel->plantel }}</td>
                            <td>{{ $grupo->relacionSistema->sistema }}</td>
                            <td>{{ $grupo->nivel }}</td>
                            <td>{{ $grupo->hora_entrada }}</td>
                            <td>
                                <form action="{{ route('lista-grupo', [$grupo->id_grupo,'A']) }}" method="GET">
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Asistencia del grupo">
                                        <a>
                                            <i class="fas fa-check-square"></i>
                                        </a>
                                    </button>
                                </form>
                                <form action="{{ route('lista-grupo', [$grupo->id_grupo,'S']) }}" method="GET">
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Calificación semanal">
                                        <a>
                                            <i class="fas fa-clipboard-list"></i>
                                        </a>
                                    </button>
                                </form>
                                <form action="{{ route('lista-grupo', [$grupo->id_grupo,'F']) }}" method="GET">
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Calificación final">
                                        <a>
                                            <i class="fas fa-user-graduate"></i>
                                        </a>
                                    </button>
                                </form>               
                            <td>    
                        </tr>    
                        @endforeach
                    </tbody> 
                </table>
                {{$grupos->links()}}
                
            @endslot
        @endcomponent   
    </div>
@endsection