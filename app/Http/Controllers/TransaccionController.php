<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Transaccion;

class TransaccionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_comprador' => 'required|exists:usuarios,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::find($request->id_producto);
        $comprador = Usuario::find($request->id_comprador);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        if (!$comprador) {
            return response()->json(['message' => 'Comprador no encontrado'], 404);
        }

        $vendedor = Usuario::find($producto->id_vendedor);
        if (!$vendedor) {
            return response()->json(['message' => 'Vendedor no encontrado'], 404);
        }

        if ($producto->cantidad < $request->cantidad) {
            return response()->json(['message' => 'Stock insuficiente'], 400);
        }

        // Registrar la transacción
        $transaccion = Transaccion::create([
            'id_comprador' => $request->id_comprador,
            'id_producto' => $request->id_producto,
            'cantidad' => $request->cantidad,
        ]);

        // Actualizar el stock del producto
        $producto->cantidad -= $request->cantidad;
        $producto->save();

        return response()->json(['message' => 'Compra realizada exitosamente', 'transaccion' => $transaccion], 201);
    }
}
