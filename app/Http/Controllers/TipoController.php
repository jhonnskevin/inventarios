<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    //Muesta la vista principal
    public function index()
    {
        $tipos = Tipo::all();
        return view("tipos.index", compact("tipos"));
    }

    //Muestra la vista de creacion
    public function create()
    {
        return view("tipos.create");
    }

    //Realiza el registro
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',
        ]);

        Tipo::create($request->all());

        return redirect()->route('tipos.index')->with('success', 'Categoría creada correctamente');
    }

    //Mostrar la vista de registro
    public function show(string $id)
    {
        //
    }

    //Mostrar la vista de edicion
    public function edit(string $id)
    {
        $tipo = Tipo::findOrFail($id);
        return view('tipos.edit', compact('tipo'));
    }

    //Realiza la actualizacion de registro
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',
        ]);

        $tipo = Tipo::findOrFail($id);
        $tipo->update($request->all());

        return redirect()->route('tipos.index')->with('success', 'tipo actualizado exitosamente');
    }

    //Elimina el registro
    public function destroy(string $id)
    {
        $tipo = Tipo::findOrFail($id);
        $tipo->eliminado = true;
        $tipo->save();

        return redirect()->route('tipos.index')->with('success', 'tipo eliminado exitosamente.');
    }
}
