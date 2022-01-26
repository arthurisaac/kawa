@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée colis détaillée</h2></div>
        <br/>
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
        <a href="/caisse-sortie-colis" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
        <div class="titre">
            <div class="row">
                <div class="col">
                    <span class="titre">TOTAL COLIS</span> : <span class="text-danger">{{count($colis)}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="titre">TOTAL VALEUR COLIS</span> : <span class="text-danger">{{$colis->sum("valeur")}}</span>
                </div>
            </div>
        </div>
        <br/>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="client" class="col-5">Clients</label>
                        <select id="client" name="client" class="form-control col">
                            <option>{{$client}}</option>
                            @foreach ($clients_com as $client)
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
                <div class="col">
                    <div class="form-group row">
                        <label for="remettant" class="col-5">Remettant</label>
                        <input type="text" id="remettant" name="remettant" class="form-control col" value="{{$remettant}}" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="scelle" class="col-5">Numéro scellé</label>
                        <input type="text" id="scelle" name="scelle" class="form-control col" value="{{$scelle}}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/caisse-entree-colis-liste-detaillee" class="btn btn-info btn-sm">Effacer</a>
                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Site</th>
                        <th>Nbre colis</th>
                        <th>Remettant</th>
                        <th>Scelle</th>
                        <th>Valeur colis</th>
                        <th>No Tournee</th>
                        <th>Equipage</th>
                        <td style="width: 50px;">Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($colis as $coli)
                        <tr>
                            <td>{{$coli->id}}</td>
                            <td>{{$coli->caisses->tournees->date ?? ""}}</td>
                            <td>{{$coli->sites->site ?? ""}}</td>
                            <td>{{$coli->sites->clients->client_nom ?? ""}}</td>
                            <td>{{$coli->nbre_colis}}</td>
                            <td>{{$coli->caisses->remettant}}</td>
                            <td>{{$coli->scelle}}</td>
                            <td>{{$coli->valeur}}</td>
                            <td>{{$coli->caisses->tournees->numeroTournee ?? ""}}</td>
                            <td>{{$coli->caisses->tournees->chefDeBords->nomPrenoms ?? ""}} //
                                {{$coli->caisses->tournees->agentDeGardes->nomPrenoms ?? ""}} //
                                {{$coli->caisses->tournees->chauffeurs->nomPrenoms ?? ""}} //</td>
                            <td>
                                <a href="{{ route('caisse-entree-colis.edit',$coli->caisses->id ?? 0)}}" class="btn btn-primary btn-sm"></a>
                                <a class="btn btn-danger btn-sm" onclick="supprimer('{{$coli->caisses->id}}', this)"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        let sites = {!! json_encode($sites_com) !!};
        let clients = {!! json_encode($clients_com) !!};
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [[ 0, "desc" ]]
            });

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
                    url: "caisse-sortie-colis/" + id,
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
                        document.getElementById("liste").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });


            }

        }
    </script>
@endsection
