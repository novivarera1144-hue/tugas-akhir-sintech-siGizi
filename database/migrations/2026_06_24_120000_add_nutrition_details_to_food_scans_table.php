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
        Schema::table('food_scans', function (Blueprint $table) {
            $table->string('food_name')->nullable();
            $table->integer('confidence')->nullable()->comment('AI confidence percentage');
            $table->integer('calories')->nullable();
            $table->integer('protein')->nullable();
            $table->integer('carbs')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('sugar')->nullable();
            $table->integer('fiber')->nullable();
            $table->string('health_status')->nullable()->comment('Healthy, Moderate, High Calorie');
            $table->text('recommendation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_scans', function (Blueprint $table) {
            $table->dropColumn([
                'food_name',
                'confidence',
                'calories',
                'protein',
                'carbs',
                'fat',
                'sugar',
                'fiber',
                'health_status',
                'recommendation',
            ]);
        });
    }
};
