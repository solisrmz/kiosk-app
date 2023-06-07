@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
    <div class="container">
        <div>
            @component('components.card')
                @slot('title')
                    Bienvenido {{ Auth::user()->name }}
                @endslot
                <button type="button" class="btn btn-danger">Ejemplo boton</button>
            @endcomponent
        </div>
    </div>
@endsection
