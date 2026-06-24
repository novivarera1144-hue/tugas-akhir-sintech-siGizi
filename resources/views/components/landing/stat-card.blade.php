@props([
    'value',
    'suffix' => '',
    'label',
    'description',
])

<article
    class="group rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-lg shadow-slate-900/5 transition duration-500 hover:-translate-y-1 hover:border-emerald-200 hover:bg-white hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20 dark:hover:border-emerald-400/30 dark:hover:bg-white/[0.08]"
    x-data="countUp({{ (int) $value }}, '{{ $suffix }}')"
>
    <p class="text-4xl font-extrabold tracking-normal text-slate-950 transition duration-300 group-hover:text-emerald-700 dark:text-white dark:group-hover:text-emerald-300" x-text="formatted()">
        0{{ $suffix }}
    </p>

    <h3 class="mt-3 text-lg font-bold text-slate-900 dark:text-white">
        {{ $label }}
    </h3>

    <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-400">
        {{ $description }}
    </p>
</article>
