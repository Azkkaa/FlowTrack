
<x-app-layout>
    <x-slot name="head">
        {{-- Menggunakan route update dengan ID transaksi --}}
        <meta name="route" content="{{ route('transaction.update') }}">
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
    </x-slot>

    <div class="min-h-screen px-4 py-10 font-sans bg-gray-100 dark:bg-gray-900 transition-colors duration-300 pt-[80px]">
        <div class="max-w-3xl mx-auto mt-5">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white">Edit Transaksi</h1>
                    <p class="text-gray-500 dark:text-gray-400">Perbarui rincian keuanganmu.</p>
                </div>
                {{-- Indikator Tipe (Badge) --}}
                <div>
                    @if($transaction->category->type == 'income')
                        <span class="px-4 py-2 rounded-full bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400 font-bold text-sm border border-green-200 dark:border-green-800">
                            <i class="fa-solid fa-arrow-down mr-1"></i> Pemasukan
                        </span>
                    @else
                        <span class="px-4 py-2 rounded-full bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400 font-bold text-sm border border-red-200 dark:border-red-800">
                            <i class="fa-solid fa-arrow-up mr-1"></i> Pengeluaran
                        </span>
                    @endif
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-8 overflow-hidden">
                <form id="transactionForm" class="space-y-6">
                    {{-- Hidden input for hashid transaction --}}
                    <input type="text" name="transaction" value="{{ $transaction->hashid }}" class="hidden">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kategori <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="category" name="category" required class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white appearance-none transition-all">
                                    @foreach ($categoriesType as $category)
                                        <option value="{{ $category->slug }}"
                                            {{ $transaction->category->slug == $category->slug ? 'selected' : '' }}
                                            >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <i class="fa-solid fa-tag text-xs"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Nominal --}}
                        <div>
                            <label for="nominal" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nominal <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold">Rp</span>
                                <input id="nominal" name="nominal" type="text" value="{{ $transaction->nominal }}" required class="w-full pl-12 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white transition-all">
                            </div>
                        </div>

                        {{-- Tanggal --}}
                        <div>
                            <label for="date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tanggal <span class="text-red-500">*</span></label>
                            <input id="date" name="date" type="date" value="{{ $transaction->transaction_date->format('Y-m-d') }}" required class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white transition-all">
                        </div>

                        {{-- Deskripsi --}}
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Deskripsi</label>
                            <textarea id="description" name="description" rows="3" class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white transition-all resize-none" placeholder="Catatan transaksi...">{{ $transaction->notes }}</textarea>
                        </div>
                    </div>

                    <div class="pt-4 flex gap-3">
                        <a href="{{ route('dashboard') }}" class="flex-1 px-8 py-4 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-bold rounded-xl text-center transition-all">
                            Batal
                        </a>
                        <button type="submit" id="submitBtn" class="flex-[2] flex items-center justify-center gap-3 px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-1">
                            <span>Update Transaksi</span> <i class="fa-solid fa-save"></i>
                        </button>
                    </div>
                </form>
                <div id="alert-container" class="mt-4"></div>
            </div>
        </div>
    </div>

    @push('script')
        @vite(['resources/js/transaction/update.js'])
        <script>
            const nomInput = document.querySelector('input[name="nominal"]')
            const cleave = new Cleave(nomInput, {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand',
                delimiter: '.',
                numeralDecimalMark: ',',
                numeralDecimalScale: 0
            });
        </script>
    @endpush
</x-app-layout>
