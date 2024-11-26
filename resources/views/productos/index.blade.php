@extends('layouts.private')

@section('page-title', 'Productos')

@php
    // Definir los breadcrumbs como un array
    $breadcrumbs = [
        ['name' => 'Dashboard', 'url' => route('dashboard')],
        ['name' => 'Productos', 'url' => route('productos.index')],
    ];
@endphp

@section('contenido')

    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="flex-shrink-0 me-2 svg-success" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24"
                width="1.5rem" fill="#000000">
                <path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path>
                <path
                    d="M16.59 7.58L10 14.17l-3.59-3.58L5 12l5 5 8-8zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z">
                </path>
            </svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif

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

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">
                        Lista de productos
                    </div>
                    <div>
                        <div class="breadcrumb mb-0">
                            <a aria-label="anchor" href="{{ route('productos.create') }}" class="btn btn-primary ms-auto"><i class="ti ti-circle-plus me-2"></i>Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-basic" class="table table-bordered text-nowrap w-100 table-sm">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Codigo</th>
                                    <th>Categoria</th>
                                    <th>Tipo</th>
                                    <th>Laboratorio</th>
                                    <th>Precios</th>
                                    <th>Estado</th>
                                    <th>Eliminado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->codigo }}</td>
                                        <td>{{ $producto->categoria->nombre }}</td>
                                        <td>{{ $producto->tipo->nombre }}</td>
                                        <td>{{ $producto->laboratorio->nombre }}</td>
                                        <td class="text-center">
                                            <span class="fs-12 badge {{ $producto->precios->count() == 0 ? 'bg-gray-600' : 'bg-info' }}">
                                                {{ $producto->precios->count() }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fs-12 badge  {{ $producto->estado == 'Inactivo' ? 'bg-light text-dark' : ' bg-success-transparent' }}">{{ $producto->estado }}</span>
                                        </td>
                                        <td>{{ $producto->eliminado ? 'Sí' : 'No' }}</td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                @if ($producto->eliminado == false)
                                                    <!-- Botón de edición si el producto NO está eliminado -->
                                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-icon btn-sm btn-info">
                                                        <i class="ri-edit-line"></i>
                                                    </a>
                                                @else
                                                    <!-- Botón de visualización si el producto está eliminado -->
                                                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-icon btn-sm btn-warning">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                @endif

                                                @if ($producto->eliminado == false)
                                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="delete-form" data-name="{{ $producto->nombre }}" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-icon btn-sm btn-danger btn-delete">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                                @endif

                                            </div>
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
    <!--End::row-1 -->
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Evitar el envío del formulario inmediatamente

                const form = this.closest('form');
                const productName = form.getAttribute('data-name'); // Obtener el nombre del producto

                // Mostrar SweetAlert de confirmación
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: `Se eliminará el producto: ${productName}. No estará disponible en transacciones de entradas y salidas.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Enviar el formulario si el usuario confirma
                    }
                });
            });
        });
    });
</script>
@endsection
