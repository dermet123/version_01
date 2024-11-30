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
        Schema::create('estandar', function (Blueprint $table) {
            $table->id();
            $table->string('dimension')->nullable();
            $table->string('factor')->nullable();
            $table->string('estandar')->nullable();
            $table->string('escala_avance')->nullable();
            $table->string('contextualizacion')->nullable();
            $table->string('identificacion_brechas')->nullable();
            $table->string('actividades')->nullable();
            $table->string('otros_estandares')->nullable();
            $table->string('avance')->nullable();
            $table->string('sustentacion')->nullable();
            $table->string('comentario')->nullable();
            $table->string('recomendacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estandar');
    }
};