<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::orderBy('id', 'desc')->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni_persona' => ['required', 'string', 'size:8'],
            'nombres_persona' => ['required', 'string', 'max:100'],
            'concepto' => ['required', 'string', 'max:100'],
            'nro_operacion' => ['required', 'string', 'unique:pagos,nro_operacion'],
            'monto' => ['required', 'numeric'],
        ]);

        Pago::create($request->all());

        return redirect()->route('pagos.index')->with('ok', 'Voucher registrado con éxito.');
    }

    public function show(Pago $pago)
    {
        return view('pagos.show', compact('pago'));
    }

    public function edit(Pago $pago)
    {
        return view('pagos.edit', compact('pago'));
    }

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'estado' => ['required', 'in:PENDIENTE,VALIDADO,OBSERVADO'],
        ]);

        $pago->update($request->only('estado'));

        return redirect()->route('pagos.index')->with('ok', 'Estado del pago actualizado.');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('ok', 'Registro de pago eliminado.');
    }
}