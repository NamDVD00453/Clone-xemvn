@extends ('layout.master')

@section('content')
    <div class="container" style="margin-top: 50px">

        <div class="row">

            <div class="col-lg-9">

                @foreach($listContent as $key =>$item)

                {{--Content Item--}}

                <div class="row">

                    <div class="col-lg-7">
                        <a class="card mt-4" href="/new/{{$item -> handle_url}}">
                            <img class="card-img-top img-fluid" src="{{$item -> thumbnail}}" alt="" >
                        </a>
                    </div>

                    <div class="col-lg-5">
                        <div class="card-body">
                            {{--<a href="/new/{{$item -> handle_url}}">--}}
                                {{--<h5 class="card-title">{{$item -> title}}</h5>--}}
                            {{--</a>--}}
                            {{--<h6>Publish from: 01/01/2018</h6>--}}
                            <a href="new/{{$item -> handle_url}}">
                                <h5>{{$item -> title}}</h5>
                            </a>
                            <h6 class="text-black-50">Đăng bởi: Admin.</h6>
                            <p>{{$item -> created_at}}</p>
                            <div class="row">
                                <div class="col-3">
                                    <i class="fas fa-eye"> {{$item -> seen_count}}</i>
                                </div>
                                <div class="col-3">
                                    <i class="fas fa-comment"> {{$item -> comment_count}}</i>
                                </div>
                                <div class="col-6">
                                    <div class="fb-like" data-href="new/{{$item -> handle_url}}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                {{--End Content Item--}}
                @endforeach

                {{ $listContent->links() }}

                <div class="row">
                    <a class="btn btn-primary btn-lg btn-block text-white" id="next" >Want more? Click here</a>
                </div>



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
