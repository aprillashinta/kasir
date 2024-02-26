@extends('layouts.admin')
@push('styles')
    @vite('resources/scss/transaction/history.scss')
@endpush
@section('content')
    <div class="text-lg">
        <p>Nama Pelanggan : {{ $transaction->customer->name }}</p>
        <p>Tanggal : {{ \Carbon\Carbon::parse($transaction->created_at)->locale('id-ID')->translatedFormat('l, d F Y') }}</p>
        <p>Total Pembayaran : <b>{{ rupiah($transaction->price_total) }}</b></p>
    </div>
    <table class="w-full mt-3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Jumlah Produk</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaction->transaction_products as $transaction_product)
                <tr>
                    <td>{{ $loop->index + 1 }}.</td>
                    <td>{{ $transaction_product->product->name }}</td>
                    <td>{{ $transaction_product->stock }}</td>
                    <td>{{ rupiah($transaction_product->subtotal) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
