<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    //Muesta la vista principal
    public function index()
    {
        $laboratorios = Laboratorio::all();
        return view("laboratorios.index", compact("laboratorios"));
    }

    //Muestra la vista de creacion
    public function create()
    {
        return view("laboratorios.create");
    }

    //Realiza el registro
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',
        ]);

        Laboratorio::create($request->all());

        return redirect()->route('laboratorios.index')->with('success', 'Categoría creada correctamente');
    }

    //Mostrar la vista de registro
    public function show(string $id)
    {
        //
    }

    //Mostrar la vista de edicion
    public function edit(string $id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        return view('laboratorios.edit', compact('laboratorio'));
    }

    //Realiza la actualizacion de registro
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',
        ]);

        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->update($request->all());

        return redirect()->route('laboratorios.index')->with('success', 'laboratorio actualizado exitosamente');
    }

    //Elimina el registro
    public function destroy(string $id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->eliminado = true;
        $laboratorio->save();

        return redirect()->route('laboratorios.index')->with('success', 'laboratorio eliminado exitosamente.');
    }
}
