@extends('home.layout.app')
@section('main')
<div class="d-flex justify-content-center contact row">
    <div style=" padding: 0;" class="col-md-6 box_left"> <div class="contactbg"> </div> </div>
        <div style="padding: 0;" class="col-md-6 box_right">
            <div class="authlayout">
                <div class="container">
                    <div class="authbox">
                        <form class="login-form contactus ajax-form" data-action="{{route('contact')}}" method="post">
                            @csrf()
                            <h2>Contact Us</h2>
                            <div class="link py-3" style="
                            text-align: left !important; font-size: 15px;">
                                <span>You can reach us anytime via <a href="./signup.php" class="text-white">
                                        game@queensoften.com</a></span>
                            </div>
                            <div class="form-group">
                                <label class="py-1">Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Your name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="py-1">Email</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    placeholder="you@company.com"  >
                                <div class="form-group">
                                    <label for="phone">Phone No.</label>
                                    <div class="input-group">
                                        <input class="form-control" type="tel" id="phone" name="phone" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="py-1">How can we help?</label>
                                    <textarea class="form-control" id="subject" name="comment"
                                        placeholder="Comment here ..." style="height:150px"></textarea>
                                </div>
                                <div class="form-group text-center ">
                                    <button type="submit" class="btn w-100" value="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
