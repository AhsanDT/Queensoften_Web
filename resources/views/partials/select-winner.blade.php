<div class="modal fade" id="selectWinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="text-center mb-4 pt-4">Select Prize</h4>
                <form  method="POST" class="ajax-form">
                    @csrf
                    <div class="col-md-12 form-group">
                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">
                            <option value='' selected>Select Suite</option>
                            @foreach($suits as $suit)
                                <option value='{{$suit->id}}'>{{$suit->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">
                            <option value='' selected>Select Skin</option>
                            @foreach($skins as $skin)
                                <option value='{{$skin->id}}'>{{$skin->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
{{--                        <label>Coins</label>--}}
{{--                        <input type="text" class="form-control" placeholder="Enter here">--}}
                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">
                            <option value='' selected>Select Coin</option>
                            @foreach($coins as $coin)
                                <option value='{{$coin->id}}'>{{$coin->coins}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
{{--                        <label>Joker</label>--}}
{{--                        <input type="text" class="form-control" placeholder="Enter here">--}}
                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">
                            <option value='' selected>Select Joker</option>
                            @foreach($jokers as $joker)
                                <option value='{{$joker->id}}'>{{$joker->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
{{--                        <label>Shuffle</label>--}}
{{--                        <input type="text" class="form-control" placeholder="Enter here">--}}
                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">
                            <option value='' selected>Select Shuffle</option>
                            @foreach($shuffles as $shuffle)
                                <option value='{{$shuffle->id}}'>{{$shuffle->value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 d-flex flex-column align-items-center">
                        <button type="submit" class="btn w-50 mb-3">Random Winner</button>
                        <button type="button" class="btn btn-light w-50" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
