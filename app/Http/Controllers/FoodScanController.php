<?php

namespace App\Http\Controllers;

use App\Models\FoodScan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FoodScanController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(FoodScan::with('user', 'scanResult')->latest()->paginate());
    }

    public function store(Request $request): JsonResponse
    {
        $foodScan = FoodScan::create($request->validate($this->rules()));

        return response()->json($foodScan, 201);
    }

    public function show(FoodScan $foodScan): JsonResponse
    {
        return response()->json($foodScan->load('user', 'scanResult.recommendations'));
    }

    public function update(Request $request, FoodScan $foodScan): JsonResponse
    {
        $foodScan->update($request->validate($this->rules()));

        return response()->json($foodScan);
    }

    public function destroy(FoodScan $foodScan): JsonResponse
    {
        $foodScan->delete();

        return response()->json(null, 204);
    }

    private function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'notes' => ['nullable', 'string'],
            'scanned_at' => ['nullable', 'date'],
        ];
    }
}
