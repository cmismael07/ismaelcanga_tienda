@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Bienvenido al Dashboard</h2>
    <p>Has iniciado sesión correctamente.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>
@endsection
