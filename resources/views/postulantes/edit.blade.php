@extends('layouts.app')

@section('contenido')
<h2>Editar Datos del Postulante</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('postulantes.update', $postulante) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">DNI</label>
        <input type="text" name="dni" maxlength="8" class="form-control" value="{{ old('dni', $postulante->dni) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombres</label>
        <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $postulante->nombres) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $postulante->apellidos) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Carrera Profesional</label>
        <select name="carrera" class="form-select" required>
            <option value="Diseño y Programación Web" {{ $postulante->carrera == 'Diseño y Programación Web' ? 'selected' : '' }}>Diseño y Programación Web</option>
            <option value="Computación e Informática" {{ $postulante->carrera == 'Computación e Informática' ? 'selected' : '' }}>Computación e Informática</option>
            <option value="Electricidad Industrial" {{ $postulante->carrera == 'Electricidad Industrial' ? 'selected' : '' }}>Electricidad Industrial</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Estado de Admisión</label>
        <select name="estado" class="form-select">
            <option value="INSCRITO" {{ $postulante->estado == 'INSCRITO' ? 'selected' : '' }}>INSCRITO</option>
            <option value="EVALUADO" {{ $postulante->estado == 'EVALUADO' ? 'selected' : '' }}>EVALUADO</option>
            <option value="ADMITIDO" {{ $postulante->estado == 'ADMITIDO' ? 'selected' : '' }}>ADMITIDO</option>
        </select>
    </div>
    <button class="btn btn-success">Actualizar Postulante</button>
    <a href="{{ route('postulantes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection