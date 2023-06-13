<!doctype html>
<html lang="en-US">
@include('layout.head')
<body>
<div id="wrapper" class="loginWrapper" style="background-image: url({{asset('images/login-bg.jpg')}})">
    <div class="container">
        @include('partials.auth_logo')
        <div class="col">
            <h1>Sign in to manage</h1>
            <p>Enter your detail below</p>
            <form class="login-form" method="POST" data-action="{{route('login.authenticate')}}" >
                @csrf()
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control is-invalid" placeholder="Type here" name="email">
                </div>
                <div class="form-group form-password">
                    <div class="pull-right">
                        <a href="{{route('password.request')}}" class="forget-password">Forgot Password ?</a>
                    </div>
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Type here" name="password">
                    <i class="fas fa-lock"></i>
                </div>
                <div id="error_message" class="err-mesg" style="display: none">
                </div>
                <div class="form-group clearfix">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('layout.js')
<script>
    var errorIcon = '<i class="fal fa-exclamation-circle"></i> ';
    $(document).on('submit',".login-form",function(e){
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
                toastr.success(response.message);
                if(response.success ===true){
                    window.location.href = "{{route('index')}}";
                }
            },
            error:function (data){
                button.prop('disabled', false);
                $('#error_message').html(errorIcon+data.responseJSON.message);
                $(".fa-lock").css("color", "#EB0000");
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
