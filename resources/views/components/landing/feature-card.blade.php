@props([
    'icon',
    'title',
    'description',
])

<article class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-lg shadow-slate-900/5 transition duration-500 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20 dark:hover:border-emerald-400/30 dark:hover:bg-white/[0.08]">
    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-emerald-50 text-emerald-700 transition duration-300 group-hover:scale-105 group-hover:bg-emerald-600 group-hover:text-white dark:bg-emerald-400/10 dark:text-emerald-300 dark:group-hover:bg-emerald-500 dark:group-hover:text-white">
        <x-landing.heroicon :name="$icon" class="h-6 w-6" />
    </div>

    <h3 class="mt-5 text-lg font-bold text-slate-950 dark:text-white">
        {{ $title }}
    </h3>

    <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-400">
        {{ $description }}
    </p>
</article>
