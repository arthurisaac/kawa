@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Modification Régulation arrivée tournée"])
    <div class="burval-container">
        <div><h2 class="heading">Régulation arrivée tournée</h2></div>
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


        <form action="{{ route('regulation-arrivee-tournee.update', $tournee->id) }}" id="target" method="post">
            @csrf
            @method("PATCH")
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4">Date départ</label>
                            <input type="text" name="date" id="date" value="{{$tournee->date}}"
                                   class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="heure" class="col-sm-4">Heure départ</label>
                            <input type="text" name="heure" id="heure" value="{{$tournee->heure}}"
                                   class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group row">
                            <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                            <input type="text" class="form-control col-sm-8" name="noTournee" id="noTournee"
                                   value="{{$tournee->numeroTournee}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Véhicule</label>
                            <input class="form-control col-sm-8" name="vehicule" id="vehicule"
                                   value="{{$tournee->vehicules->immatriculation?? "Donnée indisponible"}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Chauffeur:</label>
                            <input class="form-control col-sm-8" name="chauffeur" id="chauffeur"
                                   value="{{$tournee->chauffeurs->nomPrenoms ?? "Données indisponible"}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Agent garde</label>
                            <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde"
                                   value="{{$tournee->agentDeGarde->nomPrenoms ?? "Données indisponible"}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Chef de bord</label>
                            <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord"
                                   value="{{$tournee->chefDeBords->nomPrenoms ?? "Données indisponible"}}" readonly/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre" class="col-sm-4">Centre régional</label>
                            <input name="centre" id="centre" class="form-control col-sm-8" value="{{$tournee->centre}}"
                                   readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre_regional" class="col-sm-4">Centre</label>
                            <input id="centre_regional" name="centre_regional" class="form-control col-sm-8"
                                   value="{{$tournee->centre}}" readonly/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="container-fluid">
                <br>
                <br>
                <table class="table table-bordered" id="tableSite">
                    <thead>
                    <tr>
                        <th>Site</th>
                        <th>Client</th>
                        <th>Colis</th>
                        <th>Devise</th>
                        <th>Valeur colis</th>
                        <th>Numéro</th>
                        <th>Nombre total colis</th>
                        <th>Nature</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sitesItems as $site)
                        <tr>
                            <td>
                                <select name="site[]" class="form-control">
                                    <option value="{{$site->site}}">{{$site->sites->site ?? ""}}</option>
                                    @foreach($sites as $s)
                                        <option value="{{$s->id}}">{{$s->site}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="site_id[]" value="{{$site->id}}">
                            </td>
                            <td><input type="text" name="client[]" value="{{$site->sites->clients->client_nom ?? ''}}" class="form-control"></td>
                            <td><select name="colis[]" class="form-control">
                                    <option>{{$site->colis_arrivee ?? 'RAS'}}</option>
                                    <option>Sac jute</option>
                                    <option>Keep safe</option>
                                    <option>Caisse</option>
                                    <option>Conteneur</option>
                                </select></td>
                            <td><select name="regulation_arrivee_devise[]" class="form-control">
                                    <option>{{$site->regulation_arrivee_devise ?? "XOF"}}</option>
                                    @foreach($devises as $devise)
                                        <option>{{$devise->devise}}</option>
                                    @endforeach
                                </select></td>
                            <td><input type="text" name="regulation_arrivee_valeur_colis[]"
                                       value="{{$site->regulation_arrivee_valeur_colis ?? 0}}" class="form-control">
                            </td>
                            <td><textarea name="numero[]" class="form-control">{{$site->numero_arrivee}}</textarea></td>
                            <td><input type="number" min="0" name="nbre_colis[]"
                                       value="{{$site->nbre_colis_arrivee ?? 0}}" class="form-control"></td>
                            <td><select name="nature[]" class="form-control">
                                    <option>{{$site->nature}}</option>
                                    <option>retour de cession</option>
                                    <option>tri</option>
                                    <option>transite</option>
                                    <option>approvisionnement</option>
                                    <option>approvisionnement</option>
                                    <option>opération exterieur</option>
                                </select></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4" style="vertical-align: center;">TOTAL</td>
                        <td><input type="text" name="totalValeurColis" id="totalValeurColis" class="form-control"
                                   readonly></td>
                        <td></td>
                        <td><input type="number" name="totalColis" id="totalColis" class="form-control" readonly></td>
                    </tr>
                    </tfoot>
                </table>
                <br>
                <button type="submit" id="submitBtn" class="btn btn-primary">Enregistrer</button>
                <a href="/regulation-arrivee-tournee-liste" class="btn btn-info" style="margin-left: 20px">Ouvrir la
                    liste</a>
            </div>
        </form>

    </div>

    <script>
        function separateNumbers(e) {
            try {
                let str = e.value?.replace(/\s/g, '');
                const donnee = parseFloat(str);
                $(e).val(Number(donnee).toLocaleString());
            } catch (e) {
                console.log(e)
            }
        }

        function removeSpace(str) {
            return str.replace(/\s/g, '');
        }

        function changeValeurColis() {
            let total = 0;
            separateNumbers(this);

            $.each($("input[name='regulation_arrivee_valeur_colis[]']"), function (i) {
                const nbre = $("input[name='regulation_arrivee_valeur_colis[]'").get(i).value;
                total += parseFloat(removeSpace(nbre)) ?? 0;
            });
            $("#totalValeurColis").val(total);
        }

        function changeNombreColis() {
            let totalColis = 0;
            $.each($("input[name='nbre_colis[]']"), function (i) {
                const nbre = $("input[name='nbre_colis[]'").get(i).value;
                totalColis += parseFloat(nbre) ?? 0;
            });
            $("#totalColis").val(totalColis);
        }

        function changeColis() {
            let index = 0;
            const thisColisInput = this;
            // Trouver l'index du champs actuel
            $.each($("select[name='colis[]']"), function (i) {
                const colis = $("select[name='colis[]']").get(i);
                if (thisColisInput === colis) {
                    index = i;
                }
                if (colis.value === "RAS") {
                    $("textarea[name='numero[]']").eq(i).prop('readonly', true);
                    $("input[name='nbre_colis[]']").eq(i).prop('readonly', true);
                    $("input[name='regulation_arrivee_valeur_colis[]']").eq(i).prop('readonly', true);
                    $("select[name='nature[]']").eq(i).prop('disabled', true);
                    $("select[name='regulation_arrivee_devise[]']").eq(i).prop('disabled', true);
                } else {
                    $("textarea[name='numero[]']").eq(i).prop('readonly', false);
                    $("input[name='nbre_colis[]']").eq(i).prop('readonly', false);
                    $("input[name='regulation_arrivee_valeur_colis[]']").eq(i).prop('readonly', false);
                    $("select[name='nature[]']").eq(i).prop('disabled', false);
                    $("select[name='regulation_arrivee_devise[]']").eq(i).prop('disabled', false);
                }
            });

        }
    </script>
    <script>
        let tournees = {!! json_encode($tournees) !!};
        let sites = {!! json_encode($sites) !!};
        changeValeurColis();
        changeNombreColis();
        changeColis();
        $(document).ready(function () {
            $("#noTournee").on("change", function () {
                $("#vehicule").val("");
                $("#chauffeur").val("");
                $("#chefDeBord").val("");
                $("#agentDeGarde").val("");
                $("#centre_regional option").remove();

                const tournee = tournees.find(t => t.id === parseInt(this.value ?? 0));
                if (tournee) {
                    $("#vehicule").val(tournee.vehicules.immatriculation);
                    $("#chauffeur").val(tournee.chauffeurs.nomPrenoms);
                    $("#chefDeBord").val(tournee.chef_de_bords.nomPrenoms);
                    $("#agentDeGarde").val(tournee.agent_de_gardes.nomPrenoms);
                    $("#centre").val(tournee.centre);
                    $("#centre_regional").val(tournee.centre_regional);

                    const commerciaux = sites.filter(site => {
                        return site.centre === tournee.centre;
                    });
                    commerciaux.map(({id, site, clients}) => {
                        $('#asSite').append($('<option>', {
                            value: id,
                            text: `${site} (${clients.client_nom})`
                        }));
                    })
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            $("input[name='montant[]']").on("change", function () {
                let montantTotal = 0;
                $.each($("input[name='montant[]']"), function (i) {
                    const montant = $("input[name='montant[]'").get(i).value;
                    montantTotal += parseFloat(montant) ?? 0;
                });
                $("#totalMontant").val(montantTotal);

            });
            $("input[name='nbre_colis[]']").on("change", function () {
                let totalColis = 0;
                $.each($("input[name='nbre_colis[]']"), function (i) {
                    const nbre = $("input[name='nbre_colis[]'").get(i).value;
                    totalColis += parseFloat(nbre) ?? 0;
                });
                $("#totalColis").val(totalColis);
            });
            $("input[name='valeur_colis[]']").on("change", function () {
                let totalValeurColis = 0;
                $.each($("input[name='valeur_colis[]']"), function (i) {
                    const nbre = $("input[name='valeur_colis[]'").get(i).value;
                    totalValeurColis += parseFloat(nbre) ?? 0;
                });
                $("#totalValeurColis").val(totalValeurColis);
            });
            $("select[name='colis[]']").on("change", changeColis);
            $("input[name='regulation_arrivee_valeur_colis[]']").on("change", changeValeurColis);
            $("#target").submit(function () {
                removeSpaceValeurColis();
                enableAllColisField();
                return true;
            });
        })
    </script>
@endsection
