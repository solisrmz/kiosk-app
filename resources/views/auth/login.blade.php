@extends('layouts.app')
@section('content')
<div class="container">
    <div class="image-login">
        <img  src="{{ URL::to('/assets/images/Logo.png') }}" alt="Logo Kiosk CLE">
    </div>
    <br/>
    <div class="row justify-content-center">
        <div class="col-md-" style="width: 50%; height: 50%; border-radius: 10px;">
            <div class="card">
                <div class="header">
                    <h2 class="text-center mb-4 mt-4">Iniciar Sesión</h2>
                    @if (session('error'))
                        <div class="d-flex justify-content-center alert alert-danger fade show" role="alert">
                            <span class="text-danger">{{ session('error') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="card-body mx-auto">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Correo') }}</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="correo@dominio.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Este correo no se encuentra registrado</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Contraseña') }}</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Contraseña incorrecta</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-12 ">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Iniciar Sesión') }}
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
