@extends('home.layout.app')
@section('main')
<main>
    <section>

        <div class="section box">
            <div class="container">
                <h4 class="title">My Wallet</h4>
                <div class="d-flex mb-3 mt-3 wallet">
                    <div style="padding-right: 10px;" class="col-md-4 my_wallet ">
                        <div class="card_box">
                            <h5>Wallet Balance<span class="badge text-warning">TOPUP</span></h5>
                            <div class="form-group pt-2">
                                <div class="manage">
                                <h2>${{$user->usd ?? '0'}}.00</h2>
                                <input class="form-control" type="email" id="email" name="email"
                                    placeholder="12 Jan 2023 last Update" required>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex ">
                            <div class="col">
                                <div class="card_box">
                                    <h5>Payment Method<span class="badge text-warning">ADD</span></h5>
                                    <p class="sub-title pt-2">Apple Card</p>
                                    <div class="form-group  py-0">
                                    <div class="manage">
                                        <input class="form-control" type="text" id="email" name="email"
                                            placeholder="10880 Malibu Point Malibu Cal..." required>
                                        <input class="form-control" type="text" id="email" name="email"
                                            placeholder="•••• 1234" required>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card_box">
                                    <p class="sub-title pt-4">Contact</p>
                                    <div class="form-group  py-0">
                                    <div class="manage">
                                        <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}"
                                            placeholder="avajohns123@gmail,com" required>
                                        <input class="form-control" type="text" id="email" name="email"
                                            placeholder="(123) 456-7890" required>
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
                                @foreach($wallets as $wallet) @endforeach
                                    <tr>
                                        @php
                                            $tenDigitNumber = 0;
                                            $tenDigitNumber = str_pad($wallet->id, 10, '0', STR_PAD_LEFT);
                                        @endphp
                                        <td>{{$tenDigitNumber}}</td>
                                        <td>19/07/2023</td>
                                        <td colspan="4"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img">
                                        <img src="{{asset('home/images/bannerlogo.png')}}" alt="img"></td>
                                        <td>332.23</td>
                                    </tr>
{{--                                    <tr>--}}
{{--                                        <td>0987456321</td>--}}
{{--                                        <td>19/07/2023</td>--}}
{{--                                        <td colspan="4"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="images/logo.svg" alt=""><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"></td>--}}
{{--                                        <td>332.23</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>0987456321</td>--}}
{{--                                        <td>19/07/2023</td>--}}
{{--                                        <td colspan="4"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"></td>--}}
{{--                                        <td>332.23</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>0987456321</td>--}}
{{--                                        <td>19/07/2023</td>--}}
{{--                                        <td colspan="4"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"><img src="images/logo.svg" alt=""><img src="{{asset('home/images/bannerlogo.png')}}" alt="img"></td>--}}
{{--                                        <td>332.23</td>--}}
{{--                                    </tr>--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>
        </main>
@endsection
