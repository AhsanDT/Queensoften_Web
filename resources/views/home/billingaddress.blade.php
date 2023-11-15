@extends('home.layout.app')
@section('main')
<section>
    <div class="section box">
    <div class="container">
    <h4 class="title">Add New Shipping / Billing Address</h4>
    <div class="card_box mb-3 mt-3">
        <form class="py-0 row ajax-form" data-action="{{route('post-billing')}}" method="post">
            @csrf
            <div class="col-md-5 billing_address">
                <div class="form-group">
                    <label class="py-1">First Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Enter your First Name" value="{{$billing->name ?? ''}}"
                        required>
                </div>

                <div class="form-group">
                    <label class="py-1">Last Name</label>
                    <input class="form-control" type="text" id="l_name" name="l_name" placeholder="Enter your Last Name" value="{{$billing->l_name ?? ''}}"
                        required>
                </div>
                <div class="form-group">
                    <label class="py-1">Phone number</label>
                    <input class="form-control" type="number" id="number" name="number" value="{{$billing->phone ?? ''}}"
                        placeholder="Please enter your mobile number" required>
                </div>
                <div class="form-group">
                    <label class="py-1">Other Notes</label>
                    <input class="form-control" type="text" id="notes" name="notes" value="{{$billing->notes ?? ''}}"
                        placeholder="Please enter your notes" required>
                </div>
            </div>
            <div class="col-md-2 d-md-block d-none"></div>
            <div class="col-md-5 billing_address">
                <div class="form-group">
                    <label class="py-1">Street Number and Name</label>
                    <input class="form-control" type="text" id="address" name="address" value="{{$billing->address ?? ''}}" placeholder="Enter here" required>
                </div>
                <div class="form-group">
                    <label class="py-1">Apartment or Unit and Number</label>
                    <input class="form-control" type="number" id="appartment" name="appartment" value="{{$billing->apartment ?? ''}}" placeholder="Select" required>
                </div>
                <div class="form-group">
                    <label class="py-1">City, State Zip Code</label>
                    <input class="form-control" type="number" id="zip" name="zip" value="{{$billing->zip ?? ''}}" placeholder="Select" required>
                </div>
                <div class="form-group">
                    <label class="py-1">Country</label>
                    <input class="form-control" type="text" id="country" name="country" value="{{$billing->country ?? ''}}" placeholder="Enter Country here"
                        required>
                </div>
                <div class="form-group">
                    <label class="py-1">Select a label for effective delivery:</label>
                    <div class="custom-radio">
                        <input type="radio" id="office" name="location" value="office"@if(isset($billing)) @if($billing->location == 'office') checked @endif @endif class="hidden-radio">
                        <label for="office" class="radio-label">OFFICE</label>

                        <input type="radio" id="home" name="location" value="home" @if(isset($billing)) @if($billing->location == 'home') checked @endif @endif class="hidden-radio">
                        <label for="home" class="radio-label">HOME</label>
                    </div>
                </div>

            </div>
            <div class="form_btn">
                <div class="text-danger">
                    <a class="btn" href="{{route('manageaccount',\Illuminate\Support\Facades\Auth::user()->id)}}">Cancel</a>
                </div>
                <div class="">
                    <button class="btn" type="submit" value="submit">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function (){
        $("body").on('submit', ".ajax-form", function (e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(this);
            var button = $(this).find(':input[type=submit]');

            $.ajax({
                type: form.attr("method"),
                url: form.attr("data-action"),
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    button.prop('disabled', true);
                },
                success: function (response) {
                    button.prop('disabled', false);
                    if (response.success === true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });
                        setTimeout(function (){
                            window.location.reload();
                        }, 3000);
                    }
                },
                error: function (data) {
                    button.prop('disabled', false);
                    $.each(data.responseJSON.errors, function (field_name, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: error,
                        });
                    })
                }
            })
        });
    })
</script>
@endsection
