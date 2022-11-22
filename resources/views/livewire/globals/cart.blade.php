<div>

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">

            @if (Session::has('item-remove') && count($cartItems) > 0)
                <div class="alert alert-success" style="background-color: darkgreen;" role="alert">
                    <p style="color:white;margin-bottom:0px">{{ Session::get('item-remove') }}</p>
                </div>
            @endif

            @unless(count($cartItems) > 0)
                <div class="alert alert-warning">
                    <h4 class="alert-heading">No items in cart!</h4>
                    <p>Looks like you haven't added any items to your cart yet. Click
                        <b><a style="color: red;" href="{{ route($isLogged ? 'shop' : 'home') }}">here</a></b>
                        to go to the shop.
                    </p>
                </div>
            @else
                <div class="row">

                    <div class="col-lg-8">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($items as $key => $item)
                                        @for ($i = 0; $i < count($cartItems); $i++)
                                            @if ($item->id == $cartItems[$i])
                                                <tr>
                                                    <td class="product__cart__item">
                                                        <div class="product__cart__item__pic">
                                                            <img src="{{ $item->image }}" alt=""
                                                                style="width:100px;">
                                                        </div>
                                                        <div class="product__cart__item__text">
                                                            <h6>{{ $item->name }} with ID {{ $item->id }}</h6>
                                                            <h5>R{{ $item->price }}</h5>
                                                        </div>
                                                    </td>
                                                    <td class="quantity__item">
                                                        <div class="quantity" style="width:50%;">
                                                            <input
                                                                style="width:50%;border-radius:10px;border-color:darkgray;"
                                                                type="number" name="{{ $item->id }}"
                                                                wire:model="quantity.{{ $item->id }}" id="quantity"
                                                                min=1 value="{{ $quantity[$item->id] }}" </div>
                                                    </td>

                                                    <td class="cart__price">R{{ $quantity[$item->id] * $item->price }}</td>
                                                    </td>
                                                    <td class="cart__close">
                                                        <i wire:click="removeItem({{ $item->id }})"
                                                            class="fa fa-close"></i>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endfor
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="{{ route($isLogged ? 'shop' : 'home') }}">Continue
                                        Shopping</a>
                                </div>
                            </div>

                            @if (count($cartItems) > 0)
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="continue__btn update__btn">
                                        <button
                                            style="background-color:rgb(255, 255, 255);border-radius:10px;padding:5px;border-color:red;"
                                            wire:click="clearCart()">
                                            <i style="color:rgb(255, 0, 0);" class="fa fa-trash"></i> Clear cart
                                        </button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                    @unless(count($cartItems) == 0)
                        <div class="col-lg-4">
                            <div class="cart__total">
                                <h6>Cart total</h6>
                                <ul>
                                    <li>Total <span>R{{ $totalPrice }}</span></li>
                                </ul>
                                <a href="{{ route('order.create', [
                                    'qty' => $quantity,
                                    'total' => $totalPrice,
                                ]) }}"
                                    class="primary-btn">Create order</a>
                            </div>
                        </div>
                    @endunless
                </div>
            @endunless

        </div>
    </section>
    <!-- Shopping Cart Section End -->

</div>
