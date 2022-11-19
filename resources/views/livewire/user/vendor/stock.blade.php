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

                <div class="col-lg-8">
                    <div class="row">

                        @unless(count($items) > 0)
                            <div class="col-lg-12">
                                <div class="shop__cart__item">
                                    <h2>You have no products added yet</h2>
                                </div>
                            </div>
                        @else
                            @foreach ($items as $item)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item">

                                        <div class="product__item__pic set-bg">
                                            <img src="{{ asset($item->image) }}" width="100px;" alt="">
                                            <ul class="product__hover">
                                                <li>
                                                    <button wire:click="delete({{ $item->id }})"
                                                        style="color:red;border-width:0px;background-color:#FFFFFF;">
                                                        <b>Delete</b>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="product__item__text" style="border-width: 5px;border-color:black;">
                                            <h6 style="color: rgb(0, 255, 0);"><b>{{ $item->name }}</b></h6>
                                            <a class="product__hover">

                                                <button wire:click="edit({{ $item->id }})"
                                                    style="color:rgb(255, 0, 200);border-width:0px;background-color:#FFFFFF;">
                                                    <b>+ Edit +</b>
                                                </button>
                                            </a>

                                            <h5>R{{ $item->price }}</h5>
                                            <h6 style="color: rgb(89, 89, 89);">{{ $item->description }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @endunless


                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="card mb-3" style="border-radius:10px;border-color:rgb(186, 186, 186);border-width:1px;">
                        <div>
                            <div class="card-body p-4">
                                <div class="card-body">
                                    <p style="margin-bottom: 0px;" class="card-text">Add a new product to your store.
                                    </p>
                                </div>

                                <div class="container">
                                    <form wire:submit.prevent="addItem">
                                        @csrf
                                        <hr style="background-color: grey">

                                        <div class="checkout__input">
                                            <p>Product Name<span>*</span></p>
                                            <input type="text" wire:model="itemName">

                                            @error('itemName')
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                        </div>

                                        <div class="checkout__input">
                                            <p>Product Desc<span>*</span></p>
                                            <input type="text" wire:model="itemDescription">

                                            @error('itemDescription')
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                        </div>


                                        <div class="checkout__input">
                                            <p>Product Price<span>*</span></p>
                                            <input type="number" wire:model="itemPrice">

                                            @error('itemPrice')
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                        </div>

                                        <div class="checkout__input">
                                            <p>Quantity<span>*</span></p>
                                            <input type="number" wire:model="itemQuantity">

                                            @error('itemQuantity')
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                        </div>


                                        <div class="checkout__input">
                                            <p>Category<span>*</span></p>
                                            <select wire:model="itemCategory" class="form-control"
                                                style="width: 100%;margin-bottom:10px;">
                                                <option value="">Choose category</option>

                                                @unless(count($categories) > 0)
                                                    <option value="">No categories</option>
                                                @else
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id . $category->value }}">
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                @endunless

                                            </select>

                                            @error('itemCategory')
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                        </div>

                                        <div class="image" style="padding-left:5px;padding-right:5px;">
                                            <br><br><br>
                                            <p class="text-muted" style="text-align:left;">
                                                Please upload image
                                            </p>
                                            <input style="border: #ffffff;" type="file" class="form-control"
                                                wire:model="itemImage" accept="image/*">
                                        </div>

                                        @error('itemImage')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <div class="post_button" style="margin-top: 20px;">
                                            <button style="width:100%;" type="submit" class="site-btn">Add
                                                product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
</div>
