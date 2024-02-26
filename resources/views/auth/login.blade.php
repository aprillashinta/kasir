@extends('layouts.app')
@section('body')
    <div class="w-full h-screen     grid place-items-center">
        <form action="{{ route('auth.login.store') }}" method="POST">
            <h1 class="text-2xl font-bold text-center mb-4">Login {{ config('app.name') }}</h1>
            @csrf
            <label class="input input-bordered flex items-center gap-2">
                <i class="fa fa-envelope"></i>
                <input type="text" class="grow" placeholder="Email" name="email" />
            </label>
            <label class="input input-bordered flex items-center gap-2">
                <i class="fa fa-key"></i>
                <input type="password" class="grow" placeholder="Password" name="password" />
            </label>
            <div class="grid place-items-center">
                <button class="btn btn-primary mt-2" type="submit">Log in</button>
            </div>
        </form>
    </div>
@endsection
