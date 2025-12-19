<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_equipo');
            $table->string('marca');
            $table->string('modelo');
            $table->text('problema');
            $table->string('nombre_cliente');
            $table->string('telefono_cliente');
            $table->string('estado');
            $table->timestamp('fecha_ingreso');
            $table->date('fecha_entrega');
            $table->decimal('costo', 10, 2);
            $table->text('observaciones');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reparaciones');
    }
};  