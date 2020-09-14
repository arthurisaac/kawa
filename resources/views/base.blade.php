<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BURVAL</title>
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('magnificpopup/magnific-popup.css') }}">
    <link href="{{ secure_asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/burval.css') }}" rel="stylesheet">

    <script src="{{ secure_asset('js/jquery-1.12.4.min.js') }}"></script>
</head>
<body>
<div>
    @yield('main')
</div>
<script src="{{ secure_asset('js/app.js') }}" type="text/js"></script>
<script src="{{ secure_asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ secure_asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ secure_asset('magnificpopup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ secure_asset('js/wwb15.min.js') }}"></script>
<script src="{{ secure_asset('js/jscookmenu.min.js') }} "></script>
</body>
</html>
