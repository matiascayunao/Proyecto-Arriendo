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
            $table->string('tipo_v');
            $table->foreign('tipo_v')->reference('id')->on('tipos');
            $table->string('marca');
            $table->string('modelo');
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
