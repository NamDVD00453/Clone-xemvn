<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="#">Home--}}
                        {{--<span class="sr-only">(current)</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item {{Route::is('index') ? 'active' : ''}}">
                    <a class="nav-link" href="/">Mới</a>
                </li>
                <li class="nav-item {{Route::is('index.old') ? 'active' : ''}}">
                    <a class="nav-link" href="/old">Cũ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/videos">Video</a>
                </li>
                <li class="nav-item {{Route::is('index.hot') ? 'active' : ''}}">
                    <a class="nav-link" href="/hot">Hot</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
