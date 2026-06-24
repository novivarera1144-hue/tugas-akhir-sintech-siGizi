@php
    $testimonials = [
        ['name' => 'Nadia Putri', 'occupation' => 'Nutrition Enthusiast', 'initials' => 'NP', 'review' => 'siGizi membantu saya memahami makanan harian tanpa harus mencatat semuanya secara manual. Hasilnya cepat dan mudah dibaca.'],
        ['name' => 'Raka Pratama', 'occupation' => 'Fitness Coach', 'initials' => 'RP', 'review' => 'Fitur analisis makro sangat membantu saat mendampingi klien yang ingin menjaga kalori dan protein harian.'],
        ['name' => 'Maya Sari', 'occupation' => 'Mahasiswa', 'initials' => 'MS', 'review' => 'Saya suka karena bisa mengenali makanan Indonesia dan memberikan gambaran nutrisi dengan tampilan yang sederhana.'],
    ];
@endphp

<section class="bg-white py-16 transition-colors duration-300 dark:bg-slate-900/40 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-flex rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300">
                Testimonials
            </span>
            <h2 class="mt-5 text-3xl font-extrabold tracking-normal text-slate-950 sm:text-4xl dark:text-white">
                Dipakai untuk memahami pola makan lebih baik
            </h2>
            <p class="mt-4 text-base leading-7 text-slate-600 dark:text-slate-300">
                Pengguna siGizi merasakan pengalaman analisis nutrisi yang cepat, jelas, dan mudah diterapkan.
            </p>
        </div>

        <div class="mt-12 grid gap-5 md:grid-cols-3">
            @foreach ($testimonials as $testimonial)
                <x-landing.testimonial-card
                    :name="$testimonial['name']"
                    :occupation="$testimonial['occupation']"
                    :initials="$testimonial['initials']"
                    :review="$testimonial['review']"
                />
            @endforeach
        </div>
    </div>
</section>
