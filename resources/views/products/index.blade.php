@extends('components.layouts.app')

@section('title', 'Daftar Produk - MyFlorist')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                    <i data-lucide="package" class="w-7 h-7 text-rose-500"></i>
                    Daftar Produk
                </h1>
                <p class="mt-1 text-sm text-gray-500">Kelola produk bunga MyFlorist</p>
            </div>
            <div class="flex flex-row gap-4">
                <button onclick="toggleModal()" 
                        class="flex items-center gap-2 bg-rose-500 hover:bg-rose-600 text-white font-semibold py-2.5 px-5 rounded-xl transition duration-200 shadow-md shadow-rose-200">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                    Tambah Item
                </button>
                <a class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-semibold py-2.5 px-5 rounded-xl transition duration-200 shadow-md shadow-rose-200" href="{{ route('products.pdf') }}">
                    Export to PDF
                </a>
            </div>
            
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-rose-50/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Item</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($products as $p)
                            <tr class="hover:bg-rose-50/30 transition duration-150">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $p->nama_barang }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $p->stok > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $p->stok }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ $p->deskripsi }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <button onclick="toggleEdit({{ $p }})"
                                                class="p-2 text-rose-500 hover:text-rose-700 hover:bg-rose-100 rounded-lg transition duration-200"
                                                title="Edit">
                                            <i data-lucide="pencil" class="w-4 h-4"></i>
                                        </button>
                                        <button onclick="if(confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                                                    document.getElementById('form-delete-{{ $p->id }}').submit();
                                                }" 
                                                type="button" 
                                                class="p-2 text-red-500 hover:text-red-700 hover:bg-red-100 rounded-lg transition duration-200"
                                                title="Hapus">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                        <form id="form-delete-{{ $p->id }}" action="{{ route('products.destroy', $p->id) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3 text-gray-400">
                                        <i data-lucide="package-x" class="w-12 h-12"></i>
                                        <p class="text-sm">Belum ada data produk.</p>
                                        <button onclick="toggleModal()" class="text-rose-500 hover:text-rose-600 text-sm font-medium">
                                            Tambah produk pertama
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="modal-tambah" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <i data-lucide="plus-circle" class="w-5 h-5 text-rose-500"></i>
                    Tambah Produk
                </h2>
                <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <form action="{{ route('products.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label for="nama_barang" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                        <i data-lucide="type" class="w-4 h-4 text-rose-400"></i>
                        Nama Item
                    </label>
                    <input type="text" name="nama_barang" id="nama_barang"
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition"
                           placeholder="Buket Mawar Merah" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="harga" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                            <i data-lucide="tag" class="w-4 h-4 text-rose-400"></i>
                            Harga
                        </label>
                        <input type="number" name="harga" id="harga"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition"
                               placeholder="150000" required>
                    </div>
                    <div>
                        <label for="stok" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                            <i data-lucide="boxes" class="w-4 h-4 text-rose-400"></i>
                            Stok
                        </label>
                        <input type="number" name="stok" id="stok"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition"
                               placeholder="10" required>
                    </div>
                </div>
                <div>
                    <label for="deskripsi" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                        <i data-lucide="align-left" class="w-4 h-4 text-rose-400"></i>
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" id="deskripsi" rows="3"
                              class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition resize-none"
                              placeholder="Deskripsi produk..."></textarea>
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="toggleModal()"
                            class="px-5 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                        Batal
                    </button>
                    <button type="submit"
                            class="flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-rose-500 hover:bg-rose-600 rounded-xl transition shadow-md shadow-rose-200">
                        <i data-lucide="save" class="w-4 h-4"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="modal-edit" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <i data-lucide="pencil" class="w-5 h-5 text-rose-500"></i>
                    Edit Produk
                </h2>
                <button onclick="closeEdit()" class="text-gray-400 hover:text-gray-600 transition">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <form id="form-edit" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                        <i data-lucide="type" class="w-4 h-4 text-rose-400"></i>
                        Nama Item
                    </label>
                    <input type="text" name="nama_barang" id="edit_nama_barang"
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                            <i data-lucide="tag" class="w-4 h-4 text-rose-400"></i>
                            Harga
                        </label>
                        <input type="number" name="harga" id="edit_harga"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition" required>
                    </div>
                    <div>
                        <label class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                            <i data-lucide="boxes" class="w-4 h-4 text-rose-400"></i>
                            Stok
                        </label>
                        <input type="number" name="stok" id="edit_stok"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition" required>
                    </div>
                </div>
                <div>
                    <label class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-1.5">
                        <i data-lucide="align-left" class="w-4 h-4 text-rose-400"></i>
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" id="edit_deskripsi" rows="3"
                              class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition resize-none"></textarea>
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="closeEdit()"
                            class="px-5 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                        Batal
                    </button>
                    <button type="submit"
                            class="flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-rose-500 hover:bg-rose-600 rounded-xl transition shadow-md shadow-rose-200">
                        <i data-lucide="save" class="w-4 h-4"></i>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function toggleModal() {
            const modal = document.getElementById('modal-tambah');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function toggleEdit(item) {
            const modal = document.getElementById('modal-edit');
            document.getElementById('form-edit').action = '/products/' + item.id;
            document.getElementById('edit_nama_barang').value = item.nama_barang;
            document.getElementById('edit_harga').value = item.harga;
            document.getElementById('edit_stok').value = item.stok;
            document.getElementById('edit_deskripsi').value = item.deskripsi || '';
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEdit() {
            const modal = document.getElementById('modal-edit');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Close modal on backdrop click
        document.getElementById('modal-tambah').addEventListener('click', function(e) {
            if (e.target === this) toggleModal();
        });
        document.getElementById('modal-edit').addEventListener('click', function(e) {
            if (e.target === this) closeEdit();
        });
    </script>
@endsection