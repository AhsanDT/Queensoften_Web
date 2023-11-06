@extends('home.layout.app')
@section('main')
<div class="d-flex justify-content-center contact row">
    <div style=" padding: 0;" class="col-md-6 box_left"> <div class="contactbg"> </div> </div>
        <div style="padding: 0;" class="col-md-6 box_right">
            <div class="authlayout">
                <div class="container">
                    <div class="authbox">
                        <form class="login-form contactus">
                            <h2>Contact Us</h2>
                            <div class="link py-3" style="
                            text-align: left !important; font-size: 15px;">
                                <span>You can reach us anytime via <a href="./signup.php" class="text-white">
                                        game@queensoften.com</a></span>
                            </div>
                            <div class="form-group">
                                <label class="py-1" type="text">Name</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Your name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="py-1" type="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    placeholder="you@company.com" required>
                                <div class="form-group">
                                    <label for="phone">Phone No.</label>
                                    <div class="input-group">
                                        <input class="form-control" type="tel" id="phone" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="py-1" type="text">How can we help?</label>
                                    <textarea class="form-control" id="subject" name="subject"
                                        placeholder="Comment here ..." style="height:150px"></textarea>
                                </div>
                                <div class="form-group text-center ">
                                    <a href="#" class="btn w-100">Submit</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection