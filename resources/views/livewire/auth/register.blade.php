<div>

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form wire:submit.prevent="submit">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Login Form</h6>
                            <div class="row">
                                <div class="col-lg-6 ">
                                    <div class="checkout__input">
                                        <p>First Name<span>*</span></p>
                                        <input type="text" name="name" value="{{ old('name') }}">

                                        @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="surname" value="{{ old('surname') }}">

                                        @error('surname')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" value="{{ old('email') }}">

                                        @error('email')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Account Type<span>*</span></p>
                                        <select name="type" id="type" value="{{ old('type') }}">
                                            <option value="">Choose account type</option>
                                            <option value="vendor">Vendor</option>
                                            <option value="customer">Customer</option>
                                        </select>

                                        @error('type')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Account Password<span>*</span></p>
                                        <input type="password" name="password">

                                        @error('password')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Confirm Password<span>*</span></p>
                                        <input type="password" name="password_confirmation">

                                        @error('password_confirmation')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">
                                    <p>Password</p>Requirements
                                </h4>
                                <div class="checkout__order__products">Password</div>
                                <ul class="checkout__total__products">
                                    <li>- Min length <span>8</span></li>
                                    <li>- Uppercase letters </li>
                                    <li>- Lowercase letters </li>
                                    <li>- Special character </li>
                                    <li>- At least a number </li>
                                    <li> </li>
                                    <li>Already registered?
                                        <a href="/login" style="color: red;">Go login</a>
                                    </li>
                                    <li> </li>
                                </ul>
                                <button type="submit" class="site-btn">Register account</button>
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
