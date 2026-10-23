@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card card-tech shadow-lg p-4 p-md-5">
            <div class="text-center mb-4">
                <div class="inline-block p-3 bg-primary bg-opacity-10 text-primary rounded-circle mb-3 shadow-sm" style="width: 70px; height: 70px; display: inline-flex; align-items: center; justify-content: center;">
                    <i class="bi bi-shield-lock-fill fs-2 text-primary"></i>
                </div>
                <h3 class="fw-bold text-white mb-1">IESTP Huaycán</h3>
                <p class="text-institutional-muted small">Sistema de Gestión Institucional</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-institutional-muted small fw-bold">CORREO ELECTRÓNICO</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-primary"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" name="email" class="form-control bg-dark text-white border-secondary py-2" value="{{ old('email') }}" placeholder="admin@ejemplo.test" required autofocus style="color-scheme: dark;">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-institutional-muted small fw-bold">CONTRASEÑA</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-primary"><i class="bi bi-key-fill"></i></span>
                        <input type="password" name="password" class="form-control bg-dark text-white border-secondary py-2" placeholder="••••••••" required style="color-scheme: dark;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold shadow-sm">
                    Acceder al Sistema <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection