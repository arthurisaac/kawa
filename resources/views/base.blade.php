<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BURVAL</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="magnificpopup/magnific-popup.css">
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/burval.css" rel="stylesheet">
    <script src="js/jquery-1.12.4.min.js"></script>

</head>
<body>
<div>
    @yield('main')
</div>
<script src="js/app.js" type="text/js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="magnificpopup/jquery.magnific-popup.min.js"></script>
<script src="js/wwb15.min.js"></script>
<script src="js/jscookmenu.min.js"></script>
</body>
</html>
