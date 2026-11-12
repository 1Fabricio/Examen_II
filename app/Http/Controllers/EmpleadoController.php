<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::latest()->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate(Empleado::reglas());

        Empleado::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', '¡Empleado registrado correctamente en el sistema!');
    }

    public function show(Empleado $empleado)
    {
        return redirect()->route('empleados.edit', $empleado);
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate(Empleado::reglas($empleado->id));

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
            ->with('success', '¡Datos del empleado actualizados con éxito!');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', '¡Empleado eliminado de la nómina correctamente!');
    }
}