<div class="modal fade" id="addChallenge" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="text-center mb-4 pt-4">Add Challenge</h4>
                <form data-action="{{route('challenges.create')}}" method="POST" class="ajax-form">
                    @csrf()
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Date</label>
                            <input id="date_picker" type="date" class="form-control" name="date" value="{{date('Y-m-d')}}">
                        </div>
                        <div class="col-md-6">
                            <label>In less than</label>
                            <div class="row dottedRow">
                                <div class="col-md-6 form-group">
                                    <input type="tel" class="form-control" placeholder="24" name="hour" min="0" max="24" >
                                </div>
                                <span class="fw-bold dott" style="font-size: 18px">:</span>
                                <div class="col-md-6 form-group">
                                    <input type="tel" class="form-control" placeholder="minutes" name="minute" min="0" max="60" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>How many games</label>
                            <input type="tel" class="form-control" name="games">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Days</label>
                            <select class="multiselect" name="days[]" multiple="multiple">
                                <option value="Sunday">Sunday</option>
                                <option value="Monday" >Monday</option>
                                <option value="Tuesday" >Tuesday</option>
                                <option value="Wednesday" >Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Occurrence</label>
                            <div class="d-inline-flex w-100 pt-2">
                                <div class="form-check mx-3 square">
                                    <input class="form-check-input" type="radio" name="occurrence" id="Daily" value="Daily" checked>
                                    <label class="form-check-label" for="Daily">
                                        Daily
                                    </label>
                                </div>
                                <div class="form-check mx-3 square">
                                    <input class="form-check-input" type="radio" name="occurrence" id="Weekly" value="Weekly">
                                    <label class="form-check-label" for="Weekly">
                                        Weekly
                                    </label>
                                </div>
                                <div class="form-check mx-3 square">
                                    <input class="form-check-input" type="radio" name="occurrence" id="Monthly" value="Monthly">
                                    <label class="form-check-label" for="Monthly">
                                        Monthly
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Prize</label>
                            <select class="custom-select" name="prize">
                                @foreach($prizes as $prize)
                                    <option value="{{$prize->id}}">{{$prize->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quantity</label>
                            <input type="tel" class="form-control" name="quantity">
                        </div>
                        <div class="col-md-12 d-flex flex-column align-items-center">
                            <button type="submit" class="btn w-50 mb-3">Add Challenge</button>
                            <button type="button" class="btn btn-light w-50" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
