<style>
    .limit-text {
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 15px;
        max-height: 30px;
        font-size: 14px;
        font-weight: bold;
    }

    .suggest-tab-anchor {
        color: black;
        text-decoration: none;
    }
    .suggest-tab-anchor:hover {
        color: #cb1c6b;
    }
    .suggest-tab-thumb {
        max-height: 80px;
    }
</style>

<div class="card w-100 mt-2">
    <div class="card-body" style="background: rgba(0,0,0,.03)">
        <h5 class="card-title">Ảnh mới</h5>
        @foreach($suggestNewImg as $sni)
            <a href="{{'/new/'.$sni->handle_url}}" class="suggest-tab-anchor">
                <div class="row mt-2">
                    <div class="col-5">
                        <img src="{{$sni->thumbnail}}" class="w-100 suggest-tab-thumb" alt="{{$sni->title}}">
                    </div>
                    <div class="col-7">
                        <p class="limit-text line-3 mb-1">{{$sni->title}}</p>
                        <div class="mt-1" style="font-size: 12px">
                            <i class="fas fa-eye"></i>
                            9
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

<div class="card w-100 mt-2">
    <div class="card-body" style="background: rgba(0,0,0,.03)">
        <h5 class="card-title">Video hot</h5>
        @foreach($suggestHotVideo as $shv)
            <a href="{{'/videos/'.$shv->handle_url}}" class="suggest-tab-anchor">
                <div class="row mt-2">
                    <div class="col-5">
                        <img src="{{$shv->thumbnail}}" class="w-100 suggest-tab-thumb" alt="{{$shv->title}}">
                    </div>
                    <div class="col-7">
                        <p class="limit-text line-3 mb-1">{{$shv->title}}</p>
                        <div class="mt-1" style="font-size: 12px">
                            <i class="fas fa-eye"></i>
                            9
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

<div class="card w-100 mt-2">
    <div class="card-body" style="background: rgba(0,0,0,.03)">
        <h5 class="card-title">Có thể bạn sẽ thích</h5>
        @foreach($suggestRandom as $sr)
            @php $collection_url = ''; @endphp
            @switch($sr->type)
                @case(1)
                    @php $collection_url = 'videos'; @endphp
                    @break
                @case(2)
                    @php $collection_url = 'new'; @endphp
                    @break
                @default
                    @php $collection_url = 'new'; @endphp
                    @break
            @endswitch
            <a href="{{'/'.$collection_url.'/'.$sr->handle_url}}" class="suggest-tab-anchor">
                <div class="row mt-2">
                    <div class="col-5">
                        <img src="{{$sr->thumbnail}}" class="w-100 suggest-tab-thumb" alt="{{$sr->title}}">
                    </div>
                    <div class="col-7">
                        <p class="limit-text line-3 mb-1">{{$sr->title}}</p>
                        <div class="mt-1" style="font-size: 12px">
                            <i class="fas fa-eye"></i>
                            9
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
