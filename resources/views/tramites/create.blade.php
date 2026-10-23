@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-tech p-4 shadow-sm">
            <h3 class="fw-bold text-white mb-3">Nuevo Formato Único de Trámite (FUT)</h3>
            
            <form method="POST" action="{{ route('tramites.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-institutional-muted small fw-bold">DNI DEL SOLICITANTE</label>
                        <input type="text" name="dni_solicitante" maxlength="8" class="form-control bg-dark text-white border-secondary" value="{{ old('dni_solicitante') }}" required>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label text-institutional-muted small fw-bold">NOMBRES Y APELLIDOS</label>
                        <input type="text" name="nombres_solicitante" class="form-control bg-dark text-white border-secondary" value="{{ old('nombres_solicitante') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-institutional-muted small fw-bold">TIPO DE SOLICITUD</label>
                    <select name="tipo_solicitud" class="form-select bg-dark text-white border-secondary" required style="color-scheme: dark;">
                        <option value="Certificado de Estudios">Certificado de Estudios</option>
                        <option value="Constancia de Matrícula">Constancia de Matrícula</option>
                        <option value="Constancia de Tercios Superior">Constancia de Tercios Superior</option>
                        <option value="Convalidación de Unidades Didácticas">Convalidación de Unidades Didácticas</option>
                        <option value="Otro Trámite Administrativo">Otro Trámite Administrativo</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label text-institutional-muted small fw-bold">MOTIVO O DETALLE DE LA SOLICITUD</label>
                    <textarea name="motivo" rows="4" class="form-control bg-dark text-white border-secondary" required>{{ old('motivo') }}</textarea>
                </div>

                <button class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm">Generar FUT</button>
                <a href="{{ route('tramites.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection