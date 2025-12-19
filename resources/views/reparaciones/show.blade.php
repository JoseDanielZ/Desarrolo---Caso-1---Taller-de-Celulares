@extends('layouts.app')

@section('title', 'Detalle de Reparacion')

@section('content')
<style>
h1 { color: #007bff; text-align: center; margin-bottom: 30px; }
h3 { color: #28a745; margin-top: 25px; border-bottom: 2px solid #28a745; padding-bottom: 5px; }
p { margin: 10px 0; font-size: 16px; line-height: 1.5; }
.info-box { background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
.estado { font-weight: bold; padding: 5px 10px; border-radius: 5px; display: inline-block; }
.estado.pendiente { background: orange; color: white; }
.estado.en_revision { background: blue; color: white; }
.estado.reparando { background: purple; color: white; }
.estado.listo { background: green; color: white; }
.estado.sin_arreglo { background: red; color: white; }
a { color: #007bff; text-decoration: none; padding: 8px 12px; border-radius: 5px; margin-right: 10px; transition: background-color 0.3s; }
a:hover { background-color: #e9ecef; }
button { background: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s; }
button:hover { background: #c82333; }
.actions { text-align: center; margin-top: 30px; }
</style>

<h1>Detalle de Reparación #{{ $reparacione->id }}</h1>

<div class="info-box">
    <h3>Información del Equipo</h3>
    <p><strong>Tipo:</strong> {{ $reparacione->tipo_equipo }}</p>
    <p><strong>Marca:</strong> {{ $reparacione->marca }}</p>
    @if($reparacione->modelo)
    <p><strong>Modelo:</strong> {{ $reparacione->modelo }}</p>
    @endif
    <p><strong>Problema:</strong> {{ $reparacione->problema }}</p>
</div>

<div class="info-box">
    <h3>Datos del Cliente</h3>
    <p><strong>Nombre:</strong> {{ $reparacione->nombre_cliente }}</p>
    <p><strong>Teléfono:</strong> {{ $reparacione->telefono_cliente }}</p>
</div>

<div class="info-box">
    <h3>Estado y Fechas</h3>
    <p><strong>Estado:</strong>
        <span class="estado {{ $reparacione->estado }}">
            @if($reparacione->estado == 'pendiente')
                Pendiente
            @elseif($reparacione->estado == 'en_revision')
                En Revisión
            @elseif($reparacione->estado == 'reparando')
                Reparando
            @elseif($reparacione->estado == 'listo')
                Listo
            @else
                Sin Arreglo
            @endif
        </span>
    </p>
    <p><strong>Fecha Ingreso:</strong> {{ date('d/m/Y H:i', strtotime($reparacione->fecha_ingreso)) }}</p>
    @if($reparacione->fecha_entrega)
    <p><strong>Fecha Entrega:</strong> {{ date('d/m/Y', strtotime($reparacione->fecha_entrega)) }}</p>
    @endif
    @if($reparacione->costo)
    <p><strong>Costo:</strong> ${{ number_format($reparacione->costo, 2) }}</p>
    @endif
    @if($reparacione->observaciones)
    <p><strong>Observaciones:</strong> {{ $reparacione->observaciones }}</p>
    @endif
</div>

<div class="actions">
    <a href="{{ route('reparaciones.index') }}">Volver</a>
    <a href="{{ route('reparaciones.edit', $reparacione) }}">Editar</a>
    <form action="{{ route('reparaciones.destroy', $reparacione) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Eliminar esta reparación?')">Eliminar</button>
    </form>
</div>
@endsection