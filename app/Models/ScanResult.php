<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'food_scan_id',
    'food_id',
    'detected_food_name',
    'confidence_score',
    'estimated_serving_size',
    'serving_unit',
    'estimated_calories',
    'estimated_protein',
    'estimated_carbohydrate',
    'estimated_fat',
    'raw_response',
])]
class ScanResult extends Model
{
    use HasFactory;

    public function foodScan(): BelongsTo
    {
        return $this->belongsTo(FoodScan::class);
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    public function recommendations(): HasMany
    {
        return $this->hasMany(Recommendation::class);
    }

    protected function casts(): array
    {
        return [
            'confidence_score' => 'decimal:2',
            'estimated_serving_size' => 'decimal:2',
            'estimated_calories' => 'decimal:2',
            'estimated_protein' => 'decimal:2',
            'estimated_carbohydrate' => 'decimal:2',
            'estimated_fat' => 'decimal:2',
            'raw_response' => 'array',
        ];
    }
}
