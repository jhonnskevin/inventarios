<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Tipo;
use App\Models\Laboratorio;
use App\Models\Precio;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //Muesta la vista principal
    public function index()
    {
        $productos = Producto::all();
        return view("productos.index", compact("productos"));
    }

    //Muestra la vista de creacion
    public function create()
    {
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $laboratorios = Laboratorio::all();

        return view("productos.create", compact('categorias','tipos','laboratorios'));
    }

    //Realiza el registro
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string',
            'categoria_id' => 'required|integer',
            'tipo_id' => 'required|integer',
            'laboratorio_id' => 'required|integer',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',
            'precios' => 'required|array', // Asegura que 'precios' sea un arreglo
            'precios.*.tipo_precio' => 'required|string', // Tipo de precio es requerido
            'precios.*.precio' => 'required|numeric|min:0', // Precio debe ser un número y no negativo
            'precios.*.fecha_desde' => 'required|date', // Fecha desde debe ser una fecha válida
            'precios.*.fecha_hasta' => 'required|date|after_or_equal:fecha_desde', // Fecha hasta debe ser válida y posterior a fecha desde
            'precios.*.estado' => 'required|string|in:Activo,Inactivo', // Estado debe ser "Activo" o "Inactivo"
        ]);

        $producto = Producto::create($request->except('precios'));

        // Guardar precios
        foreach ($request->precios as $precioData) {
            Precio::create([
                'producto_id' => $producto->id,
                'tipo_precio' => $precioData['tipo_precio'],
                'precio' => $precioData['precio'],
                'fecha_desde' => $precioData['fecha_desde'],
                'fecha_hasta' => $precioData['fecha_hasta'],
                'estado' => $precioData['estado'],
            ]);
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    //Mostrar la vista de registro
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $laboratorios = Laboratorio::all();
        $precios = $producto->precios;
        $lotes = $producto->lotes;
        return view('productos.show', compact('producto','categorias','tipos','laboratorios','precios','lotes'));
    }

    //Mostrar la vista de edicion
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $laboratorios = Laboratorio::all();
        $precios = $producto->precios;
        $lotes = $producto->lotes;
        return view('productos.edit', compact('producto','categorias','tipos','laboratorios','precios','lotes'));
    }

    //Realiza la actualizacion de registro
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'tipo_id' => 'required|exists:tipos,id',
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'cantidad_minima' => 'required|integer|min:1',
            'requiere_receta' => 'required|boolean',
            'estado' => 'required|string|in:Activo,Inactivo',
            'descripcion' => 'nullable|string|max:500',
            'precios' => 'required|array|min:1',
            'precios.*.tipo_precio' => 'required|string|max:255',
            'precios.*.precio' => 'required|numeric|min:0',
            'precios.*.fecha_desde' => 'required|date',
            'precios.*.fecha_hasta' => 'required|date|after_or_equal:precios.*.fecha_desde',
            'precios.*.estado' => 'required|string|in:Activo,Inactivo',
        ]);

        // Encuentra el producto por ID
        $producto = Producto::findOrFail($id);

        // Actualiza los atributos del producto
        $producto->nombre = $request->nombre;
        $producto->alias = $request->alias;
        $producto->codigo = $request->codigo;
        $producto->categoria_id = $request->categoria_id;
        $producto->tipo_id = $request->tipo_id;
        $producto->laboratorio_id = $request->laboratorio_id;
        $producto->cantidad_minima = $request->cantidad_minima;
        $producto->requiere_receta = $request->requiere_receta;
        $producto->estado = $request->estado;
        $producto->descripcion = $request->descripcion;
        $producto->save();

        // Actualiza los precios
        foreach ($request->precios as $precioData) {
            // Asume que estás actualizando precios existentes
            // Puedes optar por crear nuevos o actualizar según sea necesario
            $precio = Precio::updateOrCreate(
                ['id' => $precioData['id'] ?? null, 'producto_id' => $producto->id], // Asegúrate de que `id` esté presente si estás actualizando
                [
                    'tipo_precio' => $precioData['tipo_precio'],
                    'precio' => $precioData['precio'],
                    'fecha_desde' => $precioData['fecha_desde'],
                    'fecha_hasta' => $precioData['fecha_hasta'],
                    'estado' => $precioData['estado'],
                ]
            );
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }


    //Elimina el registro
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->eliminado = true;
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'producto eliminado exitosamente.');
    }

    public function restore(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->eliminado = false;
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto restaurado exitosamente.');
    }

}
