@extends('layouts.admin')
@push('styles')
    @vite('resources/scss/product/index.scss')
@endpush
@section('content')
    <div class="grid grid-cols-2">
        <h1 class="text-lg font-medium">Data Produk</h1>
        <div class="flex justify-end">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Produk</a>
        </div>
    </div>
    <table class="table border-collapse w-full mt-2">
        <thead>
        <tr>
            <th>No. </th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->index + 1 }}.</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ rupiah($product->price) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}"><i class="fa fa-pen text-yellow-500"></i></a>
                        <a href="{{ route('product.destroy', $product->id) }}"><i class="fa fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
