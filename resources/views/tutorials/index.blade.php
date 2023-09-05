@extends('partials.master')
@section('content')
    <style>
        #table_info{
            width: 70px;
            overflow: hidden;
            margin: 0 5px;
            padding-left: 0 !important;
        }
    </style>
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Tutorial</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id='table' class="table challenges-list">
                        <thead>
                        <tr>
                            <th class="selectAll"></th>
                            <th class="text-center">IMAGE</th>
                            <th>DESCRIPTION</th>
                            {{--                            <th>STATUS</th>--}}
                            <th class="actions">Action</th>
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
@section('edit-tutorial-modal')
    @include('partials.edit_tutorial_modal')
@endsection
@section('extra-js')
    <script>
        var table =   $('#table').DataTable({
            dom: '<"topFooter"fB>rt<"bottomFooter"lip>',
            buttons: [
                {
                    text: 'Add Tutorial Step',
                    className: 'btn btn-dark btn-challenge datatable-custom-btn',
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
                        return '<div class="imgBox mx-auto"><img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/' + data + '" alt="Image" width="100"></div>';
                    }
                },
                {
                    "data": "description"
                    , "orderable": true,
                    className: 'description',
                    render:function (data){
                        return "<p  class='text-center text-truncate'>"+data+"</p>"
                    }
                },
                {
                    "data": "actions",
                    "orderable": false,
                    className: 'actions custom-action',
                    'render': function (data, type, row) {
                        var delUrl = "{{ route('tutorials.delete', ':id') }}";
                        delUrl = delUrl.replace(':id', row.serial_no);
                        return '<td class="actions d-flex" style="width: 60px"><a href="#" onclick="editTutorial(' + row.serial_no + ')" class="m-1 btn action bg-edit text-white"><icon class="fas fa-edit"></icon></a><a href="javascript:" class="delete-record btn action bg-danger text-white" data-action-target="' + delUrl + '"><icon class="fas fa-trash"></icon></a></td>';
                    }
                },
            ],
        });
        function editTutorial(id){
            var url = '{{ route("tutorials.edit", ":id") }}';
            url = url.replace(':id', id);
            $.get(url , function (data) {
                console.log(data)
                $('#updateTutorial').modal('show');
                var src = "https://queensoftenimages.s3.us-west-1.amazonaws.com/" + data.data.image
                $('.imageInput').trigger('change', src);
                // $("#tutorialImage").attr("src", "https://queensoftenimages.s3.us-west-1.amazonaws.com/" + data.data.image);
                $('#editSequence').val(data.data.sequence)
                $('#editTutorialId').val(data.data.id)
                $('#EditDescription').val(data.data.description)
            })
        }
        $(document).on('submit', ".edit-ajax-form", function (e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(this);
            var url = form.data("action");
            var tutorialId = $('#editTutorialId').val();
            console.log(tutorialId);
            url = url.replace(":id", tutorialId);
            console.log(url);
            var button = $(this).find(':input[type=submit]');

            $.ajax({
                type: form.attr("method"),
                url: url,
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
                            window.location.reload();
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

