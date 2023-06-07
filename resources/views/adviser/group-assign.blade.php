@extends('layouts.navbar')
    @section('contentnav')
        <div>
            <div class="container-fluid">
                @component('components.card')
                    @slot('title')
                    {{ $selectedAlumn->nombre }} {{$selectedAlumn->apellido_paterno }} {{$selectedAlumn->apellido_materno }} Edad {{ $age }} años
                        <br/>
                        <br/>
                        <form method="GET" action='grupo'>
                            <div class="d-flex flex-row">
                                <input name="curp" type="hidden" value="{{ $selectedAlumn->curp }}">
                                <div class="col-3">
                                    <select name="id_idioma" class="form-control" id="id_idioma">
                                        <option value="">--Elija el idioma--</option>
                                        @foreach ($idiomas as $idioma)
                                            <option value="{{ $idioma->id_idioma }}" @selected(old('id_idioma') == $idioma->id_idioma)>{{ $idioma->idioma }} </option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select name="id_plantel" class="form-control" id="id_plantel">
                                        <option value="">--Elija el plantel--</option>
                                        @foreach ($planteles as $plantel)
                                            <option value="{{ $plantel->id_plantel }}" @selected(old('id_plantel') == $plantel->id_plantel)>{{ $plantel->plantel }} </option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-danger" type="submit">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <br/>
                    @endslot
                    @slot('cardbody')
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="container p-3 my-3 border">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Categoria</th>
                                            <th scope="col">Nivel</th>
                                            <th scope="col">Hora de entrada</th>
                                            <th scope="col">Asignar</th>
                                    </thead> 
                                    <tbody class="table-group-divider">   
                                        @foreach ($grupos as $grupo)
                                        <tr>
                                            <td>{{ $grupo->relacionCategoria->categoria }}</td>
                                            <td>{{ $grupo->nivel }}</td>
                                            <td>{{ $grupo->hora_entrada }}</td>
                                            <td>
                                                <form action="{{ route('asignar-grupo', ['curp' => $selectedAlumn->curp, 'grupo' => $grupo->id_grupo]) }}" method="get">
                                                    <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Asignar">
                                                        <a>
                                                            <i class="fas fa-user-check"></i>
                                                        </a>
                                                    </button>
                                                </form>
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
        </div>
    @endsection

