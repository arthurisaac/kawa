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

        <form method="post" action="{{ route('regulation-arrivee-tournee.store') }}">
            @csrf

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4">Date départ</label>
                            <input type="text" name="date" id="date" class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="heure" class="col-sm-4">Heure départ</label>
                            <input type="text" name="heure" id="heure" class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group row">
                            <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                            <select class="form-control col-sm-8" name="numeroTournee" id="numeroTournee">
                                <option>Selectionnez tournée</option>
                                @foreach($departTournees as $departTournee)
                                    <option
                                        value="{{$departTournee->noTournee}}">{{$departTournee->tournees->numeroTournee ?? $departTournee->noTournee}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Véhicule</label>
                            <input class="form-control col-sm-8" name="vehicule" id="vehicule" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Chauffeur:</label>
                            <input class="form-control col-sm-8" name="chauffeur" id="chauffeur" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Agent garde</label>
                            <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Chef de bord</label>
                            <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" readonly/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre" class="col-sm-4">Centre régional</label>
                            <input name="centre" id="centre" class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre_regional" class="col-sm-4">Centre</label>
                            <input id="centre_regional" name="centre_regional" class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" id="tableSite">
                        <thead>
                        <tr>
                            <th>Site</th>
                            <th>Client</th>
                            <th>Colis</th>
                            <th>Valeur total colis</th>
                            <th>Numéro</th>
                            <th>Autre colis</th>
                            <th>Valeur autre</th>
                            <th>Nature</th>
                            <th>Numéros scellé</th>
                            <th>Nbre total colis</th>
                            <th>Montant</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5" style="vertical-align: center;">TOTAL</td>
                            <td><input type="number" name="totalColis" id="totalColis" class="form-control"></td>
                            <td><input type="number" name="totalMontant" id="totalMontant" class="form-control"></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
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
                    $("#centre").val(tournee.tournees.centre);
                    $("#centre_regional").val(tournee.tournees.centre_regional);
                    $("#totalMontant").val(tournee.totalMontant);
                    $("#totalColis").val(tournee.totalColis);
                    $("#idTournee").val(tournee.id);
                    $("#chefDeBord").val(tournee.tournees.chef_de_bords?.nomPrenoms);
                    $("#agentDeGarde").val(tournee.tournees.agent_de_gardes?.nomPrenoms);
                    $("#chauffeur").val(tournee.tournees.chauffeurs?.nomPrenoms);
                }
            });

            function populateSites(sites) {
                // console.log(sites);
                $(".sitesListes div").remove();
                sites.map(s => {
                    let HTML_NODE = `<tr>
                        <td>
                            <input type="text" class="form-control" name="site[]" value="${s.sites.site}" readonly/>
                            <input type="hidden" class="form-control" name="site_id[]" value="${s.id}"/>
                        </td>
                        <td><input type="text" name="client[]" value="${s.sites.clients.client_nom}" class="form-control"></td>
                        <td><input type="text" name="colis[]" value="${s.valeur_autre ?? ''}" class="form-control"></td>
                        <td><input type="text" name="valeur_colis[]" value="${s.valeur_autre ?? ''}" class="form-control"></td>
                        <td><input type="text" name="numero[]" value="${s.valeur_autre ?? ''}" class="form-control"></td>
                        <td><select name="autre[]"  class="form-control">
                            <option>${s.autre ?? ''}</option>
                            <option>Devise étrangère</option>
                            <option>Caisse</option>
                            </select>
                        </td>
                        <td><input type="text" name="valeur_autre[]" value="${s.valeur_autre ?? ''}" class="form-control"></td>
                        <td><select name="nature[]" class="form-control">
                                <option>${s.nature}</option>
                                <option>Juste sac juste</option>
                                <option>Keep safe</option>
                                <option>Caisse</option>
                                <option>Conteneur</option>
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
