@extends('layouts.navbar')
@section('contentnav')
    <div>
        @component('components.card')
            @slot('title')
                Asistencia
            @endslot
            @slot('cardbody')   
                <div class="container p-3 my-3 border">
                    <h5>{{ $grupo->relacionIdioma->idioma }}  Nivel {{ $grupo->nivel }}</h5>
                <div class="table-responsive">
                    <form id="actualiza" action="{{ route('listas/asistencia') }}" method="POST">
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
                                    <th scope="col">Sesión 1</th>
                                    <th scope="col">Sesión 2</th>
                                    <th scope="col">Sesión 3</th>
                                    <th scope="col">Sesión 4</th>
                                    <th scope="col">Sesión 5</th>
                                    <th scope="col">Sesión 6</th>
                                    <th scope="col">Sesión 7</th>
                                    <th scope="col">Sesión 8</th>
                            </thead> 
                            <tbody class="table-group-divider">   
                                @foreach ($students as $student)
                                <?php $i=$loop->index; ?>
                                <tr>
                                    <input name="id_grupo[{{$i}}]" type="hidden" value="{{ $student->id_grupo }}">
                                    <input name="curp[{{$i}}]" type="hidden" value="{{ $student->curp }}">
                                    <td>{{ $student->curp }}</td>
                                    <td>
                                        <input name="sesion1[{{$i}}]" type="hidden" value="0">
                                        <input name="sesion1[{{$i}}]" type="checkbox" id="sesion1" value="1" {{ $student->sesion1 ? 'checked' : '' }}/>
                                    </td>
                                    <td>
                                        <input name="sesion2[{{$i}}]" type="hidden" value="0">
                                        <input name="sesion2[{{$i}}]" type="checkbox" id="sesion2" value="1" {{ $student->sesion2 ? 'checked' : '' }}/>
                                    </td>
                                    <td>
                                        <input name="sesion3[{{$i}}]" type="hidden" value="0">
                                        <input name="sesion3[{{$i}}]" type="checkbox" id="sesion3" value="1" {{ $student->sesion3 ? 'checked' : '' }}/>
                                    </td>
                                    <td>
                                        <input name="sesion4[{{$i}}]" type="hidden" value="0">
                                        <input name="sesion4[{{$i}}]" type="checkbox" id="sesion4" value="1" {{ $student->sesion4 ? 'checked' : '' }}/>
                                    </td>
                                    <td>
                                        <input name="sesion5[{{$i}}]" type="hidden" value="0">
                                        <input name="sesion5[{{$i}}]" type="checkbox" id="sesion5" value="1" {{ $student->sesion5 ? 'checked' : '' }}/>
                                    </td>
                                    <td>
                                        <input name="sesion6[{{$i}}]" type="hidden" value="0">
                                        <input name="sesion6[{{$i}}]" type="checkbox" id="sesion6" value="1" {{ $student->sesion6 ? 'checked' : '' }}/>
                                    </td>
                                    <td>
                                        <input name="sesion7[{{$i}}]" type="hidden" value="0">
                                        <input name="sesion7[{{$i}}]" type="checkbox" id="sesion7" value="1" {{ $student->sesion7 ? 'checked' : '' }}/>
                                    </td>
                                    <td>
                                        <input name="sesion8[{{$i}}]" type="hidden" value="0">
                                        <input name="sesion8[{{$i}}]" type="checkbox" id="sesion8" value="1" {{ $student->sesion8 ? 'checked' : '' }}/>
                                    </td>
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