@extends('home.layout.app')
@section('main')
<main>
    <section class="addtocardbg">
        <div class="container">
            <div style="background: none;" class="authlayout">
                <div class="row">
                    <div class="col-lg-6 ">
                        <div class="authbox">
                            <form style="padding: 50px 120px 50px 0px;" class="login-form m-0">
                                <h6>Contact</h6>
                                <div class="form-group">
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Email"
                                        required>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Email me with offers and notifications
                                    </label>
                                </div>
                                <h6 class="pt-4">Shipping address</h6>
                                <div class="form-group">
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Country" required>
                                </div>
                                <div class="addcart">
                                    <div class="form-group">
                                        <input class="form-control" type="email" id="email" name="email"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" id="email" name="email"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Address" required>
                                </div>
                                <div class="form-group pt-0">
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Apartment, suite, etc. (optional)" required>
                                </div>
                                <div class="addcart">
                                    <div class="form-group">
                                        <input class="form-control" type="email" id="email" name="email"
                                            placeholder="Postal Code" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" id="email" name="email"
                                            placeholder="City" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Region" required>
                                </div>
                                <div class="form-group py-0">
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Phone"
                                        required>
                                </div>
                                <div class="form-check py-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Save this information for next time
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="addtocards">
                            <div class="card">
                                <div class="imgbox">
                                    <img src="{{asset('home/images/shirt.png')}}" alt="...">
                                </div>

                                <div class="card-body">
                                    <div class="contant">
                                        <div class="text-section">
                                            <p class="card-title">Product Title</p>
                                            <p class="card-text">Description</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$49.00</div>
                                        </div>
                                    </div>
                                    <div class="text-section mt-4">
                                        <p class="card-title">Size: XS</p>
                                        <p class="card-title">Color: Green</p>
                                    </div>
                                    <div class="discribtion pt-2">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="imgbox">
                                    <img src="{{asset('home/images/shirt.png')}}" alt="...">
                                </div>

                                <div class="card-body">
                                    <div class="contant">
                                        <div class="text-section">
                                            <p class="card-title">Product Title</p>
                                            <p class="card-text">Description</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$49.00</div>
                                        </div>
                                    </div>
                                    <div class="text-section mt-4">
                                        <p class="card-title">Size: XS</p>
                                        <p class="card-title">Color: Green</p>
                                    </div>
                                    <div class="discribtion pt-2">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="imgbox">
                                    <img src="{{asset('home/images/shirt.png')}}" alt="...">
                                </div>

                                <div class="card-body">
                                    <div class="contant">
                                        <div class="text-section">
                                            <p class="card-title">Product Title</p>
                                            <p class="card-text">Description</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$49.00</div>
                                        </div>
                                    </div>
                                    <div class="text-section mt-4">
                                        <p class="card-title">Size: XS</p>
                                        <p class="card-title">Color: Green</p>
                                    </div>
                                    <div class="discribtion pt-2">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="imgbox">
                                    <img src="{{asset('home/images/shirt.png')}}" alt="...">
                                </div>

                                <div class="card-body">
                                    <div class="contant">
                                        <div class="text-section">
                                            <p class="card-title">Product Title</p>
                                            <p class="card-text">Description</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$49.00</div>
                                        </div>
                                    </div>
                                    <div class="text-section mt-4">
                                        <p class="card-title">Size: XS</p>
                                        <p class="card-title">Color: Green</p>
                                    </div>
                                    <div class="discribtion pt-2">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="imgbox">
                                    <img src="{{asset('home/images/shirt.png')}}" alt="...">
                                </div>

                                <div class="card-body">
                                    <div class="contant">
                                        <div class="text-section">
                                            <p class="card-title">Product Title</p>
                                            <p class="card-text">Description</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$49.00</div>
                                        </div>
                                    </div>
                                    <div class="text-section mt-4">
                                        <p class="card-title">Size: XS</p>
                                        <p class="card-title">Color: Green</p>
                                    </div>
                                    <div class="discribtion pt-2">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="imgbox">
                                    <img src="{{asset('home/images/shirt.png')}}" alt="...">
                                </div>

                                <div class="card-body">
                                    <div class="contant">
                                        <div class="text-section">
                                            <p class="card-title">Product Title</p>
                                            <p class="card-text">Description</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$49.00</div>
                                        </div>
                                    </div>
                                    <div class="text-section mt-4">
                                        <p class="card-title">Size: XS</p>
                                        <p class="card-title">Color: Green</p>
                                    </div>
                                    <div class="discribtion pt-2">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="padding: 0 0 0 110px;" class="card">
                            <div class="card-body">
                                <div class="contant py-2">
                                    <div class="text-section">
                                        <p class="card-title">Subtotal</p>
                                    </div>
                                    <div class="cta-section">
                                        <div>$49.00</div>
                                    </div>
                                </div>
                                <div class="contant">
                                    <div class="text-section">
                                        <p class="card-title">Shipping</p>
                                    </div>
                                    <div class="cta-section">
                                        <div>$20.00</div>
                                    </div>
                                </div>
                                <div class="contant py-2">
                                    <div class="text-section">
                                        <p class="card-title">Total</p>
                                    </div>
                                    <div class="cta-section">
                                        <div>USD <span style="font-size: 20px;">$69.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="text-center pb-3">
                    <!-- <span>
                        <button class="btn addcard" class="shop-opener" id="shop-toggler" >Pay Now</button>
                    </span> -->
                    <span>
                        <button class="btn addcard">Pay Now</button>
                    </span>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="shop" id="shop-section">
                <div class="shop-opener addtocards">
                    <div class="shophead">
                        <p class="p-0 m-0">Cart (1 item)</p>
                        <span id="close"><i class="fa fa-times "></i></span>
                    </div>
                    <div class="card">
                        <div class="imgbox">
                            <img src="{{asset('home/images/shirt.png')}}" alt="...">
                        </div>
    
                        <div class="card-body">
                            <div class="text-section ">
                                <p class="card-title">Product Title</p>
                                <p class="card-text">Description</p>
                            </div>
                            <div class="contant">
                                <div class="text-section mt-4">
                                    <p class="card-title">Size: XS</p>
                                    <p class="card-title">Color: Green</p>
                                </div>
                                <div class="cta-section">
                                    <div>$49.00</div>
                                </div>
                            </div>
                            <div class="discribtion pt-2">
                                <div class="increment_btn">
                                    <div class="quantity">
                                        <a href="#" class="quantity__minus"><span>-</span></a>
                                        <input name="quantity" type="text" class="quantity__input" value="1">
                                        <a href="#" class="quantity__plus"><span>+</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
                <div>
                    <div class="cards">
                        <div class="contant">
                            <div class="text-section">
                                <p>SHOPPING BAG (1 item)</p>
                            </div>
                            <div class="cta-section">
                                <div>$49.00</div>
                            </div>
                        </div>
                        <div>
                            <p>Shipping, taxes, and discount codes calculated at checkout</p>
                            <a  href="{{route('addtocart')}}" class="btn">Check out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>
</div>
@endsection