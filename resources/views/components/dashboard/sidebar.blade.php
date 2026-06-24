@php
    use Illuminate\Support\Facades\Route;

    // prefer a readable route for scan if available, otherwise fallback
    $scanHref = Route::has('scan')
    ? route('scan')
    : '#';
    $menus = [
        ['label' => 'Dashboard', 'href' => route('dashboard'), 'icon' => 'home', 'active' => request()->routeIs('dashboard')],
        ['label' => 'Scan Makanan', 'href' => $scanHref, 'icon' => 'camera', 'active' => request()->routeIs('scan')],
        ['label' => 'Riwayat', 'href' => route('dashboard.history'), 'icon' => 'clock', 'active' => request()->routeIs('dashboard.history')],
        ['label' => 'Favorit', 'href' => route('dashboard.favorites'), 'icon' => 'heart', 'active' => request()->routeIs('dashboard.favorites')],
        ['label' => 'Profil', 'href' => route('dashboard.profile'), 'icon' => 'user', 'active' => request()->routeIs('dashboard.profile')],
    ];
@endphp

<div>
    <div class="fixed inset-0 z-40 bg-slate-950/40 backdrop-blur-sm lg:hidden" x-cloak x-show="sidebarOpen" x-transition.opacity x-on:click="sidebarOpen = false"></div>

    <aside
        class="fixed inset-y-0 left-0 z-50 flex w-72 -translate-x-full flex-col border-r border-white/70 bg-white/80/ bg-opacity-80 shadow-2xl shadow-slate-900/10 backdrop-blur-xl transition duration-300 dark:border-white/10 dark:bg-slate-950/90 dark:shadow-black/30 lg:translate-x-0 rounded-tr-3xl rounded-br-3xl"
        :class="{
            'translate-x-0': sidebarOpen,
            'lg:w-24': sidebarCollapsed,
            'lg:w-72': ! sidebarCollapsed
        }"
        aria-label="Sidebar dashboard"
    >
        <div class="flex h-20 items-center justify-between gap-3 px-5">
            <a href="{{ route('dashboard') }}" class="group flex min-w-0 items-center gap-3">
                <span class="grid h-11 w-11 shrink-0 place-items-center rounded-2xl bg-emerald-600 text-lg font-extrabold text-white shadow-lg shadow-emerald-600/25 transition duration-300 group-hover:-translate-y-0.5">
                    sG
                </span>
                <span class="min-w-0" x-show="! sidebarCollapsed" x-transition.opacity>
                    <span class="block text-xl font-extrabold leading-6 text-slate-950 dark:text-white">siGizi</span>
                    <span class="block text-xs font-medium text-slate-500 dark:text-slate-400">User Dashboard</span>
                </span>
            </a>

            <button type="button" class="hidden h-10 w-10 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-600 transition duration-300 hover:border-emerald-300 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-300 dark:hover:text-emerald-300 lg:inline-flex" x-on:click="sidebarCollapsed = ! sidebarCollapsed" aria-label="Collapse sidebar">
                <x-dashboard.icon name="chevron-left" class="h-5 w-5 transition duration-300" ::class="{ 'rotate-180': sidebarCollapsed }" />
            </button>

            <button type="button" class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-600 transition duration-300 hover:border-emerald-300 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-300 lg:hidden" x-on:click="sidebarOpen = false" aria-label="Tutup sidebar">
                <x-dashboard.icon name="x-mark" class="h-5 w-5" />
            </button>
        </div>

        <nav class="flex-1 space-y-2 px-4 py-5">
            @foreach ($menus as $menu)
                <x-dashboard.nav-link :href="$menu['href']" :icon="$menu['icon']" :active="$menu['active']">
                    {{ $menu['label'] }}
                </x-dashboard.nav-link>
            @endforeach
        </nav>

        <div class="border-t border-slate-200 p-4 dark:border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="group flex w-full items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-600 transition duration-300 hover:bg-rose-50 hover:text-rose-600 dark:text-slate-300 dark:hover:bg-rose-500/10 dark:hover:text-rose-300" :class="{ 'justify-center px-3': sidebarCollapsed }">
                    <x-dashboard.icon name="arrow-left-on-rectangle" class="h-5 w-5 shrink-0" />
                    <span x-show="! sidebarCollapsed" x-transition.opacity>Logout</span>
                </button>
            </form>
        </div>
    </aside>
</div>
