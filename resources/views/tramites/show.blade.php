@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card card-tech p-4 shadow-sm">
            <h3 class="fw-bold text-white mb-3">Detalle del Trámite: <span class="text-primary">{{ $tramite->codigo_fut }}</span></h3>
            <hr class="border-secondary">
            <p><strong>DNI Solicitante:</strong> {{ $tramite->dni_solicitante }}</p>
            <p><strong>Nombres:</strong> {{ $tramite->nombres_solicitante }}</p>
            <p><strong>Tipo de Solicitud:</strong> {{ $tramite->tipo_solicitud }}</p>
            <p><strong>Motivo:</strong> {{ $tramite->motivo }}</p>
            <p><strong>Estado Actual:</strong> <span class="badge bg-info text-dark">{{ $tramite->estado }}</span></p>
            <p><strong>Fecha de Creación:</strong> {{ $tramite->created_at }}</p>
            <a href="{{ route('tramites.index') }}" class="btn btn-outline-light rounded-pill mt-3 px-4">Volver</a>
        </div>
    </div>
</div>
@endsection