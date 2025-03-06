<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $usuarios = Usuario::all(); 
        
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias', 'usuarios'));

        
    
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:1',
            'id_vendedor' => 'required|exists:usuarios,id',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'estado' => 0, // Inactivo por defecto
            'id_vendedor' => $request->id_vendedor,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado.');
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }

    public function activar(Producto $producto)
    {
        $producto->update(['estado' => 1]);
        return redirect()->route('productos.index')->with('success', 'Producto activado.');
    }
}
