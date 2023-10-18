@extends('home.layout.app')
@section('main')
<section>
        <div class="section box">
            <div class="container">
                <h4 class="title">Edit Profile</h4>
                <form class=" login-form card_box py-0 mb-3 mt-3 ">
                    <div class="edit">
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
                    </div>
                    <div class="d-flex edit1">
                    <div class="form-group">
                        <label class="py-1" type="number">Birthday</label>
                        <input class="form-control" type="date" id="birthday" name="birthday"
                            required>
                    </div>  
                    <div class="form-group">
                        <label class="py-1" type="number">Mobile</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter your Mobile Number"
                            required>
                    </div>
                    </div>
                    <div class="form_btn pt-5 pb-3">
                        <div class="text-danger">
                            <a class="btn" href="#">Cancel</a>
                        </div>
                        <div class="">
                            <a class="btn" href="#">Save Changes</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection