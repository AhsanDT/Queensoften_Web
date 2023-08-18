@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Story Mode</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 d-flex">
                        <a href="{{route('storymode.index')}}" class="btn-back">
                            <i class="fas fa-long-arrow-left" style="margin-right: 10px"></i> Back
                        </a>
                    </div>
                    <form data-action="{{route('storymode.store')}}" method="POST" class="story-ajax-form d-flex">
                        @csrf
                        <div class="row mx-0">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Date Start</label>
                                        <input type="date" class="form-control" placeholder="01/05/2023" name="start_date"
                                               min="<?php echo date('Y-m-d'); ?>"/>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>End Start</label>
                                        <input type="date" class="form-control" placeholder="01/05/2023" name="end_date"
                                               min="<?php echo date('Y-m-d'); ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Season Title</label>
                                        <input type="text" class="form-control" placeholder="Season 1" name="title"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Story (Description)</label>
                                        <textarea placeholder="Enter here"  style="height: 300px" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="imgUpload">
                                    <label for='imgCoverPhoto'>
                                        <input type="file" class="imageInput" id='imgCoverPhoto' placeholder="Image upload" name="image" accept="image/*">
                                        <div class="placeholderBox">
                                            <div class="iconBox"></div>
                                            Upload Image
                                        </div>
                                    </label>
                                    <div class="imgPreview">
                                        <img class="previewImage" src="" />
                                        <div class="removeBtn"><i class="fal fa-times"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pt-3">
                                    <button class="btn">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('extra-js')
    <script>
        $(document).on('submit', ".story-ajax-form", function (e) {
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
                        toastr.success(response.message);
                        @if(!request()->routeIs('setting.index'))
                        setTimeout(function () {
                            window.location.href = "{{route('storymode.index')}}";
                        }, 2000);
                        @endif
                    }
                },
                error: function (data) {
                    button.prop('disabled', false);
                    $.each(data.responseJSON.errors, function (field_name, error) {
                        toastr.error(error);
                    })
                }
            })
        });

    </script>
@endsection

