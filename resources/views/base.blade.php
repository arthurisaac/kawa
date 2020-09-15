<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BURVAL</title>
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('magnificpopup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/burval.css') }}">
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>

</head>
<body>
<div>
    @yield('main')
</div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('magnificpopup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/wwb15.min.js') }}"></script>
<script src="{{ asset('js/jscookmenu.min.js') }}"></script>
</body>
</html>
