@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-tech p-4 shadow-sm">
            <h3 class="fw-bold text-white mb-3">Detalle de Matrícula</h3>
            <p><strong>DNI:</strong> {{ $matricula->dni_estudiante }}</p>
            <p><strong>Estudiante:</strong> {{ $matricula->nombres_estudiante }}</p>
            <p><strong>Carrera:</strong> {{ $matricula->carrera }}</p>
            <p><strong>Ciclo:</strong> {{ $matricula->ciclo }}</p>
            <p><strong>Estado:</strong> <span class="badge bg-success">{{ $matricula->estado }}</span></p>
            <a href="{{ route('matriculas.index') }}" class="btn btn-outline-light rounded-pill mt-3 px-4">Volver</a>
        </div>
    </div>
</div>
@endsection