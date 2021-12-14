@extends('base')

@section('main')
    <div class="burval-container">
        <h2>Arrivée tournée</h2>
        <a href="/caisse-service-liste" class="btn btn-info btn-sm">Liste</a>
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

        <form method="post" action="{{ route('arrivee-tournee.update', $tournee->id) }}">
            @csrf
            @method("PATCH")
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>N°Tournée</label>
                        <input class="form-control" name="numeroTournee" value="{{$tournee->numeroTournee}}"
                               id="numeroTournee" readonly required/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control" name="date" value="{{$tournee->date}}" id="date"
                               readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Véhicule</label>
                        <input type="text" class="form-control" name="vehicule"
                               value="{{$tournee->vehicules->immatriculation ?? "Donnée indisponible"}}" id="vehicule"
                               readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Km départ</label>
                        <input type="text" class="form-control" name="kmDepart" value="{{$tournee->kmDepart}}"
                               id="kmDepart" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Heure départ</label>
                        <input type="time" class="form-control" name="heureDepart" value="{{$tournee->heureDepart}}"
                               id="heureDepart" readonly/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur1</label>
                        <input class="form-control" type="text" name="convoyeur1"
                               value="{{$tournee->chauffeurs->nomPrenoms ?? ""}}" id="convoyeur1" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur 2</label>
                        <input class="form-control" type="text" name="convoyeur2" id="convoyeur2"
                               value="{{$tournee->chefDeBords->nomPrenoms ?? ""}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur 3</label>
                        <input class="form-control" type="text" name="convoyeur3" id="convoyeur3"
                               value="{{$tournee->agentDeGardes->nomPrenoms ?? ""}}" readonly>
                    </div>
                </div>
            </div>
            <br/>

            <table class="table table-bordered" id="sitesListes">
                <thead>
                <tr>
                    <th>Site</th>
                    <th>Client</th>
                    <th>Type opération</th>
                    <th>Bordereau</th>
                    <th>Colis</th>
                    <th>Devise</th>
                    <th>Valeur colis</th>
                    <th>Numéro</th>
                    <th>Nombre total colis</th>
                    <td style="display: none;">Montant</td>
                </tr>
                </thead>
                <tbody>
                @foreach($sites as $site)
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="site[]" value="{{$site->sites->site ?? ""}}" readonly/>
                            <input type="hidden" class="form-control" name="site_id[]" value="{{$site->id}}"/>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="site[]" value="{{$site->sites->clients->client_nom ?? ""}}" readonly/>
                            <input type="hidden" class="form-control" name="site_id[]" value="{{$site->id}}"/>
                        </td>
                        <td><select class="form-control" name="type[]">
                                <option>{{$site->type}}</option>
                                <option>Enlèvement</option>
                                <option>Dépôt</option>
                                <option>Enlèvement + Dépôt</option>
                            </select></td>
                        <td><textarea class="form-control" name="bordereau[]">{{$site->bordereau}}</textarea></td>
                        <td><select name="colis[]" class="form-control">
                                <option>{{$site->colis}}</option>
                                <option>RAS</option>
                                <option>Sac jute</option>
                                <option>Keep safe</option>
                                <option>Caisse</option>
                                <option>Conteneur</option>
                            </select></td>
                        <td><select name="transport_arrivee_devise[]" class="form-control">
                                <option>{{$site->transport_arrivee_devise}}</option>
                                @foreach($devises as $devise)
                                    <option>{{$devise->devise}}</option>
                                @endforeach
                            </select></td>
                        <td><input type="text" name="transport_arrivee_valeur_colis[]" value="{{$site->transport_arrivee_valeur_colis ?? 0}}" class="form-control"></td>
                        <td><textarea name="numero[]" class="form-control">{{$site->numero_arrivee}}</textarea></td>
                        <td><input type="number" name="nbre_colis[]" value="{{$site->nbre_colis_arrivee ?? 0}}" class="form-control"></td>
                        <td style="display: none;"><input type="text" class="form-control" min="0" name="montant[]" value="{{$site->montant}}"/></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" style="vertical-align: center;">TOTAL</td>
                    <td><input type="text" name="totalValeurColis" id="totalValeurColis" class="form-control"
                               readonly></td>
                    <td></td>
                    <td><input type="text" name="totalColis" id="totalColis" class="form-control" readonly></td>
                </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Km arrivée</label>
                        <input type="text" class="form-control" name="kmArrivee" value="{{$tournee->kmArrivee}}" id="kmArrivee" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Heure arrivée</label>
                        <input type="time" class="form-control" name="heureArrivee" value="{{$tournee->heureArrivee}}" id="heureArrivee"/>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Vidange générale</label>
                        <input type="number" class="form-control" name="vidangeGenerale" id="vidangeGenerale"
                               readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Visite technique</label>
                        <input type="number" class="form-control" name="visiteTechnique" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Vidange Courroie</label>
                        <input type="number" class="form-control" name="vidangeCourroie" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Vidange Patente</label>
                        <input type="number" class="form-control" name="patente" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Assurance fin</label>
                        <input type="date" class="form-control" name="assuranceFin" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Assurance pont</label>
                        <input type="number" class="form-control" name="assuranceHeurePont" readonly/>
                    </div>
                </div>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Valider</button>
            <a href="/arrivee-tournee-liste" class="btn btn-info" style="margin-left: 20px">Ouvrir arrivée tourée</a>
            <a href="/colis-arrivee-liste" class="btn btn-outline-info" style="margin-left: 20px">Ouvrir colis arrivée tourée</a>
        </form>
    </div>

    <script>
        function separateNumbers(e){
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

            $.each($("input[name='transport_arrivee_valeur_colis[]']"), function (i) {
                const nbre = $("input[name='transport_arrivee_valeur_colis[]'").get(i).value;
                total += parseFloat(removeSpace(nbre)) ?? 0;
            });
            $("#totalValeurColis").val(total);
        }

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
                    $("input[name='valeur_colis_xof[]']").eq(i).prop('disabled', true);
                    $("input[name='device_etrangere_dollar[]']").eq(i).prop('disabled', true);
                    $("input[name='device_etrangere_euro[]']").eq(i).prop('disabled', true);
                    $("input[name='pierre_precieuse[]']").eq(i).prop('disabled', true);
                    $("textarea[name='numero[]']").eq(i).prop('disabled', true);
                    $("input[name='nbre_colis[]']").eq(i).prop('disabled', true);
                    $("select[name='nature[]']").eq(i).prop('disabled', true);
                } else {
                    $("input[name='valeur_colis_xof[]']").eq(i).prop('disabled', false);
                    $("input[name='device_etrangere_dollar[]']").eq(i).prop('disabled', false);
                    $("input[name='device_etrangere_euro[]']").eq(i).prop('disabled', false);
                    $("input[name='pierre_precieuse[]']").eq(i).prop('disabled', false);
                    $("textarea[name='numero[]']").eq(i).prop('disabled', false);
                    $("input[name='nbre_colis[]']").eq(i).prop('disabled', false);
                    $("select[name='nature[]']").eq(i).prop('disabled', false);
                }
            });

        }

        function changeMontant() {
            let montantTotal = 0;
            $.each($("input[name='montant[]']"), function (i) {
                const montant = $("input[name='montant[]'").get(i).value;
                montantTotal += parseFloat(montant) ?? 0;
            });
            $("#totalMontant").val(montantTotal);

        }
    </script>
    <script>
        let tournees = {!!json_encode($departTournees)!!};
        let personnels = {!!json_encode($personnels)!!};
        let sites = {!! json_encode($sites) !!};
        let vidanges = {!! json_encode($vidanges) !!};

        changeValeurColis();
        changeXOF();
        changeDollar();
        changeEuro();
        changePierre();
        changeNombreColis();
        changeMontant();

        $(document).ready(function () {
            $("#numeroTournee").on("change", function () {
                const tournee = tournees.find(c => c.id === +this.value);
                const departSites = sites.filter(v => {
                    return parseInt(v.idTourneeDepart) === parseInt(this.value);
                });
                if (departSites) populateSites(departSites);
                if (tournee) {
                    $("#date").val(tournee.date);
                    $("#vehicule").val(tournee.vehicules.immatriculation);
                    $("#kmDepart").val(tournee.kmDepart);
                    $("#kmArrivee").val(tournee.kmArrivee);
                    $("#heureArrivee").val(tournee.heureArrivee);
                    $("#heureDepart").val(tournee.heureDepart);
                    setConvoyeur(1, tournee.agentDeGarde);
                    setConvoyeur(2, tournee.chauffeur);
                    setConvoyeur(3, tournee.chefDeBord);
                    const vidange = vidanges.find(v => v.idVehicule === tournee.vehicules.id);
                    if (vidange) {
                        $("#vidangeGenerale").val(vidange.prochainKm);
                        console.log(vidange);

                    }
                }
            });

            function setConvoyeur(numero, convoyeur) {
                const personnel = personnels.find(p => p.id === convoyeur);
                if (personnel)
                    $("#convoyeur" + numero).val(personnel.nomPrenoms);
                else
                    $("#convoyeur" + numero).val(convoyeur)
            }

            function populateSites(sites) {
                // console.log(sites);
                $(".sitesListes div").remove();
                sites.map(s => {

                    let HTML_NODE = `<tr>
                        <td>
                                <input type="text" class="form-control" name="site[]" value="${s.sites.site}" readonly/>
                                <input type="hidden" class="form-control" name="site_id[]" value="${s.id}"/>
                        </td>
                        <td><select class="form-control" name="type[]">
                                    <option>${s?.type ?? ''}</option>
                                    <option>Enlèvement</option>
                                    <option>Dépôt</option>
                                    <option>Enlèvement + Dépôt</option>
                                </select></td>
                        <td><textarea class="form-control" name="bordereau[]">${s?.bordereau ?? ''}</textarea></td>
                        <td><input type="text" class="form-control" name="autre[]" value="${s?.autre ?? ''}" />    </td>
                        <td><input style="display: none;" type="text" class="form-control" min="0" name="montant[]" value="${s?.montant ?? 0}"/></td>
                </tr>`;

                    $("#sitesListes").append(HTML_NODE);
                });
            }

        });
    </script>
    <script>
        $(document).on('DOMNodeInserted', function () {
            $("input[name='montant[]']").on("change", changeMontant);
            $("input[name='nbre_colis[]']").on("change", changeNombreColis);
            $("input[name='valeur_colis[]']").on("change", function () {
                let totalValeurColis = 0;
                $.each($("input[name='valeur_colis[]']"), function (i) {
                    const nbre = $("input[name='valeur_colis[]'").get(i).value;
                    totalValeurColis += parseFloat(nbre) ?? 0;
                });
                $("#totalValeurColis").val(totalValeurColis);
            });
            $("input[name='valeur_autre[]']").on("change", function () {
                let totalValeurAutre = 0;
                $.each($("input[name='valeur_autre[]']"), function (i) {
                    const nbre = $("input[name='valeur_autre[]'").get(i).value;
                    totalValeurAutre += parseFloat(nbre) ?? 0;
                });
                $("#totalValeurAutre").val(totalValeurAutre);
            });
            $("input[name='valeur_colis_xof[]']").on("change", changeXOF);
            $("input[name='device_etrangere_dollar[]']").on("change", changeDollar);
            $("input[name='device_etrangere_euro[]']").on("change", changeEuro);
            $("input[name='pierre_precieuse[]']").on("change", changePierre);
            $("select[name='colis[]']").on("change", changeColis);
            $("input[name='transport_arrivee_valeur_colis[]']").on("change", changeValeurColis);
        });
    </script>
@endsection
