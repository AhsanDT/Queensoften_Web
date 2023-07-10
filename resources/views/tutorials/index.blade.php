@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Tutorials</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id='table' class="table challenges-list">
                        <thead>
                        <tr>
                            <th class="selectAll"></th>
                            <th class="text-left">IMAGES</th>
                            <th>DESCRIPTION</th>
                            {{--                            <th>STATUS</th>--}}
                            <th class="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection
@section('tutorial-modal')
    @include('partials.tutorial_modal')
@endsection
@section('extra-js')
    <script>
        var table =   $('#table').DataTable({
            dom: '<"topFooter"fB>rt<"bottomFooter"lip>',
            buttons: [
                {
                    text: 'Add Tutorial',
                    className: 'btn btn-dark btn-challenge',
                    action: function (e, dt, node, config) {
                        $('#addTutorial').modal('show')
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
            sAjaxSource: '{{route('tutorials.list')}}',
            language: {
                searchPlaceholder: 'Search Tutorial',
                "emptyTable": "No Tutorial found",
                "zeroRecords": "No Tutorial found"
            },
            "columnDefs": [
                {"width": "30px", "targets": 0},
                {"width": "120px", "targets": 1},
            ],
            "columns": [
                {
                    "data": "serial_no",
                    orderable: false,
                    render: function (data, type, row) {
                        return getPolarisCheckbox(row.id);
                    }
                },
                {
                    "data": "image",
                    "orderable": false,
                    render: function (data, type, row) {
                        return '<img src="' + data + '" alt="Image" width="100">';
                    }
                },
                {
                    "data": "description"
                    , "orderable": true
                },
                {
                    "data": "actions",
                    "orderable": false,
                    className: 'actions',
                    'render': function (data, type, row) {
                        return '<td class="actions d-flex" style="width: 60px"><a href="#" onclick="editTutorial('+row.id+')" class="m-1"><icon class="fas fa-edit"><a href="#" class="m-1"><icon class="fas fa-trash"></td>';
                    }
                },
            ],
        });
        function editTutorial(id){
            var url = '{{ route("tutorials.edit", ":id") }}';
            url = url.replace(':id', id);
            $.get(url , function (data) {
                console.log(data)
            })
        }
    </script>
@endsection

