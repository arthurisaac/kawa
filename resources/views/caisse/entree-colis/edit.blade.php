@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée de colis</h2></div>
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

        <form action="{{ route('caisse-entree-colis.update', $colis->id) }}" method="post">
            @csrf
            @method("PATCH")

            {{--<div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4">Date départ</label>
                            <input type="text" name="date" id="date" value="{{$coli->date}}"
                                   class="form-control col-sm-8"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="heure" class="col-sm-4">Heure départ</label>
                            <input type="text" name="heure" id="heure" value="{{$coli->heure}}"
                                   class="form-control col-sm-8"/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Agent garde</label>
                            <select class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" required>
                                <option value="{{$coli->agent}}">{{$coli->agents->nomPrenoms ?? ""}}</option>
                                @foreach($agents as $agent)
                                    <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Chef de bord</label>
                            <select class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" required>
                                <option value="{{$coli->chef}}">{{$coli->chefs->nomPrenoms ?? ""}}</option>
                                @foreach($chefBords as $agent)
                                    <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre" class="col-sm-4">Centre</label>
                            <select name="centre" id="centre" class="form-control col-8" required>
                                <option>{{$coli->centre}}</option>
                                @foreach ($centres as $centre)
                                    <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre_regional" class="col-sm-4">Centre régional</label>
                            <select id="centre_regional" name="centre_regional" class="form-control col-8" required>
                                <option>{{$coli->centre_regional}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>--}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4">Date</label>
                            <input type="text" name="date" id="date" value="{{$colis->date ?? ''}}" class="form-control col-sm-8"
                                   readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="heure" class="col-sm-4">Heure</label>
                            <input type="text" name="heure" id="heure" value="{{$colis->heure}}"
                                   class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                            <select class="form-control col-sm-8" name="noTournee" id="noTournee">
                                <option value="{{$colis->noTournee}}">{{$colis->tournees->numeroTournee ?? ''}}</option>
                                @foreach($tournees as $tournee)
                                    <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row" >
                            <label class="col-sm-4">Véhicule</label>
                            <input class="form-control col-sm-8" name="vehicule" id="vehicule" value="{{$colis->tournees->vehicules->immatriculation?? "Donnée indisponible"}}" readonly/>
                            {{--<select class="form-control col-sm-8" name="vehicule" id="vehicule">
                                <option></option>
                                @foreach($vehicules as $vehicule)
                                    <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                                @endforeach
                            </select>--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Chef de bord</label>
                            <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" value="{{$colis->tournees->chefDeBords->nomPrenoms ?? "Données indisponible"}}" readonly/>
                            {{--<select class="form-control col-sm-8" name="chefDeBord">
                                <option></option>
                                @foreach($chefBords as $chef)
                                    <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>
                                @endforeach
                            </select>--}}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Agent garde</label>
                            <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" value="{{$colis->tournees->agentDeGarde->nomPrenoms ?? "Données indisponible"}}" readonly/>
                            {{--<select class="form-control col-sm-8" name="agentDeGarde">
                                <option></option>
                                @foreach($agents as $agent)
                                    <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>
                                @endforeach
                            </select>--}}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Chauffeur:</label>
                            <input class="form-control col-sm-8" name="chauffeur" id="chauffeur"  value="{{$colis->tournees->chauffeurs->nomPrenoms ?? "Données indisponible"}}" readonly/>
                            {{--<select class="form-control col-sm-8" name="chauffeur" id="chauffeur">
                                <option></option>
                            </select>--}}
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre" class="col-sm-4">Centre regional</label>
                            <input name="centre" id="centre" class="form-control col-sm-8" value="{{$colis->tournees->centre}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre_regional" class="col-sm-4">Centre</label>
                            <input id="centre_regional" name="centre_regional" class="form-control col-sm-8" value="{{$colis->tournees->centre}}" readonly/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="container-fluid">
                <br>
                <button type="button" id="add" class="btn btn-sm btn-dark">Ajouter</button>
                <br>
                <br>
                <table class="table table-bordered" id="table">
                    <thead>
                    <tr>
                        <th>Site</th>
                        <th>Client</th>
                        <th>Colis</th>
                        <th>Valeur colis (XOF)</th>
                        <th>Valeur devise étrangère (Dollar)</th>
                        <th>Valeur devise étrangère (Euro)</th>
                        <th>Valeur pierre précieuse</th>
                        <th>Numéros scellé (Réference)</th>
                        <th>Nbre total colis</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                <input type="hidden" name="ids[]" value="{{$item->id}}">
                                <select name="site[]" class="form-control">
                                    <option value="{{$item->site}}">{{$item->sites->site ?? "Donnée indisponible"}}</option>
                                    @foreach($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" name="client[]" value="{{$item->sites->clients->client_nom ?? "Donnée indisponible"}}" class="form-control"></td>
                            <td><select name="colis[]" class="form-control">
                                    <option>{{$item->colis}}</option>
                                    <option>Sac jute</option>
                                    <option>Keep safe</option>
                                    <option>Caisse</option>
                                    <option>Conteneur</option>
                                </select></td>
                            <td><input type="number" name="valeur_colis_xof[]" value="{{$item->valeur_colis_xof_entree ?? 0}}"  class="form-control"></td>
                            <td><input type="number" min="0" name="device_etrangere_dollar[]" value="{{$item->device_etrangere_dollar_entree ?? 0}}" class="form-control"></td>
                            <td><input type="number" min="0" name="device_etrangere_euro[]"  value="{{$item->device_etrangere_euro_entree ?? 0}}" class="form-control"></td>
                            <td><input type="number" min="0" name="pierre_precieuse[]"  value="{{$item->pierre_precieuse_entree ?? 0}}" class="form-control"></td>
                            <td><input type="text" name="scelle[]" value="{{$item->scelle}}" class="form-control"></td>
                            <td><input type="number" name="nbre_colis[]" value="{{$item->nbre_colis ?? 0}}" class="form-control"></td>
                            {{--<td><input type="text" name="montant_edit[]" value="{{$item->montant }}" class="form-control"></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3" style="vertical-align: center;">TOTAL</td>
                        <td><input type="number" name="totalValeurXOF" id="totalValeurXOF" class="form-control"
                                   readonly></td>
                        <td><input type="number" name="totalValeurDollar" id="totalValeurDollar" class="form-control"
                                   readonly>
                        </td>
                        <td><input type="number" name="totalValeurEuro" id="totalValeurEuro" class="form-control"
                                   readonly></td>
                        <td><input type="number" name="totalValeurPierre" id="totalValeurPierre" class="form-control"
                                   readonly></td>
                        <td></td>
                        <td><input type="number" name="totalColis" id="totalColis" class="form-control" readonly></td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                <br>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>

    </div>

    <script>
        function changeXOF() {
            let total = 0;
            $.each($("input[name='valeur_colis_xof[]']"), function (i) {
                const nbre = $("input[name='valeur_colis_xof[]'").get(i).value;
                total += parseFloat(nbre) ?? 0;
            });
            $("#totalValeurXOF").val(total);
        }

        function changeDollar() {
            let total = 0;
            $.each($("input[name='device_etrangere_dollar[]']"), function (i) {
                const nbre = $("input[name='device_etrangere_dollar[]'").get(i).value;
                total += parseFloat(nbre) ?? 0;
            });
            $("#totalValeurDollar").val(total);
        }

        function changeEuro() {
            let total = 0;
            $.each($("input[name='device_etrangere_euro[]']"), function (i) {
                const nbre = $("input[name='device_etrangere_euro[]'").get(i).value;
                total += parseFloat(nbre) ?? 0;
            });
            $("#totalValeurEuro").val(total);
        }

        function changePierre() {
            let total = 0;
            $.each($("input[name='pierre_precieuse[]']"), function (i) {
                const nbre = $("input[name='pierre_precieuse[]'").get(i).value;
                total += parseFloat(nbre) ?? 0;
            });
            $("#totalValeurPierre").val(total);
        }

        function changeNombreColis() {
            let totalColis = 0;
            $.each($("input[name='nbre_colis[]']"), function (i) {
                const nbre = $("input[name='nbre_colis[]'").get(i).value;
                totalColis += parseFloat(nbre) ?? 0;
            });
            $("#totalColis").val(totalColis);

        }
    </script>
    <script>
        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        let sites = {!! json_encode($sites) !!};
        let tournees = {!! json_encode($tournees) !!};
        changeDollar();
        changeEuro();
        changePierre();
        changeXOF();
        changeNombreColis();
        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

                const centre = centres.find(c => c.centre === this.value);
                const regions = centres_regionaux.filter(region => {
                    return region.id_centre === centre.id;
                });
                regions.map(({centre_regional}) => {
                    $('#centre_regional').append($('<option>', {
                        value: centre_regional,
                        text: centre_regional
                    }));
                })
            });
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
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#add").on("click", function () {
                $('#table').append('<tr>\n' +
                    '                        <input type="hidden" name="ids[]" />\n' +
                    '                        <td>\n' +
                    '                            <select name="site[]" class="form-control">\n' +
                    '                                <option></option>\n' +
                    '                                @foreach($sites as $site)\n' +
                    '                                    <option value="{{$site->id}}">{{$site->site}}</option>\n' +
                    '                                @endforeach\n' +
                    '                            </select>\n' +
                    '                        </td>\n' +
                    '                        <td><input type="text" name="client[]" class="form-control"></td>\n' +
                    '                        <td><select name="colis[]" class="form-control">\n' +
                    '                                <option></option>\n' +
                    '                                <option>Sac jute</option>\n' +
                    '                                <option>Keep safe</option>\n' +
                    '                                <option>Caisse</option>\n' +
                    '                                <option>Conteneur</option>\n' +
                    '                            </select></td>\n' +
                    '                        <td><select name="nature[]" class="form-control">\n' +
                    '                                <option>envoi</option>\n' +
                    '                                 <option>tri</option>\n' +
                    '                                <option>transite</option>\n' +
                    '                                <option>approvisionnement</option>\n' +
                    '                            </select></td>\n' +
                    '                        <td><textarea name="scelle[]" class="form-control"></textarea></td>\n' +
                    '                        <td><input type="number" name="nbre_colis[]" class="form-control"></td>\n' +
                    '                    </tr>');
            });
        })
    </script>
    <script>
        $(document).on('DOMNodeInserted', function () {
            $("input[name='montant[]']").on("change", function () {
                let montantTotal = 0;
                $.each($("input[name='montant[]']"), function (i) {
                    const montant = $("input[name='montant[]'").get(i).value;
                    montantTotal += parseFloat(montant) ?? 0;
                });
                $("#totalMontant").val(montantTotal);

            });
            $("input[name='nbre_colis[]']").on("change", );

            $("select[name='site[]']").on("change", function () {
                let index = 0;
                const thisSite = this;
                $.each($("select[name='site[]']"), function (i) {
                    const site = $("select[name='site[]']").get(i);
                    if (thisSite === site) {
                        index = i;
                    }
                });
                const site = sites.find(s => s.id === parseInt(this.value));
                if (site) {
                    console.log(site);
                    $("input[name='client[]']").eq(index).val(site.clients.client_nom);
                } else {
                    console.log("Site non trouvé :-(");
                }
            });
            $("input[name='valeur_colis_xof[]']").on("change", changeXOF);
            $("input[name='device_etrangere_dollar[]']").on("change", changeDollar);
            $("input[name='device_etrangere_euro[]']").on("change", changeEuro);
            $("input[name='pierre_precieuse[]']").on("change", changePierre);
        });
    </script>

@endsection
