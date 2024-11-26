@extends('layouts.private')

@section('page-title', 'Editar Producto')

@php
// Definir los breadcrumbs como un array
$breadcrumbs = [
['name' => 'Dashboard', 'url' => route('dashboard')],
['name' => 'Productos', 'url' => route('productos.index')],
['name' => 'Editar', 'url' => route('productos.edit', $producto->id)],
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
                        <span class="badge bg-info ms-1 rounded-pill" id="precioCount">{{ $precios->count()
                            }}</span></a>
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#nav-lotes" aria-selected="false">Lotes
                        <span class="badge bg-info ms-1 rounded-pill">{{ $lotes->count() }}</span></a>
                </nav>
            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('productos.update', $producto->id) }}">
    @csrf
    @method('PUT')

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
                                            placeholder="Ingrese el nombre"
                                            value="{{ old('nombre', $producto->nombre) }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="alias" class="form-label fs-14 text-dark">Alias</label>
                                        <input type="text" class="form-control" id="alias" name="alias"
                                            placeholder="Ingrese el alias" value="{{ old('alias', $producto->alias) }}"
                                            required>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="codigo" class="form-label fs-14 text-dark">Codigo</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo"
                                            placeholder="Ingrese codigo" value="{{ old('codigo', $producto->codigo) }}"
                                            required>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="categoria_id" class="form-label fs-14 text-dark">Categoria</label>
                                        <select class="form-control js-example-basic-single" id="categoria_id"
                                            name="categoria_id" required>
                                            <option value="">Seleccione</option>
                                            @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}" {{ (old('categoria_id', $producto->
                                                categoria_id) == $categoria->id) ? 'selected' : '' }}>{{
                                                $categoria->nombre }}
                                            </option>
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
                                            <option value="{{ $tipo->id }}" {{ (old('tipo_id', $producto->tipo_id) ==
                                                $tipo->id)
                                                ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="laboratorio_id"
                                            class="form-label fs-14 text-dark">Laboratorio</label>
                                        <select class="form-control js-example-basic-single" id="laboratorio_id"
                                            name="laboratorio_id" required>
                                            <option value="">Seleccione</option>
                                            @foreach ($laboratorios as $laboratorio)
                                            <option value="{{ $laboratorio->id }}" {{ (old('laboratorio_id', $producto->
                                                laboratorio_id) == $laboratorio->id) ? 'selected' : '' }}>{{
                                                $laboratorio->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="cantidad_minima" class="form-label fs-14 text-dark">Cantidad
                                            Minima</label>
                                        <input type="number" class="form-control" id="cantidad_minima"
                                            name="cantidad_minima"
                                            value="{{ old('cantidad_minima', $producto->cantidad_minima) }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="requiere_receta" class="form-label fs-14 text-dark">Requiere
                                            receta</label>
                                        <select class="form-control" id="requiere_receta" name="requiere_receta"
                                            required>
                                            <option value="0" {{ (old('requiere_receta', $producto->requiere_receta) ==
                                                0) ?
                                                'selected' : '' }}>No</option>
                                            <option value="1" {{ (old('requiere_receta', $producto->requiere_receta) ==
                                                1) ?
                                                'selected' : '' }}>Si</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="estado" class="form-label fs-14 text-dark">Estado</label>
                                        <select class="form-control" id="estado" name="estado" required>
                                            <option value="Activo" {{ (old('estado', $producto->estado) == 'Activo') ?
                                                'selected' : '' }}>Activo</option>
                                            <option value="Inactivo" {{ (old('estado', $producto->estado) == 'Inactivo')
                                                ?
                                                'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label fs-14 text-dark">Descripción</label>
                                        <textarea type="text" class="form-control" id="descripcion" name="descripcion"
                                            placeholder="Ingrese descripción">{{ old('descripcion', $producto->descripcion) }}</textarea>
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
                                            @foreach ($producto->precios as $index => $precio)
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="precios[{{ $index }}][id]"
                                                        value="{{ $precio->id }}">
                                                    <input type="text" class="form-control"
                                                        name="precios[{{ $index }}][tipo_precio]"
                                                        value="{{ old('precios.' . $index . '.tipo_precio', $precio->tipo_precio) }}"
                                                        required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control"
                                                        name="precios[{{ $index }}][precio]"
                                                        value="{{ old('precios.' . $index . '.precio', $precio->precio) }}"
                                                        required>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control"
                                                        name="precios[{{ $index }}][fecha_desde]"
                                                        value="{{ old('precios.' . $index . '.fecha_desde', $precio->fecha_desde) }}"
                                                        required>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control"
                                                        name="precios[{{ $index }}][fecha_hasta]"
                                                        value="{{ old('precios.' . $index . '.fecha_hasta', $precio->fecha_hasta) }}"
                                                        required>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="precios[{{ $index }}][estado]"
                                                        required>
                                                        <option value="Activo" {{ (old('precios.' . $index . '.estado' ,
                                                            $precio->estado) == 'Activo') ? 'selected' : '' }}>Activo
                                                        </option>
                                                        <option value="Inactivo" {{ (old('precios.' . $index . '.estado'
                                                            , $precio->estado) == 'Inactivo') ? 'selected' : ''
                                                            }}>Inactivo
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="removeRow(this)">Eliminar</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-success w-100" onclick="addRow()">Agregar
                                        Precio</button>
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
                                            @foreach ($lotes as $lote)
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" disabled
                                                        value="{{ $lote->codigo }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" disabled
                                                        value="{{ \Carbon\Carbon::parse($lote->fecha_vencimiento)->format('d/m/Y') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" disabled
                                                        value="{{ $lote->cantidad_inicial }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" disabled
                                                        value="{{ $lote->cantidad_actual }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" disabled
                                                        value="{{ $lote->costo_unitario }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" disabled
                                                        value="{{ $lote->estado }}">
                                                </td>
                                            </tr>
                                            @endforeach
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
    let priceIndex = {{ count($precios) }}; // Ajusta el índice a la cantidad de precios existentes

    // Función para actualizar la cantidad de precios
    function updatePrecioCount() {
        const precioCountElement = document.getElementById('precioCount');
        const table = document.getElementById('preciosTable').getElementsByTagName('tbody')[0];
        const rowCount = table.getElementsByTagName('tr').length;
        precioCountElement.textContent = rowCount;
    }

    function addRow() {
        const table = document.getElementById('preciosTable').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow();
        newRow.innerHTML = `
            <td>
                <input type="text" class="form-control" name="precios[${priceIndex}][tipo_precio]" required value="General">
            </td>
            <td>
                <input type="number" class="form-control" name="precios[${priceIndex}][precio]" required>
            </td>
            <td>
                <input type="date" class="form-control" name="precios[${priceIndex}][fecha_desde]" required>
            </td>
            <td>
                <input type="date" class="form-control" name="precios[${priceIndex}][fecha_hasta]" required>
            </td>
            <td>
                <select class="form-control" name="precios[${priceIndex}][estado]" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeRow(this)">Eliminar</button>
            </td>
        `;
        priceIndex++;
        updatePrecioCount();
    }

    // Función para eliminar una fila
    function removeRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updatePrecioCount();
    }

    // Actualizar el contador al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        updatePrecioCount();
    });
</script>

@endsection
