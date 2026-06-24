<x-dashboard.layout title="Dashboard">
    @php
        $stats = [
            ['label' => 'Total Scan', 'value' => '128', 'change' => '+12%', 'icon' => 'camera'],
            ['label' => 'Kalori Hari Ini', 'value' => '1.842', 'change' => '+8%', 'icon' => 'clock'],
            ['label' => 'Makanan Favorit', 'value' => '24', 'change' => '+5%', 'icon' => 'heart'],
            ['label' => 'Target Nutrisi', 'value' => '76%', 'change' => '+14%', 'icon' => 'cog'],
        ];

        $quickActions = [
            ['label' => 'Scan Makanan', 'icon' => 'camera'],
            ['label' => 'Riwayat Scan', 'icon' => 'clock'],
            ['label' => 'Favorit', 'icon' => 'heart'],
            ['label' => 'Profil', 'icon' => 'user'],
        ];

        $activities = [
            ['date' => '23 Jun 2026', 'food' => 'Nasi Goreng Ayam', 'calories' => '642 kkal', 'status' => 'Selesai'],
            ['date' => '23 Jun 2026', 'food' => 'Gado-Gado', 'calories' => '410 kkal', 'status' => 'Selesai'],
            ['date' => '22 Jun 2026', 'food' => 'Soto Ayam', 'calories' => '356 kkal', 'status' => 'Diproses'],
            ['date' => '22 Jun 2026', 'food' => 'Roti Gandum', 'calories' => '218 kkal', 'status' => 'Selesai'],
            ['date' => '21 Jun 2026', 'food' => 'Salad Buah', 'calories' => '184 kkal', 'status' => 'Diproses'],
        ];

        $progressItems = [
            ['label' => 'Progress Kalori', 'value' => 72, 'detail' => '1.842 / 2.550 kkal'],
            ['label' => 'Progress Protein', 'value' => 64, 'detail' => '58 / 90 gram'],
            ['label' => 'Progress Lemak', 'value' => 48, 'detail' => '31 / 65 gram'],
            ['label' => 'Progress Karbohidrat', 'value' => 81, 'detail' => '244 / 300 gram'],
        ];
    @endphp

    <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_22rem]">
        <div class="space-y-6">
            <section class="overflow-hidden rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_18rem] lg:items-center">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700 dark:text-emerald-300">
                            Dashboard User
                        </p>
                        <h2 class="mt-3 text-3xl font-extrabold tracking-normal text-slate-950 dark:text-white sm:text-4xl">
                            Halo, {{ Auth::user()->name }}
                        </h2>
                        <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 dark:text-slate-300 sm:text-base">
                            Selamat datang kembali di siGizi. Pantau nutrisi harian dan lakukan analisis makanan dengan AI.
                        </p>
                    </div>

                    <div class="relative mx-auto aspect-square w-full max-w-64">
                        <div class="absolute inset-0 rounded-[2rem] bg-gradient-to-br from-emerald-100 via-white to-sky-100 dark:from-emerald-950 dark:via-slate-900 dark:to-sky-950"></div>
                        <div class="absolute left-1/2 top-1/2 h-32 w-32 -translate-x-1/2 -translate-y-1/2 rounded-full border-[14px] border-white bg-emerald-50 shadow-xl shadow-slate-900/10 dark:border-slate-800 dark:bg-slate-900"></div>
                        <div class="absolute left-10 top-12 h-16 w-16 rounded-full bg-emerald-500 shadow-lg shadow-emerald-600/25"></div>
                        <div class="absolute right-10 top-16 h-12 w-12 rounded-full bg-amber-300 shadow-lg shadow-amber-500/20"></div>
                        <div class="absolute bottom-14 left-20 h-12 w-24 rounded-full bg-rose-300 shadow-lg shadow-rose-500/20"></div>
                        <div class="absolute right-6 top-6 rounded-full bg-white/85 px-3 py-1.5 text-xs font-bold text-emerald-700 shadow-sm dark:bg-slate-950/80 dark:text-emerald-300">
                            AI Ready
                        </div>
                    </div>
                </div>
            </section>

            <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($stats as $stat)
                    <article class="group rounded-3xl border border-white/70 bg-white/80 p-5 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20 dark:hover:border-emerald-400/30">
                        <div class="flex items-center justify-between gap-4">
                            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-emerald-50 text-emerald-700 transition duration-300 group-hover:bg-emerald-600 group-hover:text-white dark:bg-emerald-400/10 dark:text-emerald-300 dark:group-hover:bg-emerald-500">
                                <x-dashboard.icon :name="$stat['icon']" class="h-6 w-6" />
                            </div>
                            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
                                {{ $stat['change'] }}
                            </span>
                        </div>
                        <p class="mt-5 text-3xl font-extrabold tracking-normal text-slate-950 dark:text-white">
                            {{ $stat['value'] }}
                        </p>
                        <p class="mt-1 text-sm font-semibold text-slate-500 dark:text-slate-400">
                            {{ $stat['label'] }}
                        </p>
                    </article>
                @endforeach
            </section>

            <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition-colors duration-300 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-extrabold text-slate-950 dark:text-white">Quick Action</h3>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Akses cepat untuk aktivitas utama siGizi.</p>
                    </div>
                </div>

                <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($quickActions as $action)
                        <button type="button" class="group flex items-center gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-5 text-left shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:bg-white hover:shadow-lg hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:hover:border-emerald-400/30 dark:hover:bg-white/[0.08]">
                            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-emerald-50 text-emerald-700 transition duration-300 group-hover:bg-emerald-600 group-hover:text-white dark:bg-emerald-400/10 dark:text-emerald-300 dark:group-hover:bg-emerald-500">
                                <x-dashboard.icon :name="$action['icon']" class="h-6 w-6" />
                            </span>
                            <span class="font-bold text-slate-900 dark:text-white">{{ $action['label'] }}</span>
                        </button>
                    @endforeach
                </div>
            </section>

            <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition-colors duration-300 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-xl font-extrabold text-slate-950 dark:text-white">Recent Activity</h3>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Ringkasan aktivitas scan makanan terbaru.</p>
                    </div>
                </div>

                @if (count($activities) > 0)
                    <div class="mt-5 overflow-hidden rounded-2xl border border-slate-200 dark:border-white/10">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200 dark:divide-white/10">
                                <thead class="bg-slate-50 dark:bg-white/5">
                                    <tr>
                                        <th scope="col" class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500 dark:text-slate-400">Tanggal</th>
                                        <th scope="col" class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500 dark:text-slate-400">Nama Makanan</th>
                                        <th scope="col" class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500 dark:text-slate-400">Kalori</th>
                                        <th scope="col" class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500 dark:text-slate-400">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200 bg-white/60 dark:divide-white/10 dark:bg-transparent">
                                    @foreach ($activities as $activity)
                                        <tr class="transition duration-300 hover:bg-emerald-50/70 dark:hover:bg-emerald-400/5">
                                            <td class="whitespace-nowrap px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-300">{{ $activity['date'] }}</td>
                                            <td class="whitespace-nowrap px-5 py-4 text-sm font-bold text-slate-950 dark:text-white">{{ $activity['food'] }}</td>
                                            <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600 dark:text-slate-300">{{ $activity['calories'] }}</td>
                                            <td class="whitespace-nowrap px-5 py-4">
                                                <span @class([
                                                    'inline-flex rounded-full px-3 py-1 text-xs font-bold',
                                                    'bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300' => $activity['status'] === 'Selesai',
                                                    'bg-amber-50 text-amber-700 dark:bg-amber-400/10 dark:text-amber-300' => $activity['status'] === 'Diproses',
                                                ])>
                                                    {{ $activity['status'] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="mt-5 rounded-3xl border border-dashed border-emerald-200 bg-emerald-50/40 p-10 text-center dark:border-emerald-400/20 dark:bg-emerald-400/5">
                        <div class="mx-auto grid h-16 w-16 place-items-center rounded-3xl bg-white text-emerald-600 shadow-lg shadow-emerald-900/10 dark:bg-white/10 dark:text-emerald-300">
                            <x-dashboard.icon name="camera" class="h-8 w-8" />
                        </div>
                        <p class="mt-4 text-lg font-extrabold text-slate-950 dark:text-white">Belum ada aktivitas scan.</p>
                    </div>
                @endif
            </section>
        </div>

        <aside class="space-y-6">
            <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition-colors duration-300 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                <h3 class="text-xl font-extrabold text-slate-950 dark:text-white">Target Harian</h3>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Progress nutrisi berdasarkan dummy data.</p>

                <div class="mt-6 space-y-6">
                    @foreach ($progressItems as $item)
                        <div>
                            <div class="mb-2 flex items-center justify-between gap-3">
                                <div>
                                    <p class="text-sm font-bold text-slate-900 dark:text-white">{{ $item['label'] }}</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $item['detail'] }}</p>
                                </div>
                                <span class="text-sm font-extrabold text-emerald-700 dark:text-emerald-300">{{ $item['value'] }}%</span>
                            </div>
                            <div class="h-3 overflow-hidden rounded-full bg-slate-100 dark:bg-white/10">
                                <div class="h-full rounded-full bg-emerald-500 shadow-lg shadow-emerald-500/30" style="width: {{ $item['value'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="rounded-3xl border border-emerald-200 bg-emerald-50/80 p-6 shadow-lg shadow-emerald-900/10 backdrop-blur transition duration-300 hover:-translate-y-1 dark:border-emerald-400/20 dark:bg-emerald-400/10">
                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-emerald-600 text-white shadow-lg shadow-emerald-600/25">
                    <x-dashboard.icon name="heart" class="h-6 w-6" />
                </div>
                <h3 class="mt-5 text-lg font-extrabold text-slate-950 dark:text-white">Tips Nutrisi</h3>
                <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Lengkapi hari ini dengan sumber protein dan serat agar target nutrisi lebih seimbang.
                </p>
            </section>
        </aside>
    </div>
</x-dashboard.layout>
