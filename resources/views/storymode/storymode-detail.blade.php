@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Story Mode</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 d-flex">
                        <a href="/storymode" class="btn-back">
                            <i class="fas fa-long-arrow-left" style="margin-right: 10px"></i> Back
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h1>{{$story->title}}</h1>
                    <div class="mb-3">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $story->start_date)->format('d F Y') }}
                        - {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $story->end_date)->format('d F Y') }}</div>
                    <div class="img-box mb-3">
                        <img src="https://queensoftenimages.s3.us-west-1.amazonaws.com/{{$story->image}}" />
                    </div>
                    <p>{{$story->description}}</p>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('extra-js')

@endsection

