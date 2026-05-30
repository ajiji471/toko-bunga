<html>
    <head>
        <title>{{ config('app.name') }} - Table Item</title>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <h1 class="text-2xl font-bold mb-4">Table Item MyFlorist</h1>
        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Item</a>
        {{-- table nama item, harga, stok, deskripsi --}}
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nama Item</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Stok</th>
                    <th class="px-4 py-2">Deskripsi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>

    </body>
</html>