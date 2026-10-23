<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostulanteController extends Controller
{
    public function index()
    {
        $postulantes = Postulante::orderBy('id')->get();
        return view('postulantes.index', compact('postulantes'));
    }

    public function create()
    {
        return view('postulantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => ['required', 'string', 'size:8', 'unique:postulantes,dni'],
            'nombres' => ['required', 'string', 'max:60'],
            'apellidos' => ['required', 'string', 'max:60'],
            'carrera' => ['required', 'string', 'max:100'],
            'estado' => ['required', 'in:INSCRITO,EVALUADO,ADMITIDO'],
        ]);

        Postulante::create($request->all());

        return redirect()->route('postulantes.index')->with('ok', 'Postulante registrado correctamente.');
    }

    public function show(Postulante $postulante)
    {
        return view('postulantes.show', compact('postulante'));
    }

    public function edit(Postulante $postulante)
    {
        return view('postulantes.edit', compact('postulante'));
    }

    public function update(Request $request, Postulante $postulante)
    {
        $request->validate([
            'dni' => [
                'required', 
                'string', 
                'size:8', 
                Rule::unique('postulantes', 'dni')->ignore($postulante->id)
            ],
            'nombres' => ['required', 'string', 'max:60'],
            'apellidos' => ['required', 'string', 'max:60'],
            'carrera' => ['required', 'string', 'max:100'],
            'estado' => ['required', 'in:INSCRITO,EVALUADO,ADMITIDO'],
        ]);

        $postulante->update($request->all());

        return redirect()->route('postulantes.index')->with('ok', 'Postulante actualizado correctamente.');
    }

    public function destroy(Postulante $postulante)
    {
        $postulante->delete();
        return redirect()->route('postulantes.index')->with('ok', 'Postulante eliminado correctamente.');
    }
}