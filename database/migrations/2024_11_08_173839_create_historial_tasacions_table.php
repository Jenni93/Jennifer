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
        Schema::create('historial_tasacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tasacion_id')->constrained()->onDelete('cascade'); 
            $table->enum('estado', ['Solicitado', 'En proceso', 'Tasación completada', 'Rechazado']); 
            $table->string('cambiado_por'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_tasacions');
    }
};
