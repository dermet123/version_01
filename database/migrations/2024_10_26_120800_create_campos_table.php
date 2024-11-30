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
        Schema::create('campos', function (Blueprint $table) {
            $table->id();
            $table->integer('integer');
            $table->float('float', 8, 2);
            $table->decimal('decimal', 8, 2);
            $table->string('string');
            $table->text('text');
            $table->char('char', 8);
            $table->date('date');
            $table->time('time');
            $table->boolean('boolean');
            $table->json('json');
            $table->enum('status', ['pending', 'shipped', 'delivered']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campos');
    }
};