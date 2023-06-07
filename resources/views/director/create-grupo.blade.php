@extends('layouts.navbar')
@section('contentnav')
<div>
    @component('components.card')
    @slot('title')
    Registrar grupo
    @endslot
    @slot('cardbody')
    <form action="{{ route('grupos.store') }}" method="POST">
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
            <hr class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="id_idioma" class="form-label">Idioma</label>
                        <select name="id_idioma" class="form-control" id="id_idioma">
                            <option value="">-- Elija el idioma --</option>
                            @foreach ($idiomas as $idioma)
                            <option value="{{ $idioma->id_idioma }}" @selected(old('id_idioma')==$idioma->id_idioma)>
                                {{ $idioma->idioma }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_sistema" class="form-label">Sistema</label>
                        <select name="id_sistema" class="form-control" id="id_sistema">
                            <option value="">-- Elija el sistema --</option>
                            @foreach ($sistemas as $sistema)
                            <option value="{{ $sistema->id_sistema }}" @selected(old('id_sistema')==$sistema->
                                id_sistema)>
                                {{ $sistema->sistema }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_categoria" class="form-label">Categoría</label>
                        <select name="id_categoria" class="form-control" id="id_categoria">
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
                    <button type="submit" class="btn btn-danger">Registrar</button>
                    <a href="{{ url('direccion-academica') }}" class="btn btn-secondary">Regresar</a>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="id_plantel" class="form-label">Plantel</label>
                        <select name="id_plantel" class="form-control" id="id_plantel">
                            <option value="">-- Elija el plantel --</option>
                            @foreach ($planteles as $plantel)
                            <option value="{{ $plantel->id_plantel }}" @selected(old('id_plantel')==$plantel->
                                id_plantel)>
                                {{ $plantel->plantel }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                        <input name="fecha_inicio" type="date" class="form-control" id="fecha_inicio"
                            value="{{ old('fecha_inicio') }}">
                    </div>
                    <div class="mb-3">
                        <label for="hora_entrada" class="form-label">Hora de entrada</label>
                        <select name="hora_entrada" class="form-control" id="hora_entrada">
                            <option value="">-- Elija la hora --</option>
                            @foreach ($horas as $hora)
                            <option value="{{ $hora }}" @selected(old('hora_entrada')==$hora)>
                                {{ $hora }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hora_salida" class="form-label">Hora de salida</label>
                        <select name="hora_salida" class="form-control" id="hora_salida">
                            <option value="">-- Elija la hora --</option>
                            @foreach ($salidas as $salida)
                            <option value="{{ $salida }}" @selected(old('hora_salida')==$salida)>
                                {{ $salida }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Días de la semana</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input name="lunes" type="hidden" value="0">
                            <input name="lunes" class="form-check-input" type="checkbox" id="lunes" value="1"
                                @checked(old('lunes', 0)==1)>
                            <label class="form-check-label" for="lunes">Lunes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="martes" type="hidden" value="0">
                            <input name="martes" class="form-check-input" type="checkbox" id="martes" value="1"
                                @checked(old('martes', 0)==1)>
                            <label class="form-check-label" for="martes">Martes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="miercoles" type="hidden" value="0">
                            <input name="miercoles" class="form-check-input" type="checkbox" id="miercoles" value="1"
                                @checked(old('miercoles', 0)==1)>
                            <label class="form-check-label" for="miercoles">Miércoles</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="jueves" type="hidden" value="0">
                            <input name="jueves" class="form-check-input" type="checkbox" id="jueves" value="1"
                                @checked(old('jueves', 0)==1)>
                            <label class="form-check-label" for="jueves">Jueves</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="viernes" type="hidden" value="0">
                            <input name="viernes" class="form-check-input" type="checkbox" id="viernes" value="1"
                                @checked(old('viernes', 0)==1)>
                            <label class="form-check-label" for="viernes">Viernes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="sabado" type="hidden" value="0">
                            <input name="sabado" class="form-check-input" type="checkbox" id="sabado" value="1"
                                @checked(old('sabado', 0)==1)>
                            <label class="form-check-label" for="sabado">Sábado</label>
                        </div>
                    </div>

                </div>
            </div>
    </form>
    @endslot
    @endcomponent
</div>
@endsection
@push('script')
    @include('scripts.group-dependent-selects')
@endpush
