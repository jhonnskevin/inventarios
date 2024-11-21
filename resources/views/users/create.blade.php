@extends('layouts.private')

@section('page-title', 'Crear Usuario')

@php
// Definir los breadcrumbs como un array
$breadcrumbs = [
['name' => 'Dashboard', 'url' => route('dashboard')],
['name' => 'Usuarios', 'url' => route('users.index')],
['name' => 'Crear', 'url' => route('users.create')],
];
@endphp

@section('content')

@if ($errors->any())
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24"
            width="1.5rem" fill="#000000">
            <path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path>
            <path
                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zM11 7h2v6h-2zm0 8h2v2h-2z">
            </path>
        </svg>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Datos de Usuario
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="name" class="form-label fs-14 text-dark">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre" required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="email" class="form-label fs-14 text-dark">Correo</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese correo" required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="role" class="form-label fs-14 text-dark">Rol</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="administrador">Administrador</option>
                                    <option value="auxiliar">Auxiliar</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password" class="form-label fs-14 text-dark">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese contraseña" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Confirmar contraseña</label>
                            <input type="password" class="form-control form-control-solid" placeholder="Ingrese nuevamente contraseña"
                                name="password_confirmation" value="" required/>
                        </div>

                    </div>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
