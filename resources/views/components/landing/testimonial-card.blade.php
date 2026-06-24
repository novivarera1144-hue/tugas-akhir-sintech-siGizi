@props([
    'name',
    'occupation',
    'initials',
    'review',
])

<article class="group rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-lg shadow-slate-900/5 transition duration-500 hover:-translate-y-1 hover:border-emerald-200 hover:bg-white hover:shadow-2xl hover:shadow-emerald-900/10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20 dark:hover:border-emerald-400/30 dark:hover:bg-white/[0.08]">
    <div class="flex items-center gap-4">
        <div class="grid h-14 w-14 place-items-center rounded-full bg-gradient-to-br from-emerald-500 to-sky-500 text-sm font-extrabold text-white shadow-lg shadow-emerald-900/15">
            {{ $initials }}
        </div>
        <div>
            <h3 class="font-bold text-slate-950 dark:text-white">{{ $name }}</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400">{{ $occupation }}</p>
        </div>
    </div>

    <div class="mt-5 flex gap-1 text-amber-400" aria-label="Rating 5 dari 5">
        @for ($i = 0; $i < 5; $i++)
            <span aria-hidden="true">&#9733;</span>
        @endfor
    </div>

    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
        "{{ $review }}"
    </p>
</article>
