@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <h2>Iniciar Sesión</h2>

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="password" name="password" placeholder="Contraseña">
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Ingresar</button>
    </form>
@endsection
