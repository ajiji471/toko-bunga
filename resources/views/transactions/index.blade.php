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

                    <div class="mb-6">
                        <label for="product_id" class="mb-2 block text-sm font-semibold text-gray-700">
                            Pilih Barang
                        </label>
                        <div class="relative">
                            <i data-lucide="flower-2"
                                class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-rose-400"></i>
                            <select name="product_id" id="product_id"
                                class="w-full appearance-none rounded-xl border-2 border-gray-100 bg-gray-50/50 py-4 pl-12 pr-10 text-sm font-medium text-gray-900 transition-all hover:border-rose-200 hover:bg-white focus:border-rose-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20"
                                required>
                                <option value="" disabled selected>-- Pilih Item --</option>
                                @foreach ($products as $p)
                                    <option value="{{ $p->id }}">
                                        {{ $p->nama_barang }} (stok: {{ $p->stok }}) - Rp
                                        {{ number_format($p->harga, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            <i data-lucide="chevron-down"
                                class="pointer-events-none absolute right-4 top-1/2 h-5 w-5 -translate-y-1/2 text-rose-400"></i>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label for="qty" class="mb-2 block text-sm font-semibold text-gray-700">
                            Jumlah
                        </label>
                        <input type="number" name="qty" id="qty" min="1" value="1"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-900 focus:border-rose-500 focus:ring-rose-500"
                            required>
                    </div>

                    <button type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-rose-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-500/30 transition-all hover:-translate-y-0.5 hover:bg-rose-700">
                        <i data-lucide="save" class="h-4 w-4"></i>
                        Simpan Transaksi
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Inisialisasi Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
@endsection
