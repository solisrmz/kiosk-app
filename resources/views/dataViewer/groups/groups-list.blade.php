@extends('layouts.navbar')
@section('contentnav')
    <div>
        <form role="search" method="GET" action="{{route('buscar-grupo')}}">
            <div class="d-flex flex-row">
                <div class="col-3">
                    <select name="campus" class="form-control" id="campus">
                        <option value="0">---- Selecciona un campus ----</option>
                        @foreach($campus as $camp)
                            <option value="{{$camp->id_plantel}}">{{ $camp->plantel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <select name="language" class="form-control" id="language">
                        <option value="0">---- Selecciona un idioma ----</option>
                        @foreach($languages as $lang)
                            <option value="{{$lang->id_idioma}}">{{ $lang->idioma }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button class="btn btn-danger" type="submit">Buscar</button>
                </div>
            </div>
        </form>
        <br/>
        <div class="container-fluid">
            @component('components.card')
                @slot('title')
                    Grupos
                @endslot
                @slot('cardbody')
                    @if(count($groups)>0)
                        <h5>Total: {{count($groups)}}</h5>
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">Plantel</th>
                                    <th scope="col">Idioma</th>
                                    <th scope="col">Profesor</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                @foreach($groups as $group)
                                <tbody>
                                    <tr>
                                        <td>{{$group->relacionPlantel->plantel}}</td>
                                        <td>{{$group->relacionIdioma->idioma}}</td>
                                        @if(is_null($group->relacionEmpleado))
                                            <td>Sin asignar</td>
                                        @else
                                            <td>{{ $group->relacionEmpleado->nombre }}</td>
                                        @endif
                                        <td>
                                            <a href="" class="btn btn-danger">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <a href="{{route('pdf', 'grupos')}}" class="btn btn-danger">
                                <i class="fa fa-file-pdf"></i>
                            </a>
                        @else
                            <div>Ingresa información en los campos de búsqueda</div>
                        @endif
                        <a href="{{ url('consulta') }}" class="btn btn-secondary">Regresar</a>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

