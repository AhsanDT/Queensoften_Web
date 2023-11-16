@extends('home.layout.app')
@section('main')
<section>
        <div class="section box">
            <div class="container">
                <h4 class="title">Manage My Account</h4>
                <div class="d-flex flex-wrap  mb-3 mt-3">
                    <div style="padding-right: 10px;" class="col-md-4  col-12  account ">
                        <div class="card_box">
                            <h5>Personal Profile<span class="badge text-warning"><a style="color:#ffc107" href="{{route('editprofile')}}">EDIT</a></span></h5>
                            <div class="form-group p-0">
                                <div class="manage">
                                    <input class="form-control" type="text" id="username" name="username" value="{{$user->name}}"
                                        placeholder="Username" required>
                                    <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}"
                                        placeholder="username@yahoo.com" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-12 ">
                        <div class="d-flex direction">
                            <div class="col">
                                <div class="card_box">
                                    <h5>Address Book<span class="badge text-warning"><a style="color:#ffc107" href="{{route('billing')}}">EDIT</a></span></h5>
                                    <p class="sub-title py-1">DEFAULT SHIPPING ADDRESS</p>
                                    <div class="check">
                                        <input type="checkbox" id="" name="" value="" @if(isset($billing)) @if($billing->location == 'home') checked @endif @endif>
                                        <label for="checkbox">Home</label><br>
                                        <input type="checkbox" id="" name="" value="" @if(isset($billing)) @if($billing->location == 'office') checked @endif @endif>
                                        <label for="checkbox">Office</label><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card_box">
                                    <p class="sub-title pt-4">DEFAULT SHIPPING ADDRESS</p>
                                    <div class="form-group  py-0">
                                        <div class="manage">
                                            <input class="form-control" type="text" id="address" name="address" value="{{$billing->address ?? ''}}"
                                                placeholder="Address" required>
                                            <input class="form-control" type="text" id="phone" name="phone" value="{{$billing->phone ?? ''}}"
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
                                @if(count($wallets) > 0)
                                    @foreach($wallets as $wallet)
                                        <tr>
                                            <td>{{ str_pad($wallet->id, 10, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{$wallet->created_at}}</td>
                                            <td colspan="4">{{$wallet->purchase_type}}
{{--                                                <img src="{{ asset('home/images/bannerlogo.png') }}" alt="img">--}}
{{--                                                <img src="{{ asset('home/images/bannerlogo.png') }}" alt="img">--}}
                                            </td>
                                            <td>{{$wallet->amount}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">No transaction history</td>
                                    </tr>
                                @endif
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
