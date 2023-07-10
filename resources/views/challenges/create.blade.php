@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Challenges</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="tabset">
                        <li><a href="#ChallengeInformation">Challenge Information</a> </li>
                        <li class="active"><a href="#AddSpecialCards">Add Special Cards</a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab" id="ChallengeInformation">
                            <div class="row">
                                <div class="col-md-6">
                                    <form {{--data-action="{{route('challenges/create')}}"--}} method="POST" class="ajax-form">
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
                                            <div class="col-md-12 form-group">
                                                <label>Description</label>
                                                <textarea name="description"></textarea>
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
                                            <div class="col-md-12">
                                                <button type="submit" class="btn mx-0 mb-3">Save</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="AddSpecialCards">
                            <form>
                                <div class="row align-items-end">
                                    <div class="col-md-6 form-group">
                                        <label>Deck Count</label>
                                        <select class="form-select" style="max-width: 300px">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <div class="form-check square" style="margin: 7px 0">
                                            <input class="form-check-input" type="checkbox" name="SelectAll" id="SelectAll" value="SelectAll">
                                            <label class="form-check-label" for="SelectAll">
                                                Select All
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table transparent border-0 text-left">
                                            <thead>
                                            <tr>
                                                <th>Spade</th>
                                                <th>Heart</th>
                                                <th>Diamond</th>
                                                <th>Club</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="SpadeKing" value="SpadeKing">
                                                        <label class="form-check-label" for="SpadeKing">
                                                            King
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="HeartKing" value="HeartKing">
                                                        <label class="form-check-label" for="HeartKing">
                                                            King
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="DiamondKing" value="DiamondKing">
                                                        <label class="form-check-label" for="DiamondKing">
                                                            King
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="ClubKing" value="ClubKing">
                                                        <label class="form-check-label" for="ClubKing">
                                                            King
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="Queen" id="SpadeQueen" value="SpadeQueen">
                                                        <label class="form-check-label" for="SpadeQueen">
                                                            Queen
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="Queen" id="HeartQueen" value="HeartQueen">
                                                        <label class="form-check-label" for="HeartQueen">
                                                            Queen
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="Queen" id="DiamondQueen" value="DiamondQueen">
                                                        <label class="form-check-label" for="DiamondQueen">
                                                            Queen
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="Queen" id="ClubQueen" value="ClubQueen">
                                                        <label class="form-check-label" for="ClubQueen">
                                                            Queen
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="SpadeKing" value="SpadeKing">
                                                        <label class="form-check-label" for="SpadeKing">
                                                            Jack
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="HeartKing" value="HeartKing">
                                                        <label class="form-check-label" for="HeartKing">
                                                            Jack
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="DiamondKing" value="DiamondKing">
                                                        <label class="form-check-label" for="DiamondKing">
                                                            Jack
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="ClubKing" value="ClubKing">
                                                        <label class="form-check-label" for="ClubKing">
                                                            Jack
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="SpadeKing" value="SpadeKing">
                                                        <label class="form-check-label" for="SpadeKing">
                                                            Ace
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="HeartKing" value="HeartKing">
                                                        <label class="form-check-label" for="HeartKing">
                                                            Ace
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="DiamondKing" value="DiamondKing">
                                                        <label class="form-check-label" for="DiamondKing">
                                                            Ace
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check square">
                                                        <input class="form-check-input" type="checkbox" name="King" id="ClubKing" value="ClubKing">
                                                        <label class="form-check-label" for="ClubKing">
                                                            Ace
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td>2-10 Cards (Default)</td>
                                                <td>2-10 Cards (Default)</td>
                                                <td>2-10 Cards (Default)</td>
                                                <td>2-10 Cards (Default)</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="col-md-12 form-group pt-5">
                                        <button type="button" class="btn mx-0">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('extra-js')

@endsection

