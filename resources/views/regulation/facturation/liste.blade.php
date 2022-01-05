@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Facturation</h2></div>
        <br/>
        <div class="titre"><span class="titre">Montant total facturé</span> : <span id="chiffreAffaire" class="text-danger">{{$regulations->sum("montantTotal")}}</span></div>
        <br/>
        <a href="/regulation-facturation" class="btn btn-primary btn-sm">Nouvelle facture</a>
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
                        <label for="client" class="col-5">Client</label>
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
                <div class="col"></div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="libelle" class="col-5">Libelle</label>
                        <select class="form-control col" name="libelle" id="libelle">
                            <option>{{$libelle}}</option>
                            <option>Securipack grand</option>
                            <option>Securipack moyen</option>
                            <option>Securipack petit</option>
                            <option>Sacs jutes grand</option>
                            <option>Sacs jutes moyen</option>
                            <option>Sacs jutes petit</option>
                            <option>Scellé</option>
                        </select>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/regulation-facturation-liste" class="btn btn-info btn-sm">Effacer</a> <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>

        <br/>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Centre régional</td>
                        <td>Centre</td>
                        <td>DATE Fact</td>
                        <td>Type Facture</td>
                        <td>Client</td>
                        <td>Montant total</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($regulations as $regulation)
                        <tr>
                            <td>{{$regulation->date}}</td>
                            <td>{{$regulation->centre_regional}}</td>
                            <td>{{$regulation->centre}}</td>
                            <td>{{$regulation->date}}</td>
                            <td>{{$regulation->type}}</td>
                            <td>{{$regulation->clients->client_nom ?? "Donnee indisponibl"}}</td>
                            <td>{{$regulation->montantTotal}}</td>
                            <td>
                                <a href="{{ route('regulation-facturation.edit',$regulation->id)}}"
                                   class="btn btn-primary btn-sm"></a>
                                <a class="btn btn-danger btn-sm"
                                        onclick="supprimer('{{$regulation->id}}', this)"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        let clients = {!! json_encode($clients) !!};
        let sites = {!! json_encode($sites_com) !!};

        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });

            const clientInput = $("#client");
            if (clientInput.val()) {
                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
                if (client) $("select[name='client'] option[value="+ client?.id +"]").attr('selected','selected');
            }
            const siteInput = $("#site");
            if (siteInput.val()) {
                const site = sites.find(s => s.id === parseInt(siteInput.val() ?? 0));
                if (site) $("select[name='site'] option[value="+ site?.id +"]").attr('selected','selected');
            }
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "regulation-facturation/" + id,
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
