<div>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="checkout__form">
                @include('partials.auth._login_form')
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

</div>
