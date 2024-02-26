@extends('layouts.admin')
@section('content')
    <form action="{{ route('product.update') }}" method="POST">
        <h1 class="text-lg font-medium mb-3">Edit Produk</h1>
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input class="input input-bordered w-full" name="name" type="text" placeholder="Nama" value="{{ $product->name }}">
        <br>
        <input class="input input-bordered w-full" name="price" type="number" placeholder="Harga" value="{{ $product->price }}">
        <br>
        <input class="input input-bordered w-full" name="stock" type="number" placeholder="Stok" value="{{ $product->stock }}">
        <br>
        <button class="btn btn-warning mt-3" type="submit">Edit Produk</button>
    </form>
@endsection
