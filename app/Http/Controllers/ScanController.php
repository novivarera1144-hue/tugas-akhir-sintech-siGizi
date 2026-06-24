<?php

namespace App\Http\Controllers;

use App\Models\FoodScan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class ScanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get scan statistics
        $stats = [
            'total_scans' => $user->foodScans()->count(),
            'today_scans' => $user->foodScans()->whereDate('created_at', today())->count(),
            'healthy_count' => $user->foodScans()->where('health_status', 'Healthy')->count(),
        ];
        
        return view('scan', compact('stats'));
    }

    public function analyze(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ], [
            'image.required' => 'Pilih gambar terlebih dahulu.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.',
        ]);

        try {
            $file = $request->file('image');
            $path = $file->store('scans', 'public');
            $publicUrl = asset('storage/' . $path);

            Log::debug('Scan analyze stored image', [
                'stored_path' => $path,
                'storage_disk_url' => Storage::disk('public')->url($path),
                'asset_url' => $publicUrl,
                'file_exists' => file_exists(storage_path('app/public/' . $path)),
            ]);

            // If an external AI analyze endpoint is configured, use it.
            $endpoint = env('AI_ANALYZE_ENDPOINT');
            $apiKey = env('GEMINI_API_KEY') ?? env('OPENAI_API_KEY');

            if ($endpoint && $apiKey) {
                // Send multipart request with image to upstream AI service
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey,
                ])->attach('image', fopen(storage_path('app/public/' . $path), 'r'))
                  ->post($endpoint);

                if (! $response->successful()) {
                    Log::error('AI analyze failed', ['status' => $response->status(), 'body' => $response->body()]);
                    return back()->with('error', 'Analisis gagal.');
                }

                $data = $response->json();

            } else {
                // Fallback mock analysis so the flow works without external API
                $data = $this->mockAnalysis($file->getClientOriginalName());
            }

            // Validate expected keys
            // Normalize response to expected structure
            $normalized = [
                'food' => null,
                'confidence' => null,
                'nutrition' => [
                    'calories' => null,
                    'protein' => null,
                    'carbs' => null,
                    'fat' => null,
                    'sugar' => null,
                    'fiber' => null,
                ],
                'health' => null,
                'recommendation' => null,
            ];

            // Support nested 'nutrition' structure
            if (isset($data['food'])) {
                $normalized['food'] = $data['food'];
            } elseif (isset($data['food_name'])) {
                $normalized['food'] = $data['food_name'];
            }

            $normalized['confidence'] = $data['confidence'] ?? ($data['confidence_score'] ?? null);

            if (isset($data['nutrition']) && is_array($data['nutrition'])) {
                $normalized['nutrition']['calories'] = $data['nutrition']['calories'] ?? null;
                $normalized['nutrition']['protein'] = $data['nutrition']['protein'] ?? null;
                $normalized['nutrition']['carbs'] = $data['nutrition']['carbs'] ?? null;
                $normalized['nutrition']['fat'] = $data['nutrition']['fat'] ?? null;
                $normalized['nutrition']['sugar'] = $data['nutrition']['sugar'] ?? null;
                $normalized['nutrition']['fiber'] = $data['nutrition']['fiber'] ?? null;
            } else {
                // flat keys
                $normalized['nutrition']['calories'] = $data['calories'] ?? $data['calorie'] ?? null;
                $normalized['nutrition']['protein'] = $data['protein'] ?? ($data['protein_g'] ?? null);
                $normalized['nutrition']['carbs'] = $data['carbs'] ?? ($data['carbs_g'] ?? null);
                $normalized['nutrition']['fat'] = $data['fat'] ?? ($data['fat_g'] ?? null);
                $normalized['nutrition']['sugar'] = $data['sugar'] ?? null;
                $normalized['nutrition']['fiber'] = $data['fiber'] ?? null;
            }

            $normalized['health'] = $data['health'] ?? null;
            $normalized['recommendation'] = $data['recommendation'] ?? null;

            // Basic inference if health not provided
            if (empty($normalized['health'])) {
                $c = (int) ($normalized['nutrition']['calories'] ?? 0);
                $sugar = (int) ($normalized['nutrition']['sugar'] ?? 0);
                if ($c >= 700) {
                    $normalized['health'] = 'High Calorie';
                } elseif ($sugar >= 20) {
                    $normalized['health'] = 'Moderate';
                } else {
                    $normalized['health'] = 'Healthy';
                }
            }

            // Basic recommendation if not provided
            if (empty($normalized['recommendation'])) {
                if ($normalized['health'] === 'High Calorie') {
                    $normalized['recommendation'] = 'Batasi porsi atau konsumsi setelah aktivitas fisik.';
                } elseif ($normalized['health'] === 'Moderate') {
                    $normalized['recommendation'] = 'Konsumsi bersama sayuran agar lebih seimbang.';
                } else {
                    $normalized['recommendation'] = 'Baik dikonsumsi sebagai bagian dari diet seimbang.';
                }
            }

            // Save to database
            FoodScan::create([
                'user_id' => Auth::id(),
                'image_path' => $path,
                'food_name' => $normalized['food'],
                'confidence' => (int) ($normalized['confidence'] ?? 0),
                'calories' => (int) ($normalized['nutrition']['calories'] ?? 0),
                'protein' => (int) ($normalized['nutrition']['protein'] ?? 0),
                'carbs' => (int) ($normalized['nutrition']['carbs'] ?? 0),
                'fat' => (int) ($normalized['nutrition']['fat'] ?? 0),
                'sugar' => (int) ($normalized['nutrition']['sugar'] ?? 0),
                'fiber' => (int) ($normalized['nutrition']['fiber'] ?? 0),
                'health_status' => $normalized['health'],
                'recommendation' => $normalized['recommendation'],
                'status' => 'completed',
                'scanned_at' => now(),
            ]);

            Log::debug('Scan analyze saved to database', [
                'image_url' => $publicUrl,
                'result' => $normalized,
            ]);

            return redirect()->route('scan')->with([
                'result' => $normalized,
                'image_url' => $publicUrl,
                'success' => 'Scan berhasil disimpan ke riwayat.',
            ]);

        } catch (\Exception $e) {
            Log::error('Scan analyze exception: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return back()->with('error', 'Analisis gagal.');
        }
    }

    private function mockAnalysis($filename)
    {
        // Return structured mock matching expected final shape
        $seed = abs(crc32($filename));
        $foods = ['Nasi Goreng', 'Ayam Bakar', 'Gado-gado', 'Soto Ayam', 'Bakso', 'Rendang', 'Mie Goreng', 'Pecel Lele'];
        $food = $foods[$seed % count($foods)];
        $cal = 300 + ($seed % 500);
        $protein = 10 + ($seed % 40);
        $carbs = 20 + ($seed % 100);
        $fat = 5 + ($seed % 40);
        $sugar = 1 + ($seed % 30);
        $fiber = 1 + ($seed % 10);
        $conf = 85 + ($seed % 16);
        $health = ($cal >= 700) ? 'High Calorie' : (($sugar >= 20) ? 'Moderate' : 'Healthy');
        $recommendation = $health === 'High Calorie' ? 'Batasi porsi atau konsumsi setelah aktivitas fisik.' : ($health === 'Moderate' ? 'Konsumsi bersama sayuran agar lebih seimbang.' : 'Baik dikonsumsi sebagai bagian dari diet seimbang.');

        return [
            'food' => $food,
            'confidence' => $conf,
            'nutrition' => [
                'calories' => $cal,
                'protein' => $protein,
                'carbs' => $carbs,
                'fat' => $fat,
                'sugar' => $sugar,
                'fiber' => $fiber,
            ],
            'health' => $health,
            'recommendation' => $recommendation,
        ];
    }
}
