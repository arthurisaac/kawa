@extends('base')

@section('main')
    {{--<style>
        .dataTables_filter, .dataTables_info { display: none; }
    </style>--}}
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
                <div class="row">
                    <div class="col">
                        <h6 class="text-secondary">Total sites: {{count($colisArrivees)}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-secondary">Total tournées: {{count($tournees)}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-secondary">Valeur Colis (XOF): {{$colisArrivees->sum("valeur_colis_xof_arrivee")}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-secondary">Devise étrangère(dollar): {{$colisArrivees->sum("device_etrangere_dollar_arrivee")}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-secondary">Devise étrangère(euro): {{$colisArrivees->sum("device_etrangere_euro_arrivee")}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-secondary">Pierre précieuse(xof): {{$colisArrivees->sum("pierre_precieuse_arrivee")}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-secondary">Nbre total colis: {{$colisArrivees->sum("nbre_colis_arrivee")}}</h6>
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
                <th>Colis</th>
                <th>Bordereau</th>
                <th>N° Tournée</th>
                <th>colis (XOF)</th>
                <th>Devise Dollar</th>
                <th>Devise Euro</th>
                <th>Pierre précieuse (XOF)</th>
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
                    <td>{{$colis->bordereau ?? ''}}</td>
                    <td>{{$colis->tournees->numeroTournee ?? ''}}</td>
                    <td>{{$colis->valeur_colis_xof_arrivee}}</td>
                    <td>{{$colis->device_etrangere_dollar_arrivee}}</td>
                    <td>{{$colis->device_etrangere_euro_arrivee}}</td>
                    <td>{{$colis->pierre_precieuse_arrivee}}</td>
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
