@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-tech p-4 shadow-sm">
            <h3 class="fw-bold text-white mb-3">Registrar Nueva Matrícula</h3>
            <form method="POST" action="{{ route('matriculas.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-institutional-muted small fw-bold">DNI</label>
                        <input type="text" name="dni_estudiante" maxlength="8" class="form-control bg-dark text-white border-secondary" required>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label text-institutional-muted small fw-bold">NOMBRES Y APELLIDOS</label>
                        <input type="text" name="nombres_estudiante" class="form-control bg-dark text-white border-secondary" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-institutional-muted small fw-bold">CARRERA PROFESIONAL</label>
                    <select name="carrera" class="form-select bg-dark text-white border-secondary" style="color-scheme: dark;">
                        <option value="Diseño y Programación Web">Diseño y Programación Web</option>
                        <option value="Computación e Informática">Computación e Informática</option>
                        <option value="Electricidad Industrial">Electricidad Industrial</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label text-institutional-muted small fw-bold">CICLO ACADÉMICO</label>
                    <select name="ciclo" class="form-select bg-dark text-white border-secondary" style="color-scheme: dark;">
                        <option value="I Ciclo">I Ciclo</option>
                        <option value="II Ciclo">II Ciclo</option>
                        <option value="III Ciclo">III Ciclo</option>
                        <option value="IV Ciclo">IV Ciclo</option>
                        <option value="V Ciclo">V Ciclo</option>
                        <option value="VI Ciclo">VI Ciclo</option>
                    </select>
                </div>
                <button class="btn btn-primary rounded-pill px-4 py-2 fw-semibold">Guardar Matrícula</button>
                <a href="{{ route('matriculas.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection