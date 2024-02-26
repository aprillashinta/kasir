@extends('layouts.admin')
@push('styles')
    @vite('resources/scss/user/index.scss')
@endpush
@section('content')
    <div class="grid grid-cols-2">
        <h1 class="text-lg font-medium">Data User</h1>
        <div class="flex justify-end">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Registrasi User</a>
        </div>
    </div>
    <table class="table border-collapse w-full mt-2">
        <thead>
        <tr>
            <th>No. </th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $loop->index + 1 }}.</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <a href="{{ route('user.destroy', $user->id) }}"><i class="fa fa-trash text-red-500"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
