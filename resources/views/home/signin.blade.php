@extends('home.layout.app')
@section('main')
<div class="authlayout">
        <div class="container">
            <div class="authbox">
                <form class="login-form">
                    <div class="form-logo">
                    <img src="{{asset('home/images/bannerlogo.png')}}" alt="img">
                    </div>
                    <div class="form-group">
                        <label class="py-1" type="email">Email or Gamertag</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email or Gamertag"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="py-1" type="password">Password</label>
                       <div class="position-relative showBox">
                       <input class="form-control" type="password" id="password" name="password" placeholder="Password"
                            required>
                            <i class="fa fa-eye"></i>
                       </div>
                    </div>
                    <div class="forget">
                        <p>Forgot Password</p>
                    </div>
                    <div class="form-group text-center">
                        <a href="#" class="btn">Login</a>
                        <div class="link">
                        <span>Don’t have an account? <a href="{{route('signup')}}" class="text-white">Sign Up</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection