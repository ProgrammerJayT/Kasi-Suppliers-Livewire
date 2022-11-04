<div>
    <div wire:loading>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>
    </div>

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form wire:submit.prevent="login">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h5 class="checkout__title">Login Form</h5>

                            @if (Session::has('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif

                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="email" wire:model="email" value="{{ old('email') }}">

                                @error('email')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" wire:model="password">

                                @error('password')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">
                                    <p>Please</p>ensure
                                </h4>
                                <ul class="checkout__total__products">
                                    <li>- Password is provided </li>
                                    <li>- Email is provided </li>
                                    <li> </li>
                                    <li>No account yet?
                                        <a href="/register" style="color: red;">Go register</a>
                                    </li>
                                    <li> </li>
                                </ul>
                                <button type="submit" class="site-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

</div>
