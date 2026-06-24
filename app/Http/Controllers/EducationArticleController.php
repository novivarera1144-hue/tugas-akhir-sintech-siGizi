<?php

namespace App\Http\Controllers;

use App\Models\EducationArticle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EducationArticleController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(EducationArticle::with('author')->latest()->paginate());
    }

    public function store(Request $request): JsonResponse
    {
        $educationArticle = EducationArticle::create($request->validate($this->rules()));

        return response()->json($educationArticle, 201);
    }

    public function show(EducationArticle $educationArticle): JsonResponse
    {
        return response()->json($educationArticle->load('author'));
    }

    public function update(Request $request, EducationArticle $educationArticle): JsonResponse
    {
        $educationArticle->update($request->validate($this->rules($educationArticle)));

        return response()->json($educationArticle);
    }

    public function destroy(EducationArticle $educationArticle): JsonResponse
    {
        $educationArticle->delete();

        return response()->json(null, 204);
    }

    private function rules(?EducationArticle $educationArticle = null): array
    {
        return [
            'user_id' => ['nullable', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('education_articles')->ignore($educationArticle)],
            'category' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'is_published' => ['sometimes', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ];
    }
}
