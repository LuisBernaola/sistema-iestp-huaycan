@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-tech p-4 shadow-sm">
            <h3 class="fw-bold text-white mb-3">Actualizar Estado del Trámite</h3>
            <p class="text-institutional-muted">Código: <strong>{{ $tramite->codigo_fut }}</strong> ({{ $tramite->nombres_solicitante }})</p>

            <form method="POST" action="{{ route('tramites.update', $tramite) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="form-label text-institutional-muted small fw-bold">ESTADO DEL TRÁMITE</label>
                    <select name="estado" class="form-select bg-dark text-white border-secondary" style="color-scheme: dark;">
                        <option value="PENDIENTE" {{ $tramite->estado == 'PENDIENTE' ? 'selected' : '' }}>PENDIENTE</option>
                        <option value="EN_PROCESO" {{ $tramite->estado == 'EN_PROCESO' ? 'selected' : '' }}>EN_PROCESO</option>
                        <option value="APROBADO" {{ $tramite->estado == 'APROBADO' ? 'selected' : '' }}>APROBADO</option>
                        <option value="RECHAZADO" {{ $tramite->estado == 'RECHAZADO' ? 'selected' : '' }}>RECHAZADO</option>
                    </select>
                </div>
                <button class="btn btn-success rounded-pill px-4 py-2 fw-semibold shadow-sm">Guardar Cambios</button>
                <a href="{{ route('tramites.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection