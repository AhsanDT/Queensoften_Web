@extends('partials.master')
<?php $i ?>

@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Store</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 d-flex">
                        <a href="#" class="btn-back">
                            <i class="fas fa-long-arrow-left" style="margin-right: 10px"></i> Add
                        </a>
                    </div>
                    <form>
                        <div class="row mx-0">
                            <div class="col-md-6 form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Enter title here" />
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Price in Royal Coins</label>
                                <input type="text" class="form-control" placeholder="Enter price" />
                            </div>
                        </div>
                        <div class="row mx-0 mb-5 align-items-end">
                            <div class="col-md-6 form-group">
                                <label>Cover Photo</label>
                                <div class="imgUpload" style="max-width: 200px">
                                    <label for='imgCoverPhoto'>
                                        <input type="file" class="imageInput" id='imgCoverPhoto' placeholder="Image upload">
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
                                        <input type="file" class="imageInput" id='imgJokerPhoto' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='SpadeKing' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='SpadeQueen' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='SpadeJack' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='SpadeAce' placeholder="Image upload">
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
                                <?php for($i=1;$i<=10;$i++){?>
                                <div class="form-group">
                                    <label><?php echo $i ?></label>
                                    <div class="imgUpload small">
                                        <label for='img<?php echo $i ?>'>
                                            <input type="file" class="imageInput" id='img<?php echo $i ?>' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='HeartKing' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='HeartQueen' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='HeartJack' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='HeartAce' placeholder="Image upload">
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
                                <?php for($i=1;$i<=10;$i++){?>
                                <div class="form-group">
                                    <label><?php echo $i ?></label>
                                    <div class="imgUpload small">
                                        <label for='Heartimg<?php echo $i ?>'>
                                            <input type="file" class="imageInput" id='Heartimg<?php echo $i ?>' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='DiamondKing' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='DiamondQueen' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='DiamondJack' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='DiamondAce' placeholder="Image upload">
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
                                <?php for($i=1;$i<=10;$i++){?>
                                <div class="form-group">
                                    <label><?php echo $i ?></label>
                                    <div class="imgUpload small">
                                        <label for='Diamondimg<?php echo $i ?>'>
                                            <input type="file" class="imageInput" id='Diamondimg<?php echo $i ?>' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='ClubKing' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='ClubQueen' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='ClubJack' placeholder="Image upload">
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
                                            <input type="file" class="imageInput" id='ClubAce' placeholder="Image upload">
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
                                <?php for($i=1;$i<=10;$i++){?>
                                <div class="form-group">
                                    <label><?php echo $i ?></label>
                                    <div class="imgUpload small">
                                        <label for='Clubimg<?php echo $i ?>'>
                                            <input type="file" class="imageInput" id='Clubimg<?php echo $i ?>' placeholder="Image upload">
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
                            <button class="btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('extra-js')


@endsection

