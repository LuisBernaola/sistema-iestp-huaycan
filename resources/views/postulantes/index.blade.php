@extends('layouts.app')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Postulantes - Admisión</h2>
    <a href="{{ route('postulantes.create') }}" class="btn btn-primary">Nuevo Postulante</a>
</div>

@if(session('ok'))
    <div class="alert alert-success">{{ session('ok') }}</div>
@endif

<table class="table table-striped table-bordered bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombres y Apellidos</th>
            <th>Carrera Profesional</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($postulantes as $postulante)
        <tr>
            <td>{{ $postulante->id }}</td>
            <td>{{ $postulante->dni }}</td>
            <td>{{ $postulante->nombres }} {{ $postulante->apellidos }}</td>
            <td>{{ $postulante->carrera }}</td>
            <td>
                <span class="badge 
                    @if($postulante->estado == 'INSCRITO') bg-secondary 
                    @elseif($postulante->estado == 'EVALUADO') bg-warning text-dark 
                    @else bg-success @endif">
                    {{ $postulante->estado }}
                </span>
            </td>
            <td>
                <a href="{{ route('postulantes.show', $postulante) }}" class="btn btn-sm btn-info text-white">Ver</a>
                <a href="{{ route('postulantes.edit', $postulante) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('postulantes.destroy', $postulante) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este postulante?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Volver al Dashboard</a>
@endsection