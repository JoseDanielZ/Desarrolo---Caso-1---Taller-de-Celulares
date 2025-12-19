<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    public function index()
    {
        $reparaciones = Reparacion::all();
        return view('reparaciones.index', compact('reparaciones'));
    }

    public function create()
    {
        return view('reparaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_equipo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'problema' => 'required|string|max:1000',
            'nombre_cliente' => 'required|string|max:255',
            'telefono_cliente' => 'required|string|regex:/^[0-9+\-\s()]+$/|max:20',
            'estado' => 'required|in:pendiente,en_revision,reparando,listo,sin_arreglo',
            'costo' => 'nullable|numeric|min:0|max:999999.99',
            'fecha_entrega' => 'nullable|date|after:today',
            'observaciones' => 'nullable|string|max:1000'
        ], [
            'tipo_equipo.required' => 'El tipo de equipo es obligatorio.',
            'marca.required' => 'La marca es obligatoria.',
            'problema.required' => 'La descripción del problema es obligatoria.',
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'telefono_cliente.required' => 'El teléfono del cliente es obligatorio.',
            'telefono_cliente.regex' => 'El teléfono debe contener solo números y caracteres válidos.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
            'costo.numeric' => 'El costo debe ser un número.',
            'costo.min' => 'El costo no puede ser negativo.',
            'fecha_entrega.date' => 'La fecha de entrega debe ser una fecha válida.',
            'fecha_entrega.after' => 'La fecha de entrega debe ser posterior a hoy.',
            'max' => 'El campo :attribute no puede tener más de :max caracteres.'
        ]);

        $reparacion = new Reparacion();
        $reparacion->tipo_equipo = $request->tipo_equipo;
        $reparacion->marca = $request->marca;
        $reparacion->modelo = $request->modelo;
        $reparacion->problema = $request->problema;
        $reparacion->nombre_cliente = $request->nombre_cliente;
        $reparacion->telefono_cliente = $request->telefono_cliente;
        $reparacion->estado = $request->estado;
        $reparacion->fecha_ingreso = now();
        $reparacion->fecha_entrega = $request->fecha_entrega;
        $reparacion->costo = $request->costo;
        $reparacion->observaciones = $request->observaciones;
        $reparacion->save();

        return redirect()->route('reparaciones.index');
    }

    public function show(Reparacion $reparacione)
    {
        return view('reparaciones.show', compact('reparacione'));
    }

    public function edit(Reparacion $reparacione)
    {
        return view('reparaciones.edit', compact('reparacione'));
    }

    public function update(Request $request, Reparacion $reparacione)
    {
        $request->validate([
            'tipo_equipo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'problema' => 'required|string|max:1000',
            'nombre_cliente' => 'required|string|max:255',
            'telefono_cliente' => 'required|string|regex:/^[0-9+\-\s()]+$/|max:20',
            'estado' => 'required|in:pendiente,en_revision,reparando,listo,sin_arreglo',
            'costo' => 'nullable|numeric|min:0|max:999999.99',
            'fecha_entrega' => 'nullable|date',
            'observaciones' => 'nullable|string|max:1000'
        ], [
            'tipo_equipo.required' => 'El tipo de equipo es obligatorio.',
            'marca.required' => 'La marca es obligatoria.',
            'problema.required' => 'La descripción del problema es obligatoria.',
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'telefono_cliente.required' => 'El teléfono del cliente es obligatorio.',
            'telefono_cliente.regex' => 'El teléfono debe contener solo números y caracteres válidos.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
            'costo.numeric' => 'El costo debe ser un número.',
            'costo.min' => 'El costo no puede ser negativo.',
            'fecha_entrega.date' => 'La fecha de entrega debe ser una fecha válida.',
            'max' => 'El campo :attribute no puede tener más de :max caracteres.'
        ]);

        $reparacione->tipo_equipo = $request->tipo_equipo;
        $reparacione->marca = $request->marca;
        $reparacione->modelo = $request->modelo;
        $reparacione->problema = $request->problema;
        $reparacione->nombre_cliente = $request->nombre_cliente;
        $reparacione->telefono_cliente = $request->telefono_cliente;
        $reparacione->estado = $request->estado;
        $reparacione->fecha_entrega = $request->fecha_entrega;
        $reparacione->costo = $request->costo;
        $reparacione->observaciones = $request->observaciones;
        $reparacione->save();

        return redirect()->route('reparaciones.index');
    }

    public function destroy(Reparacion $reparacione)
    {
        $reparacione->delete();
        return redirect()->route('reparaciones.index');
    }
}