@php
    $faqs = [
        ['question' => 'Bagaimana AI bekerja?', 'answer' => 'AI membantu membaca foto makanan, mengenali kemungkinan jenis makanan, lalu menghubungkannya dengan data nutrisi untuk membuat estimasi yang mudah dipahami.'],
        ['question' => 'Apakah siGizi gratis?', 'answer' => 'siGizi dapat disiapkan dengan akses awal gratis. Fitur lanjutan dapat dikembangkan sesuai kebutuhan produk berikutnya.'],
        ['question' => 'Apakah bisa mengenali makanan Indonesia?', 'answer' => 'Ya, siGizi dirancang untuk mendukung pengenalan makanan Indonesia dan dapat terus ditingkatkan melalui data makanan yang lebih kaya.'],
        ['question' => 'Apakah data saya aman?', 'answer' => 'Keamanan data menjadi bagian penting dari fondasi siGizi. Informasi pengguna sebaiknya diproses dengan kontrol akses dan praktik penyimpanan yang aman.'],
        ['question' => 'Apakah hasil analisis akurat?', 'answer' => 'Hasil analisis bersifat estimasi dan bergantung pada kualitas foto, porsi, serta kecocokan data makanan. Gunakan hasilnya sebagai panduan, bukan pengganti saran ahli gizi.'],
    ];
@endphp

<section class="bg-slate-50 py-16 transition-colors duration-300 dark:bg-slate-950 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <span class="inline-flex rounded-full border border-sky-200 bg-white px-4 py-2 text-sm font-semibold text-sky-700 shadow-sm dark:border-sky-400/20 dark:bg-white/5 dark:text-sky-300">
                FAQ
            </span>
            <h2 class="mt-5 text-3xl font-extrabold tracking-normal text-slate-950 sm:text-4xl dark:text-white">
                Pertanyaan yang sering ditanyakan
            </h2>
        </div>

        <div class="mt-10 space-y-4" x-data="{ open: 0 }">
            @foreach ($faqs as $faq)
                <x-landing.faq-item
                    :index="$loop->index"
                    :question="$faq['question']"
                    :answer="$faq['answer']"
                />
            @endforeach
        </div>
    </div>
</section>
