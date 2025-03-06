<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('usuarios.create');
    }

    // Método para almacenar al nuevo usuario
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }
}
