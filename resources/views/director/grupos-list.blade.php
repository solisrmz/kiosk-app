@extends('layouts.navbar')
@section('contentnav')
    <div>
        @component('components.card')
            @slot('title')
                Listado de grupos
            @endslot
            @slot('cardbody')
                <div class="container p-3 my-3 border">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Idioma</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Módulo</th>
                                <th scope="col">Nivel</th>
                                <th scope="col">Profesor asignado</th>
                                <th scope="col">Acciones</th>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->relacionIdioma->idioma }}</td>
                                <td>{{ $grupo->relacionCategoria->categoria }}</td>
                                <td>{{ $grupo->relacionModulo->modulo }}</td>
                                <td>{{ $grupo->relacionNivel->nivel }}</td>
                                @if(is_null($grupo->relacionEmpleado))
                                    <td>Sin asignar</td>
                                @else
                                    <td>{{ $grupo->relacionEmpleado->nombre }}</td>
                                @endif
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="" class="btn mibtn {{$grupo->id_empleado ? 'btn-secondary' : 'btn-danger'}}"
                                            id="{{$grupo->id_grupo}}"
                                            data-toggle="modal"
                                            data-target="#modalTeachers"
                                            data-path="{{ route('profesores') }}"
                                            data-id="{{ $grupo->id_grupo }}"
                                            data-token="{{ csrf_token() }}">
                                            <i class="fa fa-user-tie"></i>
                                        </a>


                                        <form action="{{ route('detalle-grupo', $grupo->id_grupo) }}" method="GET">
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Detalles">
                                                <a><i class="fas fa-money-check"></i></a>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            @endslot
        @endcomponent
    </div>
    @include('modals.teacher-modal')
@endsection
@push('script')
    @include('scripts.modal-teacher')
@endpush
