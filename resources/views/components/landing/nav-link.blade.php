@props([
    'href' => '#',
    'active' => false,
])

<a href="{{ $href }}" {{ $attributes->class([
    'rounded-full px-4 py-2 text-sm font-semibold transition duration-300',
    'bg-emerald-50 text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300' => $active,
    'text-slate-600 hover:bg-slate-100 hover:text-emerald-700 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-emerald-300' => ! $active,
]) }}>
    {{ $slot }}
</a>
