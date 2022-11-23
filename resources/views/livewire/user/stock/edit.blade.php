<div>
    <section class="about spad">
        <div class="container">

            @if (Session::has('update-fail'))
                <div class="alert alert-danger" style="background-color: rgb(255, 0, 0);" role="alert">
                    <p style="color: white; margin-bottom:0px;">{{ Session::get('update-fail') }}
                    </p>
                </div>
            @endif

            @if (Session::has('update-warning'))
                <div class="alert alert-warning" style="background-color: orange;" role="alert">
                    <p style="color: white; margin-bottom:0px;">{{ Session::get('update-warning') }}
                    </p>
                </div>
            @endif

            <div class="row">


                <div class="col-lg-4">
                    <div class="about__pic">
                        <img src="{{ $item->image }}">
                    </div>

                    <div class="post_button" style="margin-top: 20px;">
                        <button wire:click="deleteItem({{ $item->id }})" style="width:100%;background-color: red;"
                            type="button" class="site-btn">
                            Delete item
                        </button>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="container">
                        <form wire:submit.prevent="update">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Name currently set to <span><b>{{ lcfirst($item->name) }}</b></span></p>
                                        @error('itemName')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        <input type="text" wire:model="itemName" value="{{ $itemName }}">

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        @foreach ($categories as $category)
                                            @if ($item->category_id == $category->id)
                                                <p>Category currently set to
                                                    <span><b>{{ lcfirst($category->name) }}</b></span>
                                                </p>
                                            @endif
                                        @endforeach

                                        @error('itemCategory')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <select wire:model="itemCategory" class="form-control"
                                            style="width: 100%;margin-bottom:10px;">
                                            <option value="{{ $item->category_id }}">Choose category</option>

                                            @unless(count($categories) > 0)
                                                <option value="">No categories</option>
                                            @else
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id . $category->value }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            @endunless

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Description currently set to <span><b>{{ lcfirst($item->description) }}</b></span>
                                </p>

                                @error('itemDescription')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <input type="text" wire:model="itemDescription">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Price currently set to <span><b>R{{ $item->price }}</b></span></p>

                                        @error('itemPrice')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <input type="number" wire:model="itemPrice">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Quantity currently at <span><b>{{ $item->quantity }}</b></span> items
                                            remaining</p>

                                        @error('itemQuantity')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror

                                        <input type="number" wire:model="itemQuantity">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="text-muted" style="text-align:left;">
                                        Please upload image
                                    </p>

                                    @error('itemImage')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                    <div class="form-control">
                                        <input style="border: #ffffff;" type="file" class="form-control"
                                            wire:model="itemImage" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">

                                        @error('itemImage')
                                            <p style="color: red;">Please ensure that all fields are filled before
                                                submission</p>
                                        @enderror

                                        <div class="post_button" style="margin-top: 20px;">
                                            <button style="width:100%;" type="submit" class="site-btn">
                                                Update details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
