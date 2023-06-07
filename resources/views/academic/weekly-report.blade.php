@extends('layouts.navbar')
@section('contentnav')
    <div>
        @component('components.card')
            @slot('title')
                Evaluación Semanal
            @endslot
            @slot('cardbody')   
                <div class="container p-3 my-3 border">
                    <h5>{{ $grupo->relacionIdioma->idioma }}  Nivel {{ $grupo->nivel }}</h5>
                <div class="table-responsive">
                    <form id="actualiza" action="{{ route('listas/semanal') }}" method="POST">
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
                                    <th scope="col">Pronunciación</th>
                                    <th scope="col">Fluidez</th>
                                    <th scope="col">Vocabulario</th>
                                    <th scope="col">Gramática</th>
                                    <th scope="col">Participación</th>
                            </thead> 
                            <tbody class="table-group-divider">   
                                @foreach ($students as $student)
                                <?php $i=$loop->index; ?>
                                <tr>
                                    <input name="id_grupo[{{$i}}]" type="hidden" value="{{ $student->id_grupo }}">
                                    <input name="curp[{{$i}}]" type="hidden" value="{{ $student->curp }}">
                                    <td>{{ $student->relacionAlumno->nombre }}</td>
                                    <td><input name="pronunciacion1[{{$i}}]" value="{{ $student->pronunciacion1 }}" type="text" class="form-control" id="pronunciacion1"></td>
                                    <td><input name="fluidez1[{{$i}}]" value="{{ $student->fluidez1 }}" type="text" class="form-control" id="fluidez1"></td>
                                    <td><input name="vocabulario1[{{$i}}]" value="{{ $student->vocabulario1 }}" type="text" class="form-control" id="vocabulario1"></td>
                                    <td><input name="gramatica1[{{$i}}]" value="{{ $student->gramatica1 }}" type="text" class="form-control" id="gramatica1"></td>
                                    <td><input name="participacion1[{{$i}}]" value="{{ $student->participacion1 }}" type="text" class="form-control" id="participacion1"></td>
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