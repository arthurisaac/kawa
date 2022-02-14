@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Colis Départ tournée"])
    <style>
        .dataTables_filter, .dataTables_info {
            display: none;
        }
    </style>
    <div class="burval-container">
        <div><h2 class="heading">COLIS DEPART TOURNEE</h2></div>
        <br/>
        <div class="titre">
            <span>Total site</span> : <span class="text-danger">{{count($colisArrivees)}}</span>
            <span>Colis</span> : <span id="valeur_colis" class="text-danger">{{$colisArrivees->sum("regulation_arrivee_valeur_colis")}}</span>
            <span style="margin-left: 10px;">Nombre de colis : <span class="text-danger">{{$colisArrivees->sum("nbre_colis_arrivee")}}</span></span>
        </div>
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
                <div class="col">
                    <div class="form-group row">
                        <label for="nature" class="col-5">Nature</label>
                        <select name="nature" id="nature" class="form-control col-sm-7">
                            <option>{{$nature}}</option>
                            <option>retour de cession</option>
                            <option>tri</option>
                            <option>transite</option>
                            <option>approvisionnement</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="devise" class="col-5">Devise</label>
                        <select name="devise" id="devise" class="form-control col-sm-7">
                            <option>{{$devise}}</option>
                            @foreach($devises as $device)
                                <option>{{$devise}}</option>
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
                    <a href="/regulation-arrivee-colis" class="btn btn-info btn-sm">Effacer</a> <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover" id="table" style="width: 100%">
        <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
            <th>N°</th>
            <th>Centre régional</th>
            <th>Centre</th>
            <th>Date</th>
            <th>Site</th>
            <th>Client</th>
            <th>Type</th>
            <th>Nature</th>
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
                <td>{{$colis->nature ?? ''}}</td>
                <td>{{$colis->regulation_arrivee_valeur_colis}}</td>
                <td>{{$colis->regulation_arrivee_devise}}</td>
                <td>{{$colis->tournees->numeroTournee ?? ''}}</td>
                <td>{{$colis->bordereau ?? ''}}</td>
                <td>{{$colis->nbre_colis_arrivee}}</td>
                <td><a href="{{ route('regulation-depart-tournee.edit',$colis->idTourneeDepart)}}"
                       class="btn btn-primary btn-sm"></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        let sites = {!! json_encode($sites_com) !!};
        let clients = {!! json_encode($clients) !!};
        $(document).ready(function () {
            $('#table').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [[0, "desc"]]
            });

            const valeur_colis = $("#valeur_colis");
            const valeur_colis_parsed = parseFloat(valeur_colis.html() ?? 0);
            valeur_colis.html(Number(valeur_colis_parsed).toLocaleString());

            const siteInput = $("#site");
            if (siteInput.val()) {
                const site = sites.find(s => s.id === parseInt(siteInput.val() ?? 0));
                if (site) $("select[name='site'] option[value="+ site?.id +"]").attr('selected','selected');
            }
            const clientInput = $("#client");
            if (clientInput.val()) {
                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
                if (client) $("select[name='client'] option[value="+ client?.id +"]").attr('selected','selected');
            }
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
