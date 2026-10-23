<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::orderBy('id', 'desc')->get();
        return view('matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        return view('matriculas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni_estudiante' => ['required', 'string', 'size:8'],
            'nombres_estudiante' => ['required', 'string', 'max:100'],
            'carrera' => ['required', 'string', 'max:100'],
            'ciclo' => ['required', 'string', 'max:20'],
        ]);

        Matricula::create($request->all());

        return redirect()->route('matriculas.index')->with('ok', 'Matrícula registrada correctamente.');
    }

    public function show(Matricula $matricula)
    {
        return view('matriculas.show', compact('matricula'));
    }

    public function edit(Matricula $matricula)
    {
        return view('matriculas.edit', compact('matricula'));
    }

    public function update(Request $request, Matricula $matricula)
    {
        $request->validate([
            'dni_estudiante' => ['required', 'string', 'size:8'],
            'nombres_estudiante' => ['required', 'string', 'max:100'],
            'carrera' => ['required', 'string', 'max:100'],
            'ciclo' => ['required', 'string', 'max:20'],
            'estado' => ['required', 'in:MATRICULADO,RETIRADO,EGRESADO'],
        ]);

        $matricula->update($request->all());

        return redirect()->route('matriculas.index')->with('ok', 'Matrícula actualizada correctamente.');
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return redirect()->route('matriculas.index')->with('ok', 'Matrícula eliminada correctamente.');
    }
}