@extends('layouts.app')

@section('contenido')
<div class="mb-4">
    <h2 class="fw-bold text-white">Panel de Administración</h2>
    <p class="text-institutional-muted">Bienvenido al sistema institucional del IESTP Huaycán, <strong class="text-white">{{ Auth::user()->name }}</strong>.</p>
</div>

<!-- Tarjetas de Estadísticas -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card card-tech p-4 border-start border-primary border-4 shadow-sm">
            <h6 class="text-uppercase small text-institutional-muted fw-bold mb-2">Usuarios Registrados</h6>
            <h2 class="fw-bold text-white mb-0 display-6">{{ $totalUsuarios ?? 1 }}</h2>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card card-tech p-4 border-start border-success border-4 shadow-sm">
            <h6 class="text-uppercase small text-institutional-muted fw-bold mb-2">Postulantes Inscritos</h6>
            <h2 class="fw-bold text-white mb-0 display-6">{{ $totalPostulantes ?? 0 }}</h2>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card card-tech p-4 border-start border-warning border-4 shadow-sm">
            <h6 class="text-uppercase small text-institutional-muted fw-bold mb-2">Postulantes Admitidos</h6>
            <h2 class="fw-bold text-white mb-0 display-6">{{ $totalAdmitidos ?? 0 }}</h2>
        </div>
    </div>
</div>

<!-- Módulos -->
<h4 class="fw-bold text-white mb-3">Módulos Académicos</h4>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card card-tech p-4 h-100 d-flex flex-column justify-content-between shadow-sm">
            <div>
                <h5 class="fw-bold text-primary mb-2"><i class="bi bi-people me-2"></i>Gestión de Usuarios</h5>
                <p class="text-institutional-muted small mb-3">Administre las cuentas de acceso y credenciales del personal administrativo del instituto.</p>
            </div>
            <a href="{{ route('usuarios.index') }}" class="btn btn-primary rounded-pill px-4 py-2 align-self-start fw-semibold shadow-sm">Administrar</a>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card card-tech p-4 h-100 d-flex flex-column justify-content-between shadow-sm">
            <div>
                <h5 class="fw-bold text-success mb-2"><i class="bi bi-mortarboard me-2"></i>Admisión / Postulantes</h5>
                <p class="text-institutional-muted small mb-3">Control de inscripciones de postulantes, carreras profesionales y estados de evaluación para el examen.</p>
            </div>
            <a href="{{ route('postulantes.index') }}" class="btn btn-success rounded-pill px-4 py-2 align-self-start fw-semibold shadow-sm">Administrar</a>
        </div>
    </div>
    <!-- Tarjetas de Estadísticas (Añadir la 4ta tarjeta) -->
    <div class="col-md-3 mb-3">
        <div class="card card-tech p-4 border-start border-info border-4 shadow-sm">
             <h6 class="text-uppercase small text-institutional-muted fw-bold mb-2">Trámites FUT</h6>
            <h2 class="fw-bold text-white mb-0 display-6">{{ $totalTramites ?? 0 }}</h2>
        </div>
    </div>
</div>
@endsection