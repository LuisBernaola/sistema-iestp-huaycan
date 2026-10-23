@extends('layouts.app')

@section('contenido')
<h2>Detalles del Postulante</h2>
<div class="card shadow-sm p-4">
    <p><strong>ID:</strong> {{ $postulante->id }}</p>
    <p><strong>DNI:</strong> {{ $postulante->dni }}</p>
    <p><strong>Nombres y Apellidos:</strong> {{ $postulante->nombres }} {{ $postulante->apellidos }}</p>
    <p><strong>Carrera:</strong> {{ $postulante->carrera }}</p>
    <p><strong>Estado:</strong> {{ $postulante->estado }}</p>
    <a href="{{ route('postulantes.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection