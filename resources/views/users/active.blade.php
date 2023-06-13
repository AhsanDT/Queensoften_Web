<table id="active" class="table datatable1">
    <thead>
    <tr>
        <th class="selectAll-active"></th>
        <th class="text-left">PROFILE</th>
        <th>ONLINE STATUS</th>
        <th>USERNAME</th>
        <th>ACCOUNT STATUS</th>
        <th class="actions"></th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<script type="text/template" id="checkbox-template-active">
    <div class="form-check d-inline-block mt-2">
        <input class="form-check-input mt-0 active-tab-checkbox" id="ActiveCheckbox_@id" type="checkbox" value="@id" aria-label="Checkbox for following text input">
        <label class="form-check-label" for="ActiveCheckbox_@id">
        </label>
    </div>
</script>
<script>

    function getActiveCheckbox(id) {
        return checkboxTemplateActive.replace(/@id/g, id);
    }
    var checkboxTemplateActive = $('#checkbox-template-active').text();

    $('th.selectAll-active').html(getActiveCheckbox('selectAll-active'))



    $("th.selectAll-active .active-tab-checkbox").on("click", function (e) {
        if ($(this).is(":checked")) {
            active.rows().select();
            $('#active tbody .active-tab-checkbox').prop('checked', true)

        } else {
            active.rows().deselect();
            $('#active tbody .active-tab-checkbox').prop('checked', false)
        }
    });


    $(".per_page_length").on("change", function (e) {
        $('th.selectAll-active input').prop("checked", false);
    });
    $('#active tbody').on('click', 'input', function (e) {
        var checked = $(this).prop('checked');
        var row = active.rows($(this).closest('tr').get()[0]);
        if (checked) {
            row.select()
        } else {
            $("th.selectAll-active input").prop('checked', false);
            row.deselect()
        }
        e.stopPropagation();
    });

    var active =  $('#active').DataTable({
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
        "bDestroy": true,
        "bSort" : false,
        // "scrollX" : true,
        language: {
            searchPlaceholder: 'Search Users',
            "emptyTable": "No User found",
            "zeroRecords": "No User found"
        },
        sAjaxSource: '{{route('users.ajax',['status'=>'active'])}}',
        "columnDefs": [
            {"width": "20px", "targets": 0},
            {"width": "120px", "targets": 1},
            {"width": "60px", "targets": 2},
            {"width": "60px", "targets": 3},
            {"width": "60px", "targets": 4},
            {"width": "60px", "targets": 5},
        ],
        "columns": [
            {
                "data": "serial_no",
                "orderable": false,
                render: function (data, type, row) {
                    return getActiveCheckbox(row.id);
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
                    return '<td class="actions"><div class="dropdown"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="far fa-ellipsis-v "></i></a><ul class="dropdown-menu dropdown-menu-end"><li><a href="javascript:" data-action-table="datatable1" class="disable-record" data-action-type="'+row.account_status_name+'" data-action-target="'+ row.disable_route + '"><i class="fal fa-ban bg-warning text-white"></i> '+row.account_status_name+' User</a></li><li><a href="javascript:" class="delete-record" data-action-table="datatable1" data-action-target="'+ row.delete_route + '"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li></ul> </div> </td>';
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
                    var count = active.rows({selected: true}).count();
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
