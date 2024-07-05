<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arriendos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula_arriendo');
            $table->foreign('matricula_arriendo')->references('matricula')->on('vehiculos');

            $table->unsignedBigInteger('rut_arrendatario');
            $table->foreign('rut_arrendatario')->references('id')->on('clientes');

            $table->unsignedBigInteger('tipo');
            $table->foreign('tipo')->references('id')->on('tipos');
            $table->unsignedBigInteger('valor_arriendo');

            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');

            $table->string('estado_arriendo');

            $table->string('imagen_entrega')->nullable();
            $table->string('imagen_recepcion')->nullable();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arriendos');
    }
};
