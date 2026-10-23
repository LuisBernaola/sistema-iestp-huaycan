@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-tech p-4 shadow-sm">
            <h3 class="fw-bold text-white mb-3">Validar Estado del Pago</h3>
            <p class="text-institutional-muted">Operación: <strong>{{ $pago->nro_operacion }}</strong> (S/. {{ $pago->monto }})</p>
            <form method="POST" action="{{ route('pagos.update', $pago) }}">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label class="form-label text-institutional-muted small fw-bold">ESTADO DE TESORERÍA</label>
                    <select name="estado" class="form-select bg-dark text-white border-secondary" style="color-scheme: dark;">
                        <option value="PENDIENTE" {{ $pago->estado == 'PENDIENTE' ? 'selected' : '' }}>PENDIENTE</option>
                        <option value="VALIDADO" {{ $pago->estado == 'VALIDADO' ? 'selected' : '' }}>VALIDADO</option>
                        <option value="OBSERVADO" {{ $pago->estado == 'OBSERVADO' ? 'selected' : '' }}>OBSERVADO</option>
                    </select>
                </div>
                <button class="btn btn-success rounded-pill px-4 py-2 fw-semibold">Actualizar Estado</button>
                <a href="{{ route('pagos.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection