@extends('layouts.app')

@section('title', 'Nueva Reparacion')

@section('content')
<style>
h1 { color: #007bff; text-align: center; margin-bottom: 30px; }
h3 { color: #28a745; margin-top: 25px; border-bottom: 2px solid #28a745; padding-bottom: 5px; }
label { display: block; margin-top: 15px; font-weight: bold; color: #495057; }
input, select, textarea { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ced4da; border-radius: 5px; font-size: 16px; }
input:focus, select:focus, textarea:focus { border-color: #007bff; outline: none; box-shadow: 0 0 5px rgba(0,123,255,0.5); }
button { background: #28a745; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s; }
button:hover { background: #218838; }
a { color: #007bff; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: background-color 0.3s; }
a:hover { background-color: #e9ecef; }
form { max-width: 600px; margin: 0 auto; background: #f8f9fa; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
</style>

<h1>Registrar Nueva Reparación</h1>

<form action="{{ route('reparaciones.store') }}" method="POST">
    @csrf

    <h3>Información del Equipo</h3>

    <label>Tipo de Equipo</label>
    <select name="tipo_equipo" required>
        <option value="">Seleccionar</option>
        <option value="Celular">Celular</option>
        <option value="Tablet">Tablet</option>
        <option value="Laptop">Laptop</option>
        <option value="Smartwatch">Smartwatch</option>
        <option value="Otro">Otro</option>
    </select>

    <label>Marca</label>
    <input type="text" name="marca" required>
    @error('marca') <small style="color: red;">{{ $message }}</small> @enderror

    <label>Modelo</label>
    <input type="text" name="modelo">
    @error('modelo') <small style="color: red;">{{ $message }}</small> @enderror

    <label>Problema</label>
    <textarea name="problema" required placeholder="Describe el problema"></textarea>
    @error('problema') <small style="color: red;">{{ $message }}</small> @enderror

    <h3>Datos del Cliente</h3>

    <label>Nombre</label>
    <input type="text" name="nombre_cliente" required placeholder="Nombre completo">

    <label>Teléfono</label>
    <input type="text" name="telefono_cliente" required placeholder="Número de teléfono">
    @error('telefono_cliente') <small style="color: red;">{{ $message }}</small> @enderror

    <h3>Estado</h3>

    <label>Estado</label>
    <select name="estado" required>
        <option value="pendiente">Pendiente</option>
        <option value="en_revision">En Revisión</option>
        <option value="reparando">Reparando</option>
        <option value="listo">Listo</option>
        <option value="sin_arreglo">Sin Arreglo</option>
    </select>

    <label>Costo</label>
    <input type="number" name="costo" step="0.01" placeholder="0.00">
    @error('costo') <small style="color: red;">{{ $message }}</small> @enderror

    <label>Fecha Entrega</label>
    <input type="date" name="fecha_entrega">
    @error('fecha_entrega') <small style="color: red;">{{ $message }}</small> @enderror

    <label>Observaciones</label>
    <textarea name="observaciones" placeholder="Notas adicionales"></textarea>

    <button type="submit">Guardar</button>
    <a href="{{ route('reparaciones.index') }}">Cancelar</a>
</form>
@endsection