<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BURVAL</title>
    @if(parse_url(url('/'), PHP_URL_SCHEME) == 'HTTPS')
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('magnificpopup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/burval.css') }}">
    <script src="{{ secure_asset('js/jquery-1.12.4.min.js') }}"></script>
    @else
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('magnificpopup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/burval.css') }}">
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
    @endif

</head>
<body>
<div>
    @yield('main')
</div>
@if(parse_url(url('/'), PHP_URL_SCHEME) == 'HTTPS')
<script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>
<script src="{{ secure_asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ secure_asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ secure_asset('magnificpopup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ secure_asset('js/wwb15.min.js') }}"></script>
<script src="{{ secure_asset('js/jscookmenu.min.js') }}"></script>
@else
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('magnificpopup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/wwb15.min.js') }}"></script>
<script src="{{ asset('js/jscookmenu.min.js') }}"></script>
@endif

</body>
</html>
