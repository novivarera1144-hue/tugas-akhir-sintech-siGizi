@props([
    'title' => 'Dashboard',
])

<header class="sticky top-0 z-30 border-b border-white/70 bg-slate-50/85 px-4 py-4 backdrop-blur-xl transition-colors duration-300 dark:border-white/10 dark:bg-slate-950/80 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between gap-4">
        <div class="flex min-w-0 items-center gap-3">
            <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm transition duration-300 hover:border-emerald-300 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-100 lg:hidden" x-on:click="sidebarOpen = true" aria-label="Buka sidebar">
                <x-dashboard.icon name="bars-3" class="h-5 w-5" />
            </button>

            <div class="min-w-0">
                <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700 dark:text-emerald-300">siGizi</p>
                <h1 class="truncate text-xl font-extrabold tracking-normal text-slate-950 dark:text-white sm:text-2xl">
                    {{ $title }}
                </h1>
            </div>
        </div>

        <div class="hidden flex-1 justify-center px-4 md:flex">
            <label class="relative w-full max-w-md">
                <span class="sr-only">Cari</span>
                <x-dashboard.icon name="magnifying-glass" class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" />
                <input type="search" placeholder="Cari sesuatu..." class="h-12 w-full rounded-2xl border border-slate-200 bg-white/80 pl-11 pr-4 text-sm text-slate-700 shadow-sm transition duration-300 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-emerald-400 dark:border-white/10 dark:bg-white/5 dark:text-slate-100 dark:placeholder:text-slate-500">
            </label>
        </div>

        <div class="flex shrink-0 items-center gap-2 sm:gap-3">
            <button type="button" class="relative inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm transition duration-300 hover:border-emerald-300 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-100 dark:hover:text-emerald-300" aria-label="Notifikasi">
                <x-dashboard.icon name="bell" class="h-5 w-5" />
                <span class="absolute right-3 top-3 h-2 w-2 rounded-full bg-emerald-500 ring-2 ring-white dark:ring-slate-950"></span>
            </button>

            <x-dashboard.theme-toggle />

            <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white/80 p-1.5 pr-3 shadow-sm backdrop-blur transition duration-300 hover:border-emerald-200 dark:border-white/10 dark:bg-white/5">
                <div class="grid h-9 w-9 place-items-center rounded-xl bg-gradient-to-br from-emerald-500 to-sky-500 text-sm font-extrabold text-white">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="hidden min-w-0 sm:block">
                    <p class="max-w-28 truncate text-sm font-bold text-slate-900 dark:text-white">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="max-w-28 truncate text-xs text-slate-500 dark:text-slate-400">User</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 md:hidden">
        <label class="relative block">
            <span class="sr-only">Cari</span>
            <x-dashboard.icon name="magnifying-glass" class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" />
            <input type="search" placeholder="Cari sesuatu..." class="h-12 w-full rounded-2xl border border-slate-200 bg-white/80 pl-11 pr-4 text-sm text-slate-700 shadow-sm transition duration-300 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-emerald-400 dark:border-white/10 dark:bg-white/5 dark:text-slate-100 dark:placeholder:text-slate-500">
        </label>
    </div>
</header>
