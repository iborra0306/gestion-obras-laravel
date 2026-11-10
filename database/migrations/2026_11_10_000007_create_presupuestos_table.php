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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique();
            $table->date('fecha');
            $table->string('nombre_cliente');
            $table->string('nif', 20)->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->decimal('iva', 5, 2)->default(21);
            $table->enum('estado', ['aprobado', 'no_aprobado'])->default('no_aprobado');
            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->restrictOnDelete();
            $table->foreignId('obra_id')
                ->nullable()
                ->constrained('obras')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
