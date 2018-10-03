<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item {{Route::is('videos.new') ? 'active' : ''}}">
                    <a class="nav-link" href="/videos">Mới
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item {{Route::is('videos.hot') ? 'active' : ''}}">
                    <a class="nav-link" href="/videos/hot">Hot</a>
                </li>
                <li class="nav-item {{Route::is('videos.old') ? 'active' : ''}}">
                    <a class="nav-link" href="/videos/old">Cũ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
