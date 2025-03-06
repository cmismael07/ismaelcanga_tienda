@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Bienvenido, {{ auth()->user()->nombre }}</h1>

    @if(auth()->user()->admin) 
        <!-- Opciones para Admin -->
        <div class="list-group">
            <a href="{{ route('productos.index') }}" class="list-group-item list-group-item-action">Lista de Productos</a>
            <a href="{{ route('categorias.create') }}" class="list-group-item list-group-item-action">Agregar Categoría</a>
            <a href="{{ route('usuarios.create') }}" class="list-group-item list-group-item-action">Registrar Usuario</a>
        </div>
    @else
        <!-- Opciones para Usuario normal -->
        <div class="list-group">
            <a href="{{ route('compras.create') }}" class="list-group-item list-group-item-action">Comprar Producto</a>
        </div>
    @endif
</div>
@endsection
