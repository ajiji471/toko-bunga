<html>

<head>
    <title>{{ config('app.name') }} - Table Item</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ $product->stok }}</td>
                    <td class="px-4 py-2">{{ $product->deskripsi }}</td>
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
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        rows="4"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="toggle_modal()"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
        </div>

        {{-- script --}}
        <script>
            function toggle_modal() {
                const modal = document.getElementById('modal-tambah-item');
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
            }
        </script>

</body>

</html>
