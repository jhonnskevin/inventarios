php artisan migrate

php artisan make:migration create_personas_table
php artisan make:model Persona
php artisan make:controller PersonaController --resource

php artisan make:migration create_categorias_table
php artisan make:model Categoria
php artisan make:controller CategoriaController --resource


<li class="slide">
    <a href="{{ route('categorias.index') }}" class="side-menu__item">
        <i class="fe fe-layers side-menu__icon"></i>
        <span class="side-menu__label">Categorías</span>
    </a>
</li>
