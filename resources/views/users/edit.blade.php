@extends('layouts.private')

@section('contenido')

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Editar Usuario
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT') <!-- Directiva para utilizar el método PUT -->

                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="name" class="form-label fs-14 text-dark">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Ingrese nombre" required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="email" class="form-label fs-14 text-dark">Correo</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Ingrese correo" required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="role" class="form-label fs-14 text-dark">Rol</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="administrador" {{ $user->role == 'administrador' ? 'selected' : '' }}>Administrador</option>
                                    <option value="auxiliar" {{ $user->role == 'auxiliar' ? 'selected' : '' }}>Auxiliar</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password" class="form-label fs-14 text-dark">Nueva Contraseña (Opcional)</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese nueva contraseña si desea cambiarla">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Confirmar nueva contraseña (Opcional)</label>
                            <input type="password" class="form-control form-control-solid" placeholder="Ingrese nuevamente la nueva contraseña"
                                name="password_confirmation" value=""/>
                        </div>

                    </div>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
