@extends('home.layout.app')
@section('main')
    <script>
        function openPopup(){
            (function(d, s, id){
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.id = id;
                    js.src = "https://connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk')
            );


            window.fbAsyncInit = function() {
                FB.init({
                    appId            : '185132871317943',
                    xfbml            : true,
                    version          : 'v18.0'
                });
                FB.login(function(response) {
                    if (response.authResponse) {
                        console.log('Welcome!  Fetching your information.... ');
                        FB.api('/me', {fields: 'name, email'}, function(response) {
                            document.getElementById("profile").innerHTML = "Good to see you, " + response.name + ". i see your email address is " + response.email
                        });
                    } else {
                        console.log('User cancelled login or did not fully authorize.'); }
                });
            };
        }
    </script>
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
                    <div class="btn-group">
                        <a href="" onclick="openPopup()" class="btn">
                            <div class="icon-box">
                                <img src="{{asset('images/google.svg')}}" alt="">
                            </div>
                            Sign in with Facebook
                        </a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
