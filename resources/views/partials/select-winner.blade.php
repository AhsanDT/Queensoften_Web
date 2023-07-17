<div class="modal fade" id="selectWinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="text-center mb-4 pt-4">Select Prize</h4>
                <form  method="POST" class="ajax-form">
                    <div class="col-md-12 form-group">
                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">
                            <option value='SkySuit'>Sky Suit</option>
                            <option value='royalsuit'>Royal Suit</option>
                            <option value='front_door'>Earth Suit</option>
                            <option value='front_door'>Rose Suit</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <select class="imgHorizentalSelect" style="width: 100%" name="states[]">
                            <option value='SkySuit'>Skin</option>
                            <option value='royalsuit'>Skin</option>
                            <option value='front_door'>Skin</option>
                            <option value='front_door'>Skin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Coins</label>
                        <input type="text" class="form-control" placeholder="Enter here">
                    </div>
                    <div class="form-group">
                        <label>Joker</label>
                        <input type="text" class="form-control" placeholder="Enter here">
                    </div>
                    <div class="form-group">
                        <label>Shuffle</label>
                        <input type="text" class="form-control" placeholder="Enter here">
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
