<x-app-layout>
    <x-slot name="head">
        <meta name="route" content="{{ route('transaction.store') }}">
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
    </x-slot>


    <div class="min-h-screen px-4 py-10 font-sans bg-gray-100 dark:bg-gray-900 transition-colors duration-300 pt-[80px]">
        <div class="max-w-3xl mx-auto mt-5">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white">Tambah Transaksi</h1>
                    <p class="text-gray-500 dark:text-gray-400">Catat keuanganmu dengan rapi.</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-8 overflow-hidden">
                <form id="transactionForm" class="space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="type" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tipe Transaksi <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="type" name="type" required class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white appearance-none transition-all">
                                    <option value="">Pilih Tipe</option>
                                    <option value="income">Pemasukan (+)</option>
                                    <option value="expense">Pengeluaran (-)</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <i class="fa-solid fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kategori <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="category" name="category" required class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white appearance-none transition-all" disabled>
                                    <option value="">Pilih Kategori</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <i class="fa-solid fa-tag text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="nominal" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nominal <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold">Rp</span>
                                <input id="nominal" name="nominal" type="text" required class="w-full pl-12 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white transition-all" placeholder="0" autocomplete="off">
                            </div>
                        </div>

                        <div>
                            <label for="date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tanggal <span class="text-red-500">*</span></label>
                            <input id="date" name="date" type="date" required class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white transition-all">
                        </div>

                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Deskripsi</label>
                            <textarea id="description" name="description" rows="3" class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white transition-all resize-none" placeholder="Contoh: Beli kopi di Starbucks..."></textarea>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" id="submitBtn" class="w-full flex items-center justify-center gap-3 px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-1 mb-3">
                            <span>Simpan Transaksi</span> <i class="fa-solid fa-check-circle"></i>
                        </button>
                    </div>
                </form>
                <div id="alert-container"></div>
            </div>

            <div class="mt-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Aktivitas Sesi Ini</h3>
                    <span id="sessionCount" class="px-3 py-1 bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400 text-xs font-bold rounded-full uppercase">0 Data</span>
                </div>
                <div id="sessionHistory" class="space-y-3">
                    <div class="text-center py-8 border-2 border-dashed border-gray-200 dark:border-gray-700 rounded-2xl">
                        <p class="text-gray-400 dark:text-gray-500 italic text-sm">Belum ada transaksi yang dibuat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        @vite(['resources/js/transaction/store.js', 'resources/js/transaction/type.js'])
    @endpush
</x-app-layout>
