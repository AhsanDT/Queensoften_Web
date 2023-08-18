@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Story Mode</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                 <div class="row py-3gi">
                     <div class="col-sm-6">
                         <div id="table_filter" class="dataTables_filter">
                             <label>
                                 <input type="search" class="form-control" id="searchSeason" placeholder="Search Season" aria-controls="table">
                             </label>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="text-right">
                             <a href="storymode/create" class="btn btn-dark btn-challenge datatable-custom-btn">Add Season</a>
                         </div>
                     </div>
                 </div>
                    <div class="colList" id="storyList">
                        @foreach($stories as $story)
                            <div class="col">
                                <div class="box">
                                    <a href="{{ route('storymode.detail', $story->id) }}" class="imgBox">
                                        <img style="width: 100%;height: 200px;object-fit: cover;object-position: top;" src="https://queensoftenimages.s3.us-west-1.amazonaws.com/{{$story->image}}"/>
                                    </a>
                                    <div class="description">{{$story->title}}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('extra-js')
    <script>
        $(document).ready(function () {
            $('#searchSeason').on('keyup', function () {
                var searchTerm = $(this).val();
                $.ajax({
                    url: '{{ route('storymode.search') }}',
                    method: 'GET',
                    data: { searchTerm: searchTerm },
                    success: function (response) {
                        $('#storyList').html(response);
                    }
                });
            });
        });
    </script>
@endsection

