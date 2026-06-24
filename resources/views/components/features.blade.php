@php
    $features = [
        ['icon' => 'sparkles', 'title' => 'AI Food Recognition', 'description' => 'Kenali jenis makanan dari foto dengan bantuan kecerdasan buatan.'],
        ['icon' => 'chart-pie', 'title' => 'Nutrition Analysis', 'description' => 'Lihat estimasi nutrisi utama dalam format yang mudah dipahami.'],
        ['icon' => 'fire', 'title' => 'Calories Calculation', 'description' => 'Hitung perkiraan kalori untuk membantu mengelola porsi makan.'],
        ['icon' => 'bolt', 'title' => 'Protein Analysis', 'description' => 'Pantau kandungan protein agar target harian lebih terarah.'],
        ['icon' => 'beaker', 'title' => 'Fat Analysis', 'description' => 'Pahami estimasi lemak sebagai bagian dari evaluasi makanan.'],
        ['icon' => 'cube', 'title' => 'Carbohydrate Analysis', 'description' => 'Perkirakan karbohidrat untuk menyeimbangkan energi harian.'],
        ['icon' => 'heart', 'title' => 'Healthy Recommendation', 'description' => 'Dapatkan saran yang relevan berdasarkan hasil analisis makanan.'],
        ['icon' => 'clock', 'title' => 'Scan History', 'description' => 'Simpan riwayat scan agar progres nutrisi mudah ditinjau kembali.'],
    ];
@endphp

<section id="fitur" class="relative bg-slate-50 py-16 transition-colors duration-300 dark:bg-slate-950 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-flex rounded-full border border-emerald-200 bg-white px-4 py-2 text-sm font-semibold text-emerald-700 shadow-sm dark:border-emerald-400/20 dark:bg-white/5 dark:text-emerald-300">
                Fitur siGizi
            </span>
            <h2 class="mt-5 text-3xl font-extrabold tracking-normal text-slate-950 sm:text-4xl dark:text-white">
                Semua yang dibutuhkan untuk memahami isi piringmu
            </h2>
            <p class="mt-4 text-base leading-7 text-slate-600 dark:text-slate-300">
                Mulai dari pengenalan makanan, estimasi kalori, sampai rekomendasi sehat yang bisa langsung dipakai.
            </p>
        </div>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($features as $feature)
                <x-landing.feature-card
                    :icon="$feature['icon']"
                    :title="$feature['title']"
                    :description="$feature['description']"
                />
            @endforeach
        </div>
    </div>
</section>
