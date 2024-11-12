@extends('layouts.auth')

@section('contenido')
<div class="row justify-content-center authentication authentication-basic align-items-center h-100">
    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
        <div class="my-4 d-flex justify-content-center">
            <a href="index.html">
                <img src="{{ asset('assets/images/brand-logos/desktop-white.png') }}" alt="logo">
            </a>
        </div>
        <div class="card custom-card">
            <div class="card-body p-5">
                <p class="h5 fw-semibold mb-2 text-center">Inventario</p>
                <p class="mb-4 text-muted op-7 fw-normal text-center">Bienvenido!</p>
                <div class="row gy-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Correo electrónico -->
                        <div class="col-xl-12 mb-3">
                            <label for="email" class="form-label text-default">Correo electrónico</label>
                            <input type="email" class="form-control form-control-lg" id="correo" name="email" value="{{ old('email') }}" placeholder="Ingrese correo electrónico">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="col-xl-12 mb-2">
                            <label for="password" class="form-label text-default d-block">Contraseña<a href="{{ route('password.request') }}" class="float-end text-danger">Olvidaste tu contraseña?</a></label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Ingrese contraseña">
                                <button class="btn btn-light" type="button" onclick="createpassword('password',this)"
                                    id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xl-12 d-grid mt-2">
                            <button type="submit" class="btn btn-lg btn-primary">Ingresar</a>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <p class="text-muted mt-3">No tienes una cuenta? <a href="{{ route('register') }}"
                            class="text-primary">Registrarse</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
