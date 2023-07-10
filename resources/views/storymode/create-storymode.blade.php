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
                        <a href="#" class="btn-back">
                            <i class="fas fa-long-arrow-left" style="margin-right: 10px"></i> Back
                        </a>
                    </div>
                    <form>
                        <div class="row mx-0">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Date Start</label>
                                        <input type="date" class="form-control" placeholder="01/05/2023" />
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>End Start</label>
                                        <input type="date" class="form-control" placeholder="01/05/2023" />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Season 1" />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Story (Description)</label>
                                        <textarea placeholder="Enter here"  style="height: 300px"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="imgUpload">
                                    <label for='imgCoverPhoto'>
                                        <input type="file" class="imageInput" id='imgCoverPhoto' placeholder="Image upload">
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

@endsection

