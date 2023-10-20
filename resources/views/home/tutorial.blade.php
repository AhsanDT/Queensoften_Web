@extends('home.layout.app')
@section('main')
<main>
    <section class="section play_queens"> <div class="sec-banner play_queen tutorial"> <h2>How to play<span
        style="color:#531083;"> queens of 10!</span>
        </div>
        <div class="container-fluid">
        <div class="product_card row">
            <div class="col-xl-3 col-md-4 col-sm-6 mb-3 ">
            <div class="section card_contant counter ">
            <div class="box-contant">
                <p>Queens of Ten has 3 game modes. (Freeplay, Timed and Challenges). Each game
                has
                the same game flow and the only difference is the timer and unlockable
                achievements.</p>
                <p>Hard Mode - is an exciting way to test your quick thinking ability and luck.</p>
                <p>Easy and Medium - lets you play the game with easier and relax way. You have the ability to skip a
                    card.</p>
                    </div>
                <div class="imag_box" style="height: 280px">
                    <img src="{{asset('home/images/queencard1.png')}}" alt="img">
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                <div class="section card_contant counter">
                    <div class="box-contant">
                    <p>The game starts with 12 playing cards, shuffled from the deck randomly. Cards
                    are
                    positioned in 3 rows and 4 columns.</p>
                    </div>
                    <div class="imag_box">
                        <img src="{{asset('home/images/queencard2.png')}}" alt="img" style="height: 430px; object-fit:
                        contain">
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                    <div class="section card_contant counter">
                        <div class="box-contant">
                            <p>The game automatically replaces the face cards, Face cards must be replaced
                                to
                                start the game</p>
                        </div>
                        <div class="imag_box" style="height: 420px">
                            <img src="{{asset('home/images/queencard3.png')}}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
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
        </div>
        <div class="container-fluid">
        <div class="product_card row">
        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                <div class="section card_contant counter">
                    <div class="box-contant">
                    <p>The move is not valid if the selected cards does not sum up to ten (10).</p>
                    </div>
                    <div class="imag_box">
                        <img src="{{asset('home/images/queencard7.png')}}" alt="img" style="height: 430px; object-fit:
                        contain">
                        </div>
                    </div>
                    </div>
                <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                <div class="section card_contant counter">
                    <div class="box-contant">
                    <p>When a move is valid, the game will automatically draw two (2)  cards on the deck and put them on top of the card that was selected (Hard Mode). </p>
                    <p>In the Easy and Medium difficulty. The card that is selected in the field will be replaced by the card selected on the corresponding deck (left or right). Same rules apply.</p>
                    </div>
                    <div class="imag_box">
                        <img src="{{asset('home/images/queencard8.png')}}" alt="img" style="height: 330px; object-fit:
                        contain">
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                    <div class="section card_contant counter">
                        <div class="box-contant">
                            <p>A single field will become unselectable once a drawn card is a face card</p>
                        </div>
                        <div class="imag_box" style="height: 420px">
                            <img src="{{asset('home/images/queencard9.png')}}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                    <div class="section card_contant counter">
                        <div class="box-contant">
                            <p>If there are No two (2) cards on the field that sums up to ten (10) the player loses
                                the game. </p>
                        </div>
                        <div class="imag_box" style="height: 420px">
                            <img src="{{asset('home/images/queencard10.png')}}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="container-fluid">
            <div class="product_card row">
                <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                    <div class="section card_contant counter">
                        <div class="box-contant">
                            <p>If there are No two (2) cards on the field that sums up to ten (10) the player loses
                                the game. </p>
                        </div>
                        <div class="imag_box" style="height: 420px">
                            <img src="{{asset('home/images/queencard10.png')}}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                    <div class="section card_contant counter">
                        <div class="box-contant">
                            <p>Jokers are available to use to control the winning to strategically make a move and
                                replace 1 card on the table</p>
                        </div>
                        <div class="imag_box" style="height: 420px">
                            <img src="{{asset('home/images/queencard11.png')}}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                    <div class="section card_contant counter">
                        <div class="box-contant">
                            <p>Player is allowed to reshuffle the deck to better their odds at winning the game</p>
                        </div>
                        <div class="imag_box">
                            <img src="{{asset('home/images/queencard14.png')}}" alt="img"
                                style="height: 430px; object-fit: contain">
                        </div>
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