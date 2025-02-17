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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->string('name', 300);
            $table->string('info', 300);
            $table->decimal('price', 8, 2);
            $table->string('location', 200);
            $table->date('start');
            $table->date('end');
            $table->string('image', 200)->nullable();
            $table->boolean('is_completed')->default(False);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournemants');
    }
};
