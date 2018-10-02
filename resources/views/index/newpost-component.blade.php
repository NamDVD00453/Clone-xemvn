@foreach($newPost as $ni)
    <div class="col-md-3 col-sm-4 mt-2">
        <a href="/videos/{{$ni -> handle_url}}" class="thumbnail-url" title="{{$ni->title}}">
            <img src="{{$ni -> thumbnail}}" class="w-100" alt="{{$ni->title}}">
            <p class="limit-text">{{$ni -> title}}</p>
            <span>
                                                <i class="fas fa-eye"></i>
                {{$ni -> seen_count}}
                                            </span>
        </a>
    </div>
@endforeach
