@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Users</h1>
            </div>
            <ul class="tabset">
                <li class="active"><a href="#stab1">All</a></li>
                <li><a href="#stab2" onclick="loadDatatable('active','stab2');">Active</a></li>
                <li><a href="#stab3" onclick="loadDatatable('inactive','stab3');" >Inactive</a></li>
                <li><a href="#PremiumSubscribers">Premium Subscribers</a></li>
            </ul>
            <div class="tab-content">
                <div id="stab1" class="tab">
                    @include('users.all')
                </div>
                <div id="stab2" class="tab">
                </div>
                <div id="stab3" class="tab">
                </div>
                <div class="tab" id="PremiumSubscribers">
                    <div class="table-responsive">
                        <table class="table" id="PremiumSubscribersDatatable">
                            <thead>
                            <tr>
                                <th class="text-left">profile</th>
                                <th>Online status</th>
                                <th>gamertag</th>
                                <th>account Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center text-left">
                                        <a href="#" class="userImg">
                                            <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                        </a>
                                        <div class="description">
                                            <h6>Apple John</h6>
                                            <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge text-success">Active</span>
                                </td>
                                <td>jaxongriff101</td>
                                <td>
                                    <span class="text-success">active</span>
                                </td>
                                <td class="actions">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="far fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                            <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('challenge-modal')
    @include('partials.select-winner')
@endsection
@section('extra-js')
    <script>
        var dataTable = $('#PremiumSubscribersDatatable').DataTable({
            processing: true,
            serverSide: true,
            "searching": true,
            "paging": true,
            'bSortable': false,
            "bInfo": true,
            "bSort": false,
            iDisplayLength: 10,
            "lengthChange": true,
            "bDestroy": true,
            dom: '<"topFooter"fB>rt<"bottomFooter"lip>',
            buttons: [
                {
                    text: 'Select Winner',
                    className: 'btn-dark',
                    attr: {
                        id: 'selectWinnerButton'
                    },
                    action: function () {
                        $('#selectWinner').modal('show');
                    }
                }
            ],
        });
        function loadDatatable(dataTableName,id){
            $('#'+id).html('');
            show_loading_img();

            $.ajax({
                url: "{{route('users.viewload')}}",
                type: 'GET',
                data: {
                    dataTableName:dataTableName,
                },
                cache: false,
                success: function (response) {
                    hide_loading_img();
                    $('#'+id).html(response);
                }, error: function (response) {
                    hide_loading_img();
                    Swal.fire('Warning', response.responseJSON.message);
                },
                timeout: 15000
            }).fail(function (jqXHR, textStatus) {
                if (textStatus === 'timeout') {
                    Swal.fire("Sorry", 'Please Wait... Slow connection!', "error");
                }
            });

        }
        var table  = $('#user-datatable').DataTable({
            //dom: "rtiplf",
            select: {
                style: 'multi',
                selector: 'td:first-child'
            },
            processing: true,
            serverSide: true,
            "searching": true,
            "paging": true,
            'bSortable': false,
            "bInfo": true,
            "bSort" : false,
            iDisplayLength: 10,
            "lengthChange": true,
            "autoWidth": false,
            // "bDestroy": true,
            "scrollX":true,
            language: {
                searchPlaceholder: 'Search Users',
                "emptyTable": "No User found",
                "zeroRecords": "No User found"

            },
            sAjaxSource: '{{route('users.ajax')}}',
            "columnDefs": [
                {"width": "20px", "targets": 0},
                {"width": "80px", "targets": 1},
                {"width": "60px", "targets": 2},
                {"width": "60px", "targets": 3},
                {"width": "60px", "targets": 4},
                {"width": "60px", "targets": 5},
            ],
            "columns": [
                {
                    "data": "serial_no",
                    "orderable": false,
                    // className: 'select-checkbox',
                    render: function (data, type, row) {
                        return getPolarisCheckbox(row.id);
                    }
                },
                {
                    "data": "name",
                    "orderable": false,
                    'render': function (data, type, row) {
                        return ' <div class="d-flex align-items-center text-left"><a href="#" class="userImg"><img src="' + row.picture + '" alt="username" /></a><div class="description"><h6>' + row.name + '</h6><a href="#">' + row.email + '</a></div></div>';
                    }
                },
                {
                    "data": "online_status",
                    "orderable": false,
                    'render': function (data, type, row) {
                        if (row.online_status == 1) {
                            return '<span class="badge text-success">Active</span>';
                        } else {
                            return '<span class="badge text-muted">Inactive</span>';
                        }
                    }
                },
                {
                    "data": "username"
                    , "orderable": false
                },
                {
                    "data": "account_status"
                    , "orderable": false,
                    'render': function (data, type, row) {
                        if (row.account_status == 1) {
                            return '<span class="text-success">active</span>';
                        } else {
                            return '<span class="text-danger">disabled</span>';
                        }
                    }
                },
                {
                    "data": "actions",
                    "orderable": false,
                    className: 'actions',
                    'render': function (data, type, row) {
                        return '<td class="actions"><div class="dropdown"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="far fa-ellipsis-v "></i></a><ul class="dropdown-menu dropdown-menu-end"><li><a href="javascript:" class="disable-record" data-action-type="'+row.account_status_name+'" data-action-target="'+ row.disable_route + '"><i class="fal fa-ban bg-warning text-white"></i> '+row.account_status_name+' User</a></li><li><a href="javascript:" class="delete-record" data-action-table="datatable"   data-action-target="'+ row.delete_route + '"><i class="fal fa-trash bg-danger text-white" ></i> Delete</a></li></ul> </div> </td>';
                    }
                },
            ],
            // order: [[ 1, 'asc' ]],
            dom: '<"topFooter"fB>rt<"bottomFooter"lip>',
            buttons: [
                {
                    extend: 'csv',
                    filename: function () {
                        return 'users-' + getFormattedDate();
                    },
                    text: 'Csv',
                    exportOptions: {
                        columns: [1, 2, 3, 4],
                        modifier: {
                            selected: true
                        }
                    },
                    action: function (e, dt, button, config) {
                        var count = table.rows({selected: true}).count();
                        if (count == 0) {
                            toastr.error('Please select the users to export.');
                            return;
                        }
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                    }
                },
            ],

            // responsive: {
            //     details: {
            //         display: $.fn.dataTable.Responsive.display.modal({
            //             header: function (row) {
            //                 var data = row.data();
            //                 return 'Details for ' + data.name + ' ' + data.email;
            //             }
            //         }),
            //         renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            //     }
            // }
        });
    </script>
@endsection
