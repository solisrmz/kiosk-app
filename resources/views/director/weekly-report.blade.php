@extends('layouts.navbar')
@section('contentnav')
    <div>
        @component('components.card')
            @slot('title')
                Evaluación Semanal
            @endslot
            @slot('cardbody')   
                <div class="container p-3 my-3 border">
                    <h5>{{ $grupo->relacionIdioma->idioma }}  Módulo {{ $grupo->relacionModulo->modulo }} Nivel {{ $grupo->relacionNivel->nivel }}</h5>
                    <div class="table-responsive"> 
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Alumno</th>
                                    <th scope="col">Pronunciación</th>
                                    <th scope="col">Fluidez</th>
                                    <th scope="col">Vocabulario</th>
                                    <th scope="col">Gramática</th>
                                    <th scope="col">Participación</th>
                            </thead> 
                            <tbody class="table-group-divider">   
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->relacionAlumno->nombre }}</td>
                                    <td>{{ $student->pronunciacion1 }}
                                    <td>{{ $student->fluidez1 }}</td>
                                    <td>{{ $student->vocabulario1 }}</td>
                                    <td>{{ $student->gramatica1 }}</td>
                                    <td>{{ $student->participacion1 }}</td>
                                </tr>    
                                @endforeach
                            </tbody>    
                        </table>

                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>  
                    </div>
                </div>
            @endslot
        @endcomponent
    </div>       
@endsection