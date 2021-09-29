@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Régulation arrivée tournée</h2></div>
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
                                <option
                                    value="{{$departTournee->tournees->id ?? $departTournee->noTournee}}">{{$departTournee->tournees->numeroTournee ?? $departTournee->noTournee}}</option>
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

            <div class="container">
                <table class="table table-bordered" id="tableSite">
                    <thead>
                    <tr>
                        <th>Site</th>
                        <th>Client</th>
                        <th>Autre</th>
                        <th>Nature</th>
                        <th>Numéros scellé</th>
                        <th>Nbre colis</th>
                        <th>Montant</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" style="vertical-align: center;">TOTAL</td>
                        <td><input type="number" name="totalColis" value="{{$departTournee->totalColis}}" id="totalColis" class="form-control"></td>
                        <td><input type="number" name="totalMontant" value="{{$departTournee->totalMontant}}" id="totalMontant" class="form-control"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Km arrivée</label>
                        <input type="text" class="form-control" name="kmArrivee" id="kmArrivee"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Heure arrivée</label>
                        <input type="time" class="form-control" name="heureArrivee" id="heureArrivee"/>
                    </div>
                </div>

                <div class="col">
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
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
    <script>
        let tournees = {!!json_encode($departTournees)!!};
        let personnels = {!!json_encode($personnels)!!};
        let sites = {!! json_encode($sites) !!};
        let vidanges = {!! json_encode($vidanges) !!};

        $(document).ready(function () {
            $("#numeroTournee").on("change", function () {
                const tournee = tournees.find(c => c.tournees.id === +this.value);
                const departSites = sites.filter(v => {
                    return parseInt(v.regulation_depart) === tournee.id ?? 0;
                });
                if (departSites) populateSites(departSites);
                if (tournee) {
                    $("#date").val(tournee.tournees.date);
                    $("#vehicule").val(tournee.tournees.vehicules.immatriculation);
                    $("#kmDepart").val(tournee.kmDepart);
                    $("#kmArrivee").val(tournee.kmArrivee);
                    $("#heureArrivee").val(tournee.heureArrivee);
                    $("#heureDepart").val(tournee.heureDepart);
                    setConvoyeur(1, tournee.tournees.agent_de_gardes.nomPrenoms);
                    setConvoyeur(2, tournee.tournees.chauffeurs?.nomPrenoms);
                    setConvoyeur(3, tournee.tournees.chef_de_bords?.nomPrenoms);
                    const vidange = vidanges.find(v => v.idVehicule === tournee.tournees.vehicules.id);
                    if (vidange) {
                        $("#vidangeGenerale").val(vidange.prochainKm);
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
                        <td><input type="text" name="client[]" class="form-control"></td>
                        <td><input type="text" name="autre[]" class="form-control"></td>
                        <td><select name="nature[]" class="form-control">
                                <option>${s.nature}</option>
                                <option>envoi</option>
                                <option>tri</option>
                                <option>transite</option>
                                <option>approvisionnement</option>
                            </select></td>
                        <td><input type="text" name="numero_scelle[]" value="${s.numero_scelle}" class="form-control"></td>
                        <td><input type="number" name="nbre_colis[]" value="${s.nbre_colis}" class="form-control"></td>
                        <td><input type="text" name="montant[]" value="${s.montant}" class="form-control"></td>
                    </tr>`;

                    $("#tableSite").append(HTML_NODE);
                });
            }

        });
    </script>
@endsection
