<!doctype html>
<html lang="en-US">
@include('layout.head')
<body>
<div id="loader" >
    <div class="loading-img"></div>
</div>
<div id="wrapper" >
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
</div>
@yield('challenge-modal')
@yield('tutorial-modal')
@yield('addValuePopup')
@yield('select-winner')
@include('layout.js')
@yield('extra-js')
<script>

    function getFormattedDate() {
        var date = new Date();
        var month = date.getMonth() + 1;
        var day = date.getDate();
        var hour = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();

        month = (month < 10 ? "0" : "") + month;
        day = (day < 10 ? "0" : "") + day;
        hour = (hour < 10 ? "0" : "") + hour;
        min = (min < 10 ? "0" : "") + min;
        sec = (sec < 10 ? "0" : "") + sec;

        return date.getFullYear() + "-" + month + "-" + day + "_" + hour + ":" + min + ":" + sec;
    }

    $(document).on('click', '.delete-record', function () {
        var tr = $(this).closest('tr'),
            data_action_target = $(this).attr('data-action-target');
        data_action_table = $(this).attr('data-action-table');
        var table = $('.' + data_action_table).DataTable();
        if ($('.' + data_action_table).hasClass("collapsed")) {
            var e = table.row(this).index();
        } else {
            e = null;
        }
        Swal.fire({
            title: "{{__("Are you sure, You want to delete this record?")}}",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'

        }).then((result) => {
                if (result.isConfirmed) {
                    DeleteSingleTemplate(data_action_target, tr, e, data_action_table);
                }
            }
        );
    });
    $(document).on('click', '.disable-record', function () {
        var data_action_target = $(this).attr('data-action-target');
        var type = $(this).attr('data-action-type');
        data_action_table = $(this).attr('data-action-table');
        Swal.fire({
            title: "Are you sure, You want to " + type + " this record?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ' + type + ' it!'

        }).then((result) => {
                if (result.isConfirmed) {
                    DisableRecord(data_action_target, type,data_action_table);
                }
            }
        );
    });

    function DisableRecord(data_action_target, type,tableClass) {

        $.ajax({
            url: data_action_target,
            type: 'POST',
            data: {
                _token: "<?= Session::token() ?>"
            },
            cache: false,
            success: function (response) {

                if (response.success === true) {
                    toastr.success(response.message);
                    @if(request()->routeIs('users.index'))
                    if(tableClass == 'datatable1') {
                        active.draw();
                    }
                    if(tableClass == 'datatable2'){
                        inActive.draw();
                    }
                    @endif
                    table.draw();
                    // window.location.reload();
                } else {
                    toastr.error(response.message);
                }
            }, error: function (response) {
                Swal.fire('Warning', 'Failed to ' + type + ' . Try again !!', 'warning');
            },
            timeout: 15000
        }).fail(function (jqXHR, textStatus) {
            if (textStatus === 'timeout') {
                Swal.fire("Sorry", 'Please Wait... Slow connection!', "error");
                //toastr.warning('Please Wait... Slow connection!');
                //do something. Try again perhaps?
            }
        });
    }

    $(document).on('submit', ".ajax-form", function (e) {
        e.preventDefault();
        var form = $(this);
        var formData = new FormData(this);
        var button = $(this).find(':input[type=submit]');

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
    // $('.dropdown-select').select2({
    //     width: '100%'
    // });

    function DeleteSingleTemplate(data_action_target, tr, e, tableClass) {

        $.ajax({
            url: data_action_target,
            type: 'POST',
            data: {
                _method: 'DELETE',
                _token: "<?= Session::token() ?>"
            },
            cache: false,
            success: function (response) {

                if (response.success === true) {
                    toastr.success(response.message);
                    RemoveTableRow(tableClass, tr, e)
                } else {
                    toastr.error(response.message);
                }
            }, error: function (response) {
                Swal.fire('Warning', response.responseJSON.message, 'warning');
            },
            timeout: 15000
        }).fail(function (jqXHR, textStatus) {
            if (textStatus === 'timeout') {
                Swal.fire("Sorry", 'Please Wait... Slow connection!', "error");
                //toastr.warning('Please Wait... Slow connection!');
                //do something. Try again perhaps?
            }
        });
    }

    function RemoveTableRow(TableId, Row_selector) {
        var table = $('#' + TableId).DataTable();
        Row_selector.fadeOut(1000, function () {
            table
                .row($(Row_selector))
                .remove()
                .draw();
        });

    }

    function getPolarisCheckbox(id) {
        return checkboxTemplate.replace(/@id/g, id);
    }

    var checkboxTemplate = $('#checkbox-template').text();
    $('th.selectAll').html(getPolarisCheckbox('selectAll'))


    $("th.selectAll .Polaris-Checkbox__Input").on("click", function (e) {
        if ($(this).is(":checked")) {
            table.rows().select();
            $('#table tbody .Polaris-Checkbox__Input').prop('checked', true)

        } else {
            table.rows().deselect();
            $('#table tbody .Polaris-Checkbox__Input').prop('checked', false)
        }
    });

    $(".per_page_length").on("change", function (e) {
        $('th.selectAll input').prop("checked", false);
    });
    $('#table tbody').on('click', 'input', function (e) {
        var checked = $(this).prop('checked');
        var row = table.rows($(this).closest('tr').get()[0]);
        if (checked) {
            row.select()
        } else {
            $("th.selectAll input").prop('checked', false);
            row.deselect()
        }
        e.stopPropagation();
    });

    setTimeout(function(){
        hide_loading_img();
    }, 1000);

</script>
</body>
</html>

