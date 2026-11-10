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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique();
            $table->string('direccion_obra')->nullable();
            $table->date('inicio_obra')->nullable();
            $table->date('fin_obra')->nullable();
            $table->date('solicitud_obra')->nullable();
            $table->boolean('mandante')->default(false);
            $table->boolean('gestion_licencia')->default(false);
            $table->boolean('pago_icio')->default(false);
            $table->foreignId('obra_id')
                ->unique()
                ->constrained('obras')
                ->cascadeOnDelete();
            $table->foreignId('presupuesto_id')
                ->nullable()
                ->constrained('presupuestos')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
