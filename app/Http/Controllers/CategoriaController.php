<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Mostrar formulario de creación
    public function create()
    {
        return view('categorias.create');
    }

    // Almacenar nueva categoría
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:200',
        ]);

        // Crear y guardar la categoría
        $categoria = new Categoria();
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Categoría creada exitosamente');
    }
}

