@extends('layouts.navbar')
@section('contentnav')
        <div>
            @component('components.card')
                @slot('title')
                    Registrar docente
                @endslot
                @slot('cardbody')
                        <form action="{{ route('docentes.store') }}" method="POST">
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
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre(s)</label>
                                <input name="nombre" type="text" class="form-control" id="nombre" value="{{ old('nombre') }}">
                                
                                <label for="apellido_paterno" class="form-label">Apellido paterno</label>
                                <input name="apellido_paterno" type="text" class="form-control" id="apellido_paterno" value="{{ old('apellido_paterno') }}">
                                
                                <label for="apellido_materno" class="form-label">Apellido materno</label>
                                <input name="apellido_materno" type="text" class="form-control" id="apellido_materno" value="{{ old('apellido_materno') }}">
                                
                                <label for="correo" class="form-label">Correo</label>
                                <input name="correo" type="email" class="form-control" placeholder="nombre@correo.com" id="correo" value="{{ old('correo') }}">
                                
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input name="telefono" type="text" class="form-control" placeholder="1111-22-33-44" id="telefono" value="{{ old('telefono') }}">

                                <label for="antiguedad" class="form-label">Antigüedad</label>
                                <input name="antiguedad" type="text" class="form-control" id="antiguedad" value="{{ old('antiguedad') }}">
                                
                                <label for="id_idioma1" class="form-label">Idioma 1</label>
                                <select name="id_idioma1" class="form-control" id="id_idioma1">
                                    <option value="">--Elija el idioma--</option>
                                    @foreach ($idiomas as $idioma)
                                        <option value="{{ $idioma->id_idioma }}"
                                         @selected(old('id_idioma1') == $idioma->id_idioma)>{{ $idioma->idioma }} </option>
                                    @endforeach    
                                </select>   
                                
                                <label for="id_idioma2" class="form-label">Idioma 2</label>
                                <select name="id_idioma2" class="form-control" id="id_idioma2" value="{{ old('id_idioma2') }}">
                                    <option value="">--Elija el idioma--</option>
                                    @foreach ($idiomas as $idioma)
                                        <option value="{{ $idioma->id_idioma }}"
                                        @selected(old('id_idioma2') == $idioma->id_idioma)>{{ $idioma->idioma }} </option>
                                    @endforeach    
                                </select>

                                <label for="id_idioma3" class="form-label">Idioma 3</label>
                                <select name="id_idioma3" class="form-control" id="id_idioma3" value="{{ old('id_idioma3') }}">
                                    <option value="">--Elija el idioma--</option>
                                    @foreach ($idiomas as $idioma)
                                        <option value="{{ $idioma->id_idioma }}"
                                        @selected(old('id_idioma3') == $idioma->id_idioma)>{{ $idioma->idioma }} </option>
                                    @endforeach    
                                </select> 

                                <label for="id_idioma4" class="form-label">Idioma 4</label>
                                <select name="id_idioma4" class="form-control" id="id_idioma4" value="{{ old('id_idioma4') }}">
                                    <option value="">--Elija el idioma--</option>
                                    @foreach ($idiomas as $idioma)
                                        <option value="{{ $idioma->id_idioma }}"
                                        @selected(old('id_idioma4') == $idioma->id_idioma)>{{ $idioma->idioma }} </option>
                                    @endforeach    
                                </select>
                                <br>
                            
                                <button type="submit" class="btn btn-danger">Registrar</button>
                                <a href="{{ url('admin') }}" class="btn btn-secondary">Regresar</a>
                            
                        </form>
                @endslot
            @endcomponent
        </div>
@endsection