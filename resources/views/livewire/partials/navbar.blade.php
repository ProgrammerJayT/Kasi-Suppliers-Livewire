<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="header__logo">
                <a href="{{ route('dashboard') }}">
                    <h4>Kasi Suppliers</h4>

                    @if ($route != 'home')
                        <span style="color:red;font-size:12px;">
                            <b>{{ ucfirst($privilege) . ' ' . $route }}</b>
                        </span>
                    @endif

                </a>
            </div>
        </div>


        <div class="col-lg-6 col-md-6">
            <nav class="header__menu mobile-menu">
                <ul>
                    <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="{{ $route == 'shop' ? 'active' : '' }}">
                        <a href="{{ route('shop') }}">Shop</a>
                    </li>

                    @if ($privilege == 'vendor')
                        <li class="{{ $route == 'stock' || $route == 'stock.edit' ? 'active' : '' }}">
                            <a href="{{ route('stock') }}">Stock</a>
                        </li>
                    @endif

                    <li class="{{ $route == 'wishlist' ? 'active' : '' }}">
                        <a href="{{ route('wishlist') }}">Wishlist</a>
                    </li>
                    <li class="{{ $route == 'orders' ? 'active' : '' }}">
                        <a href="{{ route('orders') }}">Orders</a>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="col-lg-3 col-md-3">
            <div class="header__nav__option">

                @if (Session::has('profile') && Session::has('account'))
                    <a href="{{ route('profile') }}">
                        <h5
                            style="{{ $route == 'profile' ? 'color: rgb(0, 150, 255);font-weight: bold;' : 'font-weight: bold;' }}">
                            {{ $name . ' ' . $surname }}</h5>
                    </a>
                    <img src="{{ asset('img/clients/client-8.png') }}" class="rounded-circle" height="40"
                        loading="lazy" />
                @elseif(Session::has('adminTriggered'))
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#loginModal">
                        <h5>Login</h5>
                    </button>
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                        <h5 style="color:white;">Register</h5>
                    </button>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light">
                        <h5>Login</h5>
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-dark">
                        <h5 style="color:white;">Register</h5>
                    </a>
                @endif

            </div>
        </div>
    </div>
    <div class="canvas__open"><i class="fa fa-bars"></i></div>
</div>
