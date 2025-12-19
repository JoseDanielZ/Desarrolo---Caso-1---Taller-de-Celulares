@extends('layouts.app')

@section('title', 'Lista de Reparaciones')

@section('content')
<style>
h1 { color: #007bff; text-align: center; margin-bottom: 20px; }
table { border-collapse: collapse; width: 100%; margin-top: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; }
th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
th { background-color: #f8f9fa; font-weight: bold; }
tr:nth-child(even) { background-color: #f2f2f2; }
a { color: #007bff; text-decoration: none; margin-right: 10px; padding: 5px 10px; border-radius: 4px; transition: background-color 0.3s; }
a:hover { background-color: #e9ecef; }
button { background: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer; transition: background-color 0.3s; }
button:hover { background: #c82333; }
.nueva { display: inline-block; background: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 20px; }
.nueva:hover { background: #218838; }
</style>

<h1>Lista de Reparaciones</h1>

@if($reparaciones->count() > 0)
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Equipo</th>
            <th>Problema</th>
            <th>Estado</th>
            <th>Fecha Ingreso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reparaciones as $reparacione)
        <tr>
            <td>{{ $reparacione->id }}</td>
            <td>{{ $reparacione->nombre_cliente }}<br><small>{{ $reparacione->telefono_cliente }}</small></td>
            <td>{{ $reparacione->marca }} {{ $reparacione->modelo }}<br><small>{{ $reparacione->tipo_equipo }}</small></td>
            <td>{{ strlen($reparacione->problema) > 50 ? substr($reparacione->problema, 0, 50) . '...' : $reparacione->problema }}</td>
            <td>
                @if($reparacione->estado == 'pendiente')
                    <span style="color: orange;">Pendiente</span>
                @elseif($reparacione->estado == 'en_revision')
                    <span style="color: blue;">En Revisión</span>
                @elseif($reparacione->estado == 'reparando')
                    <span style="color: purple;">Reparando</span>
                @elseif($reparacione->estado == 'listo')
                    <span style="color: green;">Listo</span>
                @else
                    <span style="color: red;">Sin Arreglo</span>
                @endif
            </td>
            <td>{{ date('d/m/Y', strtotime($reparacione->fecha_ingreso)) }}</td>
            <td>
                <a href="{{ route('reparaciones.show', $reparacione) }}">Ver</a>
                <a href="{{ route('reparaciones.edit', $reparacione) }}">Editar</a>
                <form action="{{ route('reparaciones.destroy', $reparacione) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar esta reparación?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p style="text-align: center; color: #6c757d; font-size: 18px;">No hay reparaciones registradas.</p>
@endif

<a href="{{ route('reparaciones.create') }}" class="nueva">Nueva Reparación</a>
@endsection