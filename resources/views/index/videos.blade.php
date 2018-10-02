@extends ('layout.master')

@section('content')
    <div class="container" style="margin-top: 50px">

        <div class="row">

            <div class="col-lg-9">

                @foreach($listContent as $key =>$item)

                    {{--Content Item--}}

                    <div class="row">

                        <div class="col-lg-7">
                            <a class="card mt-4" href="videos/{{$item -> handle_url}}">
                                <img class="card-img-top img-fluid" src="{{$item -> thumbnail}}" alt="" >
                            </a>
                        </div>

                        <div class="col-lg-5">
                            <div class="card-body">
                                <a href="videos/{{$item -> handle_url}}">
                                    <h5 class="card-title">{{$item -> title}}</h5>
                                </a>
                                <h6>Publish from: 01/01/2018</h6>
                            </div>
                        </div>

                    </div>

                    <hr>

                    {{--End Content Item--}}

                @endforeach

                    {{ $listContent->links() }}

                <div class="row mt-4">
                    <a class="btn btn-primary btn-lg btn-block text-white">Want more? Click here</a>
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

@stop
