<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Log;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.index', compact('products'));
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        Product::insert($request->except('_token'));
        return redirect()->route('product.index');
    }
    public function edit(int $id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }
    public function update(Request $request){
        Product::whereId($request->id)->update($request->except('_token', '_method', 'id'));
        return redirect()->route('product.index');
    }
    public function destroy(int $id){
        Product::whereId($id)->delete();
        return redirect()->route('product.index');
    }
    public function list(){
        $products = Product::all(['id', 'name', 'price', 'stock']);
        return response()->json($products);
    }
}
