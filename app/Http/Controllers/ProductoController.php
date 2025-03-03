<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Usuario;

class ProductoController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        return response()->json(Producto::all(), 200);
    }

    // Insertar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:200',
            'cantidad' => 'required|integer|min:0',
            'estado' => 'required|boolean',
            'id_vendedor' => 'required|exists:usuarios,id',
        ]);

        $producto = Producto::create($request->all());

        return response()->json(['message' => 'Producto creado', 'producto' => $producto], 201);
    }

    // Mostrar un solo producto
    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto, 200);
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'descripcion' => 'sometimes|string|max:200',
            'cantidad' => 'sometimes|integer|min:0',
            'estado' => 'sometimes|boolean',
            'id_vendedor' => 'sometimes|exists:usuarios,id',
        ]);

        $producto->update($request->all());

        return response()->json(['message' => 'Producto actualizado', 'producto' => $producto], 200);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado'], 200);
    }
}
