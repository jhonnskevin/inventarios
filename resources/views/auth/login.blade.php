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
                    <div class="col-xl-12">
                        <label for="signin-username" class="form-label text-default">Correo electrónico</label>
                        <input type="text" class="form-control form-control-lg" id="signin-username" placeholder="Ingrese correo electrónico">
                    </div>
                    <div class="col-xl-12 mb-2">
                        <label for="signin-password" class="form-label text-default d-block">Contraseña<a href="{{ route('password.request') }}" class="float-end text-danger">Olvidaste tu contraseña?</a></label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-lg" id="signin-password" placeholder="Ingrese contraseña">
                            <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                        </div>
                    </div>
                    <div class="col-xl-12 d-grid mt-2">
                        <a href="index.html" class="btn btn-lg btn-primary">Ingresar</a>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-muted mt-3">No tienes una cuenta? <a href="{{ route('register') }}" class="text-primary">Registrarse</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
