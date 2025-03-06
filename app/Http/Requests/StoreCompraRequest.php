<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Producto;
use App\Models\Usuario;

class StoreCompraRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check(); // Solo usuarios autenticados pueden acceder
    }

    public function rules()
    {
        return [
            'producto_id' => [
                'required',
                'exists:productos,id', // Verifica que el producto existe
                function ($attribute, $value, $fail) {
                    $producto = Producto::find($value);
                    if (!$producto || !$producto->estado) {
                        $fail('El producto no está activo.');
                    }
                },
            ],
            'cantidad' => ['required', 'integer', 'min:1'],
            'comprador_id' => [
                'required',
                'exists:usuarios,id', // Verifica que el comprador existe en la BD
                function ($attribute, $value, $fail) {
                    $comprador = Usuario::find($value);
                    if (!$comprador) {
                        $fail('El comprador no existe.');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'producto_id.required' => 'Debe seleccionar un producto.',
            'producto_id.exists' => 'El producto seleccionado no existe.',
            'cantidad.required' => 'Debe ingresar una cantidad.',
            'cantidad.min' => 'La cantidad debe ser mayor a 0.',
            'comprador_id.required' => 'Debe seleccionar un comprador.',
            'comprador_id.exists' => 'El comprador no existe.',
        ];
    }
}
