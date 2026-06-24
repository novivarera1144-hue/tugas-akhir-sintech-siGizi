<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Recommendation::with('user', 'scanResult')->latest()->paginate());
    }

    public function store(Request $request): JsonResponse
    {
        $recommendation = Recommendation::create($request->validate($this->rules()));

        return response()->json($recommendation, 201);
    }

    public function show(Recommendation $recommendation): JsonResponse
    {
        return response()->json($recommendation->load('user', 'scanResult.food'));
    }

    public function update(Request $request, Recommendation $recommendation): JsonResponse
    {
        $recommendation->update($request->validate($this->rules()));

        return response()->json($recommendation);
    }

    public function destroy(Recommendation $recommendation): JsonResponse
    {
        $recommendation->delete();

        return response()->json(null, 204);
    }

    private function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'scan_result_id' => ['nullable', 'exists:scan_results,id'],
            'type' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'priority' => ['required', 'string', 'max:50'],
            'is_read' => ['sometimes', 'boolean'],
        ];
    }
}
