@extends('partials.master')
@section('content')
    <style>
        .dataTables_scrollHeadInner{
            width: 100% !important;
        }
    </style>
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
                                <th class="selectAllPremium"></th>
                                <th class="text-left">profile</th>
                                <th>Online status</th>
                                <th>gamertag</th>
                                <th>account Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <script type="text/template" id="checkbox-template-premium">
                            <div class="form-check d-inline-block mt-2">
                                <input class="form-check-input mt-0 active-tab-checkbox" id="PremiumCheckbox_@id" type="checkbox" value="@id" aria-label="Checkbox for following text input">
                                <label class="form-check-label" for="PremiumCheckbox_@id">
                                </label>
                            </div>
                        </script>
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
        function getPolarisCheckbox(id) {
            return checkboxTemplate.replace(/@id/g, id);
        }

        var checkboxTemplate = $('#checkbox-template-premium').text();
        $('th.selectAllPremium').html(getPolarisCheckbox('selectAllPremium'))


        $("th.selectAllPremium .Polaris-Checkbox__Input").on("click", function (e) {
            if ($(this).is(":checked")) {
                premiumTable.rows().select();
                $('#PremiumSubscribersDatatable tbody .Polaris-Checkbox__Input').prop('checked', true)

            } else {
                premiumTable.rows().deselect();
                $('#PremiumSubscribersDatatable tbody .Polaris-Checkbox__Input').prop('checked', false)
            }
        });

        $(".per_page_length").on("change", function (e) {
            $('th.selectAllPremium input').prop("checked", false);
        });
        $('#PremiumSubscribersDatatable tbody').on('click', 'input', function (e) {
            var checked = $(this).prop('checked');
            var row = premiumTable.rows($(this).closest('tr').get()[0]);
            if (checked) {
                row.select()
            } else {
                $("th.selectAllPremium input").prop('checked', false);
                row.deselect()
            }
            e.stopPropagation();
        });
        function getAllPolarisCheckbox(id) {
            return checkboxAllTemplate.replace(/@id/g, id);
        }

        var checkboxAllTemplate = $('#checkbox-template-all').text();
        $('th.selectAll-checkbox').html(getAllPolarisCheckbox('selectAll'))


        $("th.selectAll-checkbox .Polaris-Checkbox__Input").on("click", function (e) {
            if ($(this).is(":checked")) {
                table.rows().select();
                $('#user-datatable tbody .Polaris-Checkbox__Input').prop('checked', true)

            } else {
                table.rows().deselect();
                $('#user-datatable tbody .Polaris-Checkbox__Input').prop('checked', false)
            }
        });

        $(".per_page_length").on("change", function (e) {
            $('th.selectAll-checkbox input').prop("checked", false);
        });
        $('#user-datatable tbody').on('click', 'input', function (e) {
            var checked = $(this).prop('checked');
            var row = table.rows($(this).closest('tr').get()[0]);
            if (checked) {
                row.select()
            } else {
                $("th.selectAll-checkbox input").prop('checked', false);
                row.deselect()
            }
            e.stopPropagation();
        });

        setTimeout(function(){
            hide_loading_img();
        }, 1000);

        // var dataTable = $('#PremiumSubscribersDatatable').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     "searching": true,
        //     "paging": true,
        //     'bSortable': false,
        //     "bInfo": true,
        //     "bSort": false,
        //     iDisplayLength: 10,
        //     "lengthChange": true,
        //     "bDestroy": true,
        //     dom: '<"topFooter"fB>rt<"bottomFooter"lip>',
        //     buttons: [
        //         {
        //             text: 'Select Winner',
        //             className: 'btn-dark',
        //             attr: {
        //                 id: 'selectWinnerButton'
        //             },
        //             action: function () {
        //                 $('#selectWinner').modal('show');
        //             }
        //         }
        //     ],
        // });
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
                        return getAllPolarisCheckbox(row.id);
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
        // $('#user-datatable thead th:first-child input[type="checkbox"]').on('change', function() {
        //     console.log('Select All checkbox clicked');
        //     var isChecked = $(this).prop('checked');
        //
        //     // Update the status of individual checkboxes in the column
        //     $('#user-datatable tbody tr').each(function() {
        //         $(this).find('td:first-child input[type="checkbox"]').prop('checked', isChecked);
        //     });
        // });
        var premiumTable =   $('#PremiumSubscribersDatatable').DataTable({
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
                },
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
                        var count = premiumTable.rows({selected: true}).count();
                        console.log(count);
                        if (count == 0) {
                            toastr.error('Please select the users to export.');
                            return;
                        }
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                    }
                },
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
            language: {
                searchPlaceholder: 'Search Users',
                "emptyTable": "No Users found",
                "zeroRecords": "No Users found"
            },
            sAjaxSource: '{{route('users.premium')}}',
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
        });
        $("th.selectAllPremium input[type='checkbox']").on("click", function (e) {
            var isChecked = $(this).is(":checked");

            // Set the state of all checkboxes in the table body
            $('#PremiumSubscribersDatatable tbody input[type="checkbox"]').prop('checked', isChecked);

            // Select/deselect rows in DataTable
            if (isChecked) {
                premiumTable.rows().select();
            } else {
                premiumTable.rows().deselect();
            }
        });
        $("th.selectAll-checkbox input[type='checkbox']").on("click", function (e) {
            var isChecked = $(this).is(":checked");

            // Set the state of all checkboxes in the table body
            $('#user-datatable tbody input[type="checkbox"]').prop('checked', isChecked);

            // Select/deselect rows in DataTable
            if (isChecked) {
                table.rows().select();
            } else {
                table.rows().deselect();
            }
        });

    </script>
@endsection
