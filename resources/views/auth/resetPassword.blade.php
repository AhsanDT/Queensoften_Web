<!doctype html>
<html lang="en-US">
@include('layout.head')
<body>
<div id="wrapper" class="loginWrapper" style="background-image: url({{asset('images/login-bg.jpg')}})">
    <div class="container">
        @include('partials.auth_logo')

        <div class="col">
            <h1>Reset Password</h1>
            <p>Enter your detail below</p>
            <form class="form reset-form"  method="POST" data-action="{{route('password.update')}}">
                @csrf()
                <input type="hidden" name="token" value="{{$token}}">
                <input type="hidden" name="email" value="{{$email}}">
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" placeholder="Type here" name="password">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="form-group">
                    <label>Retype New Password</label>
                    <input type="password" class="form-control" placeholder="Type here" name="password_confirmation">
                    <i class="fas fa-lock"></i>
                </div>
                <div id="error_message" class="err-mesg" style="display: none">
                </div>
                <br>
                <div class="form-group text-center">
                    <button type="submit" class="btn">Create new Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
                toastr.success(response.message);
                if(response.success ===true){
                    window.location.href = "{{route('index')}}";
                }
            },
            error:function (data){
                var list = '';
                button.prop('disabled', false);
                $(".fa-lock").css("color", "#EB0000");
                var count = Object.keys(data.responseJSON.errors).length;
                if(count > 1){
                    list = "<ul>";
                    $.each(data.responseJSON.errors,function (field_name,error){
                        list += '<li>'+errorIcon+error+'</li>'
                    })
                    list += '</ul>';
                }else{
                    list = errorIcon+data.responseJSON.message;
                }
                $('#error_message').html(list);
                $('#error_message').show();
            }
        })
    });

</script>
</body>
</html>
