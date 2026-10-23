@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-tech p-4 shadow-sm">
            <h3 class="fw-bold text-white mb-3">Editar Matrícula</h3>
            <form method="POST" action="{{ route('matriculas.update', $matricula) }}">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label text-institutional-muted small fw-bold">DNI</label>
                    <input type="text" name="dni_estudiante" value="{{ $matricula->dni_estudiante }}" class="form-control bg-dark text-white border-secondary" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-institutional-muted small fw-bold">ESTUDIANTE</label>
                    <input type="text" name="nombres_estudiante" value="{{ $matricula->nombres_estudiante }}" class="form-control bg-dark text-white border-secondary" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-institutional-muted small fw-bold">CICLO</label>
                    <input type="text" name="ciclo" value="{{ $matricula->ciclo }}" class="form-control bg-dark text-white border-secondary" required>
                </div>
                <div class="mb-4">
                    <label class="form-label text-institutional-muted small fw-bold">ESTADO</label>
                    <select name="estado" class="form-select bg-dark text-white border-secondary" style="color-scheme: dark;">
                        <option value="MATRICULADO" {{ $matricula->estado == 'MATRICULADO' ? 'selected' : '' }}>MATRICULADO</option>
                        <option value="RETIRADO" {{ $matricula->estado == 'RETIRADO' ? 'selected' : '' }}>RETIRADO</option>
                        <option value="EGRESADO" {{ $matricula->estado == 'EGRESADO' ? 'selected' : '' }}>EGRESADO</option>
                    </select>
                </div>
                <button class="btn btn-success rounded-pill px-4 py-2 fw-semibold">Actualizar</button>
                <a href="{{ route('matriculas.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection