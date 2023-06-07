@extends('layouts.navbar')
@section('contentnav')
    @component('components.card')
        @slot('title')
            {{$student->nombre}} {{$student->apellido_paterno}} {{$student->apellido_materno}}
        @endslot
        @slot('cardbody')
            <div>
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="curp">CURP</label>
                        <span class="form-text text-secondary" id="curp">{{$student->curp}}</span>
                    </div>
                    <div class="col">
                        <label class="form-label" for="birth">Fecha de nacimiento</label>
                        <span class="form-text text-secondary" id="birth">{{$student->fecha_nacimiento}}</span>
                    </div>
                    <div class="col">
                        <label class="form-label" for="email">Correo electrónico</label>
                        <span class="form-text text-secondary" id="email">{{$student->correo}}</span>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="dir">Dirección</label>
                        <span class="form-text text-secondary" id="dir">{{$student->direccion}}</span>
                    </div>
                    <div class="col">
                        <label class="form-label" for="tel">Teléfono</label>
                        <span class="form-text text-secondary" id="tel">{{$student->telefono}}</span>
                    </div>
                    <div class="col">
                        <label class="form-label" for="emer">Teléfono de emergencia</label>
                        <span class="form-text text-secondary" id="emer">{{$student->telefono_emergencia}}</span>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <h5>Historial académico</h5>
                </div>
            </div>
        @endslot
    @endcomponent
@endsection
