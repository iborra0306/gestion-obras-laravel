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
        Schema::create('partes_especialista', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->text('descripcion')->nullable();
            $table->string('documento')->nullable();
            $table->decimal('importe', 10, 2);
            $table->enum('estado_pago', ['pendiente'])->default('pendiente');
            $table->foreignId('obra_id')
                ->constrained('obras')
                ->cascadeOnDelete();
            $table->foreignId('especialista_id')
                ->constrained('especialistas')
                ->restrictOnDelete();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partes_especialista');
    }
};
