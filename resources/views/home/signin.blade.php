@extends('home.layout.app')
@section('main')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v18.0&appId=185132871317943" nonce="FZ7Ns3Di"></script>
<div class="authlayout">
        <div class="container">
            <div class="authbox">
                <form class="login-form">
                    <div class="form-logo">
                    <img src="{{asset('home/images/bannerlogo.png')}}" alt="img">
                    </div>
                    <div class="login-btns">
                    <div class="btn-group">
                        <a href="{{url('/auth/redirect/google')}}" class="btn">
                            <div class="icon-box">
                                <img src="{{asset('images/google.svg')}}" alt="">
                            </div>
                            Sign in with Google
                        </a>
                    </div>
                        <div class="fb-login-button" data-width="" data-size="" data-button-type="" data-layout="" data-auto-logout-link="false" data-use-continue-as="false"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
