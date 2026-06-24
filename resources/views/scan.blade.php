<x-app-layout>
    <div
        x-data="scanPage()"
        class="max-w-7xl mx-auto px-6 py-8"
    >

        {{-- Header --}}
        <div class="mb-8">
            <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-sm font-semibold text-emerald-700">
                🤖 AI Food Scanner
            </span>

            <h1 class="mt-3 text-4xl font-bold text-slate-900">
                Scan Makanan
            </h1>

            <p class="mt-2 text-slate-500 max-w-2xl">
                Upload foto makanan, lalu biarkan AI mengenali jenis makanan dan
                menampilkan informasi gizinya secara otomatis.
            </p>
        </div>

        {{-- Statistics --}}
        @if(isset($stats))
        <div class="mb-8 grid gap-4 sm:grid-cols-3">
            <div class="rounded-2xl bg-white p-6 shadow-lg border-l-4 border-emerald-600">
                <p class="text-sm text-slate-500 font-semibold">Total Scan</p>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $stats['total_scans'] }}</p>
            </div>
            <div class="rounded-2xl bg-white p-6 shadow-lg border-l-4 border-blue-600">
                <p class="text-sm text-slate-500 font-semibold">Scan Hari Ini</p>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $stats['today_scans'] }}</p>
            </div>
            <div class="rounded-2xl bg-white p-6 shadow-lg border-l-4 border-yellow-600">
                <p class="text-sm text-slate-500 font-semibold">Makanan Sehat</p>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $stats['healthy_count'] }}</p>
            </div>
        </div>
        @endif

        {{-- Success Message --}}
        @if(session('success'))
        <div class="mb-6 rounded-2xl bg-emerald-50 p-4 text-sm text-emerald-700 border border-emerald-200">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif

        <div class="grid gap-8 lg:grid-cols-5">

            {{-- Upload --}}
            <div class="lg:col-span-2">

                <form method="POST" action="{{ route('scan.analyze') }}" enctype="multipart/form-data" @submit="isUploading = true">
                    @csrf

                    <div class="rounded-3xl bg-white p-7 shadow-xl">

                        @if(session('error'))
                            <div class="mb-4 rounded-2xl bg-rose-50 p-4 text-sm text-rose-700">
                                {{ session('error') }}
                            </div>
                        @endif

                        @error('image')
                            <div class="mb-4 rounded-2xl bg-rose-50 p-4 text-sm text-rose-700">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="image"
                            class="flex h-[430px] cursor-pointer flex-col items-center justify-center rounded-3xl border-2 border-dashed border-emerald-300 transition hover:border-emerald-500 hover:bg-emerald-50">

                            <template x-if="!image">
                                <div class="text-center">

                                    <div class="mx-auto mb-6 flex h-24 w-24 items-center justify-center rounded-full bg-emerald-100 text-5xl">
                                        📷
                                    </div>

                                    <h2 class="text-2xl font-bold text-slate-800">Upload Foto</h2>

                                    <p class="mt-3 text-slate-500">Klik atau drag & drop</p>

                                    <p class="mt-1 text-sm text-slate-400">JPG • PNG • JPEG</p>

                                </div>
                            </template>

                            <template x-if="image">
                                <img :src="image" class="h-full w-full rounded-3xl object-cover" x-show="image" x-cloak>
                            </template>

                            <input id="image" name="image" type="file" accept="image/*" class="hidden" @change="previewFile($event)">

                        </label>

                        <template x-if="fileName">
                            <div class="mt-5 rounded-xl bg-slate-100 px-4 py-3">
                                <span class="font-medium text-slate-700">📄</span>
                                <span class="ml-2 text-slate-600" x-text="fileName"></span>
                            </div>
                        </template>

                        <button type="submit"
                            x-bind:disabled="!image || isUploading"
                            class="mt-6 w-full rounded-2xl bg-emerald-600 py-4 text-lg font-bold text-white transition hover:bg-emerald-700 disabled:cursor-not-allowed disabled:opacity-50 flex items-center justify-center gap-2">
                            <template x-if="!isUploading">
                                <span>🔍 Analisis Makanan</span>
                            </template>
                            <template x-if="isUploading">
                                <svg class="h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>AI sedang menganalisis makanan...</span>
                            </template>
                        </button>

                    </div>

                </form>

            </div>

            {{-- Result --}}
            <div class="lg:col-span-3">

                <div class="rounded-3xl bg-white p-8 shadow-xl">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="text-2xl font-bold text-slate-800">
                                Hasil Analisis
                            </h2>

                            <p class="text-slate-500">
                                Hasil AI akan muncul di sini.
                            </p>

                        </div>

                        <div
                            class="rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-700">

                            Ready

                        </div>

                    </div>

                    <div
                        class="mt-8 rounded-3xl bg-slate-50 p-6">

                        @php
                            $result = session('result');
                            $imageUrl = session('image_url');
                        @endphp

                        @if($result)
                            <div class="grid gap-4 md:grid-cols-2">

                                <div class="rounded-2xl bg-white p-5 shadow flex items-start gap-4">
                                    @if($imageUrl)
                                        <img src="{{ $imageUrl }}" alt="Scan result" class="h-24 w-24 rounded-lg object-cover" />
                                    @endif
                                    <div>
                                        <p class="text-sm text-slate-500">Nama Makanan</p>
                                        <h3 class="mt-1 text-xl font-bold text-slate-900">{{ $result['food'] }}</h3>
                                        <div class="mt-2 inline-flex items-center gap-2">
                                            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Confidence {{ $result['confidence'] }}%</span>
                                            <span class="rounded-full px-3 py-1 text-xs font-semibold text-white" style="background-color: {{ $result['health'] === 'Healthy' ? '#10B981' : ($result['health'] === 'Moderate' ? '#F59E0B' : '#EF4444') }};">{{ $result['health'] }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-2xl bg-white p-5 shadow">
                                    <p class="text-sm text-slate-500">Kalori</p>
                                    <h3 class="mt-1 text-xl font-bold">{{ $result['nutrition']['calories'] }} kkal</h3>
                                    <div class="mt-4 grid grid-cols-2 gap-3">
                                        <div class="rounded-xl bg-slate-50 p-3 text-sm">
                                            <p class="text-xs text-slate-500">Protein</p>
                                            <p class="font-bold">{{ $result['nutrition']['protein'] }} g</p>
                                        </div>
                                        <div class="rounded-xl bg-slate-50 p-3 text-sm">
                                            <p class="text-xs text-slate-500">Karbohidrat</p>
                                            <p class="font-bold">{{ $result['nutrition']['carbs'] }} g</p>
                                        </div>
                                        <div class="rounded-xl bg-slate-50 p-3 text-sm">
                                            <p class="text-xs text-slate-500">Lemak</p>
                                            <p class="font-bold">{{ $result['nutrition']['fat'] }} g</p>
                                        </div>
                                        <div class="rounded-xl bg-slate-50 p-3 text-sm">
                                            <p class="text-xs text-slate-500">Gula</p>
                                            <p class="font-bold">{{ $result['nutrition']['sugar'] }} g</p>
                                        </div>
                                    </div>
                                    <div class="mt-4 rounded-xl bg-slate-100 p-3 text-sm">
                                        <p class="text-xs text-slate-500">Serat</p>
                                        <p class="font-bold">{{ $result['nutrition']['fiber'] }} g</p>
                                    </div>
                                </div>

                                <div class="md:col-span-2 mt-2 rounded-2xl bg-emerald-50 p-6">
                                    <h3 class="font-bold text-emerald-700">💡 Rekomendasi AI</h3>
                                    <p class="mt-3 text-slate-600">{{ $result['recommendation'] }}</p>
                                </div>

                            </div>
                        @else
                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="rounded-2xl bg-white p-5 shadow">
                                    <p class="mt-3 text-sm text-slate-500">Nama Makanan</p>
                                    <h3 class="mt-1 text-xl font-bold">-</h3>
                                </div>
                                <div class="rounded-2xl bg-white p-5 shadow">
                                    <p class="mt-3 text-sm text-slate-500">Kalori</p>
                                    <h3 class="mt-1 text-xl font-bold">-</h3>
                                </div>
                            </div>
                            <div class="mt-6 rounded-2xl bg-emerald-50 p-6">
                                <h3 class="font-bold text-emerald-700">💡 Rekomendasi AI</h3>
                                <p class="mt-3 text-slate-600">Upload gambar makanan terlebih dahulu untuk mendapatkan rekomendasi gizi.</p>
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        function scanPage() {
            return {
                image: null,
                fileName: '',
                isUploading: false,

                previewFile(event) {
                    const file = event.target.files[0];
                    if (!file) return;
                    this.fileName = file.name;
                    const reader = new FileReader();
                    reader.onload = e => { this.image = e.target.result; }
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>

</x-app-layout>