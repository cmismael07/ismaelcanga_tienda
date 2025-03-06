<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCompraRequest;
use App\Models\Transaccion;
use App\Models\Producto;
use App\Models\Usuario;

class CompraController extends Controller
{
    public function __construct()
    {
       
    }

    public function create()
    {
        // Obtener solo los productos activos
        $productos = Producto::where('estado', 1)->get();
        // Obtener solo los usuarios que pueden comprar (asumimos que no son admin)
        $compradores = Usuario::where('admin', 0)->get();

        return view('compras.create', compact('productos', 'compradores'));
    }

    public function store(StoreCompraRequest $request)
    {
        $producto = Producto::find($request->producto_id);

        if ($producto->cantidad < $request->cantidad) {
            return back()->withErrors(['cantidad' => 'No hay suficiente stock.'])->withInput();
        }

        // Restar cantidad del producto
        $producto->cantidad -= $request->cantidad;
        $producto->save();

        // Registrar la transacción
        Transaccion::create([
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'comprador_id' => $request->comprador_id,
        ]);

        return redirect()->route('compras.create')->with('success', 'Compra registrada exitosamente.');
    }
}

