@extends('home.layout.app')
@section('main')
<section>
        <div class="section box">
            <div class="container">
                <h4 class="title">Manage My Account</h4>
                <div class="d-flex flex-wrap  mb-3 mt-3">
                    <div style="padding-right: 10px;" class="col-md-4  col-12  account ">
                        <div class="card_box">
                            <h5>Personal Profile<span class="badge text-warning">EDIT</span></h5>
                            <div class="form-group p-0">
                                <div class="manage">
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Username" required>
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="username@yahoo.com" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-12 ">
                        <div class="d-flex direction">
                            <div class="col">
                                <div class="card_box">
                                    <h5>Address Book<span class="badge text-warning">EDIT</span></h5>
                                    <p class="sub-title py-1">DEFAULT SHIPPING ADDRESS</p>
                                    <div class="check">
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="checkbox">Home</label><br>
                                        <input type="checkbox" id="" name="" value="">
                                        <label for="checkbox">Office</label><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card_box">
                                    <p class="sub-title pt-4">DEFAULT SHIPPING ADDRESS</p>
                                    <div class="form-group  py-0">
                                        <div class="manage">
                                            <input class="form-control" type="email" id="email" name="email"
                                                placeholder="Address" required>
                                            <input class="form-control" type="email" id="email" name="email"
                                                placeholder="Contact Number" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card_box">
                    <h5 class="pb-2">Transaction History</h5>
                    <div class="card_table">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Placed On</th>
                                        <th colspan="4">Items</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0987456321</td>
                                        <td>19/07/2023</td>
                                        <td colspan="4"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img">
                                        <img src="{{asset('home/images/bannerlogo.png')}}" alt="img"></td>
                                        <td>332.23</td>
                                    </tr>
                                    <tr>
                                        <td>0987456321</td>
                                        <td>19/07/2023</td>
                                        <td colspan="4"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="images/logo.svg" alt=""><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"></td>
                                        <td>332.23</td>
                                    </tr>
                                    <tr>
                                        <td>0987456321</td>
                                        <td>19/07/2023</td>
                                        <td colspan="4"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"></td>
                                        <td>332.23</td>
                                    </tr>
                                    <tr>
                                        <td>0987456321</td>
                                        <td>19/07/2023</td>
                                        <td colspan="4"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="images/logo.svg" alt=""><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"></td>
                                        <td>332.23</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection