<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaccion;
use App\Models\Producto;
use App\Models\Usuario;

class TransaccionFactory extends Factory
{
    protected $model = Transaccion::class;

    public function definition()
    {
        $producto = Producto::inRandomOrder()->first() ?? Producto::factory();
        $comprador = Usuario::where('id', '!=', $producto->id_vendedor)->inRandomOrder()->first() ?? Usuario::factory();

        return [
            'cantidad' => $this->faker->numberBetween(1, 5),
            'id_comprador' => $comprador->id,
            'id_producto' => $producto->id,
        ];
    }
}
