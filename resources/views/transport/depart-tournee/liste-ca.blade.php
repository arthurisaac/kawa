@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Liste chiffre d'affaire</h2></div>
        <br/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
        @endif

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col">
                <h6 class="text-danger">Chiffre d'affaire : <span>{{$totalTournee}}</span></h6>
                <h6 class="text-danger">Nombre de site : <span>{{count($sites)}}</span></h6>
            </div>
            <div class="col"></div>
        </div>
        <br>
        <form action="#" method="get">
            <div class="row">
                <div class="col">

                </div>
            </div>
        </form>

        <br>
        <table id="table" class="table table-bordered table-hover" style="width: 100%">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Centre regional</th>
                <th scope="col">Centre</th>
                <th scope="col">No. Tournée</th>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col">Client</th>
                <th scope="col">Site</th>
                <th scope="col">Op</th>
                <th scope="col">Montant</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sites as $site)
                <tr>
                    <td>{{$site->id}}</td>
                    <td>{{$site->tournees->centre ?? ""}}</td>
                    <td>{{$site->tournees->centre_regional ?? ""}}</td>
                    <td>{{$site->tournees->numeroTournee}}</td>
                    <td>{{$site->tournees->date}}</td>
                    <td>{{$site->tournees->heureDepart}}</td>
                    <td>{{$site->sites->clients->client_nom ?? ""}}</td>
                    <td>{{$site->site ?? ""}}</td>
                    <td>{{$site->type ?? ""}}</td>
                    <td>{{$site->tournees->coutTournee}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
