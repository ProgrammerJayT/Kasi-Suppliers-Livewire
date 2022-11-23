<div>
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="about__pic">
                        <img src="images/profile.jpg">
                    </div>

                    <div class="post_button" style="margin-top: 20px;">
                        <button wire:click="logout" style="width:100%;background-color: red; border-radius:25px;"
                            type="button" class="site-btn">
                            Logout
                        </button>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p><b>{{ $name }}</b></p>
                                    <h3>{{ $surname }}</h3>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p><b>Email</b></p>
                                    <p><span><b>{{ $email }}</b></span></p>
                                </div>
                            </div>
                        </div>

                        <hr><br><br>

                        <h3>Password management</h3>
                        <br>
                        <form wire:submit.prevent="updatePassword">
                            @csrf

                            @if (Session::has('success-password'))
                                <div class="alert alert-success" style="background-color: #00bc09;" role="alert">
                                    <p style="color: white; margin-bottom:0px;">{{ Session::get('success-password') }}
                                    </p>
                                </div>
                            @endif

                            @if (Session::has('fail-password'))
                                <div class="alert alert-warning" style="background-color: rgb(255, 0, 0);"
                                    role="alert">
                                    <p style="color: white; margin-bottom:0px;">{{ Session::get('fail-password') }}
                                    </p>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        @error('newPassword')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <input type="password" placeholder="New password" wire:model="newPassword">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        @error('newPasswordConfirm')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <input type="password" placeholder="Confirm new password"
                                            wire:model="newPasswordConfirm">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        @error('currentPassword')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <input type="password" placeholder="Current password"
                                            wire:model="currentPassword">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <div class="post_button">
                                            <button style="width:100%;" type="submit" class="site-btn">
                                                Update password
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <hr><br><br>
                        <h3>Address management</h3>
                        <br>

                        <form wire:submit.prevent="addAddress">
                            @csrf
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="checkout__input">
                                        @error('currentPassword')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <input type="text" placeholder="Type in address" id="enter-address"
                                            value="{{ $address }}">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="checkout__input">

                                        @error('address')
                                            <p style="color: red;">Please ensure that all fields are filled before
                                                submission</p>
                                        @enderror

                                        <div class="post_button">
                                            <button style="width:100%;" type="submit" class="site-btn">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <hr><br><br>
                        <h3>Payment card(s)</h3>
                        <br>

                        <form wire:submit.prevent="addCard">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Card number<span>*</span></p>
                                        @error('cardNumber')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <input type="number" placeholder="Card number" wire:model="cardNumber">
                                    </div>
                                </div>


                                <div class="col-lg-3">
                                    <div class="checkout__input">
                                        <p>Card expiry<span>*</span></p>
                                        @error('cardExpiry')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <input type="month" placeholder="Card number" wire:model="cardExpiry">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="checkout__input">
                                        <p>Card CVC<span>*</span></p>
                                        @error('cardCVC')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <input type="text" placeholder="Card cvc" wire:model="cardCVC">
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p><span></span></p>

                                @error('address')
                                    <p style="color: red;">Please ensure that all fields are filled before
                                        submission</p>
                                @enderror

                                <div class="post_button">
                                    <button wire:loading.attr="disabled" style="width:100%;" type="submit"
                                        class="site-btn">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
