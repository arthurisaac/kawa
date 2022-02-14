@extends('bases.commercial')

@section('main')
    @extends('bases.toolbar', ["title" => "Commercial", "subTitle" => "Client Liste"])
@section("nouveau")
    <a href="/commercial-client" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
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

        <br>
        <br>
        <table id="table_client_informations" class="table table-bordered table-hover" style="width: 100%">
            <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
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
