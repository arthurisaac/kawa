@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Site</h2></div>
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
