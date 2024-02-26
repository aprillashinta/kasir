@extends('layouts.admin')
@push('styles')
    @vite('resources/scss/transaction/history.scss')
@endpush
@section('content')
    <table class="w-full">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Total Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $loop->index + 1 }}.</td>
                    <td>{{ $transaction->customer->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->locale('id-ID')->translatedFormat('l, d F Y') }}</td>
                    <td>{{ rupiah($transaction->price_total) }}</td>
                    <td>
                        <a href="{{ route('transaction.details', $transaction->id) }}" class="bg-blue-500 text-white px-3 py-2">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
