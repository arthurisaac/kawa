<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BURVAL</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('magnificpopup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/burval.css') }}">
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>

</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <br />
            <br />
            <br />
            <div class="card">
                <div class="card-header" style="text-align:center;">
                    <img src="images/logonoir.png" alt="logo" style="max-width: 50%;">
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Compte</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"
                                       name="compte" required autofocus>

                                <span class="invalid-feedback" role="alert">
                                        <strong>message</strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control" name="password"
                                       required autocomplete="current-password">

                                <span class="invalid-feedback" role="alert">
                                        <strong>message</strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                @if(session()->get('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-dark">
                                    Valider
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('magnificpopup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/wwb15.min.js') }}"></script>
<script src="{{ asset('js/jscookmenu.min.js') }}"></script>

</body>
</html>
