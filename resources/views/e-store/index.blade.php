@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Store</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="tabset">
                        <li class="active"><a href="#Shuffle">Shuffle</a> </li>
                        <li><a href="#Jokers">Jokers</a> </li>
                        <li><a href="#Suits">Suits</a> </li>
                        <li><a href="#Coins">Coins</a> </li>
                        <li><a href="#Deck">Deck</a> </li>
                        <li><a href="#Skin">Skin</a> </li>
                        <li><a href="#Playstore">Playstore</a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab" id="Shuffle">
                            <div class="table-responsive">
                                <table class="table" id="shuffleDatatable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Shuffle value</th>
                                            <th>coin value</th>
                                            <th>date Created</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Jokers">
                            <div class="table-responsive">
                                <table class="table" id="jokerDatatable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>coin value</th>
                                            <th>date Created</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Suits">
                            <div class="table-responsive">
                                <table class="table" id="suitDatatable">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>coin value</th>
                                        <th>date Created</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Coins">
                            <div class="table-responsive">
                                <table class="table" id="coinDatatable">
                                    <thead>
                                    <tr>
                                        <th>ROYAL COIN QUANTITY</th>
                                        <th>USD equivalent</th>
                                        <th>date Created</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Deck">
                            <div class="table-responsive">
                                <table class="table" id="deckDatatable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>deck name</th>
                                            <th>coin value</th>
                                            <th>date Created</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Skin">
                            <div class="table-responsive">
                                <table class="table" id="skinDatatable">
                                    <thead>
                                    <tr>
                                        <th>skin</th>
                                        <th>skin name</th>
                                        <th>coin value</th>
                                        <th>date Created</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="Playstore">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@section('addValuePopup')
    @include('partials.shuffle_popup')
@endsection
@section('jokerPopup')
    @include('partials.joker_popup')
@endsection
@section('suitPopup')
    @include('partials.suit_popup')
@endsection
@section('skinPopup')
    @include('partials.skin_popup')
@endsection
@section('coinPopup')
    @include('partials.coin_popup')
