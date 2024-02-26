<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }
    public function create(){
        return view('customer.create');
    }
    public function store(Request $request){
        Customer::insert($request->except('_token'));
        return redirect()->route('customer.index');
    }
    public function edit(int $id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }
    public function update(Request $request){
        Customer::whereId($request->id)->update($request->except('_token', '_method', 'id'));
        return redirect()->route('customer.index');
    }
    public function destroy(int $id)
    {
        Customer::whereId($id)->delete();
        return redirect()->route('customer.index');
    }
}
