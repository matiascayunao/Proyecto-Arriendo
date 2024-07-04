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
            $table->foreign('matricula_arriendo')->reference('matricula')->on('vehiculos');

            $table->unsignedBigInteger('rut_arrendatario');
            $table->foreign('rut_arrendatario')->reference('id')->on('clientes');

            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');

            $table->unsignedBigInteger('tipo');
            $table->foreign('tipo')->reference('id')->on('tipos');

            $table->string('estado_actual');
            $table->foreign('estado_actual')->reference('estado')->on('vehiculos');


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
