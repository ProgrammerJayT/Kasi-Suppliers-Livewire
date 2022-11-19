<div>
    <section class="shop spad">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout__input">

                        <input wire:model="search" type="text" placeholder="Search for items here. E.g Tomatoes"
                            name="search">

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop__cart__item">
                                <h1>No items found...Try again</h1>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <img class="product__item__pic set-bg" src="assets/img/icon/heart.png">
                                <ul class="product__hover">
                                    <li>
                                        <a>
                                            <img src="assets/img/icon/heart.png" alt="">
                                        </a>
                                    </li>
                                </ul>

                                <div class="product__item__text" style="border-width: 5px;border-color:black;">
                                    <h6 style="color: blue;"><b>Item name</b></h6>
                                    <h5>R10</h5>

                                    <button type="button"
                                        style="background-color: rgb(255, 255, 255);border-radius:15px;margin-top:5px;margin-bottom:10px;"
                                        >+ Add item
                                        to
                                        cart</button>
                                    <h6 style="color: rgb(89, 89, 89);">Desc</h6>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="card mb-3" style="border-radius:10px;border-color:rgb(186, 186, 186);border-width:1px;">

                        {{-- @if (array_key_exists('message', $results))
                            <div class="alert alert-{{ $results['type'] }}" role="alert">
                                <p style="color: white; margin-bottom:0px;">
                                    {{ $results['message'] }}
                                </p>
                            </div>
                        @endif --}}

                        <div>
                            <div class="card-body p-4">
                                <div class="card-body">

                                    <h5 class="card-title">You have
                                        @if (Session::has('cartItems'))
                                            {{ count(Session::get('cartItems')) }}
                                        @else
                                            0
                                        @endif
                                    </h5>
                                    <p style="margin-bottom: 0px;" class="card-text">items added in your cart.
                                    </p>

                                    <div class="post_button" style="margin-top: 20px;">
                                        <a href="" style="width:100%;color:white;text-align:center;"
                                            class="site-btn">View
                                            cart</a>

                                    </div>
                                    <div class="post_button" style="margin-top: 20px;">
                                        <button wire:click="clearCart" style="width:100%;color:red;" type="button"
                                            class="site-btn">Clear cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
