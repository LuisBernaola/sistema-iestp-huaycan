@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-tech p-4 shadow-sm">
            <h3 class="fw-bold text-white mb-3">Detalle del Voucher</h3>
            <p><strong>Operación:</strong> {{ $pago->nro_operacion }}</p>
            <p><strong>DNI:</strong> {{ $pago->dni_persona }}</p>
            <p><strong>Persona:</strong> {{ $pago->nombres_persona }}</p>
            <p><strong>Concepto:</strong> {{ $pago->concepto }}</p>
            <p><strong>Monto:</strong> S/. {{ number_format($pago->monto, 2) }}</p>
            <p><strong>Estado:</strong> <span class="badge bg-success">{{ $pago->estado }}</span></p>
            <a href="{{ route('pagos.index') }}" class="btn btn-outline-light rounded-pill mt-3 px-4">Volver</a>
        </div>
    </div>
</div>
@endsection