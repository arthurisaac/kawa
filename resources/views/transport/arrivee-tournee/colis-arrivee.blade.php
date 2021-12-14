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

        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-5">Centre Régional</label>
                        <select name="centre" id="centre" class="form-control col">
                            <option>{{$centre}}</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">{{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre_regional" class="col-5">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col">
                            <option>{{$centre_regional}}</option>
                            @foreach ($centres_regionaux as $centre)
                                <option value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="client" class="col-5">Clients</label>
                        <select id="client" name="client" class="form-control col">
                            <option>{{$client}}</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{ $client->client_nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="site" class="col-5">Site</label>
                        <select id="site" name="site" class="form-control col">
                            <option>{{$site}}</option>
                            @foreach ($sites_com as $site)
                                <option value="{{$site->id}}">{{ $site->site }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-7" value="{{$debut}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col-sm-7" value="{{$fin}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/colis-arrivee-liste" class="btn btn-info btn-sm">Effacer</a> <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
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
