@extends('components.layouts.app')
@section('title', 'History - MyFlorist')
@section('content')

    <div class="py-10 px-4">
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
        <div class="">
            <table>
                <thead>
                    <tr>
                        <th class="p-4">Waktu Transaksi</th>
                        <th class="p-4">No Nota</th>
                        <th class="p-4">Daftar Item & QTY</th>
                        <th class="p-4">Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $h )
                    <tr>
                        <td>{{ $h->created_at->format('d M Y - H:i') }} WIB</td>
                        <td>{{ $h->no_nota }}</td>
                        <td>
                            @foreach ($h->details as $detail)
                            <div class="">
                                {{ $detail->product->nama_barang?? 'Produk Dihapus' }}
                                <span>{{ $detail->qty }}</span>
                            </div>
                            @endforeach
                        </td>
                        <td>
                            Rp. {{ number_format($h->total_harga,0,',','.') }}
                        </td>
                    </tr>
                        
                    @endforeach

                </tbody>
            </table>
        </div>
            
        @endif

    </div>

    <script>
        lucide.createIcons();
    </script>
@endsection
