<x-dashboard.layout title="Profil">
    @php
        $profile = [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'joined' => '14 Januari 2025',
            'phone' => '+62 812 3456 7890',
            'gender' => 'Laki-laki',
            'birthday' => '10 Maret 1995',
            'height' => '175 cm',
            'weight' => '72 kg',
            'target' => '2.200 kkal',
        ];

        $stats = [
            ['label' => 'Total Scan', 'value' => '184', 'icon' => 'camera'],
            ['label' => 'Favorit', 'value' => '18', 'icon' => 'heart'],
            ['label' => 'Rata-rata Kalori', 'value' => '582 kkal', 'icon' => 'clock'],
            ['label' => 'Akurasi AI', 'value' => '95%', 'icon' => 'cog'],
        ];

        $preferences = [
            ['label' => 'Tema', 'value' => 'Gelap'],
            ['label' => 'Bahasa', 'value' => 'Indonesia'],
            ['label' => 'Notifikasi', 'value' => 'Aktif'],
            ['label' => 'Sinkronisasi', 'value' => 'Menyala'],
        ];

        $activities = [
            ['date' => '23 Jun 2026', 'activity' => 'Scan Nasi Goreng', 'status' => 'Selesai'],
            ['date' => '22 Jun 2026', 'activity' => 'Tambah Favorit Ayam Bakar', 'status' => 'Selesai'],
            ['date' => '21 Jun 2026', 'activity' => 'Edit Profil', 'status' => 'Selesai'],
            ['date' => '20 Jun 2026', 'activity' => 'Scan Gado-gado', 'status' => 'Selesai'],
            ['date' => '19 Jun 2026', 'activity' => 'Scan Pecel Lele', 'status' => 'Selesai'],
            ['date' => '18 Jun 2026', 'activity' => 'Hapus Favorit Bakso', 'status' => 'Selesai'],
        ];
    @endphp

    <div class="space-y-6">
        <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700 dark:text-emerald-300">Profil</p>
                    <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-950 dark:text-white sm:text-4xl">Profil</h1>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300 sm:text-base">Kelola informasi akun dan preferensi Anda.</p>
                </div>

                <button type="button" class="inline-flex items-center justify-center rounded-2xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-emerald-700">
                    <x-dashboard.icon name="cog" class="mr-2 h-4 w-4" /> Edit Profil
                </button>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_28rem]">
            <div class="space-y-6">
                <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                    <div class="flex flex-col items-center gap-4 text-center">
                        <div class="grid h-28 w-28 place-items-center rounded-3xl bg-emerald-100 text-4xl font-extrabold text-emerald-700 shadow-lg shadow-emerald-900/10">BS</div>
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-950 dark:text-white">{{ $profile['name'] }}</h2>
                            <p class="text-sm text-slate-500 dark:text-slate-400">{{ $profile['email'] }}</p>
                        </div>
                        <div class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
                            Premium
                        </div>
                        <div class="grid gap-2 rounded-3xl bg-slate-50 p-4 text-sm text-slate-700 dark:bg-white/5 dark:text-slate-200">
                            <p><span class="font-semibold text-slate-900 dark:text-white">Bergabung sejak</span> {{ $profile['joined'] }}</p>
                        </div>
                        <button type="button" class="rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition duration-300 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-300">Ubah Foto</button>
                    </div>
                </section>

                <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                    <h2 class="text-xl font-extrabold text-slate-950 dark:text-white">Informasi Akun</h2>
                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl bg-slate-50 p-4 dark:bg-white/5">
                            <p class="text-sm text-slate-500 dark:text-slate-400">Nama</p>
                            <p class="mt-2 font-semibold text-slate-950 dark:text-white">{{ $profile['name'] }}</p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-4 dark:bg-white/5">
                            <p class="text-sm text-slate-500 dark:text-slate-400">Email</p>
                            <p class="mt-2 font-semibold text-slate-950 dark:text-white">{{ $profile['email'] }}</p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-4 dark:bg-white/5">
                            <p class="text-sm text-slate-500 dark:text-slate-400">Nomor HP</p>
                            <p class="mt-2 font-semibold text-slate-950 dark:text-white">{{ $profile['phone'] }}</p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-4 dark:bg-white/5">
                            <p class="text-sm text-slate-500 dark:text-slate-400">Jenis Kelamin</p>
                            <p class="mt-2 font-semibold text-slate-950 dark:text-white">{{ $profile['gender'] }}</p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-4 dark:bg-white/5">
                            <p class="text-sm text-slate-500 dark:text-slate-400">Tanggal Lahir</p>
                            <p class="mt-2 font-semibold text-slate-950 dark:text-white">{{ $profile['birthday'] }}</p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-4 dark:bg-white/5">
                            <p class="text-sm text-slate-500 dark:text-slate-400">Tinggi Badan</p>
                            <p class="mt-2 font-semibold text-slate-950 dark:text-white">{{ $profile['height'] }}</p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-4 dark:bg-white/5">
                            <p class="text-sm text-slate-500 dark:text-slate-400">Berat Badan</p>
                            <p class="mt-2 font-semibold text-slate-950 dark:text-white">{{ $profile['weight'] }}</p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-4 dark:bg-white/5">
                            <p class="text-sm text-slate-500 dark:text-slate-400">Target Kalori</p>
                            <p class="mt-2 font-semibold text-slate-950 dark:text-white">{{ $profile['target'] }}</p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="space-y-6">
                <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                    <h2 class="text-xl font-extrabold text-slate-950 dark:text-white">Statistik</h2>
                    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                        @foreach ($stats as $stat)
                            <article class="rounded-3xl border border-white/70 bg-white/80 p-4 shadow-sm shadow-slate-900/5 transition duration-300 hover:shadow-lg hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/10">
                                <div class="flex items-center justify-between gap-4">
                                    <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">{{ $stat['label'] }}</p>
                                    <div class="grid h-10 w-10 place-items-center rounded-2xl bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
                                        <x-dashboard.icon :name="$stat['icon']" class="h-5 w-5" />
                                    </div>
                                </div>
                                <p class="mt-4 text-3xl font-extrabold text-slate-950 dark:text-white">{{ $stat['value'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-extrabold text-slate-950 dark:text-white">Preferensi</h2>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Kelola preferensi tampilan dan sinkronisasi.</p>
                        </div>
                    </div>
                    <div class="mt-6 space-y-4">
                        @foreach ($preferences as $preference)
                            <div class="flex items-center justify-between gap-4 rounded-3xl border border-slate-200 bg-slate-50 px-4 py-4 dark:border-white/10 dark:bg-white/5">
                                <div>
                                    <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ $preference['label'] }}</p>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ $preference['value'] }}</p>
                                </div>
                                <input type="checkbox" class="toggle toggle-sm toggle-success" checked />
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="rounded-3xl border border-white/70 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-300 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-extrabold text-slate-950 dark:text-white">Aktivitas Terakhir</h2>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Riwayat tindakan terakhir di akun Anda.</p>
                        </div>
                    </div>
                    <div class="mt-6 overflow-hidden rounded-3xl border border-slate-200 dark:border-white/10">
                        <table class="min-w-full divide-y divide-slate-200 dark:divide-white/10">
                            <thead class="bg-slate-50 dark:bg-white/5">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Tanggal</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Aktivitas</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white/60 dark:divide-white/10 dark:bg-transparent">
                                @foreach ($activities as $activity)
                                    <tr class="transition duration-300 hover:bg-emerald-50/70 dark:hover:bg-emerald-400/5">
                                        <td class="px-4 py-4 text-sm font-medium text-slate-600 dark:text-slate-300">{{ $activity['date'] }}</td>
                                        <td class="px-4 py-4 text-sm font-semibold text-slate-950 dark:text-white">{{ $activity['activity'] }}</td>
                                        <td class="px-4 py-4 text-sm">
                                            <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">{{ $activity['status'] }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </section>
    </div>
</x-dashboard.layout>
