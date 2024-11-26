@extends('layouts.private')

@section('page-title', 'Crear Producto')

@php
// Definir los breadcrumbs como un array
$breadcrumbs = [
['name' => 'Dashboard', 'url' => route('dashboard')],
['name' => 'Productos', 'url' => route('productos.index')],
['name' => 'Crear', 'url' => route('productos.create')],
];
@endphp

@section('contenido')
    @if (session('error'))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24"
                width="1.5rem" fill="#000000">
                <path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path>
                <path
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zM11 7h2v6h-2zm0 8h2v2h-2z">
                </path>
            </svg>
            <div>
                {{ session('error') }}
            </div>
        </div>
    @endif

    @error('precios')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24"
                width="1.5rem" fill="#000000">
                <path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path>
                <path
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zM11 7h2v6h-2zm0 8h2v2h-2z">
                </path>
            </svg>
            <div>
                Debe tener al menos 1 precio
            </div>
        </div>
    @enderror

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <nav class="nav nav-style-1 nav-pills" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#nav-producto"
                            aria-selected="true">Producto</a>
                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#nav-precios"
                            aria-selected="false">Precios
                            <span class="badge bg-info ms-1 rounded-pill" id="precioCount">0</span></a>
                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#nav-lotes" aria-selected="false">Lotes
                            <span class="badge bg-info ms-1 rounded-pill">0</span></a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('productos.store') }}">
        @csrf

        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content">
                    <div class="tab-pane show active p-0" id="nav-producto" role="tabpanel">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Datos
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label fs-14 text-dark">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="Ingrese el nombre" value="{{ old('nombre') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="alias" class="form-label fs-14 text-dark">Alias</label>
                                            <input type="text" class="form-control" id="alias" name="alias"
                                                placeholder="Ingrese el alias" value="{{ old('alias') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="codigo" class="form-label fs-14 text-dark">Codigo</label>
                                            <input type="text" class="form-control" id="codigo" name="codigo"
                                                placeholder="Ingrese codigo" value="{{ old('codigo') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="categoria_id" class="form-label fs-14 text-dark">Categoria</label>
                                            <select class="form-control js-example-basic-single" id="categoria_id"
                                                name="categoria_id" required>
                                                <option value="">Seleccione</option>
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}" {{ (old('categoria_id') == $categoria->id) ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="tipo_id" class="form-label fs-14 text-dark">Tipo</label>
                                            <select class="form-control js-example-basic-single" id="tipo_id" name="tipo_id"
                                                required>
                                                <option value="">Seleccione</option>
                                                @foreach ($tipos as $tipo)
                                                    <option value="{{ $tipo->id }}" {{ (old('tipo_id') == $tipo->id) ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="laboratorio_id" class="form-label fs-14 text-dark">Laboratorio</label>
                                            <select class="form-control js-example-basic-single" id="laboratorio_id"
                                                name="laboratorio_id" required>
                                                <option value="">Seleccione</option>
                                                @foreach ($laboratorios as $laboratorio)
                                                    <option value="{{ $laboratorio->id }}" {{ (old('laboratorio_id') == $laboratorio->id) ? 'selected' : '' }}>{{ $laboratorio->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="cantidad_minima" class="form-label fs-14 text-dark">Cantidad Minima</label>
                                            <input type="number" class="form-control" id="cantidad_minima" name="cantidad_minima" value="{{ old('cantidad_minima') }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="requiere_receta" class="form-label fs-14 text-dark">Requiere receta</label>
                                            <select class="form-control" id="requiere_receta" name="requiere_receta" required>
                                                <option value="0">No</option>
                                                <option value="1">Si</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="estado" class="form-label fs-14 text-dark">Estado</label>
                                            <select class="form-control" id="estado" name="estado" required>
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="descripcion" class="form-label fs-14 text-dark">Descripción</label>
                                            <textarea type="text" class="form-control" id="descripcion" name="descripcion"
                                                placeholder="Ingrese descripcion">{{ old('descripcion') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane p-0" id="nav-precios" role="tabpanel">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Precios
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <table class="table" id="preciosTable">
                                            <thead>
                                                <tr>
                                                    <th>Tipo de Precio</th>
                                                    <th>Precio</th>
                                                    <th>Fecha Desde</th>
                                                    <th>Fecha Hasta</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-success w-100" id="addPrice">Agregar Precio</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane p-0" id="nav-lotes" role="tabpanel">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Lotes
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Fecha Vencimiento</th>
                                                    <th>Cantidad Inicial</th>
                                                    <th>Cantidad Actual</th>
                                                    <th>Costo Unitario</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-xl-12">
                <div>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-light">Cancelar</a>
                </div>
            </div>
        </div>
    </form>

    <script>
        let priceIndex = 0; // Para gestionar el índice de precios

        // Función para actualizar la cantidad de precios
        function updatePrecioCount() {
            const precioCountElement = document.getElementById('precioCount');
            const table = document.getElementById('preciosTable').getElementsByTagName('tbody')[0];
            const rowCount = table.getElementsByTagName('tr').length;
            precioCountElement.textContent = rowCount;
        }

        document.getElementById('addPrice').addEventListener('click', function() {
            const tableBody = document.querySelector('#preciosTable tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>
                    <input type="text" name="precios[${priceIndex}][tipo_precio]" class="form-control" value="General" required>
                </td>
                <td>
                    <input type="number" name="precios[${priceIndex}][precio]" class="form-control" required min="0">
                </td>
                <td>
                    <input type="date" name="precios[${priceIndex}][fecha_desde]" class="form-control" required>
                </td>
                <td>
                    <input type="date" name="precios[${priceIndex}][fecha_hasta]" class="form-control" required>
                </td>
                <td>
                    <select name="precios[${priceIndex}][estado]" class="form-control" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-price">Eliminar</button>
                </td>
            `;
            tableBody.appendChild(newRow);
            priceIndex++;
            updatePrecioCount();

            // Añadir funcionalidad para eliminar la fila de precios
            newRow.querySelector('.remove-price').addEventListener('click', function() {
                newRow.remove();
                updatePrecioCount();
            });
        });

        // Actualizar el contador al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            updatePrecioCount();
        });
    </script>
@endsection
