@extends('home.layout.app')
@section('main')
<section>
    <div class="section box">
    <div class="container">
    <h4 class="title">Add New Shipping / Billing Address</h4>
    <div class="card_box mb-3 mt-3">
        <form class=" login-form  py-0 row ">
            <div class="col-md-5 billing_address">
                <div class="form-group">
                    <label class="py-1" type="text">First Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Enter your First Name"
                        required>
                </div>

                <div class="form-group">
                    <label class="py-1" type="text">Last Name</label>
                    <input class="form-control" type="text" id="l-name" name="l-name" placeholder="Enter your Last Name"
                        required>
                </div>
                <div class="form-group">
                    <label class="py-1" type="number">Phone number</label>
                    <input class="form-control" type="number" id="number" name="number"
                        placeholder="Please enter your mobile number" required>
                </div>
                <div class="form-group">
                    <label class="py-1" type="text">Other Notes</label>
                    <input class="form-control" type="text" id="notes" name="notes"
                        placeholder="Please enter your notes" required>
                </div>
            </div>
            <div class="col-md-2 d-md-block d-none"></div>
            <div class="col-md-5 billing_address">
                <div class="form-group">
                    <label class="py-1" type="text">Street Number and Name</label>
                    <input class="form-control" type="text" id="address" name="address" placeholder="Enter here" required>
                </div>
                <div class="form-group">
                    <label class="py-1" type="number">Apartment or Unit and Number</label>
                    <input class="form-control" type="number" id="appartment" name="appartment" placeholder="Select" required>
                </div>
                <div class="form-group">
                    <label class="py-1" type="number">City, State Zip Code</label>
                    <input class="form-control" type="number" id="zip" name="zip" placeholder="Select" required>
                </div>
                <div class="form-group">
                    <label class="py-1" type="text">Country</label>
                    <input class="form-control" type="text" id="country" name="country" placeholder="Enter Country here"
                        required>
                </div>
                <div class="form-group">
                    <label class="py-1" type="text">Select a label for effective delivery:</label>
                        <div>
                            <a class="btn labalbtn" href="#">OFFICE</a>
                            <a class="btn labalbtn" href="#">HOME</a>
                        </div>
                </div>

            </div>
        </form>
        <div class="form_btn">
            <div class="text-danger">
                <a class="btn" href="#">Cancel</a>
            </div>
            <div class="">
                <a class="btn" href="#">Save Changes</a>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
    </div>
</section>
@endsection
