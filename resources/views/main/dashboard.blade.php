@props(['transactions' => []])

<x-app-layout>

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 antialiased font-sans transition-colors duration-300 pt-[80px]">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">

                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Riwayat Transaksi</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Kelola semua pemasukan dan pengeluaran kamu di sini.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('transaction.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg space-x-2 transition-all shadow-sm">
                            <i class="ph-bold ph-plus text-xl"></i>
                            <span>Tambah Transaksi</span>
                        </a>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50/50 dark:bg-gray-700/20 border-b border-gray-200 dark:border-gray-700">
                    <form action="{{ route('search-by-date') }}" method="GET" class="flex flex-wrap items-end gap-4">
                        <div class="w-full sm:w-auto">
                            <label for="start_date" class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase mb-1 ml-1">Dari Tanggal</label>
                            <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}"
                                class="w-full sm:w-auto px-4 py-2 rounded-lg bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 dark:text-white text-sm transition-all">
                        </div>

                        <div class="w-full sm:w-auto">
                            <label for="end_date" class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase mb-1 ml-1">Sampai Tanggal</label>
                            <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}"
                                class="w-full sm:w-auto px-4 py-2 rounded-lg bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 dark:text-white text-sm transition-all">
                        </div>

                        <div class="flex items-center gap-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-indigo-600 hover:bg-black dark:hover:bg-indigo-700 text-white text-sm font-bold rounded-lg transition-all shadow-sm">
                                <i class="ph-bold ph-magnifying-glass mr-2"></i> Cari
                            </button>

                            @if(request('start_date') || request('end_date'))
                                <a href="{{ request()->url() }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 transition-all">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700/50">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 border-b dark:border-gray-700">Tanggal</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 border-b dark:border-gray-700">Kategori</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 border-b dark:border-gray-700">Deskripsi</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 border-b dark:border-gray-700">Tipe</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 border-b dark:border-gray-700 text-right">Nominal</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 border-b dark:border-gray-700 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($transactions as $transaction)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                    {{ $transaction->transaction_date->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 italic">
                                        {{ $transaction->category->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ Str::limit($transaction->notes, 35) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if($transaction->category->type === 'income')
                                        <span class="text-green-600 dark:text-green-400 font-semibold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                            </svg> Income
                                        </span>
                                    @else
                                        <span class="text-red-600 dark:text-red-400 font-semibold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg> Expense
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-right text-gray-900 dark:text-white uppercase">
                                    Rp {{ number_format($transaction->nominal, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('transaction.edit', $transaction->hashid) }}" class="p-1 text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 rounded-lg transition-colors" title="Edit Data">
                                            <i class="ph-bold ph-pencil-simple text-xl"></i>
                                        </a>

                                        <form action="{{ route('transaction.destroy') }}" method="POST" onsubmit="return confirm('Apakah kamu yakin?')">
                                            @csrf
                                            @method('DELETE')
                                            <input type="text" class="hidden" name="transaction" value="{{ $transaction->hashid }}">
                                            <button type="submit" class="p-1 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors" title="Hapus Data">
                                                <i class="ph-bold ph-trash text-xl"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <i class="ph-bold ph-note text-[60px] my-4 opacity-20"></i>
                                        <p>Tidak ada transaksi ditemukan untuk rentang tanggal ini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if (request()->path() == 'dashboard')
                    @include('layouts.pagination-button', ['page' => $page])
                @endif
            </div>
        </main>
    </div>

</x-app-layout>
