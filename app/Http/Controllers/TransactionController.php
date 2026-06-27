<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $products = Product::where('stok', '>', 0)->get();
        return view('transactions.index', compact('products'));
    }

    public function history(){
        $history = transaction::with('details.product')->latest()->get();
        return view('transactions.history', compact('history'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|numeric|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stok < $request->qty) {
            return back()->withErrors(['qty' => 'Stok tidak mencukupi']);
        }

        DB::transaction(function () use ($request, $product) {
            $subtotal = $product->harga * $request->qty;
            $no_nota = 'TRX - ' . strtoupper(uniqid());

            $transaction = Transaction::create([
                'no_nota' => $no_nota,
                'total_harga' => $subtotal,
            ]);

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'qty' => $request->qty,
                'harga_satuan' => $product->harga,
                'subtotal' => $subtotal,
            ]);
// potong stok
            $product->decrement('stok', $request->qty);

        });

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan');
    }
}