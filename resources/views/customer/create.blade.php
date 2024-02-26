@extends('layouts.admin')
@section('content')
    <form action="{{ route('customer.store') }}" method="POST">
        <h1 class="text-lg font-medium mb-3">Tambah Pelanggan</h1>
        @csrf
        <input class="input input-bordered w-full" name="name" type="text" placeholder="Nama">
        <br>
        <input class="input input-bordered w-full" name="address" type="text" placeholder="Alamat">
        <br>
        <input class="input input-bordered w-full" name="phone_number" type="text" placeholder="No. Telp">
        <br>
        <button class="btn btn-primary mt-3" type="submit">Tambah Pelanggan</button>
    </form>
@endsection
