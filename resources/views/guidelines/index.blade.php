@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Guidelines</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="tabset">
                        <li class="active"><a href="#stab1">Terms & Conditions</a></li>
                        <li><a href="#stab2">About Us</a></li>
                        <li><a href="#stab3">FAQs</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="row">
                            <div class="col-md-8">
                                <div id="stab1" class="tab editSection">
                                    <form method="POST" class="ajax-form"
                                          data-action="{{route('guidelines.store.terms_and_condition')}}">
                                        @csrf
                                        <div class="form-group">
                                            <textarea
                                                name="terms_and_condition">{{$guideline->terms_and_condition ?? ''}}</textarea>
                                        </div>
                                        <button type="submit">
                                            Save
                                        </button>
                                    </form>
                                </div>
                                <div id="stab2" class="tab editSection">
                                    <form method="POST" class="ajax-form"
                                          data-action="{{route('guidelines.store.about_us')}}">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="about_us">{{$guideline->about_us ?? ''}}</textarea>
                                        </div>
                                        <button type="submit">
                                            Save
                                        </button>
                                    </form>
                                </div>
                                <div id="stab3" class="tab editSection">
                                    <form method="POST" class="ajax-form"
                                          data-action="{{route('guidelines.store.faqs')}}">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="faqs">{{$guideline->faqs ?? ''}}</textarea>
                                        </div>
                                        <button type="submit">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="logBox">
                                    <h4>Update Logs</h4>
                                    <p> {{now()->format('M d, Y')}}</p>
                                    <ul class="logList">
                                        @foreach($logs as $log)
                                            <li>
                                                <div class="box">
                                                    <time class="d-block">{{$log->date}}</time>
                                                    <div>{{$log->message}}</div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
