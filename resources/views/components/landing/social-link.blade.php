@props([
    'href' => '#',
    'label',
])

<a href="{{ $href }}" class="grid h-10 w-10 place-items-center rounded-full border border-slate-200 bg-slate-50 text-slate-600 transition duration-300 hover:-translate-y-0.5 hover:border-emerald-300 hover:bg-emerald-50 hover:text-emerald-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-300 dark:hover:border-emerald-400/40 dark:hover:bg-white/10 dark:hover:text-emerald-300" aria-label="{{ $label }}">
    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        {{ $slot }}
    </svg>
</a>
