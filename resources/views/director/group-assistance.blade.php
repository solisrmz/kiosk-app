@extends('layouts.navbar')
@section('contentnav')
    <div>
        @component('components.card')
            @slot('title')
                Asistencia
            @endslot
            @slot('cardbody')   
                <div class="container p-3 my-3 border">
                    <h5>{{ $grupo->relacionIdioma->idioma }}  Módulo {{ $grupo->relacionModulo->modulo }} Nivel {{ $grupo->relacionNivel->nivel }}</h5>
                    <div class="table-responsive">        
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
                                    <td>{{ $student->relacionAlumno->nombre }}</td>
                                    <td>
                                        {{ $student->sesion1 ? '🗸' : ' ' }}
                                    </td>
                                    <td>
                                        {{ $student->sesion2 ? '🗸' : ' ' }}
                                    </td>
                                    <td>
                                        {{ $student->sesion3 ? '🗸' : ' ' }}
                                    </td>
                                    <td>
                                        {{ $student->sesion4 ? '🗸' : ' ' }}
                                    </td>
                                    <td>
                                        {{ $student->sesion5 ? '🗸' : ' ' }}
                                    </td>
                                    <td>
                                        {{ $student->sesion6 ? '🗸' : ' ' }}
                                    </td>
                                    <td>
                                        {{ $student->sesion7 ? '🗸' : ' ' }}
                                    </td>
                                    <td>
                                        {{ $student->sesion8 ? '🗸' : ' ' }}
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>    
                        </table>   
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>
                </div>
            @endslot
        @endcomponent
    </div>       
@endsection