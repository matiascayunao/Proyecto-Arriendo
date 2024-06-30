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

            $table->string('rut_arrendatario');
            $table->foreign('rut_arrendatario')->reference('rut')->on('usuarios');

            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');

            $table->unsignedBigInteger('valor_arriendo');
            $table->foreign('valor_arriendo')->reference('valor_v')->on('vehiculos');

            $table->string('estado_actual');
            $table->foreign('estado_actual')->reference('id')->on('estados');


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
