@extends('home.layout.app')
@section('main')
<main>
    <!--discount -->
    <section class="section discount">
        <div class="container">
            <h1>GET AMAZING DISCOUNT<br>
                IF YOU BUY ON OUR FIRST EVER SALE!</h1>
            <div class="dis-btn">
                <a class="btn" href="#">Add to Cart</a>
            </div>
        </div>
    </section>

    <!--tab  -->
    <section>
        <div class="tab">
            <button class="tablinks active" onclick="openCity(event, 'GAME')">IN GAME</button>
            <button class="tablinks" onclick="openCity(event, 'MERCH')">MERCH</button>
            <div id="GAME" class="tabcontent">
               
                <div class="our_product">
                    <div class="product_card">
                        <div class="container">
                            <div class="row ">
                                @foreach($allItems as $item)
                                <div class=" col-lg-4 col-md-4 col-sm-6">
                                    <div class="section card_contant ">
                                        <div class="imag_box">
                                            <img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/{{$item->image}}"
                                                alt="">
                                        </div>
                                        <div class="discribtion d-flex justify-content-between">
                                            <p>{{$item->name ?? $item->origin}}</p>
                                            <p>$100.00</p>
                                        </div>
                                        <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                            amet</p>
                                        <div class="discribtion d-flex justify-content-between">
                                            <div class="increment_btn">
                                                <div class="quantity">
                                                    <a href="#" class="quantity__minus"><span>-</span></a>
                                                    <input name="quantity" type="text" class="quantity__input"
                                                        value="1">
                                                    <a href="#" class="quantity__plus"><span>+</span></a>
                                                </div>
                                            </div>
                                            <div>
                                                <a class="btn" href="./product.php">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
                <!-- {{-- <div class=" col-lg-4 col-md-4 col-sm-6">--}}
                    {{-- <div class="section card_contant ">--}}
                        {{-- <div class="imag_box">--}}
                            {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                            {{-- </div>--}}
                        {{-- <div class="discribtion d-flex justify-content-between">--}}
                            {{-- <p>Product Title</p>--}}
                            {{-- <p>$100.00</p>--}}
                            {{-- </div>--}}
                        {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                            {{-- amet</p>--}}
                        {{-- <div class="discribtion d-flex justify-content-between">--}}
                            {{-- <div class="increment_btn">--}}
                                {{-- <div class="quantity">--}}
                                    {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                    {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                        value="1">--}}
                                    {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- <div>--}}
                                {{-- <a class="btn" href="./product.php">Add to Cart</a>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- <div class=" col-lg-4 col-md-4 col-sm-6">--}}
                    {{-- <div class="section card_contant ">--}}
                        {{-- <div class="imag_box">--}}
                            {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                            {{-- </div>--}}
                        {{-- <div class="discribtion d-flex justify-content-between">--}}
                            {{-- <p>Product Title</p>--}}
                            {{-- <p>$100.00</p>--}}
                            {{-- </div>--}}
                        {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                            {{-- amet</p>--}}
                        {{-- <div class="discribtion d-flex justify-content-between">--}}
                            {{-- <div class="increment_btn">--}}
                                {{-- <div class="quantity">--}}
                                    {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                    {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                        value="1">--}}
                                    {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- <div>--}}
                                {{-- <a class="btn" href="./product.php">Add to Cart</a>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
            </div>
        </div>
        </div>

        {{-- <div class="product_card">--}}
            {{-- <div class="container">--}}
                {{-- <div class=" row product_slider">--}}
                    {{-- <div class=" col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant ">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="./product.php">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant bg2">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div class=""></div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="#">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant bg3">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="#">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- </div>--}}
        {{-- <div class="product_card">--}}
            {{-- <div class="container">--}}
                {{-- <div class=" row product_slider">--}}
                    {{-- <div class=" col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant ">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="./product.php">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant bg2">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div class=""></div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="#">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant bg3">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="#">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- </div>--}}
        {{-- <div class="product_card">--}}
            {{-- <div class="container">--}}
                {{-- <div class=" row product_slider">--}}
                    {{-- <div class=" col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant ">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="./product.php">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant bg2">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div class=""></div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="#">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant bg3">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="#">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- </div>--}}
        {{-- <div class="product_card">--}}
            {{-- <div class="container">--}}
                {{-- <div class=" row product_slider pb-4">--}}
                    {{-- <div class=" col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant ">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="./product.php">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant bg2">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div class=""></div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="#">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">--}}
                        {{-- <div class="section card_contant bg3">--}}
                            {{-- <div class="imag_box">--}}
                                {{-- <img src="{{asset('home/images/')}}" alt="">--}}
                                {{-- </div>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <p>Product Title</p>--}}
                                {{-- <p>$100.00</p>--}}
                                {{-- </div>--}}
                            {{-- <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit--}}
                                {{-- amet</p>--}}
                            {{-- <div class="discribtion d-flex justify-content-between">--}}
                                {{-- <div class="increment_btn">--}}
                                    {{-- <div class="quantity">--}}
                                        {{-- <a href="#" class="quantity__minus"><span>-</span></a>--}}
                                        {{-- <input name="quantity" type="text" class="quantity__input" --}} {{--
                                            value="1">--}}
                                        {{-- <a href="#" class="quantity__plus"><span>+</span></a>--}}
                                        {{-- </div>--}}
                                    {{-- </div>--}}
                                {{-- <div>--}}
                                    {{-- <a class="btn" href="#">Add to Cart</a>--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- </div>--}}
                        {{-- </div>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
            {{-- </div>--}} -->
        <!-- </div>
        </div> -->

        <div id="MERCH" class="tabcontent" style="display:none">
            <div class="our_product">
                <div class="product_card">
                    <div class="container">
                        <div class=" row product_slider">
                            <div class=" col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/shirt.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/shirt.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/shirt.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_card">
                    <div class="container">
                        <div class=" row product_slider">
                            <div class=" col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/Castle1.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/Castle1.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/Castle1.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_card">
                    <div class="container">
                        <div class=" row product_slider">
                            <div class=" col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/shirt2.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/shirt2.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/shirt2.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_card">
                    <div class="container">
                        <div class=" row product_slider">
                            <div class=" col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/Castle2.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/Castle2.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/Castle2.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_card">
                    <div class="container">
                        <div class=" row product_slider pb-4">
                            <div class=" col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/shirt.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/shirt2.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="section card_contant  sec_tab  ">
                                    <div class="imag_box">
                                        <img src="{{asset('home/images/Castle1.png')}}" alt="">
                                    </div>
                                    <div class="discribtion d-flex justify-content-between">
                                        <p>Product Title</p>
                                        <p>$100.00</p>
                                    </div>
                                    <p style="font-size: 12px;text-align: left;">Lorem ipsum dolor sit
                                        amet</p>
                                    <div class="discribtion d-flex justify-content-between">
                                        <div class="increment_btn">
                                            <div class="quantity">
                                                <a href="#" class="quantity__minus"><span>-</span></a>
                                                <input name="quantity" type="text" class="quantity__input" value="1">
                                                <a href="#" class="quantity__plus"><span>+</span></a>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="btn" href="./product.php">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
</main>
@endsection