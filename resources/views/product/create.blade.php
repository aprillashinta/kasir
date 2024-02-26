@extends('layouts.admin')
@section('content')
    <form action="{{ route('product.store') }}" method="POST">
        <h1 class="text-lg font-medium mb-3">Tambah Produk</h1>
        @csrf
        <input class="input input-bordered w-full" name="name" type="text" placeholder="Nama">
        <br>
        <input class="input input-bordered w-full" name="price" type="number" placeholder="Harga">
        <br>
        <input class="input input-bordered w-full" name="stock" type="number" placeholder="Stok">
        <br>
        <button class="btn btn-primary mt-3" type="submit">Tambah Produk</button>
    </form>
@endsection
