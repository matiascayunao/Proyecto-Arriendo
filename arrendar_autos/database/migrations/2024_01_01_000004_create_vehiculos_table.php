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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->string('matricula')->primary();
            $table->string('nombre_vehiculo');
            $table->unsignedBigInteger('tipo_v'); // Cambiado a unsignedBigInteger
            $table->foreign('tipo_v')->references('id')->on('tipos'); // Referencia la columna 'id' en 'tipos'
            $table->string('marca');
            $table->string('año');
            $table->string('estado');
            $table->string('imagen')->nullable();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
