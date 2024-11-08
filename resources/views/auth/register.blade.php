@extends('layouts.auth')
@section('contenido')
<div class="row justify-content-center authentication authentication-basic align-items-center h-100">
    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
        <div class="my-4 d-flex justify-content-center">
            <a href="index.html">
                <img src="{{ asset('assets/images/brand-logos/desktop-white.png') }}" alt="logo">
            </a>
        </div>
        <div class="card custom-card">
            <div class="card-body p-5">
                <p class="h5 fw-semibold mb-2 text-center">Inventario</p>
                <p class="mb-4 text-muted op-7 fw-normal text-center">Bienvenido y únete a nosotras creando una cuenta gratuita!</p>
                <div class="row gy-3">
                    <div class="col-xl-12">
                        <label for="signup-firstname" class="form-label text-default">Nombre</label>
                        <input type="text" class="form-control form-control-lg" id="signup-firstname" placeholder="Ingrese nombre">
                    </div>
                    <div class="col-xl-12">
                        <label for="signup-lastname" class="form-label text-default">Correo electrónico</label>
                        <input type="email" class="form-control form-control-lg" id="signup-lastname" placeholder="Ingrese correo electrónico">
                    </div>
                    <div class="col-xl-12">
                        <label for="signup-password" class="form-label text-default">Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-lg" id="signup-password" placeholder="Ingrese contraseña">
                            <button aria-label="button" class="btn btn-light" onclick="createpassword('signup-password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                        </div>
                    </div>
                    <div class="col-xl-12 mb-2">
                        <label for="signup-confirmpassword" class="form-label text-default">Confirmar contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-lg" id="signup-confirmpassword" placeholder="Ingrese contraseña nuevamente">
                            <button aria-label="button" class="btn btn-light" onclick="createpassword('signup-confirmpassword',this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                        </div>
                    </div>
                    <div class="col-xl-12 d-grid mt-2">
                        <button type="button" class="btn btn-lg btn-primary">Crear cuenta</button>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-muted mt-3">Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-primary">Ingresar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
