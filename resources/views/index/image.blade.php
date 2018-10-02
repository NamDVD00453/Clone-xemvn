@extends ('layout.master')

@section('content')
    <div class="container" style="margin-top: 50px">

        <div class="row">

            <div class="col-lg-9">

                {{--Content Item--}}
                <div class="row mt-5">
                    <h5 class="card-title">{{$post -> title}}</h5>
                </div>

                <div class="row mt-3">
                    <h6 class="text-black mt-1">Views: </h6>
                    <h5 class="text-danger ml-2"> {{$post -> seen_count}}</h5>
                </div>

                <div class="row" style="background-color: #eee; padding-top: 10px">
                    <div class="col-8">
                        <h6> Like this? </h6>
                    </div>

                    <div class="col-1">
                        <a href="/new/{{$backUrl}}">Back</a>
                    </div>
                    <div class="col-1">
                        <a href="/new/{{$nextUrl}}">Next</a>
                    </div>

                </div>

                <div class="row">
                    {{--<video width="1000" height="480" controls class="mt-4" autoplay>--}}
                        {{--<source src="{{$post -> content}}" type="video/mp4">--}}
                        {{--Your browser does not support HTML5 video.--}}
                    {{--</video>--}}
                    <img class="mx-auto mt-4" src="{{$post -> content}}" alt="" >
                </div>
                <hr>
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