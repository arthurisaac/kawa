@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">LISTE DES SITES DESSERVIS</h2></div>
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

        <br>
        <br>
        <div class="row">
            <div class="col">
                <form action="#" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group row">
                                <label for="" class="col-sm-5">Date début</label>
                                <input type="date" name="debut" class="form-control col-sm-7">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group row">
                                <label for="" class="col-sm-5">Date fin</label>
                                <input type="date" name="fin" class="form-control col-sm-7">
                            </div>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary btn-sm">Rechercher</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h3 class="text-lg-right">TOTAL SITES DESSERVIS : {{count($siteDepartTournee)}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="text-lg-right">NOMBRE DE TOURNEE : {{count($tournees)}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="text-lg-right">COUT TOUNREE : {{$totalTournee}}</h3>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover" id="table" style="width: 100%">
            <thead>
            <tr>
                <td>N°</td>
                <td>Centre régional</td>
                <td>Centre</td>
                <td>Date</td>
                <td>N° Tournée</td>
                <td>Heure départ</td>
                <td>Site</td>
                <td>Client</td>
                <td>Type op</td>
                <td>Véhicule</td>
                <th>TDF</th>
                <th>Montant TDF</th>
                <th>Caisse</th>
                <th>Montant caisse</th>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($siteDepartTournee as $site)
                <tr>
                    <td style="width: 20px; text-align: center">{{$site->id}}</td>
                    <td>{{$site->tournees->centre_regional ?? "Donnée indisponible"}}</td>
                    <td>{{$site->tournees->centre ?? "Donnée indisponible"}}</td>
                    <td>{{$site->tournees->date ?? "Donnée indisponible"}}</td>
                    <td>{{$site->tournees->numeroTournee ?? "Donnée indisponible"}}</td>
                    <td>{{$site->tournees->heureDepart ?? "Donnée indisponible"}}</td>
                    <td>{{$site->sites->site ?? "Non précisé"}}</td>
                    <td>{{$site->sites->clients->client_nom ?? ""}}</td>
                <td>{{$site->type ?? ""}}</td>
                    <td>{{$site->tournees->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                    <td>
                        @switch($site->tdf)
                            @case('oo_vb_extamuros_bitume')
                            VB extramuros bitume
                            @break
                            @case('oo_vb_extramuros_piste')
                            VB extramuros piste
                            @break
                            @case('oo_vl_extramuros_bitume')
                            VL extramuros bitume
                            @break
                            @case('oo_vl_extramuros_piste')
                            VL extramuros piste
                            @break
                            @case('oo_vb_intramuros')
                            VB intramuros
                            @break
                            @case('oo_vl_intramuros')
                            VL intramuros
                            @break
                            @default
                            RAS

                        @endswitch
                    </td>
                    <td>
                        {{$site->sites["$site->tdf"]}}
                    </td>
                    <td>
                        @switch($site->caisse)
                            @case('oo_mad')
                            MAD
                            @break
                            @case('oo_vb_extramuros_piste')
                            VB extramuros piste
                            @break
                            @case('oo_collecte')
                            Collecte
                            @break
                            @case('oo_cctv')
                            CCTV
                            @break
                            @case('oo_collecte_caisse')
                            Collecte caisse
                            @default
                            RAS

                        @endswitch
                    </td>
                    <td>
                        {{$site->sites["$site->caisse"]}}
                    </td>
                    <td style="width: 70px;">

                        <div>
                            <a href="{{ route('depart-tournee.edit',$site->idTourneeDepart)}}"
                               class="btn btn-primary btn-sm"></a>
                            <button class="btn btn-danger btn-sm" onclick="supprimer('{{$site->id}}', this)"></button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            $(document).ready(function () {
                $('#table').DataTable({
                    "language": {
                        "url": "French.json"
                    },
                    "order": [[0, "desc"]]
                });
            });
        </script>
        <script>
            function supprimer(id, e) {
                if (confirm("Confirmer la suppression?")) {
                    const token = "{{ csrf_token() }}";
                    $.ajax({
                        url: "depart-tournee-item/" + id,
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
                            document.getElementById("table").deleteRow(indexLigne);
                        },
                        error: function (err) {
                            console.error(err.responseJSON.message);
                            alert(err.responseJSON.message ?? "Une erreur s'est produite");
                        }
                    });
                }
            }
        </script>
@endsection
