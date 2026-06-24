@php
    $steps = [
        ['number' => '01', 'icon' => 'device-phone-mobile', 'title' => 'Upload Food Photo', 'description' => 'Ambil atau unggah foto makanan yang ingin dianalisis dari perangkatmu.'],
        ['number' => '02', 'icon' => 'sparkles', 'title' => 'AI Detects Food', 'description' => 'AI mengenali jenis makanan dan mencocokkannya dengan referensi nutrisi.'],
        ['number' => '03', 'icon' => 'chart-pie', 'title' => 'Nutrition Analysis', 'description' => 'siGizi menampilkan estimasi kalori, protein, lemak, dan karbohidrat.'],
        ['number' => '04', 'icon' => 'heart', 'title' => 'Personalized Recommendation', 'description' => 'Dapatkan rekomendasi sehat yang lebih sesuai dengan hasil analisismu.'],
    ];
@endphp

<section id="cara-kerja" class="relative bg-slate-50 py-16 transition-colors duration-300 dark:bg-slate-950 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-flex rounded-full border border-emerald-200 bg-white px-4 py-2 text-sm font-semibold text-emerald-700 shadow-sm dark:border-emerald-400/20 dark:bg-white/5 dark:text-emerald-300">
                Cara Kerja
            </span>
            <h2 class="mt-5 text-3xl font-extrabold tracking-normal text-slate-950 sm:text-4xl dark:text-white">
                Dari foto makanan menjadi insight nutrisi
            </h2>
            <p class="mt-4 text-base leading-7 text-slate-600 dark:text-slate-300">
                Alur sederhana yang membantu kamu memahami makanan tanpa proses yang rumit.
            </p>
        </div>

        <div class="relative mt-12">
            <div class="absolute left-6 top-8 hidden h-[calc(100%-4rem)] w-px bg-gradient-to-b from-emerald-200 via-sky-200 to-emerald-200 dark:from-emerald-400/30 dark:via-sky-400/20 dark:to-emerald-400/30 lg:left-1/2 lg:block"></div>

            <div class="grid gap-5 lg:grid-cols-4">
                @foreach ($steps as $step)
                    <x-landing.timeline-step
                        :number="$step['number']"
                        :icon="$step['icon']"
                        :title="$step['title']"
                        :description="$step['description']"
                    />
                @endforeach
            </div>
        </div>
    </div>
</section>
