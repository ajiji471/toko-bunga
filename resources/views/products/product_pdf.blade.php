<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Product MyFlorist</title>
    <style>
        @page {
            margin: 25mm 20mm 25mm 20mm;
            size: A4;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.5;
            color: #2c3e50;
            padding: 0;
        }

        .wrapper {
            padding: 20px 30px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid #27ae60;
        }

        .header h1 {
            font-size: 18pt;
            font-weight: 600;
            color: #27ae60;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .header .subtitle {
            font-size: 9pt;
            color: #7f8c8d;
        }

        /* Info Box */
        .info-box {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 9pt;
            color: #555;
            padding: 0 4px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        thead {
            display: table-header-group;
        }

        thead tr {
            background-color: #27ae60;
        }

        th {
            color: #ffffff;
            font-weight: 600;
            font-size: 9pt;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            padding: 12px 14px;
            text-align: left;
            border: none;
        }

        th:first-child {
            width: 40px;
            text-align: center;
            border-top-left-radius: 6px;
        }

        th:last-child {
            border-top-right-radius: 6px;
        }

        td {
            padding: 12px 14px;
            border-bottom: 1px solid #ecf0f1;
            font-size: 9.5pt;
            vertical-align: top;
        }

        td:first-child {
            text-align: center;
            color: #7f8c8d;
            font-weight: 500;
            width: 40px;
        }

        /* Zebra striping */
        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e8f6ef;
        }

        /* Price styling */
        .price {
            font-weight: 600;
            color: #27ae60;
            white-space: nowrap;
        }

        /* Description */
        .desc {
            color: #555;
            line-height: 1.4;
        }

        /* Stock badge */
        .stock {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 12px;
            font-size: 8.5pt;
            font-weight: 600;
        }

        .stock-high {
            background-color: #d4edda;
            color: #155724;
        }

        .stock-low {
            background-color: #fff3cd;
            color: #856404;
        }

        .stock-empty {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Footer */
        .footer {
            margin-top: 28px;
            padding-top: 14px;
            padding-left: 4px;
            padding-right: 4px;
            border-top: 1px solid #ecf0f1;
            display: flex;
            justify-content: space-between;
            font-size: 8pt;
            color: #95a5a6;
        }

        /* Page break prevention */
        tr {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="header">
            <h1>Laporan Data Product</h1>
            <div class="subtitle">MyFlorist — {{ date('d F Y') }}</div>
        </div>

        <div class="info-box">
            <span>Total Produk: {{ count($products) }} item</span>
            <span>Dicetak pada: {{ date('d/m/Y H:i') }}</span>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $p)
                    @php
                        $stockClass = $p->stok > 10 ? 'stock-high' : ($p->stok > 0 ? 'stock-low' : 'stock-empty');
                        $stockLabel = $p->stok > 10 ? 'Tersedia' : ($p->stok > 0 ? 'Menipis' : 'Habis');
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><strong>{{ $p->nama_barang }}</strong></td>
                        <td class="price">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="stock {{ $stockClass }}">
                                {{ $p->stok }} — {{ $stockLabel }}
                            </span>
                        </td>
                        <td class="desc">{{ $p->deskripsi ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <span>MyFlorist Inventory System</span>
            <span>Halaman <span class="pageNumber"></span> / <span class="totalPages"></span></span>
        </div>
    </div>

</body>
</html>