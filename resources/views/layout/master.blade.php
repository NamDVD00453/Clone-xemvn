<!doctype html>
<html lang="en">
<head>

    @include('layout.head')

</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->
@if(Route::is('index.*') || Route::is('index'))
    @include('layout.header')
@else
    @include('layout.videos-header')
@endif



@yield('content')




<!-- CALL TO ACTION Start
================================================== -->

@include('layout.footer')

{{--@include('includes.script')--}}

@yield('script')

</body>
</html>
