@extends('layouts.navbar')
@section('contentnav')
    <div>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <h2 class="navbar-brand">{{ Auth::user()->name }}</h2>
              <form class="d-flex" role="search" action="{{ route('buscar-usuarios') }}" method="GET">
                  <input class="form-control me-2" name="search" type="search" placeholder="Ingresa el nombre" aria-label="Search">
                      <select name="role" class="form-control" id="role">
                          <option>---- Selecciona un rol ----</option>
                          <option value="director">Director Académico </option>
                          <option value="asesor">Asesor</option>
                          <option value="consulta">Consulta</option>
                          <option value="docente">Docente</option>
                      </select>
                  <button class="btn btn-danger" type="submit">Buscar</button>
              </form>
            </div>
          </nav>

        @component('components.card')
            @slot('title')
                Usuarios registrados
            @endslot
            @slot('cardbody')
                @if($users->isNotEmpty())
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Activo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{  $user->name }}</td>
                            <td>{{  $user->email }}</td>
                            <td>{{  Str::title($user->role) }}</td>
                            <td>
                                @if(@$user->active)
                                    <div class="btn btn-success" role="alert"></div>
                                @else
                                    <div class="btn btn-danger" role="alert"></div>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('cambiar-estatus', $user->id) }}" method="PUT">
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Revocar/devolver acceso">
                                        <a>
                                            <i class="fas fa-fw fa-ban"></i>
                                        </a>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    @else
                        <div>
                            <h2>No hay usuarios registrados</h2>
                        </div>
                    @endif
                    @if(count($users)>=10)
                        {{ $users->links() }}
                    @endif
                @endslot
        @endcomponent
    </div>
@endsection
