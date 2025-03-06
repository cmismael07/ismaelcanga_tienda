@extends('layouts.app')

@section('title', 'Registrar Compra')

@section('content')
<div class="container">
    <h2 class="text-center">Registrar Compra</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('compras.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="producto_id" class="form-label">Seleccionar Producto</label>
            <select name="producto_id" id="producto_id" class="form-control">
                <option value="">Seleccione un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }} (Stock: {{ $producto->cantidad }})</option>
                @endforeach
            </select>
            @error('producto_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" value="{{ old('cantidad') }}">
            @error('cantidad') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="comprador_id" class="form-label">Seleccionar Comprador</label>
            <select name="comprador_id" id="comprador_id" class="form-control">
                <option value="">Seleccione un comprador</option>
                @foreach($compradores as $comprador)
                    <option value="{{ $comprador->id }}">{{ $comprador->nombre }}</option>
                @endforeach
            </select>
            @error('comprador_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">Registrar Compra</button>
    </form>
</div>
@endsection
