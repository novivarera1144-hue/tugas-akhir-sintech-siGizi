<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'category',
    'description',
    'serving_size',
    'serving_unit',
    'calories',
    'protein',
    'carbohydrate',
    'fat',
    'fiber',
    'sugar',
    'sodium',
])]
class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    public function scanResults(): HasMany
    {
        return $this->hasMany(ScanResult::class);
    }

    protected function casts(): array
    {
        return [
            'serving_size' => 'decimal:2',
            'calories' => 'decimal:2',
            'protein' => 'decimal:2',
            'carbohydrate' => 'decimal:2',
            'fat' => 'decimal:2',
            'fiber' => 'decimal:2',
            'sugar' => 'decimal:2',
            'sodium' => 'decimal:2',
        ];
    }
}
