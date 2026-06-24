<?php

use App\Http\Controllers\EducationArticleController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodScanController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ScanResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/history', function () {
    return view('dashboard.history');
})->middleware(['auth'])->name('dashboard.history');

Route::get('/dashboard/favorites', function () {
    return view('dashboard.favorites');
})->middleware(['auth'])->name('dashboard.favorites');

Route::get('/dashboard/profile', function () {
    return view('dashboard.profile');
})->middleware(['auth'])->name('dashboard.profile');

use App\Http\Controllers\ScanController;

Route::middleware(['auth'])->group(function () {
    Route::get('/scan', [ScanController::class, 'index'])->name('scan');
    Route::post('/scan', [ScanController::class, 'analyze'])->name('scan.analyze');
});

Route::apiResource('foods', FoodController::class);
Route::apiResource('food-scans', FoodScanController::class);
Route::apiResource('scan-results', ScanResultController::class);
Route::apiResource('recommendations', RecommendationController::class);
Route::apiResource('education-articles', EducationArticleController::class);

require __DIR__.'/auth.php';
