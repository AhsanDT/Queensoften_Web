@extends('home.layout.app')
@section('main')
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
                        <a href="{{url('/auth/redirect/facebook')}}" class="btn">
                            <div class="icon-box">
                                <img src="{{asset('images/fb.png')}}" width="50px" alt="">
                            </div>
                            Sign in with Facebook
                        </a>
                    </div>
                    <div class="btn-group">
                        <a href="{{url('/auth/redirect-apple')}}" class="btn">
                            <div class="icon-box">
                                <img src="{{asset('images/apple.png')}}" width="50px" alt="">
                            </div>
                            Sign in with Apple
                        </a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
