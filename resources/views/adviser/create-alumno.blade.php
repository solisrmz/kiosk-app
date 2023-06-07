@extends('layouts.navbar')
@section('contentnav')
<div>
    @component('components.card')
    @slot('title')
    Registrar alumno
    @endslot
    @slot('cardbody')
    <form action="{{ route('alumnos.store') }}" method="POST">
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
                    <label for="nombre" class="form-label">Nombre(s)</label>
                    <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                        required>
                    <br>
                    <label for="apellido_paterno" class="form-label">Apellido paterno</label>
                    <input class="form-control" type="text" id="apellido_paterno" name="apellido_paterno"
                        value="{{ old('apellido_paterno') }}">
                    <br>
                    <label for="apellido_materno" class="form-label">Apellido Materno</label>
                    <input class="form-control" type="text" id="apellido_materno" name="apellido_materno"
                        value="{{ old('apellido_materno') }}">
                    <br>
                    {{-- <label for="curp" class="form-label">CURP</label>
                                        <input class="form-control" type="text" id="curp" name="curp" value="{{ old('curp') }}"
                    required> --}}
                    <label for="curp" class="form-label">CURP</label>
                    <input class="form-control" type="text" id="curp" name="curp"  placeholder="XXXX000000XXXXXX00" required>

                    <script>
                        const curpInput = document.getElementById('curp');
                        const MAX_CURP_LENGTH = 18;

                        // Función de validación de CURP utilizando una expresión regular y la longitud máxima
                        function validateCURP(curp) {
                            const curpRegex = /^[A-Z]{4}\d{6}[HM][A-Z]{5}[A-Z0-9]\d$/;
                            const isValidLength = curp.length <= MAX_CURP_LENGTH;
                            return curpRegex.test(curp) && isValidLength;
                        }

                        // Evento de validación al cambiar el valor del campo CURP
                        curpInput.addEventListener('input', function () {
                            const curp = this.value;
                            const isValid = validateCURP(curp);

                            // Establecer estilo o mensaje de error según la validez de la CURP
                            if (isValid) {
                                this.classList.remove('is-invalid');
                            } else {
                                this.classList.add('is-invalid');
                            }
                        });

                    </script>


                    <br>
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                    <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                        value="{{ old('fecha_nacimiento') }}" required>
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo</label>
                    <input class="form-control" type="email" id="correo" name="correo" placeholder="nombre@correo.com"
                        value="{{ old('correo') }}" required>
                    <br>
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input class="form-control" type="text" id="telefono" name="telefono" placeholder="1111-22-33-44"
                        value="{{ old('telefono') }}">
                    <br>
                    <label for="direccion" class="form-label">Dirección</label>
                    <input class="form-control" type="text" id="direccion" name="direccion"
                        placeholder="Calle # 00 Col." value="{{ old('direccion') }}" required>
                    <br>
                    <label for="tutor" class="form-label">Tutor</label>
                    <input class="form-control" type="text" id="tutor" name="tutor" placeholder="Nombre(s) Apellido(s)"
                        value="{{ old('tutor') }}">
                    <br>
                    <label for="telefono_emergencia" class="form-label">Teléfono de emergencia</label>
                    <input class="form-control" type="text" id="telefono_emergencia" name="telefono_emergencia"
                        placeholder="1111-22-33-44" value="{{ old('telefono_emergencia') }}" required>
                    <br>
                    </P>

                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-danger">Registrar</button>
        <a href="{{ url('asesor') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot
    @endcomponent
</div>
@endsection
