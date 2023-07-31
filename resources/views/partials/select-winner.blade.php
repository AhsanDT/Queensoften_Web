<div class="modal fade" id="selectWinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="text-center mb-4 pt-4">Select Prize</h4>
                <form method="POST" class="ajax-form">
                    @csrf
                    <div class="accordion mb-3 custom-accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="custom-radio-select">
                                        <li><input type="radio" name="test" id="cb1"/>
                                            <label for="cb1">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-column flex-wrap">
                                                    <h6>Sky Suit</h6>
                                                    <img src="{{asset('images/suit-card.png')}}">
                                                </div>
                                            </label>
                                        </li>
                                        <li><input type="radio" name="test" id="cb2"/>
                                            <label for="cb2">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-column">
                                                    <h6>Royal Suit</h6>
                                                    <img src="{{asset('images/suit-card.png')}}">
                                                </div>
                                            </label>
                                        </li>
                                        <li><input type="radio" name="test" id="cb3"/>
                                            <label for="cb3">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-column">
                                                    <h6>Earth Suit</h6>
                                                    <img src="{{asset('images/suit-card.png')}}">
                                                </div>
                                            </label>
                                        </li>
                                        <li><input type="radio" name="test" id="cb4"/>
                                            <label for="cb4">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-column">
                                                    <h6>Rose Suit</h6>
                                                    <img src="{{asset('images/suit-card.png')}}">
                                                </div>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
{{--                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">--}}
{{--                            <option value='' selected>Select Suite</option>--}}
{{--                            @foreach($suits as $suit)--}}
{{--                                <option value='{{$suit->id}}'>{{$suit->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Skin</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
{{--                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">--}}
{{--                            <option value='' selected>Select Skin</option>--}}
{{--                            @foreach($skins as $skin)--}}
{{--                                <option value='{{$skin->id}}'>{{$skin->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Coins</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{--                        <label>Coins</label>--}}
                        {{--                        <input type="text" class="form-control" placeholder="Enter here">--}}
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Joker</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{--                        <label>Joker</label>--}}
                        {{--                        <input type="text" class="form-control" placeholder="Enter here">--}}
{{--                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">--}}
{{--                            <option value='' selected>Select Joker</option>--}}
{{--                            @foreach($jokers as $joker)--}}
{{--                                <option value='{{$joker->id}}'>{{$joker->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Shuffle</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        --}}{{--                        <label>Shuffle</label>--}}
{{--                        --}}{{--                        <input type="text" class="form-control" placeholder="Enter here">--}}
{{--                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">--}}
{{--                            <option value='' selected>Select Shuffle</option>--}}
{{--                            @foreach($shuffles as $shuffle)--}}
{{--                                <option value='{{$shuffle->id}}'>{{$shuffle->value}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="col-md-12 d-flex flex-column align-items-center">
                        <button type="submit" class="btn w-50 mb-3 p-0">Random Winner</button>
                        <button type="button" class="btn btn-light w-50 p-0" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
