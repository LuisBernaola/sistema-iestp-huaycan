@extends('layouts.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-tech p-4 shadow-sm">
            <h3 class="fw-bold text-white mb-3">Registrar Voucher de Pago</h3>
            <form method="POST" action="{{ route('pagos.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-institutional-muted small fw-bold">DNI</label>
                        <input type="text" name="dni_persona" maxlength="8" class="form-control bg-dark text-white border-secondary" required>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label text-institutional-muted small fw-bold">NOMBRES Y APELLIDOS</label>
                        <input type="text" name="nombres_persona" class="form-control bg-dark text-white border-secondary" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-institutional-muted small fw-bold">CONCEPTO DE PAGO</label>
                    <select name="concepto" class="form-select bg-dark text-white border-secondary" style="color-scheme: dark;">
                        <option value="Derecho Examen de Admisión">Derecho Examen de Admisión</option>
                        <option value="Matrícula Semestral">Matrícula Semestral</option>
                        <option value="Constancia de Estudios">Constancia de Estudios</option>
                        <option value="Certificado Modular">Certificado Modular</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-institutional-muted small fw-bold">NÚMERO DE OPERACIÓN</label>
                        <input type="text" name="nro_operacion" class="form-control bg-dark text-white border-secondary" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-institutional-muted small fw-bold">MONTO (S/.)</label>
                        <input type="number" step="0.01" name="monto" class="form-control bg-dark text-white border-secondary" required>
                    </div>
                </div>
                <button class="btn btn-primary rounded-pill px-4 py-2 fw-semibold">Registrar Pago</button>
                <a href="{{ route('pagos.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection