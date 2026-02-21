<nav
    x-data="{
        show: true,
        atTop: true,
        lastScrollY: 0
    }"
    x-init="
        window.addEventListener('scroll', () => {
            let currentScrollY = window.pageYOffset;

            // Logika Sembunyi/Muncul
            if (currentScrollY > lastScrollY && currentScrollY > 80) {
                show = false; // Scroll ke bawah, sembunyi
            } else {
                show = true;  // Scroll ke atas, muncul
            }

            // Logika Efek Terangkat (Shadow)
            atTop = currentScrollY <= 10;

            lastScrollY = currentScrollY;
        })
    "
    :class="{
        'translate-y-0': show,
        '-translate-y-full': !show,
        'shadow-lg border-b-indigo-500/10': !atTop,
        'border-transparent': atTop
    }"
    class="fixed w-full z-50 bg-white/80 dark:bg-gray-900/80 transition-all duration-300 ease-in-out backdrop-blur-md border-b border-gray-100 dark:border-gray-800 overflow-auto">
    <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
        <a href="{{ route('welcome') }}" class="flex items-center gap-2 group">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/30">
                <i class="fa-solid fa-wallet text-white text-lg"></i>
            </div>
            <span class="text-xl font-black text-gray-800 dark:text-white tracking-tight group-hover:underline">{{ config('app.name') }}<span class="text-indigo-600">.</span></span>
        </a>

        <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-gray-600 dark:text-gray-400">
            @if (request()->path() == '/')
                <a href="#features" class="hover:text-indigo-600 transition">Fitur</a>
                <a href="#about" class="hover:text-indigo-600 transition">Tentang</a>
            @endif

            <div class="flex items-center gap-4 ml-4">
                <button
                    id="buttonTheme"
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-blue-50 dark:bg-gray-800 text-yellow-400 dark:text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300 border border-transparent dark:border-gray-700">
                    <i class="fa-solid fa-sun block dark:hidden"></i>
                    <i class="fa-solid fa-moon hidden dark:block"></i>
                </button>

                @auth
                    <div class="flex items-center gap-3 pr-4 border-r border-gray-200 dark:border-gray-700">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 group transition">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-bold text-gray-800 dark:text-white leading-none group-hover:text-indigo-600 transition">{{ auth()->user()->name }}</p>
                                <p class="text-[10px] text-gray-500 dark:text-gray-400 leading-tight">{{ auth()->user()->email }}</p>
                            </div>

                            <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center border-2 border-transparent group-hover:border-indigo-600 transition-all overflow-hidden">
                                @if(auth()->user()->profile_photo_url)
                                    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover">
                                @else
                                    <i class="fa-solid fa-user text-indigo-600"></i>
                                @endif
                            </div>
                        </a>
                    </div>

                    <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition shadow-md shadow-indigo-500/20">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-indigo-600 transition">Masuk</a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition shadow-md shadow-indigo-500/20">Daftar Sekarang</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
