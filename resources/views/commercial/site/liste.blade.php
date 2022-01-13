@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Site</h2></div>
        <div><h2 class="heading">Nombre total de site {{$sites->count()}}</h2> </div>
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
        <form action="{{url('commercial-site-liste')}}" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-5">Centre</label>
                        <select name="centre" id="centre" class="form-control col">
                            <option></option>
                            @foreach ($sites as $centre)
                                <option value="{{$centre->centre}}">{{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre_regional" class="col-5">Centre regional</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col">
                            <option></option>
                            @foreach ($sites as $centre_regional)
                                <option value="{{$centre_regional->centre_regional}}">{{ $centre_regional->centre_regional }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="client" class="col-5">Clients</label>
                        <select id="client" name="client" class="form-control col">
                            <option></option>
                            @foreach ($sites as $client)
                                <option value="{{$client->id}}">{{ $client->clients->client_nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="site" class="col-5">Site</label>
                        <select id="site" name="site" class="form-control col">
                            <option></option>
                            @foreach ($sites as $site)
                                <option value="{{$site->id}}">{{ $site->site }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/commercial-site-liste" class="btn btn-info btn-sm">Effacer</a> <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
            <div class="row"></div>
        </form>
        <br/>
        <a href="/commercial-site" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>

        <table id="table_client_information" class="table table-bordered table-hover" style="width: 100%;">
            <thead>
            <tr>
                <td>Client</td>
                <td>Site</td>
                <td>Centre</td>
                <td>Centre régional</td>
                <td>Téléphone</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($sites as $site)
                <tr>
                    <td>{{$site->clients->client_nom ?? "Client inexistant"}}</td>
                    <td>{{$site->site}}</td>
                    <td>{{$site->centre}}</td>
                    <td>{{$site->centre_regional}}</td>
                    <td>{{$site->telephone}}</td>
                    <td>
                        <a href="{{ route('commercial-site.edit', $site->id)}}" class="btn btn-primary btn-sm"></a>
                        <a onclick="supprimer('{{$site->id}}', this)" class="btn btn-danger btn-sm" type="submit"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <br/>
        {{--<table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td>TDF VL</td>
                    <td>MAD Caisse</td>
                    <td>Collecte</td>
                    <td>Garde de&nbsp; fonds</td>
                    <td>Comptage + Tri</td>
                    <td>Gestion ATM</td>
                    <td>Maintenance ATM</td>
                    <td>Consommable ATM</td>
                    <td>Tarif(HT)</td>
                    <td>Km bitume</td>
                    <td>Km piste</td>
                    <td>Centre</td>
                </tr>
            </thead>
            <tbody>
            @foreach ($sites as $site)
                <tr>
                    <td>{{$site->tarif_tdf_vl}}</td>
                    <td>{{$site->forfait_mensuel_mad}}</td>
                    <td>{{$site->tarif_collecte_caissiere}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>--}}

        <br/>
        {{--<table class="table table-bordered table-hover">
            <thead>
            <tr>
                <td>Centre Abidjan Nord</td>
                <td>Centre Abidjan Sud</td>
                <td>Centre Abengourou</td>
                <td>Centre de Yamoussokro</td>
                <td>Centre de Bouak&eacute;</td>
                <td>Centre de Korogo</td>
                <td>Centre de Man</td>
                <td>Centre de Daloa</td>
                <td>Centre de San Pedro</td>
                <td>Fonction du conact</td>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>--}}
    </div>
    <script>
        $(document).ready(function () {
            $('#table_client_information').DataTable({
                "language": {
                    "url": "../French.json"
                }
            });
        });
    </script>

    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "commercial-site/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("table_client_information").deleteRow(indexLigne);
                    },
                    error: function (xhr) {
                        alert("Une erreur s'est produite");
                    }
                }).done(function () {
                    // TODO hide loader
                });


            }

        }
    </script>
@endsection
