@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Settings</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="tabset">
                        <li class="active"><a href="#stab1" >Share App</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-md-8">
                                <div id="stab1" class="tab">
                                    <form method="POST" class="ajax-form" data-action="{{route('setting.store.share_app')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Android Link</label>
                                                    <input  type="text" class="form-control" name="android_link" value="{{old('android_link', $shareApp->android_link ?? '')}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Ios Link</label>
                                                    <input type="text" class="form-control" name="ios_link" value="{{old('ios_link', $shareApp->ios_link ?? '')}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Prize</label>
                                                    <select class="form-control" name="prize">
                                                        @foreach($prizes as $prize)
                                                            <option value="{{$prize->id}}" {{old('prize', $shareApp->prize_id ?? '') == $prize->id ? 'selected' : ''}}>{{$prize->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label>Quantity</label>
                                                    <input type="number" class="form-control" name="quantity" value="{{old('quantity', $shareApp->quantity ?? '')}}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit">
                                            Save Changes
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
