<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-3">
            <div class="header__logo">
                <a href="{{ route('home') }}">
                    <h4>Kasi Suppliers</h4>

                    @if ($route != 'home' && $route != 'livewire.message')
                        <span style="color:red;font-size:12px;">
                            <b>{{ ucfirst($privilege) . ' ' . $route }}</b>
                        </span>
                    @endif

                </a>
            </div>
        </div>

        @if ($route != 'login' && $route != 'register')
            <div class="col-lg-7 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="{{ $route == 'shop' ? 'active' : '' }}">
                            <a href="{{ route($isLogged ? 'shop' : 'home') }}">Shop</a>
                        </li>

                        @if ($privilege == 'vendor')
                            <li class="{{ $route == 'stock' || $route == 'stock.edit' ? 'active' : '' }}">
                                <a href="{{ route('stock') }}">Stock</a>
                            </li>
                        @endif

                        <li class="{{ $route == 'wishlist' ? 'active' : '' }}">
                            <a href="{{ route('wishlist') }}">Wishlist
                                <span class='badge badge-warning' id='lblCartCount'> {{ $wishlistItems }} </span>
                            </a>
                        </li>


                        <li class="{{ $route == 'orders' ? 'active' : '' }}">
                            <a href="{{ route('orders') }}">Orders
                                <span class='badge badge-warning' id='lblCartCount'> {{ $orders }} </span></a>
                        </li>

                        @if ($privilege != 'admin')
                            <li class="{{ $route == 'cart' ? 'active' : '' }}">
                                <a href="{{ route('cart') }}">
                                    <i class="fa" style="font-size:24px">&#xf07a;</i>
                                    <span class='badge badge-warning' id='lblCartCount'> {{ $cartItems }} </span>
                                </a>
                            </li>
                        @endif
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
        @endif

    </div>
    <div class="canvas__open"><i class="fa fa-bars"></i></div>
</div>
