@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Client</h2></div>
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

        <a href="/commercial-client" class="btn btn-info btn-sm">Nouveau</a>
        <br><br>
        <div class="titre">
            <div class="row">
                <div class="col">
                    <span class="titre">TOTAL CLIENTS</span> : <span class="text-danger">{{count($clients)}}</span>
                </div>
            </div>
        </div>
        <br/>
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
                        <label for="secteur_activite" class="col-5">Secteur d'activite</label>
                        <select id="secteur_activite" name="secteur_activite" class="form-control col">
                            <option></option>
                            @foreach ($secteur_activites as $secteur_activite)
                                <option>{{ $secteur_activite->option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="secteur_activite" class="col-5">Secteur activité</label>
                        <select name="secteur_activite" id="secteur_activite" class="form-control col">
                            <option>{{$secteur_activite}}</option>
                            @foreach ($secteur_activites as $secteur_activite)
                                <option>{{ $secteur_activite->option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/commercial-client-liste-detaillee" class="btn btn-info btn-sm">Effacer</a>
                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <br>
        <table id="table_client_informations" class="table table-bordered table-hover" style="width: 100%">
            <thead>
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Tel</th>
                <th scope="col">Situation géographique</th>
                <th scope="col">Nom contact</th>
                <th scope="col">Ville</th>
                <th scope="col">Mail</th>
                <th scope="col">Secteur activité</th>
                <th scope="col">Centre régional</th>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{$client->client_nom}}</td>
                    <td>{{$client->client_tel}}</td>
                    <td>{{$client->client_situation_geographique}}</td>
                    <td>{{$client->contact_nom}}</td>
                    <td>{{$client->client_ville}}</td>
                    <td>{{$client->contact_email}}</td>
                    <td>{{$client->client_secteur_activite}}</td>
                    <td>{{$client->centre_regional}}</td>
                    <td>
                        <div style="width: 110px;">
                            <a href="{{ route('commercial-client.edit', $client->id)}}"
                               class="btn btn-primary btn-sm"></a>
                            <a class="btn btn-danger btn-sm" type="submit"
                               onclick="supprimer({{$client->id}}, this)"></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <script>
        let sites = {!! json_encode($sites_com) !!};
        let clients = {!! json_encode($clients_com) !!};
        $(document).ready(function () {
            $('#table_client_informations').DataTable({
                "language": {
                    "url": "French.json"
                }
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
                    url: "commercial-client/" + id,
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
                        document.getElementById("table_client_informations").deleteRow(indexLigne);
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