@endsection
@section('extra-js')
<script>
    var shuffleTable =   $('#shuffleDatatable').DataTable({
        dom: '<"topFooter"B>rt<"bottomFooter"lip>',
        buttons: [
            {
                text: 'Add',
                className: 'btn btn-dark btn-challenge datatable-custom-btn',
                action: function (e, dt, node, config) {
                    $('#addValuePopup').modal('show')
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
        sAjaxSource: '{{route('e-store.shuffle-list')}}',
        language: {
            searchPlaceholder: 'Search Shuffle',
            "emptyTable": "No Shuffle found",
            "zeroRecords": "No Shuffle found"
        },
        "columnDefs": [
            {"width": "120px", "targets": 0},
            {"width": "120px", "targets": 1},
            {"width": "120px", "targets": 2},
            {"width": "120px", "targets": 3},
        ],
        "columns": [
            {
                "data": "image",
                "orderable": false,
                render: function (data, type, row) {
                    return '<div class="imgBox mx-auto"><img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/' + data + '" alt="Image" width="100"></div>';
                }
            },
            {
                "data": "value"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "coins"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "created_at"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "actions",
                "orderable": false,
                className: 'actions custom-action',
                'render': function (data, type, row) {
                    var delUrl = "{{ route('e-store.shuffle-delete', ':id') }}";
                    delUrl = delUrl.replace(':id', row.id);
                    return '<td class="actions d-flex" style="width: 60px"><a href="javascript:" class="delete-record btn action bg-danger text-white" data-action-target="' + delUrl + '"><icon class="fas fa-trash"></icon></a></td>';
                }
            },
        ],
    });
    var jokerTable =   $('#jokerDatatable').DataTable({
        dom: '<"topFooter"B>rt<"bottomFooter"lip>',
        buttons: [
            {
                text: 'Add',
                className: 'btn btn-dark btn-challenge datatable-custom-btn',
                action: function (e, dt, node, config) {
                    $('#addJokerValuePopup').modal('show')
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
        "autoWidth": true,
        "bDestroy": true,
        "bSort" : false,
        "scrollX": false,
        sAjaxSource: '{{route('e-store.joker-list')}}',
        language: {
            searchPlaceholder: 'Search Joker',
            "emptyTable": "No Joker found",
            "zeroRecords": "No Joker found"
        },
        "columnDefs": [
            {"width": "120px", "targets": 0},
            {"width": "120px", "targets": 1},
            {"width": "120px", "targets": 2},
            {"width": "120px", "targets": 3},
        ],
        "columns": [
            {
                "data": "image",
                "orderable": false,
                render: function (data, type, row) {
                    return '<div class="imgBox mx-auto"><img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/' + data + '" alt="Image" width="100"></div>';
                }
            },
            {
                "data": "name"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "coins"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "created_at"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "actions",
                "orderable": false,
                className: 'actions custom-action',
                'render': function (data, type, row) {
                    var delUrl = "{{ route('e-store.joker-delete', ':id') }}";
                    delUrl = delUrl.replace(':id', row.id);
                    return '<td class="actions d-flex" style="width: 60px"><a href="javascript:" class="delete-record btn action bg-danger text-white" data-action-target="' + delUrl + '"><icon class="fas fa-trash"></icon></a></td>';
                }
            },
        ],
    });
    var suitTable =   $('#suitDatatable').DataTable({
        dom: '<"topFooter"B>rt<"bottomFooter"lip>',
        buttons: [
            {
                text: 'Add',
                className: 'btn btn-dark btn-challenge datatable-custom-btn',
                action: function (e, dt, node, config) {
                    $('#addSuitsValuePopup').modal('show')
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
        "autoWidth": true,
        "bDestroy": true,
        "bSort" : false,
        "scrollX": false,
        sAjaxSource: '{{route('e-store.suit-list')}}',
        language: {
            searchPlaceholder: 'Search Suit',
            "emptyTable": "No Suit found",
            "zeroRecords": "No Suit found"
        },
        "columnDefs": [
            {"width": "120px", "targets": 0},
            {"width": "120px", "targets": 1},
            {"width": "120px", "targets": 2},
            {"width": "120px", "targets": 3},
        ],
        "columns": [
            {
                "data": "image",
                "orderable": false,
                render: function (data, type, row) {
                    return '<div class="imgBox mx-auto"><img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/' + data + '" alt="Image" width="100"></div>';
                }
            },
            {
                "data": "name"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "coins"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "created_at"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "actions",
                "orderable": false,
                className: 'actions custom-action',
                'render': function (data, type, row) {
                    var delUrl = "{{ route('e-store.suit-delete', ':id') }}";
                    delUrl = delUrl.replace(':id', row.id);
                    return '<td class="actions d-flex" style="width: 60px"><a href="javascript:" class="delete-record btn action bg-danger text-white" data-action-target="' + delUrl + '"><icon class="fas fa-trash"></icon></a></td>';
                }
            },
        ],
    });
    var skinTable =   $('#skinDatatable').DataTable({
        dom: '<"topFooter"B>rt<"bottomFooter"lip>',
        buttons: [
            {
                text: 'Add',
                className: 'btn btn-dark btn-challenge datatable-custom-btn',
                action: function (e, dt, node, config) {
                    $('#addSkinValuePopup').modal('show')
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
        "autoWidth": true,
        "bDestroy": true,
        "bSort" : false,
        "scrollX": false,
        sAjaxSource: '{{route('e-store.skin-list')}}',
        language: {
            searchPlaceholder: 'Search Skin',
            "emptyTable": "No Skin found",
            "zeroRecords": "No Skin found"
        },
        "columnDefs": [
            {"width": "120px", "targets": 0},
            {"width": "120px", "targets": 1},
            {"width": "120px", "targets": 2},
            {"width": "120px", "targets": 3},
        ],
        "columns": [
            {
                "data": "image",
                "orderable": false,
                render: function (data, type, row) {
                    return '<div class="imgBox mx-auto"><img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/' + data + '" alt="Image" width="100"></div>';
                }
            },
            {
                "data": "name"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "coins"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "created_at"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "actions",
                "orderable": false,
                className: 'actions custom-action',
                'render': function (data, type, row) {
                    var delUrl = "{{ route('e-store.skin-delete', ':id') }}";
                    delUrl = delUrl.replace(':id', row.id);
                    return '<td class="actions d-flex" style="width: 60px"><a href="javascript:" class="delete-record btn action bg-danger text-white" data-action-target="' + delUrl + '"><icon class="fas fa-trash"></icon></a></td>';
                }
            },
        ],
    });
    var deckTable =   $('#deckDatatable').DataTable({
        dom: '<"topFooter"B>rt<"bottomFooter"lip>',
        buttons: [
            {
                text: 'Add',
                className: 'btn btn-dark',
                action: function (e, dt, node, config) {
                    window.location.href = "{{route('e-store.design-card')}}"
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
        "autoWidth": true,
        "bDestroy": true,
        "bSort" : false,
        "scrollX": false,
        sAjaxSource: '{{route('e-store.deck-list')}}',
        language: {
            searchPlaceholder: 'Search Deck',
            "emptyTable": "No Deck found",
            "zeroRecords": "No Deck found"
        },
        "columnDefs": [
            {"width": "120px", "targets": 0},
            {"width": "120px", "targets": 1},
            {"width": "120px", "targets": 2},
            {"width": "120px", "targets": 3},
        ],
        "columns": [
            {
                "data": "image",
                "orderable": false,
                render: function (data, type, row) {
                    return '<div class="imgBox mx-auto"><img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/' + data + '" alt="Image" width="100"></div>';
                }
            },
            {
                "data": "title"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "coins"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "created_at"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "actions",
                "orderable": false,
                className: 'actions custom-action',
                'render': function (data, type, row) {
                    var delUrl = "{{ route('e-store.deck-delete', ':id') }}";
                    delUrl = delUrl.replace(':id', row.id);
                    return '<td class="actions d-flex" style="width: 60px"><a href="javascript:" class="delete-record btn action bg-danger text-white" data-action-target="' + delUrl + '"><icon class="fas fa-trash"></icon></a></td>';
                }
            },
        ],
    });
    var coinTable =   $('#coinDatatable').DataTable({
        dom: '<"topFooter"B>rt<"bottomFooter"lip>',
        buttons: [
            {
                text: 'Add',
                className: 'btn btn-dark btn-challenge datatable-custom-btn',
                action: function (e, dt, node, config) {
                    $('#USDEquivalent').modal('show')
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
        "autoWidth": true,
        "bDestroy": true,
        "bSort" : false,
        "scrollX": false,
        sAjaxSource: '{{route('e-store.coin-list')}}',
        language: {
            searchPlaceholder: 'Search Coin',
            "emptyTable": "No Coin found",
            "zeroRecords": "No Coin found"
        },
        "columnDefs": [
            {"width": "120px", "targets": 0},
            {"width": "120px", "targets": 1},
            {"width": "120px", "targets": 2},
        ],
        "columns": [
            {
                "data": "coins"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "price"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "created_at"
                , "orderable": true,
                className: 'description',
                render:function (data){
                    return "<p  class='text-start text-truncate'>"+data+"</p>"
                }
            },
            {
                "data": "actions",
                "orderable": false,
                className: 'actions custom-action',
                'render': function (data, type, row) {
                    var delUrl = "{{ route('e-store.coin-delete', ':id') }}";
                    delUrl = delUrl.replace(':id', row.id);
                    return '<td class="actions d-flex" style="width: 60px"><a href="javascript:" class="delete-record btn action bg-danger text-white" data-action-target="' + delUrl + '"><icon class="fas fa-trash"></icon></a></td>';
                }
            },
        ],
    });
</script>
@endsection

