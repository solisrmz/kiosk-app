@extends('layouts.navbar')
    @section('contentnav') 
        <div>
            @component('components.card')
                @slot('title')
                    Acuse de inscripción
                @endslot
                @slot('cardbody')
                <h5>
                    {{ $enrolledStudent->nombre }} {{$enrolledStudent->apellido_paterno }} {{$enrolledStudent->apellido_materno }}
                </h5>
                <br>
                Inicio: {{ $selectedGroup->fecha_inicio }}
                <br>
                Idioma: {{ $selectedGroup->relacionIdioma->idioma }}
                <br>
                Sistema: {{ $selectedGroup->relacionSistema->sistema }}
                <br>
                Categoría: {{ $selectedGroup->relacionCategoria->categoria }}
                <br>
                Plantel: {{ $selectedGroup->relacionPlantel->plantel }}
                <br>
                Nivel: {{ $selectedGroup->nivel }}
                <br>
                <br>
                Horario
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Lunes</th>
                            <th scope="col">Martes</th>
                            <th scope="col">Miércoles</th>
                            <th scope="col">Jueves</th>
                            <th scope="col">Viernes</th>
                            <th scope="col">Sábado</th>
                        </tr>
                    </thead>
                    <tbody>   
                        <tr>
                            <td>{{ $selectedGroup->lunes ? $selectedGroup->hora_entrada : '-' }}</td>
                            <td>{{ $selectedGroup->martes ? $selectedGroup->hora_entrada : '-' }}</td>
                            <td>{{ $selectedGroup->miercoles ? $selectedGroup->hora_entrada : '-' }}</td>
                            <td>{{ $selectedGroup->jueves ? $selectedGroup->hora_entrada : '-' }}</td>
                            <td>{{ $selectedGroup->viernes ? $selectedGroup->hora_entrada : '-' }}</td>
                            <td>{{ $selectedGroup->sabado ? $selectedGroup->hora_entrada : '-' }}</td>
                        </tr>    
                    </tbody> 
                </table>
                <br>
                <br>
                <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Asignar">
                    <a><i class="fas fa-file-pdf"></i></a>
                </button>
                <a href="{{ url('asesor') }}" class="btn btn-secondary">Regresar</a>
                @endslot
            @endcomponent
        </div>
    @endsection