@extends('home.layout.app')
@section('main')

<main>
        <section class="box-contant">
            <div class="container">
                <div class="box_text">
                    <div class="title">
                        <div class="logo"><img src="{{asset('home/images/business1.png')}}" alt="logo"></div>
                        <div class="text">
                            <h3>REACH AUDIENCES ACROSS GOOGLE AND APPLE PLATFORMS</h3>
                        </div>
                    </div>
                    <form class="login-form audiences-form py-0 mb-3 mt-3">
                        <div class="audiences">
                            <div class="form-group">
                                <label class="py-1" type="text">First Name:</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    placeholder="Type here" required>
                            </div>
                            <div class="form-group">
                                <label class="py-1" type="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    placeholder="Type here" required>
                            </div>
                        </div>
                        <div class="audiences">
                            <div class="form-group">
                                <label class="py-1" type="text">POSITION/ TITLE :</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    placeholder="Type here" required>
                            </div>
                            <div class="form-group">
                                <label class="py-1" type="email">CONTACT:</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    placeholder="Type here" required>
                            </div>
                        </div>
                        <hr />
                            <p>What is your strategy for promoting Queens of Ten Services?</p>
                            <div class="checkboxs">
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">Food and Beverage</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">Beauty and Wellness</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">Other</label>
                                </div>
                            </div>
                            <div class="checkboxs">
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">Fashion and accessories</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">Home and Living</label>
                                </div>
                            </div>
                        <hr>
                        <p>Company or personal website URL:</p>
                        <div class="form-group">
                            <textarea class="form-control" id="subject" name="subject" placeholder="Type here"
                                style="height:50px"></textarea>
                        </div>
                        <p class="pt-3">Briefly describe your business product or services.</p>
                        <div class="form-group">
                            <textarea class="form-control" id="subject" name="subject" placeholder="Type here"
                                style="height:80px"></textarea>
                        </div>
                        <hr>
                        <p>What type of advertising is your company interested in?</p>
                            <div class="checkboxs">
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">Banner ads</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">Company coupon promotions</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">Video ads</label>
                                </div>
                            </div>
                            <hr>
                            <p>What type of advertising is your company interested in?</p>
                            <div class="checkboxs">
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">Yes</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="service" name="service">
                                    <label for="text">No</label>
                                </div>
                            </div>
                            <div class="form-text">
                            <p class="pt-3">Thank you for choosing our services!</p>
                            <a class="btn" href="./tutorial.php">Apply</a>
                            </div>
                    </form>
                </div>
            </div>
        </section>
    </main>




@endsection