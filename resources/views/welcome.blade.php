<x-guest-layout>
    <x-slot name="head">
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </x-slot>

    <div class="min-h-screen bg-white dark:bg-gray-900 font-sans transition-colors duration-300 overflow-x-hidden">

        @include('layouts.navigation')

        <section class="relative pt-32 pb-20 lg:pb-32 px-6">
            <div class="max-w-7xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-100 dark:border-indigo-800 mb-8" data-aos="zoom-out" data-aos-once="true" data-aos-duration="1000">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                    </span>
                    <span class="text-xs font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Aplikasi Pencatat Keuangan Pintar</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-black text-gray-900 dark:text-white mb-8 leading-tight">
                    Kelola Pengeluaran <br>
                    <span id="typed-text" class="text-indigo-600"></span>
                </h1>

                <p class="max-w-2xl mx-auto text-lg text-gray-500 dark:text-gray-400 mb-12 leading-relaxed">
                    Hentikan kebiasaan lupa kemana uangmu pergi. Catat, pantau, dan analisis kesehatan keuanganmu dalam satu platform yang aman dan mudah digunakan.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-xl shadow-indigo-500/30 transition-all transform hover:-translate-y-1">
                        Mulai Gratis Sekarang
                    </a>
                    <a href="#features" class="w-full sm:w-auto px-8 py-4 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 font-bold rounded-2xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
                        Pelajari Fitur
                    </a>
                </div>
            </div>

            <div class="max-w-5xl mx-auto mt-20 relative px-4">
                <div class="bg-gray-200 dark:bg-gray-800 rounded-3xl p-4 shadow-2xl border border-gray-100 dark:border-gray-700 overflow-hidden" data-aos="fade-up" data-aos-once="true">
                    <div class="rounded-2xl overflow-hidden bg-white dark:bg-gray-900 aspect-video flex items-center justify-center group">
                        <div class="text-center">
                            <i class="fa-solid fa-chart-line text-6xl text-indigo-500 mb-4 opacity-50"></i>
                            <p class="text-gray-400 italic">Visualisasi Dashboard</p>
                        </div>
                    </div>
                </div>

                <div class="absolute -top-10 -left-10 w-40 h-40 bg-indigo-500/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl"></div>
            </div>
        </section>

        <section id="features" class="py-24 bg-gray-50 dark:bg-gray-800/50">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-16">Kenapa Memilih {{ config('app.name') }}?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-8 bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-bolt text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Input Kilat</h3>
                        <p class="text-gray-500 dark:text-gray-400">Catat transaksi hanya dalam hitungan detik dengan antarmuka yang intuitif.</p>
                    </div>

                    <div class="p-8 bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-green-100 dark:bg-green-900/30 text-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-shield-halved text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Aman & Terenkripsi</h3>
                        <p class="text-gray-500 dark:text-gray-400">Data keuanganmu sangat pribadi. Kami menjaganya tetap aman dan hanya bisa diakses olehmu.</p>
                    </div>

                    <div class="p-8 bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-purple-100 dark:bg-purple-900/30 text-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-mobile-screen-button text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Akses Mobile</h3>
                        <p class="text-gray-500 dark:text-gray-400">Gunakan di perangkat mana saja, kapan saja, dan di mana saja tanpa hambatan.</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-12 border-t border-gray-100 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <p class="text-gray-400 text-sm">© 2026 {{ config('app.name') }} - Mahasiswa IT Project. Dibuat untuk manajemen keuangan yang lebih baik.</p>
            </div>
        </footer>
    </div>

    @push('script')
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();

            document.addEventListener('DOMContentLoaded', function() {
                new Typed('#typed-text', {
                    strings: ['Jadi Lebih Mudah.', 'Jadi Lebih Cepat.', 'Jadi Lebih Terukur.'],
                    typeSpeed: 60,
                    backSpeed: 40,
                    loop: true
                });
            });
        </script>
    @endpush
</x-guest-layout>
