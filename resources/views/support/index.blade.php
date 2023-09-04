@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Support</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="support-block">
                        <div class="messageListSidebar">
                            <form class="search-form search-message">
                                <div class="form-group">
                                    @csrf()
                                    <input type="text" class="form-control" id="search_message" name="message"
                                           placeholder="Search Messages">
                                    <i class="fal fa-search"></i>
                                </div>
                            </form>
                            <div id="search-message-body">
                                @include('partials.load_support_ticket_messages_list',compact('supportTickets'))
                            </div>
                        </div>
                        <div class="msgPreview">
                            <div id="support-tickets">
                                <div class="emptyBox">
                                    <div class="icon-box">
                                        <i class="fas fa-envelope-open-text fa-fw"></i>
                                    </div>
                                    <h2>Support Inbox</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('extra-js')
    <script>
        $(document).on('change', ".massage-option", function (e) {
            var status = this.value;
            if (status) {
                var csrf = "{{@csrf_token()}}";
                var support_ticket_id = $('#support_ticket_id').val();
                $.ajax({
                    type: 'POST',
                    url: '{{route('support.update_status')}}',
                    data: {
                        'status': status,
                        '_token': csrf,
                        'support_ticket_id': support_ticket_id
                    },
                    success: function (response) {
                        load_single_support_ticket_list(support_ticket_id);
                    }, error: function (response) {
                        Swal.fire('Warning', response.responseJSON.message);
                    },
                    timeout: 15000
                }).fail(function (jqXHR, textStatus) {
                    if (textStatus === 'timeout') {
                        Swal.fire("Sorry", 'Please Wait... Slow connection!', "error");
                        //toastr.warning('Please Wait... Slow connection!');
                        //do something. Try again perhaps?
                    }
                });
            }
        });
        $('#search_message').keyup(function () {
            $('.search-message').submit();
        });

        //submit reply ticket
        $(document).on('submit', ".support-submit", function (e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(this);
            var button = $(this).find(':input[type=submit]');
            show_loading_img();

            $.ajax({
                type: form.attr("method"),
                url: form.attr("data-action"),
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    show_loading_img();

                    button.prop('disabled', true);
                },
                success: function (response) {
                    $('.support-submit').trigger("reset");
                    button.prop('disabled', false);
                    toastr.success('Ticket reply sent successfully');
                    document.getElementById("support-image-path").src = '';
                    $('.uploadImgRow').hide();
                    var support_ticket_id = $('#support_ticket_id').val();
                    load_single_support_ticket_list(support_ticket_id)
                    $('#append-reply').append(response);
                    hide_loading_img();
                },
                error: function (data) {
                    hide_loading_img();
                    button.prop('disabled', false);
                    if(data.responseJSON.errors){
                        $.each(data.responseJSON.errors, function (field_name, error) {
                            toastr.error(error);
                        })
                    }else{
                        toastr.error(data.responseJSON.message);
                    }
                }
            })
        });


        //select ticket and load section
        $(document).on('click', '.select-message', function () {
            var support_ticket_id = $(this).attr('id').split("-")[1];
            $("#search-message-body ul").parent().find('li').removeClass("active");
            $(this).addClass('active');
            loadMessages(support_ticket_id);
        });

        //delete file
        $(document).on("click", ".delete-file", function () {
            $(".support-message-file").val(null);
            $('.uploadImgRow').hide();
        });


        //upload attachment
        $(document).on("click", ".browse", function () {
            var file = $(this)
                .parent()
                .parent()
                .parent()
                .find(".support-message-file");
            file.trigger("click");
        });
        $(document).on("change", ".support-message-file", function (e) {
            // $('').change(function (e) {
            // $(document).on("change","#file", function (e) {
            var fileName = e.target.files[0].name;

            if (!fileName.match(/\.(jpg|jpeg|png)$/i)) {
                $(".support-message-file").val(null);
                toastr.error("The file must be a type of jpeg, jpg, png.");
            } else {
                $("#file").val(fileName);
                $('.uploadImgRow').show();
                var reader = new FileReader();
                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("support-image-path").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            }

        });

        //search message
        $(document).on('submit', ".search-message", function (e) {
            e.preventDefault();
            var message = $('#search_message').val();
            load_message_list(message);
        });

        //load tickets
        function loadMessages(support_ticket_id) {
            show_loading_img();
            $.ajax({
                url: "{{route('support.get')}}",
                type: 'GET',
                data: {
                    support_ticket_id: support_ticket_id,
                },
                cache: false,
                success: function (response) {
                    hide_loading_img();
                    // $('html, body').animate({
                    //     scrollTop: $(".msg-history").offset().top
                    // }, 500);
                    $('#support-tickets').html(response);
                    load_single_support_ticket_list(support_ticket_id);
                }, error: function (response) {
                    hide_loading_img();
                    Swal.fire('Warning', response.responseJSON.message);
                },
                timeout: 15000
            }).fail(function (jqXHR, textStatus) {
                if (textStatus === 'timeout') {
                    Swal.fire("Sorry", 'Please Wait... Slow connection!', "error");
                    //toastr.warning('Please Wait... Slow connection!');
                    //do something. Try again perhaps?
                }
            });

        }

        //load tickets list
        function load_message_list(message) {
            $.ajax({
                type: 'GET',
                url: '{{route('support.message.search')}}',
                data: {
                    'message': message
                },
                success: function (response) {
                    var supportTicketId = $('#support_ticket_id').val();
                    $('#search-message-body').html(response);
                    $("#search-message-body ul").parent().find('li').removeClass("active");
                    $('#message-' + supportTicketId).addClass('active');
                }, error: function (response) {
                    Swal.fire('Warning', response.responseJSON.message);
                },
                timeout: 15000
            }).fail(function (jqXHR, textStatus) {
                if (textStatus === 'timeout') {
                    Swal.fire("Sorry", 'Please Wait... Slow connection!', "error");
                    //toastr.warning('Please Wait... Slow connection!');
                    //do something. Try again perhaps?
                }
            });
        }

        //load single support ticket list
        function load_single_support_ticket_list(supportTicketId) {
            $.ajax({
                type: 'GET',
                url: '{{route('support.load_single_message_list')}}',
                data: {
                    'support_ticket_id': supportTicketId
                },
                success: function (response) {
                    if (response.supportTicket.user && response.supportTicket.user.picture) {
                        $('#message-' + supportTicketId + ' .userImg img').attr('src', response.supportTicket.user.picture);
                    }
                    $('#message-' + supportTicketId).html(response);
                }, error: function (response) {
                    Swal.fire('Warning', response.responseJSON.message);
                },
                timeout: 15000
            }).fail(function (jqXHR, textStatus) {
                if (textStatus === 'timeout') {
                    Swal.fire("Sorry", 'Please Wait... Slow connection!', "error");
                    //toastr.warning('Please Wait... Slow connection!');
                    //do something. Try again perhaps?
                }
            });
        }
    </script>
@endsection
