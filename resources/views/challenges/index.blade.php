@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Challenges</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id='challenge-table' class="table challenges-list">
                        <thead>
                        <tr>
                            <th class="selectAll-challenge"></th>
                            <th class="text-left">CHALLENGES</th>
                            <th>DATE</th>
                            <th>OCCURRENCE</th>
                            <th>GAMES</th>
                            <th>DAYS</th>
                            <th>TIME</th>
                            <th>PRIZE</th>
{{--                            <th>STATUS</th>--}}
                            <th class="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <script type="text/template" id="checkbox-template-challenge">
                        <div class="form-check d-inline-block mt-2">
                            <input class="form-check-input mt-0 challenge-tab-checkbox" id="ChallengeCheckbox_@id" type="checkbox" value="@id" aria-label="Checkbox for following text input">
                            <label class="form-check-label" for="ChallengeCheckbox_@id"></label>
                        </div>
                    </script>

                </div>
            </div>

        </div>
    </main>
@endsection
@section('challenge-modal')
@include('partials.challenge_modal',compact('prizes'))
@endsection
@section('extra-js')
    <script>
        function getChallengePolarisCheckbox(id) {
            return checkboxAllTemplate.replace(/@id/g, id);
        }

        var checkboxAllTemplate = $('#checkbox-template-challenge').text();
        $('th.selectAll-challenge').html(getChallengePolarisCheckbox('selectAll'))


        $("th.selectAll-challenge .Polaris-Checkbox__Input").on("click", function (e) {
            if ($(this).is(":checked")) {
                table.rows().select();
                $('#challenge-table tbody .Polaris-Checkbox__Input').prop('checked', true)

            } else {
                table.rows().deselect();
                $('#challenge-table tbody .Polaris-Checkbox__Input').prop('checked', false)
            }
        });

        $(".per_page_length").on("change", function (e) {
            $('th.selectAll-challenge input').prop("checked", false);
        });
        $('#challenge-table tbody').on('click', 'input', function (e) {
            var checked = $(this).prop('checked');
            var row = table.rows($(this).closest('tr').get()[0]);
            if (checked) {
                row.select()
            } else {
                $("th.selectAll-challenge input").prop('checked', false);
                row.deselect()
            }
            e.stopPropagation();
        });
        var table =   $('#challenge-table').DataTable({
            dom: '<"topFooter"fB>rt<"bottomFooter"lip>',
            buttons: [
                {
                    text: 'Add Challenge',
                    className: 'btn btn-dark btn-challenge',
                    action: function (e, dt, node, config) {
                        window.location.href = "{{ route('challenges.create') }}";
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
            sAjaxSource: '{{route('challenges.list')}}',
            language: {
                searchPlaceholder: 'Search Challenge',
                "emptyTable": "No challenge found",
                "zeroRecords": "No challenge found"
            },
            "columnDefs": [
                {"width": "30px", "targets": 0},
                {"width": "120px", "targets": 1},
                {"width": "60px", "targets": 2},
                {"width": "60px", "targets": 3},
                {"width": "60px", "targets": 4},
                {"width": "60px", "targets": 5},
                {"width": "30px", "targets": 6},
                {"width": "30px", "targets": 7},
                {"width": "30px", "targets": 8}
                // {"width": "30px", "targets": 9}
            ],
            "columns": [
                {
                    "data": "serial_no",
                    orderable: false,
                    render: function (data, type, row) {
                        return getChallengePolarisCheckbox(row.id);
                    }
                },
                {
                    "data": "title",
                    "orderable": true,
                    'render': function (data, type, row) {
                        return ' <div class="text-left">'+ row.title +'</div>';
                    }
                },
                {
                    "data": "date",
                    "orderable": false,
                },
                {
                    "data": "occurrence"
                    , "orderable": true
                },
                {
                    "data": "games",
                    "orderable": false,
                },
                {
                    "data": "days",
                    "orderable": false,
                },
                {
                    "data": "time",
                    "orderable": false,
                },
                {
                    "data": "prize",
                    "orderable": false,
                },
                // {
                //     "data": "active",
                //     "orderable": false,
                //     'render': function (data, type, row) {
                //         if (row.active == 1) {
                //             return '<span class="badge text-success">Active</span>';
                //         } else {
                //             return '<span class="badge text-muted">Disabled</span>';
                //         }
                //     }
                // },
                {
                    "data": "actions",
                    "orderable": false,
                    className: 'actions',
                    'render': function (data, type, row) {
                        return '<td class="actions"><div class="dropdown"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="far fa-ellipsis-v "></i></a><ul class="dropdown-menu dropdown-menu-end"><li><a href="javascript:" class="disable-record" data-action-type="'+row.account_status_name+'" data-action-target="'+ row.disable_route + '"><i class="fal fa-ban bg-warning text-white"></i>'+row.account_status_name+'</a></li><li><a href="javascript:" class="delete-record" data-action-target="'+ row.delete_route + '"><i class="fal fa-trash bin bg-danger text-white"></i>Delete</a></li></ul> </div> </td>';
                    }
                },
            ],
            // responsive: {
            //     details: {
            //         display: $.fn.dataTable.Responsive.display.modal({
            //             header: function (row) {
            //                 var data = row.data();
            //                 return 'Details for ' + data[0] + ' ' + data[1];
            //             }
            //         }),
            //         renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            //     }
            // }
        });

        $("th.selectAll-challenge input[type='checkbox']").on("click", function (e) {
            var isChecked = $(this).is(":checked");

            // Set the state of all checkboxes in the table body
            $('#challenge-table tbody input[type="checkbox"]').prop('checked', isChecked);

            // Select/deselect rows in DataTable
            if (isChecked) {
                table.rows().select();
            } else {
                table.rows().deselect();
            }
        });
    </script>
@endsection

