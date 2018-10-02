<!doctype html>
<html lang="en">
<head>

    @include('layout.head')

</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->

@include('layout.header')


@yield('content')




<!-- CALL TO ACTION Start
================================================== -->

@include('layout.footer')

{{--@include('includes.script')--}}

@yield('script')

</body>
</html>