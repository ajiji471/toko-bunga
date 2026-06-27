<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class TransactionController extends Controller
{
    //tampilan form transaksi pada index
    public function index(){
        $products = product::where('stok', '>', 0)->get();
        return view('transactions.index', compact('products'));
    }

}
