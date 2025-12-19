@extends('layouts.app')

@section('title', 'Editar Reparacion')

@section('content')
<style>
h1 { color: #007bff; text-align: center; margin-bottom: 30px; }
h3 { color: #28a745; margin-top: 25px; border-bottom: 2px solid #28a745; padding-bottom: 5px; }
label { display: block; margin-top: 15px; font-weight: bold; color: #495057; }
input, select, textarea { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ced4da; border-radius: 5px; font-size: 16px; }
input:focus, select:focus, textarea:focus { border-color: #007bff; outline: none; box-shadow: 0 0 5px rgba(0,123,255,0.5); }
button { background: #ffc107; color: black; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s; }
button:hover { background: #e0a800; }
a { color: #007bff; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: background-color 0.3s; }
a:hover { background-color: #e9ecef; }
form { max-width: 600px; margin: 0 auto; background: #f8f9fa; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
</style>

<h1>Editar Reparación #{{ $reparacione->id }}</h1>

<form action="{{ route('reparaciones.update', $reparacione) }}" method="POST">
    @csrf
    @method('PUT')

    <h3>Información del Equipo</h3>

    <label>Tipo de Equipo</label>
    <select name="tipo_equipo" required>
        <option value="Celular" {{ $reparacione->tipo_equipo == 'Celular' ? 'selected' : '' }}>Celular</option>
        <option value="Tablet" {{ $reparacione->tipo_equipo == 'Tablet' ? 'selected' : '' }}>Tablet</option>
        <option value="Laptop" {{ $reparacione->tipo_equipo == 'Laptop' ? 'selected' : '' }}>Laptop</option>
        <option value="Smartwatch" {{ $reparacione->tipo_equipo == 'Smartwatch' ? 'selected' : '' }}>Smartwatch</option>
        <option value="Otro" {{ $reparacione->tipo_equipo == 'Otro' ? 'selected' : '' }}>Otro</option>
    </select>

    <label>Marca</label>
    <input type="text" name="marca" value="{{ $reparacione->marca }}" required>
    @error('marca') <small style="color: red;">{{ $message }}</small> @enderror

    <label>Modelo</label>
    <input type="text" name="modelo" value="{{ $reparacione->modelo }}">
    @error('modelo') <small style="color: red;">{{ $message }}</small> @enderror

    <label>Problema</label>
    <textarea name="problema" required>{{ $reparacione->problema }}</textarea>
    @error('problema') <small style="color: red;">{{ $message }}</small> @enderror

    <h3>Datos del Cliente</h3>

    <label>Nombre</label>
    <input type="text" name="nombre_cliente" value="{{ $reparacione->nombre_cliente }}" required>

    <label>Teléfono</label>
    <input type="text" name="telefono_cliente" value="{{ $reparacione->telefono_cliente }}" required>
    @error('telefono_cliente') <small style="color: red;">{{ $message }}</small> @enderror

    <h3>Estado</h3>

    <label>Estado</label>
    <select name="estado" required>
        <option value="pendiente" {{ $reparacione->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="en_revision" {{ $reparacione->estado == 'en_revision' ? 'selected' : '' }}>En Revisión</option>
        <option value="reparando" {{ $reparacione->estado == 'reparando' ? 'selected' : '' }}>Reparando</option>
        <option value="listo" {{ $reparacione->estado == 'listo' ? 'selected' : '' }}>Listo</option>
        <option value="sin_arreglo" {{ $reparacione->estado == 'sin_arreglo' ? 'selected' : '' }}>Sin Arreglo</option>
    </select>

    <label>Costo (opcional)</label>
    <input type="number" name="costo" value="{{ $reparacione->costo }}" step="0.01">
    @error('costo') <small style="color: red;">{{ $message }}</small> @enderror

    <label>Fecha Entrega (opcional)</label>
    <input type="date" name="fecha_entrega" value="{{ $reparacione->fecha_entrega }}">
    @error('fecha_entrega') <small style="color: red;">{{ $message }}</small> @enderror

    <label>Observaciones (opcional)</label>
    <textarea name="observaciones">{{ $reparacione->observaciones }}</textarea>

    <button type="submit">Actualizar</button>
    <a href="{{ route('reparaciones.index') }}">Cancelar</a>
</form>
@endsection