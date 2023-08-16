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
                         <div id="table_filter" class="dataTables_filter"><label><input type="search" class=""
                                                                                        placeholder="Search Tutorial"
                                                                                        aria-controls="table"></label></div>
                     </div>
                     <div class="col-sm-6">
                         <div class="text-right">
                             <a href="storymode/create" class="btn">Add Season</a>
                         </div>
                     </div>
                 </div>
                    <div class="colList">
                        @foreach($stories  as $story)
                            <div class="col">
                                <div class="box">
                                    <a href="{{route('storymode.detail',$story->id)}}" class="imgBox">
                                        <img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/{{$story->image}}"/>
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

@endsection

