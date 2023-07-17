<div class="modal fade" id="addTutorial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-body">
                <h4 class="text-center mb-4 pt-4">Add Tutorial</h4>
                <form data-action="{{route('tutorials.store')}}" method="POST" class="ajax-form" enctype="multipart/form-data">
                    @csrf()
                    <div class="row justify-content-center">
                        <div class="col-md-6 form-group">
                            <div class="imgUpload">
                                <label for='imgCoverPhoto'>
                                    <input type="file" class="imageInput" name="image" id='imgCoverPhoto' placeholder="Image upload">
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
                        <div class="col-md-12 form-group">
                            <label>Sequence</label>
                            <input id="sequence" type="number" class="form-control" name="sequence" placeholder="0">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Tutorial Description</label>
                            <textarea id="description" class="form-control" name="description" ></textarea>
                        </div>
                        <div class="col-md-12 d-flex flex-column align-items-center">
                            <button type="submit" class="btn mb-3">Add</button>
                            <button type="button" class="btn btn-light w-50" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
