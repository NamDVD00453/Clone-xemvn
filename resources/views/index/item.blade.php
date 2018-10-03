@extends ('layout.master')

@section('content')
    <div class="container" style="margin-top: 50px">

        <div class="row">

            <div class="col-lg-9">

                {{--Content Item--}}
                <div class="row mt-5">
                    <h5 class="card-title">{{$post -> title}}</h5>
                </div>
                <div class="row">
                    <div class="col-2">
                        <span>
                            <i class="fas fa-eye"></i>
                            {{$post -> seen_count}}
                        </span>
                        <span class="ml-4">
                            <i class="fas fa-comment"></i>
                            {{$post -> comment_count}}
                        </span>
                    </div>
                </div>

                <div class="row" style="background-color: #eee">
                    <div class="col-8">
                        <div class="fb-like" data-href="videos/{{$post -> handle_url}}" data-layout="button_count"
                             data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                    </div>


                    <div class="col-2">
                        <a class="ml-5" href="/videos/{{$backUrl}}">
                            <i class="fas fa-angle-left"></i>
                            Back
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="/videos/{{$nextUrl}}">
                            Next
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>

                </div>

                <div class="row">

                    <video width="1000" height="480" controls class="mt-4" autoplay>
                        <source src="{{$post -> content}}" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>

                </div>

                <hr>

                <div class="fb-comments" data-href="https://www.google.com/" data-width="100%" data-numposts="5"></div>

                <hr>

                <div class="row">
                    <div class="card w-100">
                        <div class="card-body" style="background: rgba(0,0,0,.03)">
                            <h5 class="card-title">Video mới</h5>
                            <div class="row" id="new-post">
                                @include('index.newpost-component')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <button type="button" id="get-more-post" class="btn btn-primary btn-lg btn-block btn-sm">Xem thêm
                    </button>
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
    <div id="fb-root"></div>

@stop

@section('script')
    <link rel="stylesheet" href="/css/item.css">
    <script>
        (function () {
            var page = 1;
            var url = '/videos/more-content';
            document.getElementById('get-more-post').onclick = function () {
                var req = new XMLHttpRequest();
                req.open('GET', url + '?page=' + ++page);
                req.onloadend = function () {
                    if ([200, 304, 201].includes(this.status)) {
                        console.log(this.responseText);
                        document.getElementById('new-post').innerHTML += this.responseText;
                    } else {
                        console.log(this.status);
                    }
                };
                req.onerror = function (e) {
                    console.log(e);
                };
                req.send();
            };
        })();

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@stop
