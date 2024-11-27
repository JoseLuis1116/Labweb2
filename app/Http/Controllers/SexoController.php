<?php

namespace App\Http\Controllers;

use App\Models\Sexo;
use Illuminate\Http\Request;

class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los sexos
        $sexos = Sexo::all();
        return view('sexos.index', compact('sexos')); // Pasar los sexos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sexos.create'); // Mostrar la vista para crear un nuevo sexo
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'sex_nombre' => 'required|string|max:60', // Nombre del sexo, requerido y con un máximo de 60 caracteres
        ]);

        // Crear un nuevo registro de sexo
        Sexo::create([
            'sex_nombre' => $request->sex_nombre,
        ]);

        // Redirigir a la lista de sexos después de guardar
        return redirect()->route('sexos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar un sexo específico (no es necesario en este caso, puedes omitirlo si no lo necesitas)
        $sexo = Sexo::findOrFail($id);
        return view('sexos.show', compact('sexo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el sexo por ID
        $sexo = Sexo::findOrFail($id);
        return view('sexos.edit', compact('sexo')); // Mostrar la vista para editar el sexo
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'sex_nombre' => 'required|string|max:60', // Validación del nombre
        ]);

        // Encontrar el sexo y actualizarlo
        $sexo = Sexo::findOrFail($id);
        $sexo->update([
            'sex_nombre' => $request->sex_nombre,
        ]);

        // Redirigir a la lista de sexos después de actualizar
        return redirect()->route('sexos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encontrar el sexo y eliminarlo
        $sexo = Sexo::findOrFail($id);
        $sexo->delete();

        // Redirigir a la lista de sexos después de eliminar
        return redirect()->route('sexos.index');
    }
}
