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
        Schema::create('presupuesto_proveedor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presupuesto_id')
                ->constrained('presupuestos')
                ->cascadeOnDelete();
            $table->foreignId('proveedor_id')
                ->constrained('proveedores')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuesto_proveedor');
    }
};
