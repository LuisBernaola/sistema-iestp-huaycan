@extends('layouts.app')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-white mb-1">Tesorería / Validación de Vouchers</h2>
        <p class="text-institutional-muted small mb-0">Control de pagos por derechos de admisión, matrícula y constancias.</p>
    </div>
    <a href="{{ route('pagos.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Registrar Voucher
    </a>
</div>

<div class="card card-tech p-3 shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-tech align-middle mb-0">
            <thead>
                <tr>
                    <th>Nro Operación</th>
                    <th>Solicitante</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $pago)
                <tr>
                    <td class="fw-bold text-primary">{{ $pago->nro_operacion }}</td>
                    <td>
                        <div>{{ $pago->nombres_persona }}</div>
                        <small class="text-muted">DNI: {{ $pago->dni_persona }}</small>
                    </td>
                    <td>{{ $pago->concepto }}</td>
                    <td>S/. {{ number_format($pago->monto, 2) }}</td>
                    <td>
                        <span class="badge 
                            @if($pago->estado == 'PENDIENTE') bg-secondary 
                            @elseif($pago->estado == 'VALIDADO') bg-success 
                            @else bg-danger @endif">
                            {{ $pago->estado }}
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('pagos.show', $pago) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('pagos.edit', $pago) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('pagos.destroy', $pago) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar registro?');">
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