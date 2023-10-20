@extends('home.layout.app')
@section('main')
<div class="authlayout">
        <div class="container">
            <div class="authbox">
                <form class="login-form signup py-0">
                    <div class="form-logo">
                    <img src="{{asset('home/images/bannerlogo.png')}}" alt="img">
                    </div>
                    <div class="form-group">
                        <label class="py-1" type="text">First Name</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter your First Name"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="py-1" type="text">Last Name</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter your Last Name"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="py-1" type="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter your Email"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="py-1" type="number">Mobile</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter your Mobile Number"
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
                    <div class="form-group">
                        <label class="py-1" type="password">Retype Password</label>
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
                        <a href="#" class="btn">Sign up</a>
                        <div class="link">
                        <span>Don’t have an account? <a href="{{route('signin')}}"class="text-white">Sign in</a></span>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection