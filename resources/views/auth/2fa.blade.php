@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="image-login">
            <img  src="{{ URL::to('/assets/images/Logo.png') }}" alt="Logo Kiosk CLE">
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center mb-4 mt-4">Iniciar Sesión</h2>
                        <p class="text-center">Se ha enviado un codigo de acceso al correo : {{ substr(auth()->user()->email, 0, 5) . '******' . substr(auth()->user()->email,  -2) }}</p>
                        @if ($message = Session::get('success'))
                            <div class="row">
                                <div class="d-flex justify-content-center alert alert-success fade show" role="alert">
                                    <span class="text-success">{{$message}}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="row">
                                <div class="d-flex justify-content-center alert alert-danger fade show" role="alert">
                                    <span class="text-danger">El codigo que se ha ingresado es incorrecto</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body mx-auto justify-content-center">
                        <form method="POST" action="{{ route('2fa.post') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="code" class="row-cols-4">Ingresar código de verificación</label>
                                <div class="col-md-12">
                                    <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-link" href="{{ route('2fa.resend') }}">Volver a envíar código</a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        Verificar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
