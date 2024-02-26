<div class="flex justify-center mb-5 shadow-[0px_5px_5px_-5px_#111]">
    <div class="navbar bg-base-100 container">
        <div class="flex-1">
            <h1 class="text-xl font-medium">{{ config('app.name') }}</h1>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                @if(Auth::user()->role === 'petugas')
                    <li><a class="btn btn-ghost" href="{{ route('transaction.index') }}"><i class="fa fa-cash-register"></i>Kasir</a></li>
                    <li><a class="btn btn-ghost" href="{{ route('transaction.history') }}"><i class="fa fa-receipt"></i>Transaksi</a></li>
                @endif
                @if(Auth::user()->role === 'administrator')
                    <li><a class="btn btn-ghost" href="{{ route('user.index') }}"><i class="fa fa-user"></i>User</a></li>
                    <li><a class="btn btn-ghost" href="{{ route('product.index') }}"><i class="fa fa-luggage-cart"></i>Produk</a></li>
                    <li><a class="btn btn-ghost" href="{{ route('customer.index') }}"><i class="fa fa-user-group"></i>Pelanggan</a></li>
                    <li><a class="btn btn-ghost" href="{{ route('auth.logout') }}"><i class="fa fa-door-open"></i>Logout</a></li>
                @endif
            </ul>
        </div>
    </div>

</div>
