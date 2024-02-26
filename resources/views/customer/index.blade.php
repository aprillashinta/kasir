@extends('layouts.admin')
@push('styles')
    @vite('resources/scss/product/index.scss')
@endpush
@section('content')
    <div class="grid grid-cols-2">
        <h1 class="text-lg font-medium">Data Pelanggan</h1>
        <div class="flex justify-end">
            <a href="{{ route('customer.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
        </div>
    </div>
    <table class="table border-collapse w-full mt-2">
        <thead>
        <tr>
            <th>No. </th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $loop->index + 1 }}.</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->phone_number }}</td>
                    <td>
                        <a href="{{ route('customer.edit', $customer->id) }}"><i class="fa fa-pen text-yellow-500"></i></a>
                        <a href="{{ route('customer.destroy', $customer->id) }}"><i class="fa fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
