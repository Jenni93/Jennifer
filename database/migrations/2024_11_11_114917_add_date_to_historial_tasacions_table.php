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
        Schema::table('historial_tasacions', function (Blueprint $table) {
            $table->timestamp('fecha_cambio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historial_tasacions', function (Blueprint $table) {
            $table->dropColumn('fecha_cambio');
        });
    }
};
