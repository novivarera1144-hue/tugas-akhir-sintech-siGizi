@php
    $benefits = [
        ['icon' => 'cpu-chip', 'title' => 'AI Powered', 'description' => 'Didukung analisis pintar untuk membaca makanan secara lebih kontekstual.'],
        ['icon' => 'rocket', 'title' => 'Fast Results', 'description' => 'Hasil scan ditampilkan cepat agar keputusan makan tidak tertunda.'],
        ['icon' => 'shield-check', 'title' => 'High Accuracy', 'description' => 'Estimasi dibuat konsisten untuk membantu evaluasi nutrisi harian.'],
        ['icon' => 'cursor-click', 'title' => 'Easy to Use', 'description' => 'Alur sederhana dari unggah foto hingga membaca insight nutrisi.'],
        ['icon' => 'lock-closed', 'title' => 'Secure Data', 'description' => 'Fondasi produk dirancang dengan perhatian pada keamanan data pengguna.'],
        ['icon' => 'device-phone-mobile', 'title' => 'Responsive Design', 'description' => 'Nyaman dipakai dari desktop, tablet, hingga layar ponsel.'],
    ];
@endphp

<section id="tentang" class="relative overflow-hidden bg-white py-16 transition-colors duration-300 dark:bg-slate-900/40 sm:py-20 lg:py-24">
    <div class="absolute inset-x-0 top-0 -z-10 h-64 bg-[radial-gradient(circle_at_center,rgba(16,185,129,0.12),transparent_42%)] dark:bg-[radial-gradient(circle_at_center,rgba(45,212,191,0.10),transparent_42%)]"></div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">
            <div class="lg:sticky lg:top-28">
                <span class="inline-flex rounded-full border border-sky-200 bg-sky-50 px-4 py-2 text-sm font-semibold text-sky-700 dark:border-sky-400/20 dark:bg-sky-400/10 dark:text-sky-300">
                    Why Choose siGizi
                </span>
                <h2 class="mt-5 text-3xl font-extrabold tracking-normal text-slate-950 sm:text-4xl dark:text-white">
                    Dibuat untuk pengalaman nutrisi yang cepat, aman, dan mudah
                </h2>
                <p class="mt-4 text-base leading-7 text-slate-600 dark:text-slate-300">
                    siGizi menggabungkan desain modern dan fondasi AI agar analisis makanan terasa praktis untuk rutinitas sehari-hari.
                </p>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                @foreach ($benefits as $benefit)
                    <x-landing.feature-card
                        :icon="$benefit['icon']"
                        :title="$benefit['title']"
                        :description="$benefit['description']"
                    />
                @endforeach
            </div>
        </div>
    </div>
</section>
