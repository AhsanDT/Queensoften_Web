<div class="modal fade" id="selectWinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="text-center mb-4 pt-4">Select Prize</h4>
                <form method="POST" class="ajax-form" data-action="{{route('users.winner')}}">
                    @csrf
                    <div class="accordion mb-3 custom-accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Suit
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="custom-radio-select">
                                        @foreach($suits as $suit)
                                            <li><input type="radio" name="suit" id="cb1" value="{{$suit->id}}"/>
                                                <label for="cb1">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between flex-column flex-wrap">
                                                        <h6>{{$suit->name}}</h6>
                                                        <img src="{{asset('https://queensoftenimages.s3.us-west-1.amazonaws.com/'.$suit->image)}}">
                                                    </div>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="skin">
                            <option value='' selected>Select Skin</option>
                            @foreach($skins as $skin)
                                <option value='{{$skin->id}}'>{{$skin->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="coins">
                            <option value='' selected>Select Coins</option>
                            @foreach($coins as $coin)
                                <option value='{{$coin->id}}'>{{$coin->coins}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="joker">
                            <option value='' selected>Select Joker</option>
                            @foreach($jokers as $joker)
                                <option value='{{$joker->id}}'>{{$joker->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="shuffle">
                            <option value='' selected>Select Shuffle</option>
                            @foreach($shuffles as $shuffle)
                                <option value='{{$shuffle->id}}'>{{$shuffle->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 d-flex flex-column align-items-center">
                        <button type="submit" class="btn w-50 mb-3 p-0">Random Winner</button>
                        <button type="button" class="btn btn-light w-50 p-0" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
