@extends('layouts.app')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-white mb-1">Gestión de Matrículas</h2>
        <p class="text-institutional-muted small mb-0">Control de estudiantes matriculados por ciclo y carrera.</p>
    </div>
    <a href="{{ route('matriculas.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Nueva Matrícula
    </a>
</div>

<div class="card card-tech p-3 shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-tech align-middle mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DNI / Estudiante</th>
                    <th>Carrera</th>
                    <th>Ciclo</th>
                    <th>Estado</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matriculas as $mat)
                <tr>
                    <td>{{ $mat->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $mat->nombres_estudiante }}</div>
                        <small class="text-muted">DNI: {{ $mat->dni_estudiante }}</small>
                    </td>
                    <td>{{ $mat->carrera }}</td>
                    <td>{{ $mat->ciclo }}</td>
                    <td><span class="badge bg-success">{{ $mat->estado }}</span></td>
                    <td class="text-end">
                        <a href="{{ route('matriculas.show', $mat) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('matriculas.edit', $mat) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('matriculas.destroy', $mat) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar matrícula?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<a href="{{ route('dashboard') }}" class="btn btn-outline-light rounded-pill mt-4 px-4"><i class="bi bi-arrow-left me-1"></i> Volver</a>
@endsection