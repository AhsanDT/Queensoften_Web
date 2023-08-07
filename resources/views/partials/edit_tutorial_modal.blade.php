<div class="modal fade" id="updateTutorial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="text-center mb-4 pt-4">Edit Tutorial</h4>
                <form data-action="{{route('tutorials.update', ['id' => ':id'])}}" method="POST" class="edit-ajax-form" enctype="multipart/form-data">
                    @csrf()
                    <div class="row justify-content-center">
                        <input id="editTutorialId" type="hidden" class="form-control" name="id">
                        <div class="col-md-6 form-group">
{{--                            <img src="" style="width: 150px" id="tutorialImage"><br>--}}
{{--                            <label>Image</label>--}}
{{--                            <input id="editImage" type="file" class="form-control" name="image" placeholder="select image">--}}
                            <div class="imgUpload">
                                <label for='editImgCoverPhoto'>
                                    <input type="file" class="imageInput" name="image" id='editImgCoverPhoto' placeholder="Image upload" accept="image/*">
                                    <div class="placeholderBox">
                                        <div class="iconBox"></div>
                                        Upload Image
                                    </div>
                                </label>
                                <div class="imgPreview">
                                    <img class="previewImage" src=""/>
                                    <div class="removeBtn"><i class="fal fa-times"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Sequence</label>
                            <input id="editSequence" type="number" class="form-control" name="sequence" placeholder="0">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Tutorial Description</label>
                            <textarea id="EditDescription" class="form-control" name="description" ></textarea>
                        </div>
                        <div class="col-md-12 d-flex flex-column align-items-center">
                            <button type="submit" class="btn w-50 mb-3">Update Tutorial</button>
                            <button type="button" class="btn btn-light w-50" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
