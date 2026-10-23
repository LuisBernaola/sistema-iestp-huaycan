<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function index()
    {
        $tramites = Tramite::orderBy('id', 'desc')->get();
        return view('tramites.index', compact('tramites'));
    }

    public function create()
    {
        return view('tramites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni_solicitante' => ['required', 'string', 'size:8'],
            'nombres_solicitante' => ['required', 'string', 'max:100'],
            'tipo_solicitud' => ['required', 'string', 'max:100'],
            'motivo' => ['required', 'string'],
        ]);

        // Generar un código único automático Ej: FUT-2026-001
        $nuevoCodigo = 'FUT-' . date('Y') . '-' . str_pad(Tramite::count() + 1, 3, '0', STR_PAD_LEFT);

        Tramite::create([
            'codigo_fut' => $nuevoCodigo,
            'dni_solicitante' => $request->dni_solicitante,
            'nombres_solicitante' => $request->nombres_solicitante,
            'tipo_solicitud' => $request->tipo_solicitud,
            'motivo' => $request->motivo,
            'estado' => 'PENDIENTE',
        ]);

        return redirect()->route('tramites.index')->with('ok', 'FUT registrado con éxito. Código: ' . $nuevoCodigo);
    }

    public function show(Tramite $tramite)
    {
        return view('tramites.show', compact('tramite'));
    }

    public function edit(Tramite $tramite)
    {
        return view('tramites.edit', compact('tramite'));
    }

    public function update(Request $request, Tramite $tramite)
    {
        $request->validate([
            'estado' => ['required', 'in:PENDIENTE,EN_PROCESO,APROBADO,RECHAZADO'],
        ]);

        $tramite->update($request->only('estado'));

        return redirect()->route('tramites.index')->with('ok', 'Estado del trámite actualizado correctamente.');
    }

    public function destroy(Tramite $tramite)
    {
        $tramite->delete();
        return redirect()->route('tramites.index')->with('ok', 'Trámite eliminado correctamente.');
    }
}