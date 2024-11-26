php artisan migrate

php artisan make:migration create_personas_table
php artisan make:model Persona
php artisan make:controller PersonaController --resource

php artisan make:migration create_categorias_table
php artisan make:model Categoria
php artisan make:controller CategoriaController --resource

php artisan make:migration create_tipos_table
php artisan make:model Tipo
php artisan make:controller TipoController --resource

php artisan make:migration create_laboratorios_table
php artisan make:model Laboratorio
php artisan make:controller LaboratorioController --resource

php artisan make:migration create_precios_table
php artisan make:model Precio

php artisan make:migration create_lotes_table
php artisan make:model Lote

php artisan make:migration create_productos_table
php artisan make:model Producto
php artisan make:controller ProductoController --resource

php artisan make:migration create_transacciones_table
php artisan make:model Transaccion
php artisan make:controller TransaccionController --resource

php artisan make:migration create_detalle_transacciones_table
php artisan make:model DetalleTransaccion

<li class="slide">
    <a href="{{ route('transacciones.entradas.index') }}" class="side-menu__item">
        <i class="fe fe-arrow-down  side-menu__icon"></i>
        <span class="side-menu__label">Entradas</span>
    </a>
</li>

<li class="slide">
    <a href="{{ route('transacciones.salidas.index') }}" class="side-menu__item">
        <i class="fe fe-arrow-up side-menu__icon"></i>
        <span class="side-menu__label">Salidas</span>
    </a>
</li>

<?php
// Rutas para las Entradas
Route::get('entradas', [TransaccionController::class, 'index_entrada'])->name('transacciones.entradas.index');
Route::get('entradas/create', [TransaccionController::class, 'create_entrada'])->name('transacciones.entradas.create');
Route::post('entradas', [TransaccionController::class, 'store_entrada'])->name('transacciones.entradas.store');
Route::get('entradas/{id}/edit', [TransaccionController::class, 'edit_entrada'])->name('transacciones.entradas.edit');
Route::put('entradas/{id}', [TransaccionController::class, 'update_entrada'])->name('transacciones.entradas.update');
Route::delete('entradas/{id}/destroy', [TransaccionController::class, 'destroy_entrada'])->name('transacciones.entradas.destroy');

// Rutas para las Salidas
Route::get('salidas', [TransaccionController::class, 'index_salida'])->name('transacciones.salidas.index');
Route::get('salidas/create', [TransaccionController::class, 'create_salida'])->name('transacciones.salidas.create');
Route::post('salidas', [TransaccionController::class, 'store_salida'])->name('transacciones.salidas.store');
Route::get('salidas/{id}/edit', [TransaccionController::class, 'edit_salida'])->name('transacciones.salidas.edit');
Route::put('salidas/{id}', [TransaccionController::class, 'update_salida'])->name('transacciones.salidas.update');
Route::delete('salidas/{id}/destroy', [TransaccionController::class, 'destroy_salida'])->name('transacciones.salidas.destroy');

// Reportes
Route::get('/transacciones/entrada/{id}/pdf', [TransaccionController::class, 'generarPDF_entrada'])->name('transacciones.entradas.pdf');
Route::get('/transacciones/salida/{id}/pdf', [TransaccionController::class, 'generarPDF_salida'])->name('transacciones.salidas.pdf');
