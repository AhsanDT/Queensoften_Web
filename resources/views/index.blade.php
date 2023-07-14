@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
            <div class="row mb-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="description">
                                <h3>{{$totalPlayers}}</h3>
                                <p class="mb-0">Players</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box">
                                <i class="icon-qTotalDownload" style="color: #2F5DFF"></i>
                            </div>
                            <div class="description">
                                <h3>765</h3>
                                <p class="mb-0">Total Downloads</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="table" class="table datatable">
                            <thead>
                            <tr>
                                <th class="selectAll"></th>
                                <th class="text-left">PROFILE</th>
                                <th>ONLINE STATUS</th>
                                <th>USERNAME</th>
                                <th>ACCOUNT STATUS</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('extra-js')
    <script>
        var table = $('#table').DataTable({
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
            iDisplayLength: 10,
            "lengthChange": true,
            "autoWidth": false,
            "bSort" : false,
            "scrollX": true,
            sAjaxSource: '{{route('users.ajax')}}',
            // deferLoading: 57,
            "columnDefs": [
                {"width": "20px", "targets": 0},
                {"width": "60px", "targets": 1},
                {"width": "60px", "targets": 2},
                {"width": "60px", "targets": 3},
                {"width": "60px", "targets": 4},
                {"width": "60px", "targets": 5},
            ],
            "columns": [
                {
                    "data": "serial_no",
                    orderable: false,
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
                    "orderable": true,
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
                    , "orderable": true
                },
                {
                    "data": "account_status"
                    , "orderable": true,
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
                        return '<td class="actions"><div class="dropdown"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="far fa-ellipsis-v "></i></a><ul class="dropdown-menu dropdown-menu-end"><li><a href="javascript:" class="disable-record" data-action-type="'+row.account_status_name+'" data-action-target="'+ row.disable_route + '"><i class="fal fa-ban text-white" style="background: #FEAC71"></i> '+row.account_status_name+' User</a></li><li><a href="javascript:" class="delete-record"  data-action-table="datatable" data-action-target="'+ row.delete_route + '"><i class="fal fa-trash text-white" style="background: #FF2113"></i> Delete</a></li></ul> </div> </td>';
                    }
                },
            ],
            language: {
                "emptyTable": "No User found",
                "zeroRecords": "No User found"
            },
            // order: [[ 1, 'asc' ]],
            dom: 'rt<"bottomFooter"lip>',
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
            // },
        });
        table.destroy();
    </script>
@endsection

