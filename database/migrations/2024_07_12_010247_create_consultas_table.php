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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cita_id')->nullable();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('doctor_id');
            $table->timestamp('fecha');

            $table->string('diagnostico')->nullable;
            $table->string('tratamiento')->nullable; 

            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('set null');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
