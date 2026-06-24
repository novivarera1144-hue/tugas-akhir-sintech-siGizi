<?php

namespace App\Http\Controllers;

use App\Models\ScanResult;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ScanResultController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ScanResult::with('foodScan', 'food')->latest()->paginate());
    }

    public function store(Request $request): JsonResponse
    {
        $scanResult = ScanResult::create($request->validate($this->rules()));

        return response()->json($scanResult, 201);
    }

    public function show(ScanResult $scanResult): JsonResponse
    {
        return response()->json($scanResult->load('foodScan.user', 'food', 'recommendations'));
    }

    public function update(Request $request, ScanResult $scanResult): JsonResponse
    {
        $scanResult->update($request->validate($this->rules()));

        return response()->json($scanResult);
    }

    public function destroy(ScanResult $scanResult): JsonResponse
    {
        $scanResult->delete();

        return response()->json(null, 204);
    }

    private function rules(): array
    {
        return [
            'food_scan_id' => ['required', 'exists:food_scans,id'],
            'food_id' => ['nullable', 'exists:foods,id'],
            'detected_food_name' => ['required', 'string', 'max:255'],
            'confidence_score' => ['nullable', 'numeric', 'between:0,100'],
            'estimated_serving_size' => ['nullable', 'numeric', 'min:0'],
            'serving_unit' => ['required', 'string', 'max:50'],
            'estimated_calories' => ['required', 'numeric', 'min:0'],
            'estimated_protein' => ['required', 'numeric', 'min:0'],
            'estimated_carbohydrate' => ['required', 'numeric', 'min:0'],
            'estimated_fat' => ['required', 'numeric', 'min:0'],
            'raw_response' => ['nullable', 'array'],
        ];
    }
}
