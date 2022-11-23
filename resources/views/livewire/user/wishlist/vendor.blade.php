<div>
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">

            @if (Session::has('success'))
                <div class="alert alert-success" style="background-color: darkgreen;" role="alert">
                    <p style="color: white; margin-bottom:0px;">{{ Session::get('success') }}
                    </p>
                </div>
            @endif

            @if (Session::has('fail'))
                <div class="alert alert-danger" style="background-color: rgb(255, 0, 0);" role="alert">
                    <p style="color: white; margin-bottom:0px;">{{ Session::get('fail') }}
                    </p>
                </div>
            @endif

            <div class="row">

                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">

                                <input wire:model="search" type="text"
                                    placeholder="Search for items here. E.g Tomatoes" name="search">

                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="checkout__input">
                                <select wire:model="sort" class="form-control" style="width: 100%;margin-bottom:10px;">
                                    <option value="price">Order by price</option>
                                    <option value="name">Order by name</option>
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

                        @unless(count($items) > 0)
                            <div class="col-lg-12">
                                <div class="shop__cart__item">
                                    <h2>No items available</h2>
                                </div>
                            </div>
                        @else
                            @foreach ($items as $item)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item">

                                        <div class="product__item__pic set-bg">
                                            <img src="{{ asset($item->image) }}" width="100px;">
                                        </div>

                                        <div class="product__item__text" style="border-width: 5px;border-color:black;">
                                            <h6 style="color: rgb(0, 255, 0);"><b>{{ $item->name }}</b></h6>
                                            <a class="product__hover">

                                                <button wire:click="edit({{ $item->id }})"
                                                    style="color:rgb(7, 53, 255);border-width:0px;background-color:#FFFFFF;">
                                                    <b>+ add to cart</b>
                                                </button>
                                            </a>

                                            <h5>R{{ $item->price }}</h5>
                                            <p style="color: rgb(89, 89, 89);">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
</div>
