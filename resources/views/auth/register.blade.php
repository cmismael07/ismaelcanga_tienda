@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <h2>Registro de Usuario</h2>

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
        @error('nombre')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="password" name="password" placeholder="Contraseña">
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña">

        <button type="submit">Registrarse</button>
    </form>
@endsection
