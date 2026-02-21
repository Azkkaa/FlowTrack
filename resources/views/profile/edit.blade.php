<x-app-layout>
    @include('layouts.navigation')

    <div class="min-h-screen bg-gray-50/50 dark:bg-gray-900/50 pt-[80px]">
        <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 py-4">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center md:text-left">
                    <h2 class="text-2xl font-black text-gray-800 dark:text-white tracking-tight">
                        {{ __('Pengaturan Profil') }}
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400 mt-1">Kelola informasi akun, keamanan, dan preferensi privasi Anda.</p>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="space-y-6">
                        <div class="p-6 bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 rounded-2xl">
                            <h3 class="font-bold text-gray-800 dark:text-white flex items-center gap-2 mb-4">
                                <i class="fa-solid fa-circle-info text-indigo-500"></i> Ringkasan Akun
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-semibold">Nama Pengguna</p>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-semibold">Alamat Email</p>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->email }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-semibold">Bergabung Sejak</p>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->created_at->format('d M Y') }}</p>
                                </div>

                                <div class="pt-4 border-t border-gray-100 dark:border-gray-700">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-50 hover:bg-red-100 dark:bg-red-900/20 dark:hover:bg-red-900/30 text-red-600 dark:text-red-400 text-sm font-semibold rounded-xl transition-colors">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl border border-indigo-100 dark:border-indigo-900/30">
                            <div class="flex gap-3">
                                <i class="fa-solid fa-shield-halved text-indigo-600 mt-1"></i>
                                <p class="text-sm text-indigo-700 dark:text-indigo-300">
                                    Pastikan akun Anda menggunakan password yang kuat untuk menjaga keamanan data.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 space-y-8">

                        <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 rounded-2xl transition hover:shadow-md">
                            <div class="flex items-center gap-3 mb-8 pb-4 border-b border-gray-50 dark:border-gray-700">
                                <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-lg flex items-center justify-center text-sm">
                                    <i class="fa-solid fa-user-pen"></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Informasi Profil</h3>
                            </div>
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 rounded-2xl transition hover:shadow-md">
                            <div class="flex items-center gap-3 mb-8 pb-4 border-b border-gray-50 dark:border-gray-700">
                                <div class="w-8 h-8 bg-amber-100 dark:bg-amber-900/30 text-amber-600 rounded-lg flex items-center justify-center text-sm">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Keamanan Password</h3>
                            </div>
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-sm border border-red-50 dark:border-red-900/20 rounded-2xl transition hover:shadow-md">
                            <div class="flex items-center gap-3 mb-8 pb-4 border-b border-red-50 dark:border-red-900/10">
                                <div class="w-8 h-8 bg-red-100 dark:bg-red-900/30 text-red-600 rounded-lg flex items-center justify-center text-sm">
                                    <i class="fa-solid fa-user-xmark"></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Hapus Akun</h3>
                            </div>
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
