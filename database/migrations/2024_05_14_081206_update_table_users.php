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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Comprobar si la columna 'profile_id' existe antes de intentar eliminarla
            if (Schema::hasColumn('users', 'category_id')) {
                // Eliminar la restricción de clave externa si existe
                $table->dropForeign(['category_id']);
                // Eliminar la columna profile_id
                $table->dropColumn('category_id');
            }
        });
    }
};
