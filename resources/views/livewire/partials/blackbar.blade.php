<div>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            @if (Session::has('profile') && Session::has('account'))
                                <p>Let's start shopping, shall we?</p>
                            @else
                                <p>Login or register to get started!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
