<button
    type="button"
    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm transition duration-300 hover:border-emerald-300 hover:text-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:border-white/10 dark:bg-white/5 dark:text-slate-100 dark:hover:text-emerald-300"
    x-data="{
        isDark: document.documentElement.classList.contains('dark'),
        toggle() {
            this.isDark = ! this.isDark;
            document.documentElement.classList.toggle('dark', this.isDark);
            localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
        }
    }"
    x-on:click="toggle()"
    aria-label="Ganti mode warna"
>
    <span class="sr-only">Ganti mode warna</span>
    <x-dashboard.icon name="moon" class="h-5 w-5" x-show="! isDark" />
    <x-dashboard.icon name="sun" class="h-5 w-5" x-cloak x-show="isDark" />
</button>
