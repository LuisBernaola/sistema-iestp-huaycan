@extends('layouts.app')

@section('contenido')
<h2>Inscribir Nuevo Postulante</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('postulantes.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">DNI</label>
        <input type="text" name="dni" maxlength="8" class="form-control" value="{{ old('dni') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombres</label>
        <input type="text" name="nombres" class="form-control" value="{{ old('nombres') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Carrera Profesional</label>
        <select name="carrera" class="form-select" required>
            <option value="Diseño y Programación Web">Diseño y Programación Web</option>
            <option value="Computación e Informática">Computación e Informática</option>
            <option value="Electricidad Industrial">Electricidad Industrial</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Estado de Admisión</label>
        <select name="estado" class="form-select">
            <option value="INSCRITO">INSCRITO</option>
            <option value="EVALUADO">EVALUADO</option>
            <option value="ADMITIDO">ADMITIDO</option>
        </select>
    </div>
    <button class="btn btn-success">Guardar Postulante</button>
    <a href="{{ route('postulantes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection