<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionProduct;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('transaction.index', compact('customers'));
    }
    public function store(Request $request){
        $data = $request->all();

        $transaction_id = Transaction::insertGetId([
            'price_total' => $data['price_total'],
            'customer_id' => $data['customer_id'],
            'created_at' => Carbon::now(),
        ]);

        DB::beginTransaction();

        $transaction_products = [];
        foreach ($data['products'] as $product){
            Product::whereId($product['product_id'])->decrement('stock', $product['stock']);
            $transaction_products[] = [
                'transaction_id' => $transaction_id,
                'product_id' => $product['product_id'],
                'stock' => $product['stock'],
                'subtotal' => $product['subtotal'],
            ];
        }

        TransactionProduct::insert($transaction_products);

        DB::commit();

        return response()->json();
    }
    public function history(){
        $transactions = Transaction::all();
        return view('transaction.history', compact('transactions'));
    }
    public function details(int $id){
        $transaction = Transaction::find($id);
        return view('transaction.details', compact('transaction'));
    }
}
