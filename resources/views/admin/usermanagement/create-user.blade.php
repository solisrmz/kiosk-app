@extends('layouts.navbar')
@section('contentnav')
        <div>
            @component('components.card')
                @slot('title')
                    Crear usuario
                @endslot
                @slot('cardbody')
                        <form action="{{ route('usuarios.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre completo</label>
                                <input name="name" type="text" class="form-control" id="name"  placeholder="Nombre Completo">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo</label>
                                <input name="email" type="email" class="form-control" id="email"  placeholder="Correo">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Rol</label>
                                <select name="role" class="form-control" id="role">
                                    <option>---- Selecciona una opción ----</option>
                                    <option value="director">Director Académico </option>
                                    <option value="asesor">Asesor</option>
                                    <option value="consulta">Consulta</option>
                                    <option value="docente">Docente</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger">Registrar</button>
                            <a href="{{ url('admin') }}" class="btn btn-secondary">Regresar</a>
                        </form>
                @endslot
            @endcomponent
        </div>
@endsection
