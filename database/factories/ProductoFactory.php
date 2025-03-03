<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Usuario;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'cantidad' => $this->faker->numberBetween(1, 100),
            'estado' => $this->faker->boolean,
            'id_vendedor' => Usuario::inRandomOrder()->first()->id ?? Usuario::factory(),
        ];
    }
}
