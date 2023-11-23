@extends('partials.master')

@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Store</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 d-flex">
                        <a href="{{route('e-store.index')}}" class="btn-back">
                            <i class="fas fa-long-arrow-left" style="margin-right: 10px"></i> Add
                        </a>
                    </div>
                    <form method="POST" class="deck-ajax-form" data-action="{{route('e-store.deck')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mx-0">
                            <div class="col-md-6 form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Enter title here" name="title" />
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Price in Royal Coins</label>
                                <input type="text" class="form-control" placeholder="Enter price" name="coins"/>
                            </div>
                        </div>
                        <div class="row mx-0 mb-5 align-items-end">
                            <label>Cover Photo</label>
                            <div class="col-md-6 form-group d-flex">
                                <div class="imgUpload" style="max-width: 200px">
                                    <label for='imgCoverPhoto'>
                                        <input type="file" class="imageInput" id='imgCoverPhoto' placeholder="Image upload" name="image">
                                        <div class="placeholderBox">
                                            <div class="iconBox"></div>
                                            Upload Cover Photo
                                        </div>
                                    </label>
                                    <div class="imgPreview">
                                        <img class="previewImage" src="" />
                                        <div class="removeBtn"><i class="fal fa-times"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Joker</label>
                                <div class="imgUpload small small">
                                    <label for='imgJokerPhoto'>
                                        <input type="file" class="imageInput" id='imgJokerPhoto' placeholder="Image upload" name="joker_image">
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
                        </div>
                        <div class="row mx-0">
                            <div class="col-md-3">
                                <h5>Spade</h5>
                                <div class="form-group">
                                    <label>King</label>
                                    <div class="imgUpload small small">
                                        <label for='SpadeKing'>
                                            <input type="file" class="imageInput" id='SpadeKing' placeholder="Image upload" name="spade_king">
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
                                <div class="form-group">
                                    <label>Queen</label>
                                    <div class="imgUpload small small">
                                        <label for='SpadeQueen'>
                                            <input type="file" class="imageInput" id='SpadeQueen' placeholder="Image upload" name="spade_queen">
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
                                <div class="form-group">
                                    <label>Jack</label>
                                    <div class="imgUpload small small">
                                        <label for='SpadeJack'>
                                            <input type="file" class="imageInput" id='SpadeJack' placeholder="Image upload" name="spade_jack">
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
                                <div class="form-group">
                                    <label>Ace</label>
                                    <div class="imgUpload small small">
                                        <label for='SpadeAce'>
                                            <input type="file" class="imageInput" id='SpadeAce' placeholder="Image upload" name="spade_ace">
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
                                <?php for($i=2;$i<=10;$i++){?>
                                <div class="form-group">
                                    <label><?php echo $i ?></label>
                                    <div class="imgUpload small">
                                        <label for='img<?php echo $i ?>'>
                                            <input type="file" class="imageInput" id='img<?php echo $i ?>' placeholder="Image upload" name="spade_<?php echo $i ?>">
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
                                <?php }?>
                            </div>
                            <div class="col-md-3">
                                <h5>Heart</h5>
                                <div class="form-group">
                                    <label>King</label>
                                    <div class="imgUpload small small">
                                        <label for='HeartKing'>
                                            <input type="file" class="imageInput" id='HeartKing' placeholder="Image upload" name="heart_king">
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
                                <div class="form-group">
                                    <label>Queen</label>
                                    <div class="imgUpload small small">
                                        <label for='HeartQueen'>
                                            <input type="file" class="imageInput" id='HeartQueen' placeholder="Image upload" name="heart_queen">
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
                                <div class="form-group">
                                    <label>Jack</label>
                                    <div class="imgUpload small small">
                                        <label for='HeartJack'>
                                            <input type="file" class="imageInput" id='HeartJack' placeholder="Image upload" name="heart_jack">
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
                                <div class="form-group">
                                    <label>Ace</label>
                                    <div class="imgUpload small small">
                                        <label for='HeartAce'>
                                            <input type="file" class="imageInput" id='HeartAce' placeholder="Image upload" name="heart_ace">
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
                                <?php for($i=2;$i<=10;$i++){?>
                                <div class="form-group">
                                    <label><?php echo $i ?></label>
                                    <div class="imgUpload small">
                                        <label for='Heartimg<?php echo $i ?>'>
                                            <input type="file" class="imageInput" id='Heartimg<?php echo $i ?>' placeholder="Image upload" name="heart_<?php echo $i ?>">
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
                                <?php }?>
                            </div>
                            <div class="col-md-3">
                                <h5>Diamond</h5>
                                <div class="form-group">
                                    <label>King</label>
                                    <div class="imgUpload small small">
                                        <label for='DiamondKing'>
                                            <input type="file" class="imageInput" id='DiamondKing' placeholder="Image upload" name="diamond_king">
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
                                <div class="form-group">
                                    <label>Queen</label>
                                    <div class="imgUpload small small">
                                        <label for='DiamondQueen'>
                                            <input type="file" class="imageInput" id='DiamondQueen' placeholder="Image upload" name="diamond_queen">
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
                                <div class="form-group">
                                    <label>Jack</label>
                                    <div class="imgUpload small small">
                                        <label for='DiamondJack'>
                                            <input type="file" class="imageInput" id='DiamondJack' placeholder="Image upload" name="diamond_jack">
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
                                <div class="form-group">
                                    <label>Ace</label>
                                    <div class="imgUpload small small">
                                        <label for='DiamondAce'>
                                            <input type="file" class="imageInput" id='DiamondAce' placeholder="Image upload" name="diamond_ace">
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
                                <?php for($i=2;$i<=10;$i++){?>
                                <div class="form-group">
                                    <label><?php echo $i ?></label>
                                    <div class="imgUpload small">
                                        <label for='Diamondimg<?php echo $i ?>'>
                                            <input type="file" class="imageInput" id='Diamondimg<?php echo $i ?>' placeholder="Image upload" name="diamond_<?php echo $i ?>">
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
                                <?php }?>
                            </div>
                            <div class="col-md-3">
                                <h5>Club</h5>
                                <div class="form-group">
                                    <label>King</label>
                                    <div class="imgUpload small small">
                                        <label for='ClubKing'>
                                            <input type="file" class="imageInput" id='ClubKing' placeholder="Image upload" name="club_king">
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
                                <div class="form-group">
                                    <label>Queen</label>
                                    <div class="imgUpload small small">
                                        <label for='ClubQueen'>
                                            <input type="file" class="imageInput" id='ClubQueen' placeholder="Image upload" name="club_queen">
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
                                <div class="form-group">
                                    <label>Jack</label>
                                    <div class="imgUpload small small">
                                        <label for='ClubJack'>
                                            <input type="file" class="imageInput" id='ClubJack' placeholder="Image upload" name="club_jack">
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
                                <div class="form-group">
                                    <label>Ace</label>
                                    <div class="imgUpload small small">
                                        <label for='ClubAce'>
                                            <input type="file" class="imageInput" id='ClubAce' placeholder="Image upload" name="club_ace">
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
                                <?php for($i=2;$i<=10;$i++){?>
                                <div class="form-group">
                                    <label><?php echo $i ?></label>
                                    <div class="imgUpload small">
                                        <label for='Clubimg<?php echo $i ?>'>
                                            <input type="file" class="imageInput" id='Clubimg<?php echo $i ?>' placeholder="Image upload" name="club_<?php echo $i ?>">
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
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('extra-js')
<script>
    $(document).on('submit', ".deck-ajax-form", function (e) {
        e.preventDefault();
        var form = $(this);
        var formData = new FormData(this);
        var button = $(this).find(':input[type=submit]');
        var imageInputs = $(this).find(':input[type=file]').not('#imgCoverPhoto, #imgJokerPhoto');

        // Define successfulRequests and totalRequests inside the submit function.
        var successfulRequests = 0;
        var totalRequests = imageInputs.length;
        $('#loader').show();

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
                    imageInputs.each(function(index, input) {
                        var imageFile = input.files[0];
                        if (imageFile) {
                            var imageData = new FormData();

                            // Extract img_type and img_sub_type from the name attribute.
                            var imageName = input.name;
                            var imgType = imageName.split('_')[0]; // Assuming img_type is the second part.
                            var imgSubType = imageName.split('_')[1]; // Assuming img_sub_type is the third part.

                            // Add img_type and img_sub_type to the FormData.
                            imageData.append('image', imageFile);
                            imageData.append('img_type', imgType);
                            imageData.append('img_sub_type', imgSubType);
                            imageData.append('deck_id', response.deck_id);

                            $.ajax({
                                type: 'POST',
                                url: '{{ route("e-store.deck_attachments") }}',
                                data: imageData,
                                contentType: false,
                                cache: false,
                                processData: false,
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    console.log(response.message);
                                    successfulRequests++;
                                    if (successfulRequests === totalRequests) {
                                        $('#loader').hide();
                                        toastr.success('All Attachments uploaded successfully');
                                        setTimeout(function () {
                                            window.location.reload();
                                        }, 4000);
                                    }
                                },
                                error: function(xhr) {
                                    console.log('Error: ' + xhr.responseText); // Show error message
                                }
                            });
                        }
                    });
                    // Optional: Reload the page or perform other actions after processing all images.
                    // ...
                }
                // setTimeout(function () {
                //     window.location.reload();
                // }, 3000);
            },
            error: function (data) {
                $('#loader').hide();
                button.prop('disabled', false);
                var errors = JSON.parse(data.responseText).errors;
                $.each(errors, function (name, error) {
                    // Add or remove 'input-error' class based on validation errors
                    $('.form-control[name="' + name + '"]').toggleClass('input-error', true);
                    $('.imageInput[name="' + name + '"]').toggleClass('input-error', true);

                    // Show the error message below the respective form field
                    var errorMessage = '<span class="error-message" style="color: red">' + error + '</span>';
                    $('.form-control[name="' + name + '"]').after(errorMessage);
                    $('.imageInput[name="' + name + '"]').closest('.imgUpload').after(errorMessage);
                });
                toastr.error('Please resolve the following errors');
            }
        });
    });
</script>
@endsection

