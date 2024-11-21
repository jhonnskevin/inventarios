@extends('layouts.private')

@section('page-title', 'Crear Persona')

@php
$breadcrumbs = [
['name' => 'Dashboard', 'url' => route('dashboard')],
['name' => 'Personas', 'url' => route('personas.index')],
['name' => 'Crear', 'url' => route('personas.create')],
];
@endphp

@section('contenido')

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
            <ul style="margin-bottom: 0px !important">
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
                    Datos de persona
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('personas.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label fs-14 text-dark">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
                            </div>
                            @error('nombre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label fs-14 text-dark">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono" required>
                            </div>
                            @error('telefono')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email" class="form-label fs-14 text-dark">Correo</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="tipo" class="form-label fs-14 text-dark">Tipo</label>
                                <select class="form-control" id="tipo" name="tipo" required>
                                    <option value="Cliente">Cliente</option>
                                    <option value="Proveedor">Proveedor</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="estado" class="form-label fs-14 text-dark">Estado</label>
                                <select class="form-control" id="estado" name="estado" required>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
