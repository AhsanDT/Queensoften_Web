@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Spin The Wheel</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
{{--                    <div class="py-3 text-right">--}}
{{--                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#addValuePopup">Define Reward</a>--}}
{{--                    </div>--}}
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                            <tr>
                                <th>Month</th>
                                <th>Game</th>
                                <th>date Created</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@section('addValuePopup')
    <div class="modal fade" id="addRewardPopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                    <h4 class="text-center mb-4 pt-4">Select Prize</h4>
                    <form  method="POST" class="ajax-form" data-action="{{route('spin-wheel.store')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="col-md-12 form-select" name="month">
                                    <option value="January" selected>January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="col-md-12 form-select" name="type">
                                    <option selected value="roulete">Roulete</option>
                                    <option value="scratch">Scratch</option>
                                </select>
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
@endsection
@section('extra-js')
    <script>
        var table =   $('#table').DataTable({
            dom: '<"topFooter"B>rt<"bottomFooter"lip>',
            buttons: [
                {
                    text: 'Define Reward',
                    className: 'btn btn-dark btn-challenge datatable-custom-btn',
                    action: function (e, dt, node, config) {
                        $('#addRewardPopup').modal('show')
                    }
                }
            ],
            processing: true,
            serverSide: true,
            "searching": true,
            "paging": true,
            'bSortable': false,
            "bInfo": true,
            iDisplayLength: 10,
            "lengthChange": true,
            "autoWidth": false,
            "bDestroy": true,
            "bSort" : false,
            "scrollX": true,
            sAjaxSource: '{{route('spin-wheel.list')}}',
            language: {
                searchPlaceholder: 'Search Wheel',
                "emptyTable": "No Wheel found",
                "zeroRecords": "No Wheel found"
            },
            "columnDefs": [
                {"width": "150px", "targets": 0},
                {"width": "150px", "targets": 1},
                {"width": "120px", "targets": 2},
            ],
            "columns": [
                // {
                //     "data": "serial_no",
                //     orderable: false,
                //     render: function (data, type, row) {
                //         return getPolarisCheckbox(row.id);
                //     }
                // },
                {
                    "data": "month"
                    , "orderable": true,
                    className: 'description',
                    render:function (data){
                        return "<p  class='text-center'>"+data+"</p>"
                    }
                },
                {
                    "data": "type"
                    , "orderable": true,
                    className: 'description',
                    render:function (data){
                        return "<p  class='text-center' style='text-transform: capitalize'>"+data+"</p>"
                    }
                },
                {
                    "data": "created_at"
                    , "orderable": true,
                    render:function (data){
                        var datePart = data.split('T')[0];
                        var dateParts = datePart.split('-');
                        if (dateParts.length === 3) {
                            var day = dateParts[0];
                            var month = dateParts[1];
                            var year = dateParts[2];
                            return "<p class='text-center text-truncate'>" + day + "-" + month + "-" + year + "</p>";
                        }
                    }
                },
                {
                    "data": "actions",
                    "orderable": false,
                    className: 'actions custom-action',
                    'render': function (data, type, row) {
                        var delUrl = "{{ route('spin-wheel.delete', ':id') }}";
                        delUrl = delUrl.replace(':id', row.id);
                        return '<td class="actions d-flex" style="width: 60px"><a href="javascript:" class="delete-record btn action bg-danger text-white" data-action-target="' + delUrl + '"><icon class="fas fa-trash"></icon></a></td>';
                    }
                },
            ],
        });
    </script>
@endsection

