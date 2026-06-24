<x-dashboard.layout title="Favorit">
    @php
        $stats = [
            ['label' => 'Total Favorit', 'value' => '18', 'icon' => 'heart'],
            ['label' => 'Kalori Rata-rata', 'value' => '514 kkal', 'icon' => 'clock'],
            ['label' => 'Protein Rata-rata', 'value' => '29 g', 'icon' => 'camera'],
            ['label' => 'Kategori Terbanyak', 'value' => 'Makanan Berat', 'icon' => 'cog'],
        ];

        $favorites = [
            ['name' => 'Nasi Goreng', 'category' => 'Makanan Berat', 'calories' => '642 kkal', 'protein' => '22 g', 'carbs' => '78 g', 'fat' => '24 g', 'rating' => '96%', 'saved' => '21 Jun 2026', 'image' => asset('images/placeholder-food.svg')],
            ['name' => 'Ayam Bakar', 'category' => 'Makanan Berat', 'calories' => '511 kkal', 'protein' => '35 g', 'carbs' => '18 g', 'fat' => '30 g', 'rating' => '94%', 'saved' => '20 Jun 2026', 'image' => asset('images/placeholder-food.svg')],
            ['name' => 'Rendang', 'category' => 'Makanan Berat', 'calories' => '689 kkal', 'protein' => '29 g', 'carbs' => '22 g', 'fat' => '52 g', 'rating' => '92%', 'saved' => '19 Jun 2026', 'image' => asset('images/placeholder-food.svg')],
            ['name' => 'Sate Ayam', 'category' => 'Makanan Ringan', 'calories' => '398 kkal', 'protein' => '28 g', 'carbs' => '14 g', 'fat' => '24 g', 'rating' => '95%', 'saved' => '18 Jun 2026', 'image' => asset('images/placeholder-food.svg')],
            ['name' => 'Gado-gado', 'category' => 'Healthy Food', 'calories' => '410 kkal', 'protein' => '14 g', 'carbs' => '34 g', 'fat' => '24 g', 'rating' => '96%', 'saved' => '17 Jun 2026', 'image' => asset('images/placeholder-food.svg')],
            ['name' => 'Pecel Lele', 'category' => 'Makanan Berat', 'calories' => '482 kkal', 'protein' => '27 g', 'carbs' => '26 g', 'fat' => '28 g', 'rating' => '97%', 'saved' => '16 Jun 2026', 'image' => asset('images/placeholder-food.svg')],
            ['name' => 'Soto Ayam', 'category' => 'Makanan Ringan', 'calories' => '356 kkal', 'protein' => '21 g', 'carbs' => '28 g', 'fat' => '14 g', 'rating' => '94%', 'saved' => '15 Jun 2026', 'image' => asset('images/placeholder-food.svg')],
            ['name' => 'Bakso', 'category' => 'Makanan Ringan', 'calories' => '514 kkal', 'protein' => '32 g', 'carbs' => '39 g', 'fat' => '21 g', 'rating' => '93%', 'saved' => '14 Jun 2026', 'image' => asset('images/placeholder-food.svg')],
        ];
    @endphp

    <div class="space-y-6">
        <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700 dark:text-emerald-300">Favorit</p>
                    <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-950 dark:text-white sm:text-4xl">Favorit</h1>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300 sm:text-base">Daftar makanan favorit yang disimpan untuk referensi cepat.</p>
                </div>

                <button type="button" class="inline-flex items-center justify-center rounded-2xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-emerald-700">
                    <x-dashboard.icon name="heart" class="mr-2 h-4 w-4" /> Tambah Favorit
                </button>
            </div>
        </section>

        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($stats as $stat)
                <article class="rounded-3xl border border-white/70 bg-white/80 p-5 shadow-sm shadow-slate-900/5 transition duration-300 hover:shadow-lg hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/10">
                    <div class="flex items-center justify-between gap-4">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
                            <x-dashboard.icon :name="$stat['icon']" class="h-5 w-5" />
                        </div>
                        <div class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">Favorit</div>
                    </div>
                    <p class="mt-5 text-3xl font-extrabold text-slate-950 dark:text-white">{{ $stat['value'] }}</p>
                    <p class="mt-1 text-sm font-semibold text-slate-500 dark:text-slate-400">{{ $stat['label'] }}</p>
                </article>
            @endforeach
        </section>

        <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <label for="search-favorites" class="sr-only">Cari makanan favorit</label>
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <div class="flex-1">
                            <input id="search-favorites" type="text" placeholder="Cari makanan favorit..." class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 transition duration-300 focus:border-emerald-300 focus:outline-none focus:ring-2 focus:ring-emerald-200 dark:border-white/10 dark:bg-slate-950 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-emerald-400 dark:focus:ring-emerald-500/20" />
                        </div>
                        <div class="w-full max-w-xs">
                            <select class="w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 transition duration-300 focus:border-emerald-300 focus:outline-none focus:ring-2 focus:ring-emerald-200 dark:border-white/10 dark:bg-slate-950 dark:text-white dark:focus:border-emerald-400 dark:focus:ring-emerald-500/20">
                                <option>Semua</option>
                                <option>Makanan Berat</option>
                                <option>Makanan Ringan</option>
                                <option>Minuman</option>
                                <option>Healthy Food</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-4 lg:grid-cols-2">
            @foreach ($favorites as $item)
                <article class="overflow-hidden rounded-3xl border border-white/70 bg-white/80 shadow-lg shadow-slate-900/5 transition duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                    <div class="relative overflow-hidden rounded-t-3xl">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="h-44 w-full object-cover" />
                        <span class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-full bg-emerald-600/90 px-3 py-2 text-xs font-bold text-white shadow-lg shadow-emerald-900/20">
                            <x-dashboard.icon name="heart" class="h-4 w-4" /> Favorit
                        </span>
                    </div>
                    <div class="space-y-4 p-5">
                        <div>
                            <h2 class="text-lg font-extrabold text-slate-950 dark:text-white">{{ $item['name'] }}</h2>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $item['category'] }}</p>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-3xl bg-slate-50 p-4 text-sm text-slate-700 dark:bg-white/5 dark:text-slate-200">
                                <p class="font-semibold">Kalori</p>
                                <p class="mt-2 text-base font-bold">{{ $item['calories'] }}</p>
                            </div>
                            <div class="rounded-3xl bg-slate-50 p-4 text-sm text-slate-700 dark:bg-white/5 dark:text-slate-200">
                                <p class="font-semibold">Protein</p>
                                <p class="mt-2 text-base font-bold">{{ $item['protein'] }}</p>
                            </div>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-3xl bg-slate-50 p-4 text-sm text-slate-700 dark:bg-white/5 dark:text-slate-200">
                                <p class="font-semibold">Karbohidrat</p>
                                <p class="mt-2 text-base font-bold">{{ $item['carbs'] }}</p>
                            </div>
                            <div class="rounded-3xl bg-slate-50 p-4 text-sm text-slate-700 dark:bg-white/5 dark:text-slate-200">
                                <p class="font-semibold">Lemak</p>
                                <p class="mt-2 text-base font-bold">{{ $item['fat'] }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div class="rounded-3xl bg-slate-50 px-4 py-3 text-sm text-slate-700 dark:bg-white/5 dark:text-slate-200">
                                Rating AI <span class="font-bold text-slate-950 dark:text-white">{{ $item['rating'] }}</span>
                            </div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">Disimpan {{ $item['saved'] }}</div>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <button type="button" class="flex-1 rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 transition duration-300 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-300">Lihat Detail</button>
                            <button type="button" class="flex-1 rounded-2xl bg-rose-600 px-4 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-rose-700">Hapus Favorit</button>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>

        {{--
        <section class="rounded-3xl border border-dashed border-emerald-200 bg-emerald-50/40 p-10 text-center dark:border-emerald-400/20 dark:bg-emerald-400/10">
            <div class="mx-auto grid h-16 w-16 place-items-center rounded-3xl bg-white text-emerald-600 shadow-lg shadow-emerald-900/10 dark:bg-white/10 dark:text-emerald-300">
                <x-dashboard.icon name="heart" class="h-8 w-8" />
            </div>
            <h2 class="mt-6 text-2xl font-extrabold text-slate-950 dark:text-white">Belum ada makanan favorit.</h2>
            <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">Simpan makanan favorit agar lebih mudah diakses kembali.</p>
            <button type="button" class="mt-6 rounded-3xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-emerald-700">Jelajahi Makanan</button>
        </section>
        --}}

        <section class="flex flex-col items-center justify-between gap-4 rounded-3xl border border-white/70 bg-white/80 p-5 shadow-sm shadow-slate-900/5 transition duration-300 hover:shadow-lg hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/10 sm:flex-row">
            <div class="text-sm text-slate-600 dark:text-slate-400">Menampilkan 8 makanan favorit.</div>
            <div class="flex flex-wrap gap-2">
                <button type="button" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition duration-300 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-300">Previous</button>
                <button type="button" class="rounded-2xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition duration-300 hover:bg-emerald-700">1</button>
                <button type="button" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition duration-300 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-300">2</button>
                <button type="button" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition duration-300 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-300">3</button>
                <button type="button" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition duration-300 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-300">Next</button>
            </div>
        </section>
    </div>
</x-dashboard.layout>
