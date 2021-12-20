@extends('base')

@section('main')
    <style>
        .dataTables_filter, .dataTables_info { display: none; }
    </style>
    <div class="burval-container">
        <div><h2 class="heading">COLIS ARRIVES TOURNEE</h2></div>
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
                <div class="form-group row">
                    <label for="total_sites" class="col-5"><h6 class="text-secondary">Total sites:</h6></label>
                    <input id="total_sites" name="total_sites" class="form-control col-7" value="{{count($colisArrivees)}}" readonly>
                </div>
            </div>

            <div class="col">
                <div class="form-group row">
                   <label for="total_tournees" class="col-5"><h6 class="text-secondary">Total tournées:</h6></label>
                    <input id="total_tournees" name="total_tournees" class="form-control col-7" value="{{count($tournees)}}" readonly>
                </div>
            </div>

            <div class="col">
                <div class="form-group row">
                    <label for="colis" class="col-5"><h6 class="text-secondary">Colis: </h6></label>
                    <input id="colis" name="colis" class="form-control col-7" value="{{$colisArrivees->sum("valeur_colis_xof_arrivee")}}" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="total_tournees" class="col-5"><h6 class="text-secondary">Valeur Colis: </h6></label>
                    <input id="total_tournees" name="total_tournees" class="form-control col-7" value="{{$colisArrivees->sum("device_etrangere_dollar_arrivee")}}" readonly>
                </div>
            </div>

            <div class="col">
                <div class="form-group row">
                    <label for="devise_etrangere_colis" class="col-5"><h6 class="text-secondary">Devis numéro bordereau: </h6></label>
                    <input id="devise_etrangere_colis" name="devise_etrangere_colis" class="form-control col-7" value="{{$colisArrivees->sum("device_etrangere_euro_arrivee")}}" readonly>
                </div>
            </div>
            <div class="col">
                    <div class="form-group row">
                        <label for="nbre_total_colis" class="col-5"><h6 class="text-secondary">Nbre total colis:</h6></label>
                        <input id="nbre_total_colis" name="nbre_total_colis" class="form-control col-7" value="{{$colisArrivees->sum("nbre_colis_arrivee")}}">
                    </div>
                </div>
                {{--<div class="row">
                    <div class="col">
                        <input type="text" id="CustomSearchTextField" class="form-control col-5" />
                    </div>
                </div>--}}
            </div>
            <div class="col">

                <form action="#" method="get">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="debut" class="col-5"><h6 class="text-secondary">Date début</h6></label>
                                <input id="debut" name="debut" class="form-control col-7" type="date">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group row">
                                <label for="fin" class="col-5"><h6 class="text-secondary">Date fin</h6></label>
                                <input id="fin" name="fin" class="form-control col-7" type="date">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="" class="col-5"><h6 class="text-secondary"></h6></label>
                                <button class="btn btn-primary btn-sm col-7">Rechercher</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <br>

        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col"></div>
                <div class="col-4">
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
                <th>Colis</th>
                <th>Valeur Colis</th>
                <th>Dévise</th>
                <th>N° Tournée</th>
                <th>Bordereau</th>
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
                    <td>{{$colis->colis ?? ''}}</td>
                    <td>{{$colis->regulation_arrivee_valeur_colis}}</td>
                    <td>{{$colis->regulation_arrivee_devise}}</td>
                    <td>{{$colis->tournees->numeroTournee ?? ''}}</td>
                    <td>{{$colis->bordereau ?? ''}}</td>
                    <td>{{$colis->nbre_colis_arrivee}}</td>
                    <td><a href="{{ route('regulation-arrivee-tournee.edit',$colis->idTourneeDepart)}}" class="btn btn-primary btn-sm"></a></td>
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
