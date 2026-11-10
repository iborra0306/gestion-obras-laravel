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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique();
            $table->string('tipo')->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono', 20)->nullable();
            $table->decimal('coste_hora_estandar', total: 8, places: 2)->default(20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadores');
    }
};
