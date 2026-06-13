<nav class="w-full bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-rose-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo --}}
            <a href="/" class="flex items-center gap-2">
                <i data-lucide="flower-2" class="w-8 h-8 text-rose-500"></i>
                <span class="font-bold text-2xl text-rose-600 tracking-tight">MyFlorist</span>
            </a>

            {{-- Menu --}}
            <div class="flex items-center gap-3">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-600 hover:text-rose-600 transition duration-200">
                        <i data-lucide="log-in" class="w-4 h-4"></i>
                        Masuk
                    </a>
                @endif
                <a href="#"
                    class="flex items-center gap-2 px-5 py-2 text-sm font-medium text-white bg-rose-500 rounded-full hover:bg-rose-600 transition duration-200 shadow-md shadow-rose-200">
                    <i data-lucide="user-plus" class="w-4 h-4"></i>
                    Daftar
                </a>
            </div>
        </div>
    </div>
</nav>
