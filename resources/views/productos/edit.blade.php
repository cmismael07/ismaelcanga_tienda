@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4"> 
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-center">Editar Producto</h4>
                </div>
                <div class="card-body">

                    {{-- Mensajes de error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulario de edición --}}
                    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" 
                                   value="{{ old('nombre', $producto->nombre) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label fw-bold">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="cantidad" class="form-label fw-bold">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control"
                                       min="1" value="{{ old('cantidad', $producto->cantidad) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="id_vendedor" class="form-label fw-bold">Vendedor ID:</label>
                                <input type="number" name="id_vendedor" id="id_vendedor" class="form-control"
                                       value="{{ old('id_vendedor', $producto->id_vendedor) }}" required>
                            </div>
                        </div>

                        <div class="form-check mt-3">
                            <input type="checkbox" name="estado" id="estado" class="form-check-input" 
                                   {{ $producto->estado ? 'checked' : '' }}>
                            <label for="estado" class="form-check-label fw-bold">Activar Producto</label>
                        </div>

                        <div class="mt-4 text-center">
                            <button type="submit" class="btn btn-primary px-4">Actualizar Producto</button>
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
