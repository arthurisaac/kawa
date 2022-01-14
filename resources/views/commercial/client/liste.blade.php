@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Client</h2></div>
        <div><h2 class="heading">Nombre total de sites <sup class="text-success text-lg-center">{{$clients->count()}}</sup> </h2></div>
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
        <form action="{{url('commercial-client-liste')}}" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="client_nom" class="col-4">Client</label>
                        <select name="client_nom" id="client_nom" class="form-control col">
                            <option></option>
                            @foreach ($cn as $client)
                                <option value="{{$client->client_nom}}">{{ $client->client_nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="client_situation_geographique" class="col-4">Situation geographique</label>
                        <select id="client_situation_geographique" name="client_situation_geographique" class="form-control col">
                            <option></option>
                            @foreach ($sg as $client)
                                <option value="{{$client->client_situation_geographique}}">{{ $client->client_situation_geographique }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="contact_nom" class="col-4">Nom de Contact</label>
                        <select id="contact_nom" name="contact_nom" class="form-control col">
                            <option></option>
                            @foreach ($ctn as $client)
                                <option value="{{ $client->contact_nom }}">{{ $client->contact_nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="client_ville" class="col-4">Ville</label>
                        <select id="client_ville" name="client_ville" class="form-control col">
                            <option></option>
                            @foreach ($v as $client)
                                <option value="{{ $client->client_ville }}">{{ $client->client_ville }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label for="secteur_activite" class="col-4">Secteur D'activité</label>
                        <select id="secteur_activite" name="secteur_activite" class="form-control col">
                            <option></option>
                            @foreach ($sa as $client)
                                <option value="{{ $client->secteur_activite}}">{{$client->secteur_activite}}</option>
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
                    <a href="/commercial-client-liste" class="btn btn-info btn-sm">Effacer</a> <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
            <div class="row"></div>
        </form>

        <br/>
        <a href="/commercial-client" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
        <table id="table_client_informations" class="table table-bordered table-hover" style="width: 100%">
            <thead>
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Secteur d'activité</th>
                <th scope="col">Tel</th>
                <th scope="col">Situation géographique</th>
                <th scope="col">Nom contact</th>
                <th scope="col">Ville</th>
                <th scope="col">Mail</th>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{$client->client_nom}}</td>
                    <td>{{$client->secteur ? $client->secteur->secteur_activite : "Pas encore renseigné"}}</td>
                    <td>{{$client->client_tel}}</td>
                    <td>{{$client->client_situation_geographique}}</td>
                    <td>{{$client->contact_nom}}</td>
                    <td>{{$client->client_ville}}</td>
                    <td>{{$client->contact_email}}</td>
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

        {{--<br/>
        <table id="table_client_base_tarifaire" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">TDF VB</th>
                <th scope="col">TDF VL</th>
                <th scope="col">MAD Caisse</th>
                <th scope="col">Collecte</th>
                <th scope="col">Petit matériel Sécuripack</th>
                <th scope="col">Petit matériel Sac jute</th>
                <th scope="col">Petit matériel scellé</th>
                <th scope="col">Garde de fonds C.U</th>
                <th scope="col">Garde de fond M.G</th>
                <th scope="col">Garde de fond C.F</th>
                <th scope="col">Garde de fond Montant gardé</th>
                <th scope="col">Comptage de trie cout unitaire</th>
                <th scope="col">Comptage de trie montant CTV</th>
                <th scope="col">Gestion ATM</th>
                <th scope="col">Maintenance ATM</th>
                <th scope="col">Consommable ATM</th>
            </tr
            </thead>
            <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{$client->base_tdf_vb}}</td>
                    <td>{{$client->base_tdf_vl}}</td>
                    <td>{{$client->base_mad_caisse}}</td>
                    <td>{{$client->base_collecte}}</td>
                    <td>{{$client->base_petit_materiel_securipack}}</td>
                    <td>{{$client->base_petit_materiel_sacjute}}</td>
                    <td>{{$client->base_petit_materiel_scelle}}</td>
                    <td>{{$client->base_garde_de_fonds_cout_unitaire}}</td>
                    <td>{{$client->base_garde_de_fonds_montant_garde_cu}}</td>
                    <td>{{$client->base_garde_de_fonds_cout_forfetaire}}</td>
                    <td>{{$client->base_garde_de_fonds_montant_garde_cf}}</td>
                    <td>{{$client->base_comptage_tri_cout_unitaire}}</td>
                    <td>{{$client->base_comptage_tri_montant_ctv}}</td>
                    <td>{{$client->base_gestion_atm}}</td>
                    <td>{{$client->base_maintenance_atm}}</td>
                    <td>{{$client->base_consommable_atm}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <br/>
        <table id="table_client_base_contrat" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">Contrat</th>
                <!--<th scope="col">Objet VB</th>
                <th scope="col">Objet SI</th>-->
                <th scope="col">Caisse</th>
                <!--<th scope="col">Collecte</th>-->
                <th scope="col">gdf</th>
                <th scope="col">Comptage</th>
                <th scope="col">Gestion ATM</th>
                <th scope="col">Collecte</th>
                <th scope="col">Comptage tri</th>
                <th scope="col">RéGIMEEM</th>
                <th scope="col">dEESSESTBC</th>
                <th scope="col">dESSERTEAP</th>
                <th scope="col">dESSERTAS</th>
                <th scope="col">dESSERTCP</th>
                <th scope="col">FREQUENCEOP</th>
                <th scope="col">DATEFFET</th>
                <th scope="col">Durée</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{$client->contrat_numero}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$client->bt_gestion_atm}}</td>
                    <td>{{$client->bt_collecte}}</td>
                    <td>{{$client->bt_comptage_tri_montant_ctv}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$client->contrat_date_effet}}</td>
                    <td>{{$client->contrat_duree}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>--}}
    </div>
    <script>
        $(document).ready(function () {
            $('#table_client_informations').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            /*$('#table_client_base_contrat').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#table_client_base_tarifaire').DataTable({
                "language": {
                    "url": "French.json"
                }
            });*/
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
