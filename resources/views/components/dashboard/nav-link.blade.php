@props([
    'href' => '#',
    'icon',
    'active' => false,
])

<a href="{{ $href }}" {{ $attributes->class([
    'group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition duration-300',
    'bg-emerald-50 text-emerald-700 shadow-lg shadow-emerald-900/5 dark:bg-emerald-400/10 dark:text-emerald-300' => $active,
    'text-slate-600 hover:bg-slate-100 hover:text-emerald-700 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-emerald-300' => ! $active,
]) }} aria-current="{{ $active ? 'page' : '' }}" :class="{ 'justify-center px-3': sidebarCollapsed }">
    <x-dashboard.icon :name="$icon" class="h-5 w-5 shrink-0 transition duration-300 group-hover:scale-110" />
    <span x-show="! sidebarCollapsed" x-transition.opacity>{{ $slot }}</span>
</a>
