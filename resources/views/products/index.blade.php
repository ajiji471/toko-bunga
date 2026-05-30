<html>
<head>
    <title>{{ config('app.name') }} - Table Item</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-6">

    <h1 class="text-2xl font-bold mb-4">Table Item MyFlorist</h1>
    <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Item</a>

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

</body>
</html>