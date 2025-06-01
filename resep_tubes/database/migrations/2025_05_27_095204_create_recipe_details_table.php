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
Schema::create('recipe_details', function (Blueprint $table) {
    $table->id();
    $table->foreignId('recipe_id')->constrained('recipes')->onDelete('cascade');
    $table->string('ingredient');
    $table->string('measurement'); // e.g., 2 tbsp, 100g
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_details');
    }
};
