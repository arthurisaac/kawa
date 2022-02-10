@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Arrivée Tournée"])
@section("nouveau")
    <a href="/arrivee-tournee" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
    <div class="burval-container">
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

        <form method="post" id="target" action="{{ route('arrivee-tournee.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>N°Tournée</label>
                        <select class="form-control" name="numeroTournee" id="numeroTournee">
                            <option>Selectionnez tournée</option>
                            @foreach($departTournees as $departTournee)
                                <option value="{{$departTournee->id}}">{{$departTournee->numeroTournee}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control" name="date" id="date" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Véhicule</label>
                        <input type="text" class="form-control" name="vehicule" id="vehicule" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Km départ</label>
                        <input type="text" class="form-control" name="kmDepart" id="kmDepart" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Heure départ</label>
                        <input type="time" class="form-control" name="heureDepart" id="heureDepart" readonly/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur1</label>
                        <input class="form-control" type="text" name="convoyeur1" id="convoyeur1" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur 2</label>
                        <input class="form-control" type="text" name="convoyeur2" id="convoyeur2" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur 3</label>
                        <input class="form-control" type="text" name="convoyeur3" id="convoyeur3" readonly>
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
                    <th style="display: none;">Colis</th>
                    <th>Valeur colis</th>
                    <th>Devise</th>
                    <th>Numéro</th>
                    <th>Nombre total colis</th>
                </tr>
                </thead>
            </table>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Km arrivée</label>
                        <input type="number" class="form-control" name="kmArrivee" id="kmArrivee"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Heure arrivée</label>
                        <input type="time" class="form-control" name="heureArrivee" id="heureArrivee"/>
                    </div>
                </div>

                <div class="col"></div>
                <div class="col"></div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Vidange générale</label>
                        <input type="number" class="form-control" name="vidangeGenerale" id="vidangeGenerale"
                               readonly/>
                        <input type="hidden" name="vidangeGeneraleID" id="vidangeGeneraleID"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Visite technique</label>
                        <input type="date" class="form-control" name="visiteTechnique" id="visiteTechnique"
                               readonly/>
                        <input type="hidden" name="visiteTechniqueID" id="visiteTechniqueID"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Vidange Courroie</label>
                        <input type="number" class="form-control" name="vidangeCourroie" id="vidangeCourroie"
                               readonly/>
                        <input type="hidden" name="vidangeCourroieID" id="vidangeCourroieID"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Vidange Patente</label>
                        <input type="text" class="form-control" name="vidangePatente" id="patente" readonly/>
                        <input type="hidden" name="vidangePatenteID" id="vidangePatenteID"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Assurance fin</label>
                        <input type="date" class="form-control" name="assuranceFin" id="assuranceFin" readonly/>
                        <input type="hidden" name="assuranceFinID" id="assuranceFinID"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Vidange pont</label>
                        <input type="number" class="form-control" name="assuranceHeurePont" id="vidangePont" readonly/>
                        <input type="hidden" name="vidangePontID" id="vidangePontID"/>
                    </div>
                </div>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
    <script>
        let tournees = {!!json_encode($departTournees)!!};
        let personnels = {!!json_encode($personnels)!!};
        let sites = {!! json_encode($sites) !!};
        let vidanges = {!! json_encode($vidanges) !!};
        let vidangePonts = {!! json_encode($vidangePonts) !!};
        let vidangePatentes = {!! json_encode($vidangePatentes) !!};
        let vidangeVisites = {!! json_encode($vidangeVisite) !!};
        let vidangeCourroies = {!! json_encode($vidangeCourroie) !!};
        let assurances = {!! json_encode($assurances) !!};
        let vidangeGlobale = 0;
        let vidangeTechniqueGlobale = 0;
        let vidangeCourroieGlobale = 0;
        let vidangePatenteGlobale = 0;
        let vidangePontGlobale = 0;
        let assuranceGlobale = 0;

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
                    const vidangePont = vidangePonts.find(v => v.idVehicule === tournee.vehicules.id);
                    const vidangePatente = vidangePatentes.find(v => v.idVehicule === tournee.vehicules.id);
                    const vidangeVisite = vidangeVisites.find(v => v.idVehicule === tournee.vehicules.id);
                    const vidangeCourroie = vidangeCourroies.find(v => v.idVehicule === tournee.vehicules.id);
                    const vidangeAssurance = assurances.find(v => v.idVehicule === tournee.vehicules.id);
                    //const vidangeVignette = vidangeVignettes.find(v => v.idVehicule === tournee.vehicules.id);

                    if (vidange) {
                        $("#vidangeGenerale").val(vidange.prochainKm);
                        $("#vidangeGeneraleID").val(vidange.id);
                        vidangeGlobale = vidange;
                    }
                    if (vidangeVisite) {
                        const t1 = new Date(tournee.date);
                        const t2 = new Date(vidangeVisite.prochainRenouvellement);
                        let dateDiff = diffDate(t1, t2);
                        const diffInDays = dateDiff.getUTCDate() - 1;
                        t2.setDate(t2.getDate() - diffInDays);
                        const conformDate = t2.toISOString().split('T')[0];
                        $("#visiteTechnique").val(conformDate);
                        $("#visiteTechniqueID").val(vidangeVisite.id);
                        vidangeTechniqueGlobale = vidangeVisite;
                    }
                    if (vidangeCourroie) {
                        $("#vidangeCourroie").val(vidangeCourroie.prochainKm);
                        $("#vidangeCourroieID").val(vidangeCourroie.id);
                        vidangeCourroieGlobale = vidangeCourroie;
                    }
                    if (vidangePatente) {
                        $("#patente").val(vidangePatente.prochainRenouvellement);
                        $("#vidangePatenteID").val(vidangePatente.id);
                        vidangePatenteGlobale = vidangePatente;
                    }
                    if (vidangePont) {
                        $("#vidangePont").val(vidangePont.prochainKm);
                        $("#vidangePontID").val(vidangePont);
                        vidangePontGlobale = vidangePont;
                    }
                    if (vidangeAssurance) {
                        $("#assuranceFin").val(vidangeAssurance.prochainRenouvellement);
                        $("#assuranceFinID").val(vidangeAssurance.id);
                        assuranceGlobale = vidangeAssurance
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
                $("#sitesListes > tbody").html("");
                $("#sitesListes > tfoot").html("");
                sites.map(s => {
                    console.log(s.transport_arrivee_valeur_colis);
                    let HTML_NODE = `<tr>
                            <td>
                                    <input type="text" class="form-control" name="site[]" value="${s.sites.site}" readonly/>
                                    <input type="hidden" class="form-control" name="site_id[]" value="${s.id}"/>
                            </td>
                            <td><input type="text" class="form-control" name="client[]" value="${s.sites?.clients?.client_nom}" readonly/></td>
                            <td><select class="form-control" name="type[]">
                                        <option>${s?.type ?? ''}</option>
                                        <option>Enlèvement</option>
                                        <option>Dépôt</option>
                                        <option>Enlèvement + Dépôt</option>
                                    </select></td>
                            <td><textarea class="form-control" name="bordereau[]">${s?.bordereau ?? ''}</textarea></td>
                            <td style="display: none;"><select name="colis[]" class="form-control">
                                    <option>${s.colis ?? ''}</option>
                                    <option>RAS</option>
                                    <option>Sac jute</option>
                                    <option>Keep safe</option>
                                    <option>Caisse</option>
                                    <option>Conteneur</option>
                                    </select></td>
                            <td><input type="text" name="transport_arrivee_valeur_colis[]" value="${s.transport_arrivee_valeur_colis ?? 0}" class="form-control"></td>
                            <td><select name="transport_arrivee_devise[]" class="form-control">
                                    <option>${s?.transport_arrivee_devise ?? 'XOF'}</option>
                                    @foreach($devises as $devise)
                                        <option>{{$devise->devise}}</option>
                                    @endforeach
                                    </select></td>
                            <td><textarea name="numero[]" class="form-control">${s.numero_arrivee ?? ''}</textarea></td>
                            <td><input type="number" name="nbre_colis[]" value="${s?.nbre_colis_arrivee ?? '0'}" class="form-control"></td>
                    </tr>`;

                    $("#sitesListes").append(HTML_NODE);
                });

                $("#sitesListes").append(`<tfoot>
                <tr>
                    <td colspan="5" style="vertical-align: center;">TOTAL</td>
                    <td><input type="text" name="totalValeurColis" id="totalValeurColis" class="form-control"
                               readonly></td>
                    <td></td>
                    <td><input type="text" name="totalColis" id="totalColis" class="form-control" readonly></td>
                </tr>
                </tfoot>`);
            }

            changeValeurColis();
            changeXOF();
            changeDollar();
            changeEuro();
            changePierre();
            changeNombreColis();
            changeMontant();

            $("#kmArrivee").on("change", function () {
                const totalVidange = vidangeGlobale.prochainKm - parseInt(this.value);
                const totalVidangeCourroie = vidangeCourroieGlobale.prochainKm - parseInt(this.value);
                const totalVidangePont = vidangePontGlobale.prochainKm - parseInt(this.value);
                $("#vidangeGenerale").val(totalVidange);
                $("#vidangeCourroie").val(totalVidangeCourroie);
                $("#vidangePont").val(totalVidangePont);
            });

            $("#target").submit(function () {
                removeSpaceValeurColis();
                enableAllColisField();
                return true;
            });
        });

        function diffDate(d1, d2) {
            const t2 = d2.getTime();
            const t1 = d1.getTime();
            return new Date(t2 - t1);
        }
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
            $("input[name='transport_arrivee_valeur_colis[]']").on("change", changeValeurColis);
            $("select[name='colis[]']").on("change", changeColis);
        });
    </script>
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
        function changeXOF() {
            let total = 0;
            separateNumbers(this);

            $.each($("input[name='valeur_colis_xof[]']"), function (i) {
                const nbre = $("input[name='valeur_colis_xof[]'").get(i).value;
                const parsedNbre = e.value?.replace(/\s/g, '');
                total += parseFloat(nbre) ?? 0;
            });
            $("#totalValeurXOF").val(total);
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

        function changeDollar() {
            let total = 0;
            separateNumbers(this);
            $.each($("input[name='device_etrangere_dollar[]']"), function (i) {
                const nbre = $("input[name='device_etrangere_dollar[]'").get(i).value;
                total += parseFloat(nbre) ?? 0;
            });
            $("#totalValeurDollar").val(total);
        }

        function changeEuro() {
            let total = 0;
            separateNumbers(this);
            $.each($("input[name='device_etrangere_euro[]']"), function (i) {
                const nbre = $("input[name='device_etrangere_euro[]'").get(i).value;
                total += parseFloat(nbre) ?? 0;
            });
            $("#totalValeurEuro").val(total);
        }

        function changePierre() {
            let total = 0;
            separateNumbers(this);
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
                    $("input[name='valeur_colis_xof[]']").eq(i).prop('readonly', true);
                    $("textarea[name='numero[]']").eq(i).prop('readonly', true);
                    $("input[name='nbre_colis[]']").eq(i).prop('readonly', true);
                    $("select[name='nature[]']").eq(i).prop('disabled', true);
                } else {
                    $("input[name='valeur_colis_xof[]']").eq(i).prop('readonly', false);
                    $("textarea[name='numero[]']").eq(i).prop('readonly', false);
                    $("input[name='nbre_colis[]']").eq(i).prop('readonly', false);
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
@endsection
