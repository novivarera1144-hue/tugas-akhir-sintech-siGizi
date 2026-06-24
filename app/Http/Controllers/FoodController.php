<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Food::latest()->paginate());
    }

    public function store(Request $request): JsonResponse
    {
        $food = Food::create($request->validate($this->rules()));

        return response()->json($food, 201);
    }

    public function show(Food $food): JsonResponse
    {
        return response()->json($food->load('scanResults'));
    }

    public function update(Request $request, Food $food): JsonResponse
    {
        $food->update($request->validate($this->rules()));

        return response()->json($food);
    }

    public function destroy(Food $food): JsonResponse
    {
        $food->delete();

        return response()->json(null, 204);
    }

    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'serving_size' => ['nullable', 'numeric', 'min:0'],
            'serving_unit' => ['required', 'string', 'max:50'],
            'calories' => ['required', 'numeric', 'min:0'],
            'protein' => ['required', 'numeric', 'min:0'],
            'carbohydrate' => ['required', 'numeric', 'min:0'],
            'fat' => ['required', 'numeric', 'min:0'],
            'fiber' => ['required', 'numeric', 'min:0'],
            'sugar' => ['required', 'numeric', 'min:0'],
            'sodium' => ['required', 'numeric', 'min:0'],
        ];
    }
}
