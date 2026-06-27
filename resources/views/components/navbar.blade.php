
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
                @auth
                    {{-- User sudah login --}}
                    <div class="flex items-center gap-4">
                        {{-- Link Produk --}}
                        <a href="{{ route('products.index') }}"
                           class="{{ request()->routeIs('products.index') ? 'border-b-2 border-rose-500' : 'text-gray-600 hover:text-rose-600' }} flex items-center gap-2 px-4 py-2 text-sm font-medium transition duration-200">
                            <i data-lucide="package" class="w-4 h-4"></i>
                            Produk
                        </a>
                        <a href="{{ route('transactions.index') }}"
                           class="{{ request()->routeIs('transactions.index') ? 'border-b-2 border-rose-500' : 'text-gray-600 hover:text-rose-600' }} flex items-center gap-2 px-4 py-2 text-sm font-medium transition duration-200">
                            <i data-lucide="ShoppingBag" class="w-4 h-4"></i>
                            Transaksi
                        </a>

                        {{-- Dropdown User --}}
                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open"
                                    class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-rose-600 transition duration-200">
                                <div class="w-8 h-8 bg-rose-100 rounded-full flex items-center justify-center">
                                    <i data-lucide="user" class="w-4 h-4 text-rose-500"></i>
                                </div>
                                <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </button>

                            {{-- Dropdown Menu --}}
                            <div x-show="open"
                                 x-transition
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-rose-100 py-1 z-50">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition flex items-center gap-2">
                                        <i data-lucide="log-out" class="w-4 h-4"></i>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- User belum login (guest) --}}
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
                @endauth
            </div>
        </div>
    </div>
</nav>