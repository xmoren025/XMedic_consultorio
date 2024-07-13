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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('sexo',1);
            $table->string('curp',18)->unique();
            $table->string('celular', 10);

            $table->date('fecha_nacimiento'); 
            $table->string('correo', 100);
            $table->string('direccion', 100);
            $table->string('tipo_sanguineo', 100);
            $table->string('alergias', 100)->nullable;
            $table->string('contacto_emergencia', 10);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
