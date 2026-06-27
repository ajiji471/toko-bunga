@extends('components.layouts.app')
@section('title', 'Transaksi - MyFlorist')
@section('content')
    <div class="min-h-screen bg-rose-50 py-10 px-4">
        <div class="mx-auto max-w-2xl">

            {{-- Header --}}
            <div class="mb-6 flex items-center gap-3">
                <i data-lucide="shopping-cart" class="h-8 w-8 text-rose-600"></i>
                <h1 class="text-2xl font-bold text-gray-900">Input Transaksi</h1>
            </div>

            {{-- Alert Success --}}
            @if (session('success'))
                <div
                    class="mb-6 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-700">
                    <i data-lucide="check-circle" class="h-5 w-5"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Alert Error --}}
            @error('qty_error')
                <div
                    class="mb-6 flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm font-medium text-red-700">
                    <i data-lucide="alert-circle" class="h-5 w-5"></i>
                    {{ $message }}
                </div>
            @enderror

            {{-- Card Form --}}
            <div class="rounded-2xl border border-rose-100 bg-white p-8 shadow-lg shadow-rose-100/50">
                <form action="" method="POST">
                    @csrf

                    {{-- Dropdown --}}
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Pilih Barang
                        </label>

                        <div class="relative" id="dropdown_wrapper">
                            <input type="hidden" name="product_id" id="product_id_input">

                            {{-- Trigger Button --}}
                            <button type="button" id="dropdown_trigger" onclick="toggleDropdown()"
                                class="flex w-full items-center gap-3 rounded-xl border-2 border-rose-200 bg-white px-4 py-3.5 text-left shadow-sm outline-none transition-all hover:border-rose-300 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10">
                                <i data-lucide="flower-2" class="h-5 w-5 flex-shrink-0 text-rose-400"></i>
                                <span id="selected_text" class="flex-1 text-sm font-medium text-gray-400">-- Pilih Item
                                    --</span>
                                <i data-lucide="chevron-down" id="chevron_icon"
                                    class="h-5 w-5 flex-shrink-0 text-rose-400 transition-transform duration-200"></i>
                            </button>

                            {{-- Dropdown Panel --}}
                            <div id="dropdown_panel"
                                class="absolute z-50 mt-2 w-full overflow-hidden rounded-xl border border-rose-100 bg-white shadow-xl"
                                style="display: none;">
                                @forelse ($products as $p)
                                    <div onclick="selectProduct(
                                            '{{ $p->id }}',
                                            '{{ addslashes($p->nama_barang) }}',
                                            {{ $p->stok }},
                                            '{{ number_format($p->harga, 0, ',', '.') }}'
                                        )"
                                        class="cursor-pointer border-b border-gray-50 px-4 py-3 text-sm text-gray-700 transition-colors last:border-0 hover:bg-rose-50 hover:text-rose-700">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="font-medium">{{ $p->nama_barang }}</span>
                                            <span
                                                class="flex-shrink-0 rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-bold text-green-700">
                                                stok: {{ $p->stok }}
                                            </span>
                                        </div>
                                        <div class="mt-0.5 text-xs text-gray-400">
                                            Rp {{ number_format($p->harga, 0, ',', '.') }}
                                        </div>
                                    </div>
                                @empty
                                    <div class="px-4 py-6 text-center text-sm text-gray-400">
                                        <i data-lucide="package-x" class="mx-auto mb-2 h-8 w-8 text-gray-300"></i>
                                        <p>Belum ada produk tersedia.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        @error('product_id')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Input Jumlah --}}
                    <div class="mb-8">
                        <label for="qty" class="mb-2 block text-sm font-semibold text-gray-700">
                            Jumlah
                        </label>
                        <input type="number" name="qty" id="qty" min="1" value="{{ old('qty', 1) }}"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-900 transition-colors focus:border-rose-500 focus:outline-none focus:ring-4 focus:ring-rose-500/10"
                            required>
                        @error('qty')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-rose-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-500/30 transition-all hover:-translate-y-0.5 hover:bg-rose-700 active:translate-y-0">
                        <i data-lucide="save" class="h-4 w-4"></i>
                        Simpan Transaksi
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        function toggleDropdown() {
            const panel = document.getElementById('dropdown_panel');
            const chevron = document.getElementById('chevron_icon');
            const isOpen = panel.style.display !== 'none';

            panel.style.display = isOpen ? 'none' : 'block';
            chevron.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
        }

        function selectProduct(id, nama, stok, harga) {
            document.getElementById('product_id_input').value = id;

            const selectedText = document.getElementById('selected_text');
            selectedText.textContent = nama + ' (stok: ' + stok + ') - Rp ' + harga;
            selectedText.classList.remove('text-gray-400');
            selectedText.classList.add('text-gray-900');

            document.getElementById('dropdown_panel').style.display = 'none';
            document.getElementById('chevron_icon').style.transform = 'rotate(0deg)';
        }

        document.addEventListener('click', function(e) {
            const wrapper = document.getElementById('dropdown_wrapper');
            if (!wrapper.contains(e.target)) {
                document.getElementById('dropdown_panel').style.display = 'none';
                document.getElementById('chevron_icon').style.transform = 'rotate(0deg)';
            }
        });
    </script>
@endsection
