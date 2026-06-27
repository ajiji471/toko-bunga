@extends('components.layouts.app')
@section('title', 'History - MyFlorist')
@section('content')

    <div class="py-10 px-4 mx-auto max-w-4xl">
        {{-- Header --}}
        <div class="mb-6 flex items-center gap-3">
            <i data-lucide="history" class="h-8 w-8 text-rose-600"></i>
            <h1 class="text-2xl font-bold text-gray-900">Input Transaksi</h1>
        </div>
        @if ($history->isEmpty())
            <div class="">
                <p>Belum ada Riwayat</p>
            </div>
        @else
            <!-- Table Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-rose-50/50">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Waktu Transaksi</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No Nota</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Daftar Item & QTY</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($history as $h)
                                <tr class="hover:bg-rose-50/30 transition duration-150">
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        {{ $h->created_at->format('d M Y - H:i') }} WIB
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ $h->no_nota }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @foreach ($h->details as $detail)
                                            <div class="flex items-center gap-2 mb-1 last:mb-0">
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-rose-50 text-rose-700">
                                                    {{ $detail->qty }}x
                                                </span>
                                                <span>{{ $detail->product->nama_barang ?? 'Produk Dihapus' }}</span>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                                        Rp {{ number_format($h->total_harga, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center gap-3 text-gray-400">
                                            <i data-lucide="receipt" class="w-12 h-12"></i>
                                            <p class="text-sm">Belum ada riwayat transaksi.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        @endif

    </div>

    <script>
        lucide.createIcons();
    </script>
@endsection
