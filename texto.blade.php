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
composer require barryvdh/laravel-dompdf
