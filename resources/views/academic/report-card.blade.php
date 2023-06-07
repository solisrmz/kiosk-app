@extends('layouts.navbar')
@section('contentnav')
    <div>
        @component('components.card')
            @slot('title')
                Calificaciones finales
            @endslot
            @slot('cardbody')   
                <div class="container p-3 my-3 border">
                    <h5>{{ $grupo->relacionIdioma->idioma }}  Nivel {{ $grupo->nivel }}</h5>
                <div class="table-responsive">
                    <form id="actualiza" action="{{ route('listas/final') }}" method="POST">
                        @csrf
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Alumno</th>
                                    <th scope="col">Evaluación semanal</th>
                                    <th scope="col">Tareas</th>
                                    <th scope="col">Habilidad escrita</th>
                                    <th scope="col">Evaluación oral</th>
                                    <th scope="col">Calificación final</th>
                            </thead> 
                            <tbody class="table-group-divider">   
                                @foreach ($students as $student)
                                <?php $i=$loop->index; ?>
                                <tr>
                                    <input name="id_grupo[{{$i}}]" type="hidden" value="{{ $student->id_grupo }}">
                                    <input name="curp[{{$i}}]" type="hidden" value="{{ $student->curp }}">
                                    <td>{{ $student->relacionAlumno->nombre }}</td>
                                    <td><input name="semanal[{{$i}}]" value="{{ $student->semanal }}" type="text" class="form-control" id="semanal" readonly></td>
                                    <td><input name="tareas[{{$i}}]" value="{{ $student->tareas }}" type="text" class="form-control" id="tareas"></td>
                                    <td><input name="habilidad_escrita[{{$i}}]" value="{{ $student->habilidad_escrita }}" type="text" class="form-control" id="habilidad_escrita"></td>
                                    <td><input name="evaluacion_oral[{{$i}}]" value="{{ $student->evaluacion_oral }}" type="text" class="form-control" id="evaluacion_oral"></td>
                                    <td><input name="calificacion_final[{{$i}}]" value="{{ $student->calificacion_final }}" type="text" class="form-control" id="calificacion_final" readonly></td>
                                </tr>    
                                @endforeach
                            </tbody>    
                        </table>
                        <button type="submit" class="btn btn-danger">Guardar</button>
                        <a href="{{ url('docente/grupos-docente') }}" class="btn btn-secondary">Regresar</a>
                    </form>    
                </div>
                </div>
            @endslot
        @endcomponent
    </div>       
@endsection
@push('js-scripts')
    <script type="text/javascript" src="{{ URL::asset ('/assets/js/calificaciones.js') }}"></script>
@endpush

