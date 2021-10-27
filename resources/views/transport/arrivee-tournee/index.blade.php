@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Arrivée tournée</h2></div>
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

        <form method="post" action="{{ route('arrivee-tournee.store') }}">
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
                    <td>Site</td>
                    <td>Type</td>
                    <td>Bordereau</td>
                    <td>Autre colis</td>
                    <td>Montant</td>
                </tr>
                </thead>
                <tbody></tbody>
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
                        <label>{{--Assurance--}}Vidange pont</label>
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
                $("#sitesListes > tbody").html("");
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
                        <td><input type="text" class="form-control" min="0" name="montant[]" value="${s?.montant ?? ''}"/></td>
                </tr>`;

                    $("#sitesListes").append(HTML_NODE);
                });
            }

            $("#kmArrivee").on("change", function (){
                const totalVidange = vidangeGlobale.prochainKm - parseInt(this.value);
                const totalVidangeCourroie = vidangeCourroieGlobale.prochainKm - parseInt(this.value);
                const totalVidangePont = vidangePontGlobale.prochainKm - parseInt(this.value);
                $("#vidangeGenerale").val(totalVidange);
                $("#vidangeCourroie").val(totalVidangeCourroie);
                $("#vidangePont").val(totalVidangePont);
            });

        });

        function diffDate(d1, d2) {
            const t2 = d2.getTime();
            const t1 = d1.getTime();
            return new Date(t2 - t1);
            // return diff.getUTCDate() - 1;
            //return parseInt((t2-t1)/(24*3600*1000));
        }
    </script>
@endsection
