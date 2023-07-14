@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Story Mode</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3 text-right">
                        <a href="storymode/create" class="btn">Add Season</a>
                    </div>
                    <div class="colList">
                        <div class="col">
                            <div class="box">
                                <a href="storymode/detail" class="imgBox">
                                    <img src="images/s1.jpg" />
                                </a>
                                <div class="description">Season 1</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box">
                                <a href="storymode/detail" class="imgBox">
                                    <img src="images/s2.jpg" />
                                </a>
                                <div class="description">Season 2</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box">
                                <a href="storymode/detail" class="imgBox">
                                    <img src="images/s3.jpg" />
                                </a>
                                <div class="description">Season 3</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box">
                                <a href="storymode/detail" class="imgBox">
                                    <img src="images/s4.jpg" />
                                </a>
                                <div class="description">Season 4</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box">
                                <a href="storymode/detail" class="imgBox">
                                    <img src="images/s5.jpg" />
                                </a>
                                <div class="description">Season 5</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('extra-js')

@endsection

