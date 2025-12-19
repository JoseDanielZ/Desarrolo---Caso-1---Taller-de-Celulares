<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reparacion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reparaciones';

    protected $fillable = [
        'tipo_equipo',
        'marca',
        'modelo',
        'problema',
        'nombre_cliente',
        'telefono_cliente',
        'estado',
        'fecha_ingreso',
        'fecha_entrega',
        'costo',
        'observaciones'
    ];

    public function getEstadoFormateadoAttribute()
    {
        $estados = [
            'pendiente' => 'Pendiente de Revisión',
            'en_revision' => 'En Revisión',
            'reparando' => 'En Reparación',
            'listo' => 'Listo para Entregar',
            'sin_arreglo' => 'Sin Arreglo'
        ];
        
        return $estados[$this->estado] ?? $this->estado;
    }

    public function getEstadoBadgeAttribute()
    {
        $badges = [
            'pendiente' => 'warning',
            'en_revision' => 'info',
            'reparando' => 'primary',
            'listo' => 'success',
            'sin_arreglo' => 'danger'
        ];
        
        return $badges[$this->estado] ?? 'secondary';
    }
}