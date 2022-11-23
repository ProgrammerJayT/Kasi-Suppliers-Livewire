<div>
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">

            @unless($orders->count() > 0)
                @if ($search != null)
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">No orders!</h4>
                        <p>No order found under the order number provided
                        </p>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">No orders!</h4>
                        <p>Looks like you haven't placed any orders yet. Click
                            <b><a style="color: red;" href="{{ route('shop') }}">here</a></b>
                            to go to the shop.
                        </p>
                    </div>
                @endif
            @endunless

            <div class="row">
                <div class="col-lg-3">
                    <div class="checkout__input">

                        <input type="number" wire:model="search" type="text" placeholder="Search for order number">

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="checkout__input">
                        <select wire:model="sort" class="form-control" style="width: 100%;margin-bottom:10px;">
                            <option value="date">Order by date</option>
                            <option value="amount">Order by amount</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="checkout__input">
                        <select wire:model="level" class="form-control" style="width: 100%;margin-bottom:10px;">
                            <option value="desc">Descending</option>
                            <option value="asc">Ascending</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    @unless($orders->count() == 0)
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>#Items</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="quantity__item">
                                                <div class="product__cart__item__pic">
                                                    <h6>#{{ $order->id }}</h6>
                                                </div>
                                            </td>
                                            <td class="quantity__item">
                                                <div class="product__cart__item__pic">
                                                    <h6>{{ $order->created_at->toDateString() }}</h6>
                                                </div>
                                            </td>
                                            <td class="cart__price">
                                                <div class="product__cart__item__pic">
                                                    <h6>{{ $order->num_items }}</h6>
                                                </div>
                                            </td>
                                            <td class="cart__price">
                                                <div class="product__cart__item__pic">
                                                    <h6>R{{ $order->amount }}</h6>
                                                </div>
                                            </td>

                                            @if ($order->status == 'pending')
                                                <td class="cart__price">
                                                    <div class="product__cart__item__pic">
                                                        <h6 class="text-warning">Pending</h6>
                                                    </div>
                                                </td>
                                            @elseif($order->status == 'unpaid')
                                                <td class="cart__price">
                                                    <div class="product__cart__item__pic">
                                                        <h6 class="text-danger">Unpaid</h6>
                                                    </div>
                                                </td>
                                            @elseif($order->status == 'paid')
                                                <td class="cart__price">
                                                    <div class="product__cart__item__pic">
                                                        <h6 class="text-success">Paid</h6>
                                                    </div>
                                                </td>
                                            @endif

                                            <td class="cart__close">
                                                <span>
                                                    <i wire:click="cancelOrder({{ $order->id }})" class="fa fa-close">
                                                    </i>
                                                    <b>Cancel</b>
                                                </span>
                                            </td>

                                            <td class="cart__close">
                                                <span>
                                                    <i wire:click="payOrder({{ $order->id }})" class="fa fa-check">
                                                    </i>
                                                    <b style="color:green;">Pay now</b>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="{{ route('shop') }}">
                                        Go to Shop
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endunless
                </div>
            </div>
        </div>
    </section>
</div>
