@extends ('layout.master')

@section('content')
    <div class="container" style="margin-top: 50px">

        <div class="row">

            <div class="col-lg-9">

                {{--Content Item--}}
                <div class="row mt-5">
                    <h5 class="card-title">{{$post -> title}}</h5>
                </div>

                <div class="row" style="background-color: #eee; padding-top: 10px">
                    <div class="col-8">
                        <h6> Like this? </h6>
                    </div>

                    <div class="col-1">
                        <h6>Back</h6>
                    </div>
                    <div class="col-1">
                        <h6>Next</h6>
                    </div>

                </div>

                <div class="row">

                    <video width="1000" height="480" controls class="mt-4" autoplay>
                        <source src="{{$post -> content}}" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>


                    {{--<img class="mx-auto mt-4" src="{{$post -> thumbnail}}" alt="" >--}}

                    {{--<div class="col-lg-7">--}}
                        {{--<a class="card mt-4" href="/cuoc-song-ma">--}}
                            {{--<img class="card-img-top img-fluid" src="https://i-xem.mkocdn.com/i.xem.sb/data/photo/2018/09/30/049/cuoc-song-ma-1538279899-650.jpg" alt="" >--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="col-lg-5">--}}
                        {{--<div class="card-body">--}}
                            {{--<a href="/cuoc-song-ma">--}}
                                {{--<h5 class="card-title">Cuộc sống mà 😂</h5>--}}
                            {{--</a>--}}
                            {{--<h6>Publish from: 01/01/2018</h6>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>

                <hr>

                <div class="row">
                    <div class="card w-100">
                        <div class="card-body" style="background: rgba(0,0,0,.03)">
                            <h5 class="card-title">Video mới</h5>
                            <div class="row">
                                @foreach($newPost as $ni)
                                    <div class="col-md-3 col-sm-4 mt-2">
                                        <a href="/videos/{{$ni -> handle_url}}" class="thumbnail-url" title="{{$ni->title}}">
                                            <img src="{{$ni -> thumbnail}}" class="w-100" alt="{{$ni->title}}">
                                            <p class="limit-text">{{$ni -> title}}</p>
                                            <span>
                                                <i class=""></i>
                                            </span>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <button type="button" class="btn btn-primary btn-lg btn-block btn-sm">Xem thêm</button>
                </div>
                {{--End Content Item--}}

            </div>
            <!-- /.col-lg-9 -->

            <div class="col-lg-3">
                <h1 class="my-4">List link</h1>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Link 1</a>
                    <a href="#" class="list-group-item">Link 1</a>
                    <a href="#" class="list-group-item">Link 1</a>
                </div>
            </div>
            <!-- /.col-lg-3 -->
        </div>
    </div>

@stop

@section('script')
    <link rel="stylesheet" href="/css/item.css">
@stop
