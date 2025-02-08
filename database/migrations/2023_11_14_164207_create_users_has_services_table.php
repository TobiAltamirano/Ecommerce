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
        Schema::create('users_has_services', function (Blueprint $table) {
            $table->id(); // Esto creará una columna autoincremental llamada 'id'
    
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('service_id')->constrained('services', 'id');
    
            $table->timestamps();
            
            // Definimos la clave primaria compuesta
            $table->unique(['user_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar restricciones de clave foránea primero
        Schema::table('users_has_services', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['service_id']);
        });

        // Eliminación de la tabla
        Schema::dropIfExists('users_has_services');
    }
};
