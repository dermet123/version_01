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
        Schema::create('dinamicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('id_auditoria');
            $table->string('id_calificacion');
            $table->string('id_campo');
            $table->string('id_criterio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinamicos');
    }
};