<html>

<head>
    <title>{{ config('app.name') }} - Table Item</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body class="p-6">

    <h1 class="text-2xl font-bold mb-4">Table Item MyFlorist</h1>
    <button onclick="toggle_modal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
        Item</button>

    <table class="table-auto w-full mt-4 border border-gray-200 rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left border-b">Nama Item</th>
                <th class="px-4 py-2 text-left border-b">Harga</th>
                <th class="px-4 py-2 text-left border-b">Stok</th>
                <th class="px-4 py-2 text-left border-b">Deskripsi</th>
                <th class="px-4 py-2 text-left border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $p)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <td class="px-4 py-2">{{ $p->nama_barang }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ $p->stok }}</td>
                    <td class="px-4 py-2">{{ $p->deskripsi }}</td>
                    <td class="px-4 py-2">
                        <button onclick="toggle_edit({{ $p }})" class="text-blue-500 hover:text-blue-700 font-bold">
                            <span class="material-icons">edit</span>
                        </button>
                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold ml-2">
                                <span class="material-icons">delete</span>
                            </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-gray-400">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- form modal : nama barang(name:nama_barang), Harga(harga), Stok(stok), Deskripsi(deskripsi) --}}
    <div id="modal-tambah-item" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold text-center"> Tambah Item</h2>
            <form action="{{ route('products.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700">Nama Item</label>
                    <input type="text" name="nama_barang" id="nama_barang"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700">Harga</label>
                    <input type="number" name="harga" id="harga"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-gray-700">Stok</label>
                    <input type="number" name="stok" id="stok"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" rows="4"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="toggle_modal()"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    {{-- form modal edit --}}
    <div id="modal-edit-item" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold text-center"> Edit Item</h2>
            <form id="form-edit" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700">Nama Item</label>
                    <input type="text" name="nama_barang" id="edit_nama_barang"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700">Harga</label>
                    <input type="number" name="harga" id="edit_harga"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-gray-700">Stok</label>
                    <input type="number" name="stok" id="edit_stok"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="edit_deskripsi"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" rows="4"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="document.getElementById('modal-edit-item').classList.replace('flex', 'hidden')"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>


    {{-- script --}}
    <script>
        function toggle_modal() {
            const modal = document.getElementById('modal-tambah-item');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
        function toggle_edit(item) {
            const modal = document.getElementById('modal-edit-item');
            // mengatur route form edit dengan id produk
            document.getElementById('form-edit').action = '/products/' + item.id;
            // mengisi value form edit dengan data produk
            document.getElementById('edit_nama_barang').value = item.nama_barang;
            document.getElementById('edit_harga').value = item.harga;
            document.getElementById('edit_stok').value = item.stok;
            document.getElementById('edit_deskripsi').value = item.deskripsi;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    </script>

</body>

</html>
