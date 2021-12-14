@extends('base')

@section('main')
    <style>
        .dataTables_filter, .dataTables_info { display: none; }
    </style>
    <div class="burval-container">
        <div><h2 class="heading">COLIS ARRIVES TOURNEE</h2></div>
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
                <h6 class="text-secondary">Total tournées: <span class="text-danger">{{count($tournees)}}</span></h6>
            </div>
            <div class="col">
                <h6 class="text-secondary">Total sites: <span class="text-danger">{{count($colisArrivees)}}</span></h6>
            </div>
            <div class="col">
                <h6 class="text-secondary">Nbre total colis: <span class="text-danger">{{$colisArrivees->sum("nbre_colis_arrivee")}}</span></h6>
            </div>
            {{--<div class="col">
                <h6 class="text-secondary">Valeur Colis: <span class="text-danger">{{$colisArrivees->sum("transport_arrivee_valeur_colis")}}</span></h6>
            </div>--}}
        </div>
       {{--<div class="row">
            <div class="col">
                <h6 class="text-secondary">Devise étrangère(dollar): <span class="text-danger">{{$colisArrivees->sum("device_etrangere_dollar_arrivee")}}</span></h6>
            </div>
            <div class="col">
                <h6 class="text-secondary">Devise étrangère(euro): <span class="text-danger">{{$colisArrivees->sum("device_etrangere_euro_arrivee")}}</span></h6>
            </div>
            <div class="col">
                <h6 class="text-secondary">Pierre précieuse(xof): <span class="text-danger">{{$colisArrivees->sum("pierre_precieuse_arrivee")}}</span></h6>
            </div>
            <div class="col"></div>
        </div>--}}
        <div class="row">
            <div class="col">
                {{--<div class="row">
                    <div class="col">
                        <input type="text" id="CustomSearchTextField" class="form-control col-5" />
                    </div>
                </div>--}}
                <form action="#" method="get" style="margin-top: 25px;">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col">Rechercher</label>
                                <input type="text" name="q" id="searchInput" class="form-control col-sm-8">
                            </div>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary btn-sm">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <form action="#" method="get">
                    <div class="row">
                    @csrf
                        <div class="col">
                            <div class="form-group">
                                <label for="">Date début</label>
                                <input type="date" name="debut" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Date fin</label>
                                <input type="date" name="fin" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary btn-sm" style="margin-top: 24px;">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <table class="table table-bordered table-hover" id="table" style="width: 100%">
            <thead>
            <tr>
                <th>N°</th>
                <th>Centre régional</th>
                <th>Centre</th>
                <th>Date</th>
                <th>Site</th>
                <th>Client</th>
                <th>Type</th>
                <th>Bordereau</th>
                <th>N° Tournée</th>
                <th>Valeur colis</th>
                <th>Devise</th>
                <th>Nombre de colis</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($colisArrivees as $colis)
                <tr>
                    <td>{{$colis->id}}</td>
                    <td>{{$colis->tournees->centre_regional ?? ''}}</td>
                    <td>{{$colis->tournees->centre ?? ''}}</td>
                    <td>{{$colis->tournees->date ?? ''}}</td>
                    <td>{{$colis->sites->site ?? ''}}</td>
                    <td>{{$colis->sites->clients->client_nom ?? ''}}</td>
                    <td>{{$colis->type ?? ''}}</td>
                    <td>{{$colis->bordereau ?? ''}}</td>
                    <td>{{$colis->tournees->numeroTournee ?? ''}}</td>
                    <td>{{$colis->transport_arrivee_valeur_colis}}</td>
                    <td>{{$colis->transport_arrivee_devise}}</td>
                    <td>{{$colis->nbre_colis_arrivee}}</td>
                    <td><a href="{{ route('arrivee-tournee.edit',$colis->idTourneeDepart)}}" class="btn btn-primary btn-sm"></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            $(document).ready(function () {
                //let oTable = $('#table').DataTable({
                $('#table').DataTable({
                    "language": {
                        "url": "French.json"
                    },
                    "order": [[0, "desc"]]
                });
                /*$('#CustomSearchTextField').keyup(function(){
                    oTable.search($(this).val()).draw() ;
                })*/
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
