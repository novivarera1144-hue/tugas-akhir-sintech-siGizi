<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'user_id',
    'image_path',
    'status',
    'notes',
    'scanned_at',
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
])]
class FoodScan extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scanResult(): HasOne
    {
        return $this->hasOne(ScanResult::class);
    }

    protected function casts(): array
    {
        return [
            'scanned_at' => 'datetime',
        ];
    }
}
