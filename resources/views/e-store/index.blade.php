@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Store</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="tabset">
                        <li class="active"><a href="#Shuffle">Shuffle</a> </li>
                        <li><a href="#Jokers">Jokers</a> </li>
                        <li><a href="#Suits">Suits</a> </li>
                        <li><a href="#Coins">Coins</a> </li>
                        <li><a href="#Deck">Deck</a> </li>
                        <li><a href="#Skin">Skin</a> </li>
                        <li><a href="#Playstore">Playstore</a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab" id="Shuffle">
                            <div class="py-3 text-right">
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#addValuePopup">Add</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Shuffle value</th>
                                            <th>coin value</th>
                                            <th>date Created</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/storeImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Jokers">
                            <div class="py-3 text-right">
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#addValuePopup">Add</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>coin value</th>
                                        <th>date Created</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="imgBox mx-auto">
                                                <img src="images/jokerImg.svg" />
                                            </div>
                                        </td>
                                        <td>BIG JOKER</td>
                                        <td>200</td>
                                        <td>06/23/23</td>
                                        <td>
                                            <a href="#" class="btn action bg-danger text-white">
                                                <i class="fal fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="imgBox mx-auto">
                                                <img src="images/jokerImg.svg" />
                                            </div>
                                        </td>
                                        <td>BIG JOKER</td>
                                        <td>200</td>
                                        <td>06/23/23</td>
                                        <td>
                                            <a href="#" class="btn action bg-danger text-white">
                                                <i class="fal fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="imgBox mx-auto">
                                                <img src="images/jokerImg.svg" />
                                            </div>
                                        </td>
                                        <td>BIG JOKER</td>
                                        <td>200</td>
                                        <td>06/23/23</td>
                                        <td>
                                            <a href="#" class="btn action bg-danger text-white">
                                                <i class="fal fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Suits">
                            <div class="py-3 text-right">
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#addValuePopup">Add</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>coin value</th>
                                        <th>date Created</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="imgBox mx-auto">
                                                <img src="images/suitImg.svg" />
                                            </div>
                                        </td>
                                        <td>EARTH SUIT</td>
                                        <td>200</td>
                                        <td>06/23/23</td>
                                        <td>
                                            <a href="#" class="btn action bg-danger text-white">
                                                <i class="fal fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="imgBox mx-auto">
                                                <img src="images/suitImg.svg" />
                                            </div>
                                        </td>
                                        <td>ROSE SUIT</td>
                                        <td>200</td>
                                        <td>06/23/23</td>
                                        <td>
                                            <a href="#" class="btn action bg-danger text-white">
                                                <i class="fal fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="imgBox mx-auto">
                                                <img src="images/suitImg.svg" />
                                            </div>
                                        </td>
                                        <td>SKY SUIT</td>
                                        <td>200</td>
                                        <td>06/23/23</td>
                                        <td>
                                            <a href="#" class="btn action bg-danger text-white">
                                                <i class="fal fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Coins">
                            <div class="py-3 text-right">
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#USDEquivalent">Add</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>ROYAL COIN QUANTITY</th>
                                        <th>USD equivalent</th>
                                        <th>date Created</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>500</td>
                                            <td>c50</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1,100</td>
                                            <td>$1</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12,000</td>
                                            <td>$10</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>25,000</td>
                                            <td>$20</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Deck">
                            <div class="py-3 text-right">
                                <a href="/e-store/design-card" class="btn">Add</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>deck name</th>
                                            <th>coin value</th>
                                            <th>date Created</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/deckImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/deckImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="imgBox mx-auto">
                                                    <img src="images/deckImg.svg" />
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>06/23/23</td>
                                            <td>
                                                <a href="#" class="btn action bg-danger text-white">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Skin">
                            <div class="py-3 text-right">
                                <a href="#" class="btn">Add</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>skin</th>
                                        <th>skin name</th>
                                        <th>coin value</th>
                                        <th>date Created</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="imgBox mx-auto">
                                                <img src="images/skin1.svg" />
                                            </div>
                                        </td>
                                        <td>2</td>
                                        <td>200</td>
                                        <td>06/23/23</td>
                                        <td>
                                            <a href="#" class="btn action bg-danger text-white">
                                                <i class="fal fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="imgBox mx-auto">
                                                <img src="images/skin1.svg" />
                                            </div>
                                        </td>
                                        <td>2</td>
                                        <td>200</td>
                                        <td>06/23/23</td>
                                        <td>
                                            <a href="#" class="btn action bg-danger text-white">
                                                <i class="fal fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="imgBox mx-auto">
                                                <img src="images/skin1.svg" />
                                            </div>
                                        </td>
                                        <td>2</td>
                                        <td>200</td>
                                        <td>06/23/23</td>
                                        <td>
                                            <a href="#" class="btn action bg-danger text-white">
                                                <i class="fal fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Playstore">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@section('addValuePopup')
    <div class="modal fade" id="addValuePopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h4 class="text-center mb-4 pt-4">Add Value</h4>
                    <form  method="POST" class="ajax-form">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="imgUpload mx-auto" style="max-width: 200px">
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
                            <div class="col-md-12 form-group">
                                <label> Name</label>
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Coin Value</label>
                                <input type="text" class="form-control" placeholder="0">
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
    <div class="modal fade" id="USDEquivalent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h4 class="text-center mb-4 pt-4">Add Value</h4>
                    <form  method="POST" class="ajax-form">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>USD Equivalent</label>
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Coin Value</label>
                                <input type="text" class="form-control" placeholder="0">
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
@endsection
@section('extra-js')

@endsection

