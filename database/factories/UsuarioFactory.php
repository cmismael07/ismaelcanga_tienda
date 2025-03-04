<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Usuario;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Contraseña por defecto
            'remember_token' => Str::random(10),
            'verificado' => $this->faker->boolean,
            'verificacion_token' => $this->faker->boolean,
            'admin' => $this->faker->boolean(10), // 10% de probabilidad de ser admin
        ];
    }
}


