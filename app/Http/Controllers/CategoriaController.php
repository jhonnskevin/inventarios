<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //Muesta la vista principal
    public function index()
    {
        $categorias = Categoria::all();
        return view("categorias.index", compact("categorias"));
    }

    //Muestra la vista de creacion
    public function create()
    {
        return view("categorias.create");
    }

    //Realiza el registro
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente');
    }

    //Mostrar la vista de registro
    public function show(string $id)
    {
        //
    }

    //Mostrar la vista de edicion
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    //Realiza la actualizacion de registro
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria actualizado exitosamente');
    }

    //Elimina el registro
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->eliminado = true;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria eliminado exitosamente.');
    }
}
