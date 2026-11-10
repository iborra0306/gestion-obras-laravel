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
        Schema::create('especialista_presupuesto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presupuesto_id')
                ->constrained('presupuestos')
                ->cascadeOnDelete();
            $table->foreignId('especialista_id')
                ->constrained('especialistas')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialista_presupuesto');
    }
};
