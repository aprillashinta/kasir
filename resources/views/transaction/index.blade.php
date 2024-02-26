@extends('layouts.admin')
@push('styles')
    @vite('resources/scss/transaction/index.scss')
@endpush
@push('scripts')
    <script>
        const listProductUrl = '{{ route('product.list') }}';
        const storeTransactionUrl = '{{ route('transaction.store') }}';
        const transactionHistoryUrl = '{{ route('transaction.history') }}';
    </script>
    @vite('resources/js/transaction/index.js')
@endpush
@section('content')
    <div class="grid grid-cols-[70%_30%] gap-4">
        <select id="select-product" class="select select-bordered">
            <option>Tambah Produk</option>
        </select>
        <select id="select-customer" class="select select-bordered">
            <option value="">Pilih Pelanggan</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>
    <table class="table table-zebra w-full h-fit mt-4">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th></th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div class="fixed w-full bottom-0 left-0 mb-5">
        <div class="grid grid-cols-[70%_30%] container mx-auto">
            <h1 class="text-[2rem] font-bold mt-4">Total : <span id="total-price">Rp. 0</span></h1>
            <button id="btn-confirm" class="btn btn-primary mt-3">Konfirmasi Pembayaran</button>
        </div>
    </div>
@endsection
