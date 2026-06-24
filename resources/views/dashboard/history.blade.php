<x-dashboard.layout title="Riwayat Scan">
    @php
        $stats = [
            ['label' => 'Total Scan', 'value' => '184', 'icon' => 'camera'],
            ['label' => 'Scan Minggu Ini', 'value' => '38', 'icon' => 'clock'],
            ['label' => 'Rata-rata Kalori', 'value' => '582', 'icon' => 'heart'],
            ['label' => 'Rata-rata Confidence', 'value' => '95%', 'icon' => 'cog'],
        ];

        $historyItems = [
            ['name' => 'Nasi Goreng', 'date' => '23 Jun 2026', 'time' => '08:15', 'status' => 'Berhasil', 'calories' => '642 kkal', 'protein' => '22 g', 'carbs' => '78 g', 'fat' => '24 g', 'confidence' => '95%', 'image' => 'https://via.placeholder.com/120x96?text=Nasi+Goreng'],
            ['name' => 'Ayam Bakar', 'date' => '22 Jun 2026', 'time' => '12:40', 'status' => 'Berhasil', 'calories' => '511 kkal', 'protein' => '35 g', 'carbs' => '18 g', 'fat' => '30 g', 'confidence' => '93%', 'image' => 'https://via.placeholder.com/120x96?text=Ayam+Bakar'],
            ['name' => 'Gado-gado', 'date' => '22 Jun 2026', 'time' => '18:03', 'status' => 'Berhasil', 'calories' => '410 kkal', 'protein' => '14 g', 'carbs' => '34 g', 'fat' => '24 g', 'confidence' => '96%', 'image' => 'https://via.placeholder.com/120x96?text=Gado-Gado'],
            ['name' => 'Soto Ayam', 'date' => '21 Jun 2026', 'time' => '09:20', 'status' => 'Berhasil', 'calories' => '356 kkal', 'protein' => '21 g', 'carbs' => '28 g', 'fat' => '14 g', 'confidence' => '94%', 'image' => 'https://via.placeholder.com/120x96?text=Soto+Ayam'],
            ['name' => 'Bakso', 'date' => '21 Jun 2026', 'time' => '14:55', 'status' => 'Berhasil', 'calories' => '514 kkal', 'protein' => '32 g', 'carbs' => '39 g', 'fat' => '21 g', 'confidence' => '92%', 'image' => 'https://via.placeholder.com/120x96?text=Bakso'],
            ['name' => 'Rendang', 'date' => '20 Jun 2026', 'time' => '19:10', 'status' => 'Berhasil', 'calories' => '689 kkal', 'protein' => '29 g', 'carbs' => '22 g', 'fat' => '52 g', 'confidence' => '91%', 'image' => 'https://via.placeholder.com/120x96?text=Rendang'],
            ['name' => 'Mie Goreng', 'date' => '20 Jun 2026', 'time' => '11:30', 'status' => 'Berhasil', 'calories' => '578 kkal', 'protein' => '18 g', 'carbs' => '82 g', 'fat' => '21 g', 'confidence' => '94%', 'image' => 'https://via.placeholder.com/120x96?text=Mie+Goreng'],
            ['name' => 'Pecel Lele', 'date' => '19 Jun 2026', 'time' => '20:05', 'status' => 'Berhasil', 'calories' => '482 kkal', 'protein' => '27 g', 'carbs' => '26 g', 'fat' => '28 g', 'confidence' => '97%', 'image' => 'https://via.placeholder.com/120x96?text=Pecel+Lele'],
        ];
    @endphp

    <div class="space-y-6">
        <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700 dark:text-emerald-300">Riwayat Scan</p>
                    <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-950 dark:text-white sm:text-4xl">Riwayat Scan</h1>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300 sm:text-base">Lihat semua hasil analisis makanan yang pernah dilakukan.</p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <button type="button" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 transition duration-300 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-300">
                        <x-dashboard.icon name="magnifying-glass" class="mr-2 h-4 w-4" /> Filter
                    </button>
                    <button type="button" class="inline-flex items-center justify-center rounded-2xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-emerald-700">
                        <x-dashboard.icon name="arrow-left-on-rectangle" class="mr-2 h-4 w-4 rotate-180" /> Export
                    </button>
                </div>
            </div>
        </section>

        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($stats as $stat)
                <article class="rounded-3xl border border-white/70 bg-white/80 p-5 shadow-sm shadow-slate-900/5 transition duration-300 hover:shadow-lg hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/10">
                    <div class="flex items-center justify-between gap-4">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
                            <x-dashboard.icon :name="$stat['icon']" class="h-5 w-5" />
                        </div>
                        <div class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">Live</div>
                    </div>
                    <p class="mt-5 text-3xl font-extrabold text-slate-950 dark:text-white">{{ $stat['value'] }}</p>
                    <p class="mt-1 text-sm font-semibold text-slate-500 dark:text-slate-400">{{ $stat['label'] }}</p>
                </article>
            @endforeach
        </section>

        <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <label for="search" class="sr-only">Cari makanan</label>
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <div class="flex-1">
                            <input id="search" type="text" placeholder="Cari makanan..." class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 transition duration-300 focus:border-emerald-300 focus:outline-none focus:ring-2 focus:ring-emerald-200 dark:border-white/10 dark:bg-slate-950 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-emerald-400 dark:focus:ring-emerald-500/20" />
                        </div>
                        <div class="w-full max-w-xs">
                            <select class="w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 transition duration-300 focus:border-emerald-300 focus:outline-none focus:ring-2 focus:ring-emerald-200 dark:border-white/10 dark:bg-slate-950 dark:text-white dark:focus:border-emerald-400 dark:focus:ring-emerald-500/20">
                                <option>Semua</option>
                                <option>Hari Ini</option>
                                <option>Minggu Ini</option>
                                <option>Bulan Ini</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-6 lg:grid-cols-2">
            @foreach ($historyItems as $item)
                <article class="overflow-hidden rounded-3xl border border-white/70 bg-white/80 shadow-lg shadow-slate-900/5 transition duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                    <div class="grid gap-6 p-6 sm:grid-cols-[120px_minmax(0,1fr)]">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="h-28 w-full rounded-3xl object-cover shadow-sm shadow-slate-900/10" />
                        <div class="space-y-4">
                            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700 dark:text-emerald-300">{{ $item['status'] }}</p>
                                    <h2 class="mt-1 text-xl font-extrabold text-slate-950 dark:text-white">{{ $item['name'] }}</h2>
                                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">{{ $item['date'] }} · {{ $item['time'] }}</p>
                                </div>
                                <div class="rounded-3xl bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-700 dark:bg-white/5 dark:text-slate-200">Confidence {{ $item['confidence'] }}</div>
                            </div>

                            <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
                                <div class="rounded-3xl bg-slate-50 p-4 text-sm text-slate-700 dark:bg-white/5 dark:text-slate-200">
                                    <p class="font-semibold">Kalori</p>
                                    <p class="mt-2 text-base font-bold">{{ $item['calories'] }}</p>
                                </div>
                                <div class="rounded-3xl bg-slate-50 p-4 text-sm text-slate-700 dark:bg-white/5 dark:text-slate-200">
                                    <p class="font-semibold">Protein</p>
                                    <p class="mt-2 text-base font-bold">{{ $item['protein'] }}</p>
                                </div>
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
                                <div class="text-sm text-slate-500 dark:text-slate-400">Analisis AI lengkap untuk setiap makanan. Dummy data.</div>
                                <div class="flex flex-wrap gap-3">
                                    <button type="button" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition duration-300 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-300">Lihat Detail</button>
                                    <button type="button" class="rounded-2xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition duration-300 hover:bg-emerald-700">Scan Lagi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>

        {{--
        <section class="rounded-3xl border border-dashed border-emerald-200 bg-emerald-50/40 p-10 text-center dark:border-emerald-400/20 dark:bg-emerald-400/10">
            <div class="mx-auto grid h-16 w-16 place-items-center rounded-3xl bg-white text-emerald-600 shadow-lg shadow-emerald-900/10 dark:bg-white/10 dark:text-emerald-300">
                <x-dashboard.icon name="camera" class="h-8 w-8" />
            </div>
            <h2 class="mt-6 text-2xl font-extrabold text-slate-950 dark:text-white">Belum ada riwayat scan.</h2>
            <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">Mulai analisis makanan pertamamu.</p>
            <button type="button" class="mt-6 rounded-3xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-emerald-700">Scan Sekarang</button>
        </section>
        --}}

        <section class="flex flex-col items-center justify-between gap-4 rounded-3xl border border-white/70 bg-white/80 p-5 shadow-sm shadow-slate-900/5 transition duration-300 hover:shadow-lg hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/10 sm:flex-row">
            <div class="text-sm text-slate-600 dark:text-slate-400">Menampilkan 8 hasil riwayat scan.</div>
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
