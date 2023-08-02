@extends('partials.master')
@section('content')
    <style>
        .no-spinner {
            -moz-appearance: textfield; /* Firefox */
            appearance: textfield; /* Other modern browsers */
        }

        /* Hide the up and down arrows */
        .no-spinner::-webkit-inner-spin-button,
        .no-spinner::-webkit-outer-spin-button {
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
        }

    </style>
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Challenges</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 d-flex">
                        <a href="{{route('challenges.index')}}" class="btn-back">
                            <i class="fas fa-long-arrow-left" style="margin-right: 10px"></i>Back
                        </a>
                    </div>
                    <ul class="tabset">
                        <li class="active"><a href="#ChallengeInformation">Challenge Information</a> </li>
                        <li><a href="#AddSpecialCards">Add Special Cards</a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab" id="ChallengeInformation">
                            <div class="row">
                                <div class="col-md-12">
                                    <form data-action="{{route('challenges.store')}}" method="POST" class="challenge-ajax-form d-flex">
                                        @csrf()
                                        <div class="row col-md-6">
                                            <div class="col-md-6 form-group">
                                                <label>Date</label>
                                                <input id="date_picker" type="date" class="form-control" name="date" value="{{date('Y-m-d')}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label>In less than</label>
                                                <div class="row dottedRow">
                                                    <div class="col-md-6 form-group">
                                                        <input type="number" class="form-control no-spinner" placeholder="24" name="hour" min="0" max="24" >
                                                    </div>
                                                    <span class="fw-bold dott" style="font-size: 18px">:</span>
                                                    <div class="col-md-6 form-group">
                                                        <input type="number" class="form-control no-spinner" placeholder="minutes" name="minute" min="0" max="60" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="Win 3 games in 24 Hours">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Description</label>
                                                <textarea name="description" placeholder="Win 3 games in 24 Hours"></textarea>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>How many games</label>
                                                <input type="number" class="form-control no-spinner" name="games" placeholder="100">
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
                                                <input type="number" class="form-control no-spinner" name="quantity" placeholder="1">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn mx-0 mb-3">Save</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkBox">
                                                <p class="title mb-3">Deck Count</p>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio" name="deck" id="flexRadioDefault1" value="1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Single
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio" name="deck" id="flexRadioDefault2" value="2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        2 Decks
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="deck" id="flexRadioDefault3" value="3">
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        3 Decks
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="AddSpecialCards">
                            <div class="row align-items-end">
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
                                                    <input class="form-check-input" type="checkbox" name="spade_king" id="SpadeKing" value="king">
                                                    <label class="form-check-label" for="SpadeKing">
                                                        King
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="heart_king" id="HeartKing" value="king">
                                                    <label class="form-check-label" for="HeartKing">
                                                        King
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="diamond_king" id="DiamondKing" value="king">
                                                    <label class="form-check-label" for="DiamondKing">
                                                        King
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="club_king" id="ClubKing" value="king">
                                                    <label class="form-check-label" for="ClubKing">
                                                        King
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="spade_queen" id="SpadeQueen" value="queen">
                                                    <label class="form-check-label" for="SpadeQueen">
                                                        Queen
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="heart_queen" id="HeartQueen" value="queen">
                                                    <label class="form-check-label" for="HeartQueen">
                                                        Queen
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="diamond_queen" id="DiamondQueen" value="queen">
                                                    <label class="form-check-label" for="DiamondQueen">
                                                        Queen
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="club_queen" id="ClubQueen" value="queen">
                                                    <label class="form-check-label" for="ClubQueen">
                                                        Queen
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="spade_jack" id="spade_jack" value="jack">
                                                    <label class="form-check-label" for="spade_jack"> <!-- Corrected: Change "SpadeKing" to "spade_jack" -->
                                                        Jack
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="heart_jack" id="heart_jack" value="jack">
                                                    <label class="form-check-label" for="heart_jack"> <!-- Corrected: Change "HeartKing" to "heart_jack" -->
                                                        Jack
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="diamond_jack" id="diamond_jack" value="jack">
                                                    <label class="form-check-label" for="diamond_jack"> <!-- Corrected: Change "DiamondKing" to "diamond_jack" -->
                                                        Jack
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check square">
                                                    <input class="form-check-input" type="checkbox" name="club_jack" id="club_jack" value="jack">
                                                    <label class="form-check-label" for="club_jack"> <!-- Corrected: Change "ClubKing" to "club_jack" -->
                                                        Jack
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>Ace-10 Cards (Default)</td>
                                            <td>Ace-10 Cards (Default)</td>
                                            <td>Ace-10 Cards (Default)</td>
                                            <td>Ace-10 Cards (Default)</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('extra-js')
    <script>
        $(document).on('submit', ".challenge-ajax-form", function (e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(this);
            var button = $(this).find(':input[type=submit]');

            // Collect special card checkbox values from the table
            var specialCards = {};
            $('#AddSpecialCards input[type="checkbox"]').each(function () {
                if ($(this).is(":checked")) {
                    var name = $(this).attr("name");
                    var value = $(this).val();
                    specialCards[name] = value;
                }
            });

            // Append specialCards object to the formData
            formData.append("special_cards", JSON.stringify(specialCards));

            $.ajax({
                type: form.attr("method"),
                url: form.attr("data-action"),
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    button.prop('disabled', true);
                },
                success: function (response) {
                    button.prop('disabled', false);
                    if (response.success === true) {
                        toastr.success(response.message);
                        @if(!request()->routeIs('setting.index'))
                        setTimeout(function () {
                            window.location.href = "{{route('challenges.index')}}";
                        }, 2000);
                        @endif
                    }
                },
                error: function (data) {
                    button.prop('disabled', false);
                    $.each(data.responseJSON.errors, function (field_name, error) {
                        toastr.error(error);
                    })
                }
            })
        });

    </script>
@endsection

