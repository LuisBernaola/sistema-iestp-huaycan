@extends('layouts.app')

@section('contenido')
<h2>Editar usuario</h2>

<form method="POST" action="{{ route('usuarios.update', $usuario) }}">
    @csrf
    @method('PUT')

    <label>Nombre</label>
    <input name="name" class="form-control mb-2" value="{{ old('name', $usuario->name) }}" required>

    <label>Correo</label>
    <input type="email" name="email" class="form-control mb-2" value="{{ old('email', $usuario->email) }}" required>

    <label>Nueva contraseña (opcional)</label>
    <input type="password" name="password" class="form-control mb-2">

    <label>Confirmar contraseña</label>
    <input type="password" name="password_confirmation" class="form-control mb-2">

    <button class="btn btn-success">Actualizar</button>
    <a class="btn btn-secondary" href="{{ route('usuarios.index') }}">Cancelar</a>
</form>
@endsection