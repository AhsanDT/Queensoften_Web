<!doctype html>
<html lang="en-US">
@include('layout.head')
<body>
<div id="wrapper" class="loginWrapper" style="background-image: url({{asset('images/login-bg.jpg')}})">
    <div class="container">
        @include('partials.auth_logo')
        <div class="col">
            <h1>Forgot Password?</h1>
            <p>Enter your detail below</p>
            <form class="reset-form" method="POST" data-action="{{route('password.email')}}">
                @csrf
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" placeholder="Type here" name="email">
                </div>
                <div id="error_message" class="err-mesg" style="display: none">
                </div>
                <br>
                <div class="form-group text-center">
                    <button type="submit" class="btn" >Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('partials.reset_password_notification')
@include('layout.js')
    <script>
        $(document).on('submit',".reset-form",function(e){
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(this);
            var button   =  $(this).find(':input[type=submit]');

            $.ajax({
                type:form.attr("method"),
                url:form.attr("data-action"),
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    button.prop('disabled', true);
                },
                success:function (response){
                    button.prop('disabled', false);
                    $('#resetpasswordNotify').modal('show');
                    // toastr.success(response.message);
                },
                error:function (data){
                    button.prop('disabled', false);
                    $('#error_message').html(errorIcon+data.responseJSON.message);
                    $('#error_message').show();
                    // if(data.responseJSON.errors){
                    //     $.each(data.responseJSON.errors,function (field_name,error){
                    //         toastr.error(error);
                    //     })
                    // }else{
                    //     toastr.error(data.responseJSON.message);
                    // }
                }
            })
        });

    </script>
</body>
</html>
