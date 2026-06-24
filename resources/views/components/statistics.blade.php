@php
    $statistics = [
        ['value' => 10000, 'suffix' => '+', 'label' => 'Scan Makanan', 'description' => 'Data scan membantu pengguna memahami asupan harian.'],
        ['value' => 95, 'suffix' => '%', 'label' => 'Akurasi AI', 'description' => 'Pengenalan makanan dibuat cepat dan konsisten.'],
        ['value' => 500, 'suffix' => '+', 'label' => 'Artikel Gizi', 'description' => 'Referensi edukasi untuk kebiasaan makan lebih baik.'],
        ['value' => 24, 'suffix' => '/7', 'label' => 'AI Assistant', 'description' => 'Pendamping nutrisi siap membantu kapan saja.'],
    ];
@endphp

<section id="statistik" class="relative border-y border-slate-200/80 bg-white py-16 transition-colors duration-300 dark:border-white/10 dark:bg-slate-900/40 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($statistics as $statistic)
                <x-landing.stat-card
                    :value="$statistic['value']"
                    :suffix="$statistic['suffix']"
                    :label="$statistic['label']"
                    :description="$statistic['description']"
                />
            @endforeach
        </div>
    </div>
</section>
