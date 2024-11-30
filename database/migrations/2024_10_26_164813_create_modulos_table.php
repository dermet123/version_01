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
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            //Titulo del Campo
            $table->string('nombre');
            $table->foreignId('id_campo')->nullable()->constrained('campos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_modelo')->nullable()->constrained('modelos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_dinamico')->nullable()->constrained('dinamicos')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulos');
    }
};