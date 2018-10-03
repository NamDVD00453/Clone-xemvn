@extends ('layout.master')

@section('content')
    <div class="container" style="margin-top: 50px">

        <div class="row">

            <div class="col-lg-9">

                <div class="row">
                    <div class="col-12 card-header-pills mt-4">
                        <h4>Tổng hợp Video hot</h4>
                    </div>
                </div>

                <div class="tips card-header-pills mt-4">
                    Hãy chia sẻ video tới bạn bè.
                </div>

                @foreach($listContent as $key =>$item)

                    {{--Content Item--}}

                    <div class="row">

                        <div class="col-12 card-header-pills mt-4">
                            <a href="videos/{{$item -> handle_url}}">
                                <h5 class="card-title text-dark">{{$item -> title}}</h5>
                            </a>
                            <h6 class="text-black-50">Đăng bởi: Admin - {{$item -> created_at}}.</h6>
                            <div class="row">
                                <div class="col-3">
                                    <div class="row">
                                        <div class="col">
                                            <i class="fas fa-eye"> {{$item -> seen_count}}</i>

                                        </div>
                                        <div class="col">
                                            <i class="fas fa-comment"> {{$item -> comment_count}}</i>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="fb-like" data-href="videos/{{$item -> handle_url}}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row card-body thumb-view">
                            <img class="card-img-top card-img thumbImg" src="{{$item -> thumbnail}}" alt="">
                            <a href="videos/{{$item -> handle_url}}">
                                <div class="thumblink">
                                    <span class="playIcon"></span>
                                </div>
                            </a>
                        </div>

                    </div>

                    <hr>

                    {{--End Content Item--}}

                @endforeach

                <div class="row mt-4 mx-auto">
                    <div class="mx-auto">{{ $listContent->links() }}</div>
                    <a class="btn btn-primary btn-lg btn-block text-white" id="next">Want more? Click here</a>
                </div>


            </div>

            <div class="col-lg-3">
                <h1 class="my-4">List link</h1>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Link 1</a>
                    <a href="#" class="list-group-item">Link 1</a>
                    <a href="#" class="list-group-item">Link 1</a>
                </div>
            </div>

        </div>
    </div>
    <div id="fb-root"></div>

@stop

@section('script')

    <script>
        (
            function() {
                console.log(document.querySelector('.pagination > li:last-child > a'));
                document.getElementById('next').href =  document.querySelector('.pagination  > li:last-child > a').href;
            }
        )();

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

@stop
