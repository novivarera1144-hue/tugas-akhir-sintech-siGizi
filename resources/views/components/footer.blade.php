@php
    $quickLinks = [
        ['label' => 'Beranda', 'href' => '/'],
        ['label' => 'Fitur', 'href' => '#fitur'],
        ['label' => 'Cara Kerja', 'href' => '#cara-kerja'],
        ['label' => 'Tentang', 'href' => '#tentang'],
        ['label' => 'Kontak', 'href' => '#kontak'],
    ];
@endphp

<footer class="border-t border-slate-200 bg-white transition-colors duration-300 dark:border-white/10 dark:bg-slate-950">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 lg:grid-cols-[1.2fr_0.8fr_1fr] lg:px-8 lg:py-16">
        <div>
            <a href="/" class="group inline-flex items-center gap-3" aria-label="siGizi Beranda">
                <span class="grid h-11 w-11 place-items-center rounded-2xl bg-emerald-600 text-lg font-extrabold text-white shadow-lg shadow-emerald-600/25 transition duration-300 group-hover:-translate-y-0.5">
                    sG
                </span>
                <span>
                    <span class="block text-xl font-extrabold text-slate-950 dark:text-white">siGizi</span>
                    <span class="block text-xs font-medium text-slate-500 dark:text-slate-400">AI Nutrition Assistant</span>
                </span>
            </a>

            <p class="mt-5 max-w-sm text-sm leading-7 text-slate-600 dark:text-slate-400">
                Asisten nutrisi berbasis AI untuk membantu mengenali makanan, memahami kandungan gizi, dan membuat keputusan makan yang lebih sehat.
            </p>

            <div class="mt-6 flex gap-3">
                <x-landing.social-link href="#" label="Instagram">
                    <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm5 6.2a3.8 3.8 0 1 0 0 7.6 3.8 3.8 0 0 0 0-7.6Zm5.1-.8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" />
                </x-landing.social-link>
                <x-landing.social-link href="#" label="X">
                    <path d="M4 3h4.7l4.1 5.7L17.8 3H21l-6.6 7.5L22 21h-4.7l-4.6-6.4L7.1 21H4l7-8L4 3Z" />
                </x-landing.social-link>
                <x-landing.social-link href="#" label="LinkedIn">
                    <path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 9.75h4v11H3v-11Zm6.25 0h3.8v1.5h.05c.53-.95 1.82-1.95 3.75-1.95 4 0 4.75 2.63 4.75 6.05V20.75h-4v-4.8c0-1.15-.02-2.62-1.6-2.62-1.6 0-1.85 1.25-1.85 2.53v4.89h-4v-11Z" />
                </x-landing.social-link>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold uppercase tracking-wide text-slate-950 dark:text-white">Quick Links</h3>
            <div class="mt-5 flex flex-col gap-3">
                @foreach ($quickLinks as $link)
                    <a href="{{ $link['href'] }}" class="text-sm font-medium text-slate-600 transition duration-300 hover:text-emerald-700 dark:text-slate-400 dark:hover:text-emerald-300">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold uppercase tracking-wide text-slate-950 dark:text-white">Contact</h3>
            <div class="mt-5 space-y-3 text-sm leading-6 text-slate-600 dark:text-slate-400">
                <p>Jakarta, Indonesia</p>
                <a href="mailto:hello@sigizi.id" class="block font-semibold text-emerald-700 transition duration-300 hover:text-emerald-800 dark:text-emerald-300 dark:hover:text-emerald-200">
                    hello@sigizi.id
                </a>
                <p>AI Nutrition Assistant for healthier daily choices.</p>
            </div>
        </div>
    </div>

    <div class="border-t border-slate-200 px-4 py-6 text-center text-sm text-slate-500 dark:border-white/10 dark:text-slate-500">
        &copy; {{ date('Y') }} siGizi. All rights reserved.
    </div>
</footer>
