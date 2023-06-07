@extends('layouts.navbar')
    @section('contentnav') 
        <div>
            @component('components.card')
                @slot('title')
                <nav class="navbar navbar-expand-sm bg-light">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button id="groupStudents" class='btn btn-danger' data-id='{{ $selectedGroup->id_grupo }}' ><i class="fas fa-users"></i></button>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('opciones', [$selectedGroup->id_grupo,'A']) }}" method="GET">
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Asistencia del grupo">
                                    <a>
                                        <i class="fas fa-check-square"></i>
                                    </a>
                                </button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('opciones', [$selectedGroup->id_grupo,'S']) }}" method="GET">
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Calificación semanal">
                                    <a>
                                        <i class="fas fa-clipboard-list"></i>
                                    </a>
                                </button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('opciones', [$selectedGroup->id_grupo,'F']) }}" method="GET">
                                <button type="submit" id="calificaciones" class="btn {{$selectedGroup->estado == 'C' ? 'btn-secondary' : 'btn-danger'}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Calificación final">
                                    <a>
                                        <i class="fas fa-user-graduate"></i>
                                    </a>
                                </button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <button id="createGroup" class="btn {{$selectedGroup->estado == 'C' ? 'btn-secondary' : 'btn-danger'}}"><i class="fas fa-file-export" title="Proyectar grupo" 
                            <?php if ($selectedGroup->estado){ ?> disabled <?php } ?>>
                            </i></button>
                        </li>
                        <li class="nav-item">
                            <button id="closeGroup" class="btn {{$selectedGroup->estado == 'C' ? 'btn-secondary' : 'btn-danger'}}"><i class="fas fa-toggle-off" title="Finalizar grupo"></i></button>
                        </li>
                    </ul>
                </nav>
                @endslot
                @slot('cardbody')      
                    Idioma: {{ $selectedGroup->relacionIdioma->idioma }}
                    <br>
                    Sistema: {{ $selectedGroup->relacionSistema->sistema }}
                    <br>
                    Plantel: {{ $selectedGroup->relacionPlantel->plantel }}
                    <br>
                    Categoría: {{ $selectedGroup->relacionCategoria->categoria }}
                    <br>
                    Módulo: {{ $selectedGroup->relacionModulo->modulo }}
                    <br>
                    Nivel: {{ $selectedGroup->relacionNivel->nivel }}
                    <br>
                    Inicio: {{ $selectedGroup->fecha_inicio }}
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
                                <td>{{ $selectedGroup->lunes ? $selectedGroup->hora_entrada .' - '. $selectedGroup->hora_salida : '-' }}</td>
                                <td>{{ $selectedGroup->martes ? $selectedGroup->hora_entrada .' - '. $selectedGroup->hora_salida : '-' }}</td>
                                <td>{{ $selectedGroup->miercoles ? $selectedGroup->hora_entrada .' - '. $selectedGroup->hora_salida : '-' }}</td>
                                <td>{{ $selectedGroup->jueves ? $selectedGroup->hora_entrada .' - '. $selectedGroup->hora_salida : '-' }}</td>
                                <td>{{ $selectedGroup->viernes ? $selectedGroup->hora_entrada .' - '. $selectedGroup->hora_salida : '-' }}</td>
                                <td>{{ $selectedGroup->sabado ? $selectedGroup->hora_entrada .' - '. $selectedGroup->hora_salida : '-' }}</td>
                            </tr>    
                        </tbody> 
                    </table>
                    <br>
                    <div id="proyectar" style="display:none">
                        <form action="{{ route('proyectar-grupo') }}" method="POST">
                            @csrf
                            @if ( count($errors)>0 )
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="container">

                                <input name="id_grupo" type="hidden" value="{{ $selectedGroup->id_grupo }}">
                                <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                                <input name="fecha_inicio" type="date" class="form-control" id="fecha_inicio" value="{{ old('fecha_inicio') }}">
                                <div class="mb-3">
                                    <label for="id_categoria" class="form-label">Categoría</label>
                                    <select name="id_categoria" class="form-control" id="id_categoria">
                                        <option value="">-- Elija la categoría --</option>
                                        @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}" @selected(old('id_categoria')==$categoria->id_categoria)>
                                            {{ $categoria->categoria }}
                                        </option>
                                        @endforeach
                                    </select>    
                                </div>
                                <div class="mb-3">
                                    <label for="id_modulo" class="form-label">Módulo</label>
                                    <select name="id_modulo" class="form-control" id="id_modulo">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_nivel" class="form-label">Nivel</label>
                                    <select name="id_nivel" class="form-control" id="id_nivel">
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-danger">Registrar</button>
                                <button id="cancel" class='btn btn-danger'>Cancelar</button> 
                            </div>
                        </form>
                    </div>
                    <br>
                    <a href="{{ url('direccion-academica/grupos-registrados') }}" class="btn btn-secondary">Regresar</a>
                @endslot
            @endcomponent
        </div>
        @include('modals.group-options-modal')
    @endsection  
@push('script')
    @include('scripts.group-options')
@endpush