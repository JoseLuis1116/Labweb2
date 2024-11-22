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
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('soc_id') // Llave foránea hacia la tabla socios
                  ->constrained('socios', 'id') // Relación con la tabla socios y columna id
                  ->onDelete('cascade'); // Elimina el alquiler si el socio asociado es eliminado
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquileres');
    }
};
