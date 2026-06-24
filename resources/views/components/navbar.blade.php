@php
    $navigation = [
        ['label' => 'Beranda', 'href' => '/', 'active' => request()->is('/')],
        ['label' => 'Fitur', 'href' => '#fitur', 'active' => false],
        ['label' => 'Cara Kerja', 'href' => '#cara-kerja', 'active' => false],
        ['label' => 'Tentang', 'href' => '#tentang', 'active' => false],
        ['label' => 'Kontak', 'href' => '#kontak', 'active' => false],
    ];
@endphp

<nav class="sticky top-0 z-50 border-b border-emerald-900/10 bg-white/85 shadow-sm shadow-slate-900/5 backdrop-blur-xl transition-colors duration-300 dark:border-white/10 dark:bg-slate-950/80 dark:shadow-black/20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            <a href="/" class="group flex min-w-0 items-center gap-3" aria-label="siGizi Beranda">
                <span class="grid h-11 w-11 shrink-0 place-items-center rounded-2xl bg-emerald-600 text-lg font-extrabold text-white shadow-lg shadow-emerald-600/25 transition duration-300 group-hover:-translate-y-0.5 group-hover:shadow-emerald-600/35">
                    sG
                </span>
                <span class="min-w-0">
                    <span class="block text-xl font-extrabold leading-6 tracking-normal text-slate-950 dark:text-white">siGizi</span>
                    <span class="block text-xs font-medium text-slate-500 dark:text-slate-400">AI Nutrition Assistant</span>
                </span>
            </a>

            <div class="hidden items-center gap-1 lg:flex">
                @foreach ($navigation as $item)
                    <x-landing.nav-link :href="$item['href']" :active="$item['active']">
                        {{ $item['label'] }}
                    </x-landing.nav-link>
                @endforeach
            </div>

            <div class="hidden items-center gap-3 lg:flex">
                <x-landing.theme-toggle />

                <a href="/login" class="rounded-full px-5 py-2.5 text-sm font-semibold text-slate-700 transition duration-300 hover:bg-slate-100 hover:text-emerald-700 dark:text-slate-200 dark:hover:bg-white/10 dark:hover:text-emerald-300">
                    Masuk
                </a>

                <a href="/register" class="rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-600/25 transition duration-300 hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-emerald-600/35 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-slate-950">
                    Daftar
                </a>
            </div>

            <div class="flex items-center gap-2 lg:hidden">
                <x-landing.theme-toggle />

                <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 transition duration-300 hover:border-emerald-300 hover:text-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:border-white/10 dark:bg-white/5 dark:text-slate-100 dark:hover:border-emerald-400/60" x-on:click="mobileMenuOpen = ! mobileMenuOpen" :aria-expanded="mobileMenuOpen.toString()" aria-controls="mobile-navigation" aria-label="Buka menu navigasi">
                    <span class="sr-only">Menu</span>
                    <span class="relative block h-5 w-5">
                        <span class="absolute left-0 top-1 block h-0.5 w-5 rounded-full bg-current transition duration-300" :class="{ 'translate-y-2 rotate-45': mobileMenuOpen }"></span>
                        <span class="absolute left-0 top-2.5 block h-0.5 w-5 rounded-full bg-current transition duration-300" :class="{ 'opacity-0': mobileMenuOpen }"></span>
                        <span class="absolute left-0 top-4 block h-0.5 w-5 rounded-full bg-current transition duration-300" :class="{ '-translate-y-1.5 -rotate-45': mobileMenuOpen }"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-navigation" class="border-t border-slate-200 bg-white/95 px-4 py-4 shadow-xl shadow-slate-900/10 backdrop-blur-xl transition-colors duration-300 dark:border-white/10 dark:bg-slate-950/95 lg:hidden" x-cloak x-show="mobileMenuOpen" x-transition.origin.top>
        <div class="mx-auto flex max-w-7xl flex-col gap-2">
            @foreach ($navigation as $item)
                <x-landing.mobile-nav-link :href="$item['href']" :active="$item['active']" x-on:click="mobileMenuOpen = false">
                    {{ $item['label'] }}
                </x-landing.mobile-nav-link>
            @endforeach

            <div class="mt-3 grid grid-cols-2 gap-3 border-t border-slate-200 pt-4 dark:border-white/10">
                <a href="/login" class="rounded-full border border-slate-200 px-4 py-3 text-center text-sm font-semibold text-slate-700 transition duration-300 hover:border-emerald-300 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:text-slate-200 dark:hover:bg-white/10 dark:hover:text-emerald-300">
                    Masuk
                </a>
                <a href="/register" class="rounded-full bg-emerald-600 px-4 py-3 text-center text-sm font-semibold text-white shadow-lg shadow-emerald-600/25 transition duration-300 hover:bg-emerald-700">
                    Daftar
                </a>
            </div>
        </div>
    </div>
</nav>
