<div>
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="about__pic">
                        <img src="images/vendorDash.png">
                    </div>


                </div>

                <div class="col-lg-8">

                    <h3>Hey, {{ $my->name }}</h3>
                    <hr>

                    <section class="counter spad">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="counter__item">
                                        <div class="counter__item__number">
                                            <h2 class="cn_num">102</h2>
                                        </div>
                                    </div>
                                    <span><a href="{{ route('orders') }}" style="font-weight:bold;color:red;">Orders</a>
                                        <br />placed</span>
                                </div>


                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="counter__item">
                                        <div class="counter__item__number">
                                            <h2 class="cn_num">30</h2>
                                        </div>
                                    </div>
                                    <span>Total <br />items bought</span>
                                </div>


                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="counter__item">
                                        <div class="counter__item__number">
                                            <h2 class="cn_num">30</h2>
                                        </div>
                                    </div>
                                    <span>Total <br />items sold</span>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
