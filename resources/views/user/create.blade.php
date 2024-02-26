@extends('layouts.admin')
@push('styles')
    @vite('resources/scss/user/index.scss')
@endpush
@section('content')
    <form method="POST" action="{{ route('user.store')}}">
        <h1 class="text-lg font-medium mb-3">Registrasi User</h1>
        @csrf
        <input class="input input-bordered w-full" name="name" type="text" placeholder="Nama">
        <br>
        <input class="input input-bordered w-full" name="email" type="email" placeholder="Email">
        <br>
        <input class="input input-bordered w-full" name="password" type="password" placeholder="Password">
        <br>
        <input class="input input-bordered w-full" name="confirm_password" type="password" placeholder="Konfirmasi Password">
        <br>
        <select class="select select-bordered w-full" name="role">
            <option value="administrator">Administrator</option>
            <option value="petugas">Petugas</option>
        </select>
        <br>
        <button class="btn btn-primary mt-3" type="submit">Tambah User</button>
    </form>
@endsection
