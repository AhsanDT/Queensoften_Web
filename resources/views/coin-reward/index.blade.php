@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Coin Rewards</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3 text-right">
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#addValuePopup">Add</a>
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
                    <h4 class="text-center mb-4 pt-4">Add Reward</h4>
                    <form  method="POST" class="ajax-form">
                        <div class="row">
                            <div class="form-group col-md-12">
                            </div>
                            <div class="col-md-12 form-group">
                                <label> Coin Value</label>
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>USD Value</label>
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                            <div class="col-md-12 d-flex flex-column align-items-center">
                                <button type="submit" class="btn w-50 mb-3">Add</button>
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

