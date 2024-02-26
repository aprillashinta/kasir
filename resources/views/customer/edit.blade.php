@extends('layouts.admin')
@section('content')
    <form action="{{ route('customer.update') }}" method="POST">
        <h1 class="text-lg font-medium mb-3">Edit Pelanggan</h1>
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $customer->id }}">
        <input class="input input-bordered w-full" name="name" type="text" placeholder="Nama" value="{{ $customer->name }}">
        <br>
        <input class="input input-bordered w-full" name="address" type="text" placeholder="Alamat" value="{{ $customer->address }}">
        <br>
        <input class="input input-bordered w-full" name="phone_number" type="text" placeholder="No. Telp" value="{{ $customer->phone_number }}">
        <br>
        <button class="btn btn-warning mt-3" type="submit">Edit Pelanggan</button>
    </form>
@endsection
