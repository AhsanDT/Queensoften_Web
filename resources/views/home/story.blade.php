@extends('home.layout.app')
@section('main')
<main>
    @foreach($story_modes as $story_mode)
        <!-- banner -->
        <section>
            <div class="story_banners">
                <img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/{{$story_mode->image}}" alt="img">
            </div>
        </section>

        <!-- story contant -->
        <section>
            <div class="container">
                <div class="story_contant">
                    <h2>{{$story_mode->title}}</h2>
                    <p>{{$story_mode->description}}</p>
                </div>
            </div>
        </section>
    @endforeach

        <!-- second last section -->
        <section class="story-texts">
            <div class="row flex-md-row flex-column-reverse story_title">
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <h1>get amazing discount if you buy on our first ever sale!</h1>
                </div>
                <div class="col-md-4 ">
                    <div class="storybg"></div>
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
