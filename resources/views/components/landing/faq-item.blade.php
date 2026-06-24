@props([
    'index',
    'question',
    'answer',
])

@php
    $panelId = 'faq-panel-'.$index;
    $buttonId = 'faq-button-'.$index;
@endphp

<div class="rounded-3xl border border-slate-200 bg-white shadow-lg shadow-slate-900/5 transition duration-300 dark:border-white/10 dark:bg-white/5 dark:shadow-black/20">
    <h3>
        <button
            id="{{ $buttonId }}"
            type="button"
            class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left text-base font-bold text-slate-950 transition duration-300 hover:text-emerald-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-emerald-500 dark:text-white dark:hover:text-emerald-300"
            x-on:click="open = open === {{ $index }} ? null : {{ $index }}"
            :aria-expanded="(open === {{ $index }}).toString()"
            aria-controls="{{ $panelId }}"
        >
            <span>{{ $question }}</span>
            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-slate-100 text-slate-600 transition duration-300 dark:bg-white/10 dark:text-slate-300" :class="{ 'rotate-45 bg-emerald-600 text-white dark:bg-emerald-500': open === {{ $index }} }" aria-hidden="true">
                +
            </span>
        </button>
    </h3>

    <div
        id="{{ $panelId }}"
        role="region"
        aria-labelledby="{{ $buttonId }}"
        x-cloak
        x-show="open === {{ $index }}"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
    >
        <p class="px-6 pb-6 text-sm leading-7 text-slate-600 dark:text-slate-300">
            {{ $answer }}
        </p>
    </div>
</div>
