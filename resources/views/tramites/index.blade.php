@extends('layouts.app')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-white mb-1">Trámite Documentario (FUT Digital)</h2>
        <p class="text-institutional-muted small mb-0">Gestión de solicitudes y documentos institucionales.</p>
    </div>
    <a href="{{ route('tramites.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Nuevo FUT
    </a>
</div>

<div class="card card-tech p-3 shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-tech align-middle mb-0">
            <thead>
                <tr>
                    <th>Código FUT</th>
                    <th>DNI / Solicitante</th>
                    <th>Tipo de Solicitud</th>
                    <th>Estado</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tramites as $tramite)
                <tr>
                    <td class="fw-bold text-primary">{{ $tramite->codigo_fut }}</td>
                    <td>
                        <div>{{ $tramite->nombres_solicitante }}</div>
                        <small class="text-muted">DNI: {{ $tramite->dni_solicitante }}</small>
                    </td>
                    <td>{{ $tramite->tipo_solicitud }}</td>
                    <td>
                        <span class="badge 
                            @if($tramite->estado == 'PENDIENTE') bg-secondary 
                            @elseif($tramite->estado == 'EN_PROCESO') bg-info text-dark 
                            @elseif($tramite->estado == 'APROBADO') bg-success 
                            @else bg-danger @endif">
                            {{ $tramite->estado }}
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('tramites.show', $tramite) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('tramites.edit', $tramite) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('tramites.destroy', $tramite) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este trámite?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<a href="{{ route('dashboard') }}" class="btn btn-outline-light rounded-pill mt-4 px-4"><i class="bi bi-arrow-left me-1"></i> Volver al Dashboard</a>
@endsection