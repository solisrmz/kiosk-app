@extends('layouts.navbar')
@section('contentnav')
    <div class="container">
        <div>
            @component('components.card')
                @slot('title')
                    Bienvenido: {{ Auth::user()->name }}
                @endslot
                @slot('cardbody')
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nombre de Usuario:</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Correo Electrónico:</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td>Rol:</td>
                                <td>{{ Auth::user()->role }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection


