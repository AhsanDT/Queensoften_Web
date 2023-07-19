<div class="modal fade" id="USDEquivalent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="text-center mb-4 pt-4">Add Value</h4>
                <form  method="POST" class="ajax-form" data-action="{{route('e-store.coin')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Coin Value</label>
                            <input type="text" class="form-control" placeholder="0" name="coins">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>USD Equivalent</label>
                            <input type="text" class="form-control" placeholder="0" name="price">
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
