<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:personas',
            'tipo' => 'required|string|max:255',
            'estado' => 'required|string',
        ]);

        Persona::create($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona creado exitosamente');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255',
            'tipo' => 'required|string|max:255',
            'estado' => 'required|string',
        ]);

        $persona = Persona::findOrFail($id);
        $persona->update($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->eliminado = true;
        $persona->save();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    }
}

