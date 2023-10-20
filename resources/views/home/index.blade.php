@extends('home.layout.app')
@section('main')
<div id="banner">
        <div class="banner banner-slider">
            <div class="section banner_contant">
                <h1>PLAY THE AMAZING GAME </h1>
                <img src="{{asset('home/images/bannerlogo.png')}}" alt="img">
                <a class="btn" href="">Download the App</a>
            </div>
            <div class="section banner_contant">
                <h1>PLAY THE AMAZING GAME </h1>
                <img src="{{asset('home/images/bannerlogo.png')}}" alt="img">
                <a class="btn" href="">Download the App</a>
            </div>
            <div class="section banner_contant">
                <h1>PLAY THE AMAZING GAME </h1>
                <img src="{{asset('home/images/bannerlogo.png')}}"  alt="img">
                <a class="btn" href="">Download the App</a>

            </div>
        </div>
    </div>
    <main>
        <!-- play queen -->
        <section class="section play_queens">
            <div class="sec-banner  play_queen">
                <h2>How to play<span class="text-warning"> queens of 10!</span></h2>
            </div>
            <div class="container">
                    <div class="product_card row">
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-3 ">
                            <div class="section card_contant counter ">
                                <div class="box-contant">
                                    <p>Queens of Ten has 3 game modes. (Freeplay, Timed and Challenges). Each game
                                        has
                                        the same game flow and the only difference is the timer and unlockable
                                        achievements.</p>
                                        <p>Hard Mode - is an exciting way to test your quick thinking ability and luck.</p>
                                        <p>Easy and Medium - lets you play the game with easier and relax way. You have the ability to skip a card.</p>
                                </div>
                                <div class="imag_box">
                                <img src="{{asset('home/images/queencard1.png')}}" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
                            <div class="section card_contant counter">
                                <div class="box-contant">
                                    <p>The game starts with 12 playing cards, shuffled from the deck randomly. Cards
                                        are
                                        positioned in 3 rows and 4 columns.</p>
                                </div>
                                <div class="imag_box">
                                <img src="{{asset('home/images/queencard2.png')}}" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
                            <div class="section card_contant counter">
                                <div class="box-contant">
                                    <p>The game automatically replaces the face cards, Face cards must be replaced
                                        to
                                        start the game</p>
                                </div>
                                <div class="imag_box">
                                <img src="{{asset('home/images/queencard3.png')}}" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
                            <div class="section card_contant counter">
                                <div class="box-contant">
                                    <p>Once all face cards are replaced, the player must select two (2) cards on the
                                        table that sums up to ten (10) (Hard Mode) </p>
                                    <p>In the Easy and Medium Mode. The rotation of card selection is ‘counter
                                        clockwise’. Meaning, the player should select a card first on the “field”
                                        then
                                        select a card on the left deck, select a card again a card in the field to
                                        pair
                                        with and lastly select a card on the right Deck</p>
                                </div>
                                <div class="imag_box">
                                <img src="{{asset('home/images/queencard4.png')}}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-btn">
                        <a class="btn" href="{{route('tutorial')}}">View Full Tutorial</a>
                    </div>
                </div>
        </section>

        <!-- our product -->
        <section class="section our_product">
            <div class="sec-banner our_products">
                <h2><span class="text-warning">our </span> latest products</h2>
            </div>
            <div class="product_card">
                <div class="container">
                    <div class=" row product_slider">
                        <div class=" col-lg-4 col-md-4 col-sm-6">
                            <div class="section card_contant ">
                                <div class="imag_box">
                                <img src="{{asset('home/images/product3.png')}}" alt="img">
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
                            <div class="section card_contant bg2">
                                <div class="imag_box">
                                <img src="{{asset('home/images/product2.png')}}" alt="img">
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
                                    <div class=""></div>
                                    <div>
                                        <a class="btn" href="#">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="section card_contant bg3">
                                <div class="imag_box">
                                <img src="{{asset('home/images/product3.png')}}" alt="img">
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
                                        <a class="btn" href="#">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-btn mt-4">
                        <a class="btn" href="{{route('product')}}">View More</a>
                    </div>
                </div>
            </div>
        </section>

<!-- Story Section -->
<section>
    <div class="sec-banner m-0">
        <h2><span class="text-warning"> The Story</span> of queens of ten <br>
            and it’s beginning</h2>
    </div>
    <div class="story row">
        <div class="col-md-6 ">
            <div class="story-img">
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="story-text">
                <p>This is the first time a game such as Queen of Tens will be available in mobile app form.</p>
                <p>With conventional games saturating the one-person card game industry, Queens of Ten provides
                    room
                    for unique gameplay, as well as an exciting interface that never bores users.</p>
                <p>The app aims to make customer experience a priority where players enjoy the app during a
                    commute,
                    in waiting rooms, and while taking a break during their routine schedule. Queens of Ten is
                    the
                    innovative card game that enthusiasts need from overplayed and over-offered deck games.</p>
                <div>
                    <a class="btn" href="{{route('story')}}">See More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--discount  -->
<section class="section discount">
    <div class="container">
        <h1>GET AMAZING DISCOUNT<br>
            IF YOU BUY ON OUR FIRST EVER SALE!</h1>
        <div class="dis-btn">
            <a class="btn" href="#">Add to Cart</a>
        </div>
    </div>
</section>

    </main>
@endsection
