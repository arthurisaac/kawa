@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée colis</h2></div>
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
                    <span class="titre">TOTAL VALEUR COLIS</span> : <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="titre">
            <div class="row">
                <div class="col">
                    <span class="titre">TOTAL COLIS</span> : <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <br/>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="devise" class="col-5">Devise</label>
                        <select name="devise" id="devise" class="form-control col">
                            <option></option>
                            @foreach ($devises as $devise)
                                <option>{{$devise->devise}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre_regional" class="col-5">Valeur Colis</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col">
                            <option></option>
                            @foreach ($sites as $valeur)
                                <option value="{{$valeur->caisse_entree_valeur_colis}}">{{$valeur->caisse_entree_valeur_colis}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="scelle" class="col-5">Numéros scelles</label>
                        <select id="scelle" name="scelle" class="form-control col">
                            <option></option>
                            @foreach ($sites as $scelle)
                                <option>{{$scelle->scelle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="secteur_activite" class="col-5">Nombre total de colis</label>
                        <select id="secteur_activite" name="secteur_activite" class="form-control col">
{{--                            <option></option>--}}
{{--                            @foreach ($secteur_activites as $secteur_activite)--}}
{{--                                <option>{{ $secteur_activite->option }}</option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="site" class="col-5">Site</label>
                        <select id="site" name="site" class="form-control col">
                            <option></option>
                            @foreach ($sites as $site)
                                <option value="{{$site->site}}">{{$site->sites->site}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="secteur_activite" class="col-5">Client</label>
                        <select id="secteur_activite" name="secteur_activite" class="form-control col">
                            {{--                            <option></option>--}}
                            {{--                            @foreach ($secteur_activites as $secteur_activite)--}}
                            {{--                                <option>{{ $secteur_activite->option }}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/caisse-entree-colis-liste-detaillee" class="btn btn-info btn-sm">Effacer</a>
                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <br>
        <table id="table_client_informations" class="table table-bordered table-hover" style="width: 100%">
            <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Date</th>
                <th scope="col">Centre régional</th>
                <th scope="col">Centre</th>
                <th scope="col">Colis</th>
                <th scope="col">Devise</th>
                <th scope="col">Valeur de Colis</th>
                <th scope="col">Numéro scelle</th>
                <th scope="col">Nombre Total de colis</th>
                <th scope="col">Site</th>
                <th scope="col">Client</th>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($colis as $coli)
                <tr>
                    <td>{{$coli->id}}</td>
                    <td>{{$coli->date}}</td>
                    <td>{{$coli->centre}}</td>
                    <td>{{$coli->centre_regional}}</td>
                    <td>{{$coli->colis}}</td>
{{--                    <td>{{$coli->items->caisse_entree_devise}}</td>--}}
{{--                    <td>{{$coli->items->caisse_entree_valeur_colis}}</td>--}}
{{--                    <td>{{$coli->items->scelle}}</td>--}}
{{--                    <td>{{$coli->items->sum('nbre_colis')}}</td>--}}
{{--                    <td>{{$coli->items->site}}</td>--}}
{{--                    <td>{{$coli->items->items->sites->clients->client_nom}}</td>--}}
                    <td>
                        <div style="width: 110px;">
                            <a href="{{ route('caisse-entree-colis.edit', $coli->id)}}"
                               class="btn btn-primary btn-sm"></a>
                            <a class="btn btn-danger btn-sm" type="submit"
                               onclick="supprimer({{$coli->id}}, this)"></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
{{--    <script>--}}
{{--        let sites = {!! json_encode($sites_com) !!};--}}
{{--        let clients = {!! json_encode($clients_com) !!};--}}
{{--        $(document).ready(function () {--}}
{{--            $('#table_client_informations').DataTable({--}}
{{--                "language": {--}}
{{--                    "url": "French.json"--}}
{{--                }--}}
{{--            });--}}

{{--            const siteInput = $("#site");--}}
{{--            if (siteInput.val()) {--}}
{{--                const site = sites.find(s => s.id === parseInt(siteInput.val() ?? 0));--}}
{{--                if (site) $("select[name='site'] option[value="+ site?.id +"]").attr('selected','selected');--}}
{{--            }--}}
{{--            const clientInput = $("#client");--}}
{{--            if (clientInput.val()) {--}}
{{--                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));--}}
{{--                if (client) $("select[name='client'] option[value="+ client?.id +"]").attr('selected','selected');--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "caisse-entree-colis/" + id,
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
