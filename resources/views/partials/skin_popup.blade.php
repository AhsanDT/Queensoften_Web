<div class="modal fade" id="addSkinValuePopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="text-center mb-4 pt-4">Add Value</h4>
                <form  method="POST" class="ajax-form" data-action="{{route('e-store.skin')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="imgUpload mx-auto" style="max-width: 200px">
                                <label for='skinImgCoverPhoto'>
                                    <input type="file" class="imageInput" id='skinImgCoverPhoto' placeholder="Image upload" name="image">
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
                        <div class="col-md-12 form-group">
                            <label> Name</label>
                            <input type="text" class="form-control" placeholder="0" name="name">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Coin Value</label>
                            <input type="number" class="form-control" placeholder="0" name="coins">
                        </div>
                        <div class="col-md-12 d-flex flex-column align-items-center">
                            <button type="submit" class="btn w-50 mb-3">Add Challenge</button>
                            <button type="button" class="btn btn-light w-50" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
