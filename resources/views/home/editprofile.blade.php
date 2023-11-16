@extends('home.layout.app')
@section('main')
<section>
        <div class="section box">
            <div class="container">
                <h4 class="title">Edit Profile</h4>
                <form class="card_box py-0 mb-3 mt-3 ajax-form" data-action="{{route('updateprofile')}}" method="post">
                    @csrf
                    <div class="edit">
                    <div class="form-group">
                        <label class="py-1">First Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}" placeholder="Enter your First Name"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="py-1">Last Name</label>
                        <input class="form-control" type="text" id="l_name" name="l_name" value="{{$user->l_name}}" placeholder="Enter your Last Name"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="py-1" type="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}" readonly placeholder="Enter your Email"
                            required>
                    </div>
                    </div>
                    <div class="d-flex edit1">
                    <div class="form-group">
                        <label class="py-1">Birthday</label>
                        <input class="form-control" type="date" id="dob" name="dob"  value="{{$user->dob}}"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="py-1">Mobile</label>
                        <input class="form-control" type="number" id="phone" name="phone"  value="{{$user->phone}}" placeholder="Enter your Mobile Number"
                            required>
                    </div>
                    </div>
                    <div class="form_btn pt-5 pb-3">
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
{{--        </div>--}}
    </section>
{{--</div>--}}
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
