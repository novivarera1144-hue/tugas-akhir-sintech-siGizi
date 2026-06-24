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
        Schema::create('scan_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_scan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('food_id')->nullable()->constrained('foods')->nullOnDelete();
            $table->string('detected_food_name');
            $table->decimal('confidence_score', 5, 2)->nullable();
            $table->decimal('estimated_serving_size', 8, 2)->nullable();
            $table->string('serving_unit')->default('gram');
            $table->decimal('estimated_calories', 8, 2)->default(0);
            $table->decimal('estimated_protein', 8, 2)->default(0);
            $table->decimal('estimated_carbohydrate', 8, 2)->default(0);
            $table->decimal('estimated_fat', 8, 2)->default(0);
            $table->json('raw_response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scan_results');
    }
};
