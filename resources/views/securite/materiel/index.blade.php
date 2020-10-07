@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Matériel</h2></div>
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

    <form method="post" action="{{ route('materiel.store') }}">
        @csrf

        <!-- INFORMATIONS GENERALE -->
        <p>INFORMATIONS GENERALES</p>
        <hr class="title-separator"/>
        <br/>
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">
                </div>
            </div>
            <div class="col">
                <p class="text-center">Equipage</p>
                <hr/>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><label>CB</label></div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom</label>
                                    <input type="text" class="form-control col-sm-8" name="cbNom">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Prénoms</label>
                                    <input type="text" class="form-control col-sm-8" name="cbPrenom">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Fonction</label>
                                    <input type="text" class="form-control col-sm-8" name="cbFonction">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Matricule</label>
                                    <input type="text" class="form-control col-sm-8" name="cbMatricule">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><label>CC</label></div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom</label>
                                    <input type="text" class="form-control col-sm-8" name="ccNom">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Prénoms</label>
                                    <input type="text" class="form-control col-sm-8" name="ccPrenom">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Fonction</label>
                                    <input type="text" class="form-control col-sm-8" name="ccFonction">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Matricule</label>
                                    <input type="text" class="form-control col-sm-8" name="ccMatricule">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><label>CG</label></div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom</label>
                                    <input type="text" class="form-control col-sm-8" name="cgNom">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Prénoms</label>
                                    <input type="text" class="form-control col-sm-8" name="cgPrenom">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Fonction</label>
                                    <input type="text" class="form-control col-sm-8" name="cgFonction">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Matricule</label>
                                    <input type="text" class="form-control col-sm-8" name="cgMatricule">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-4"><label>Véhicule</label></div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                   value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                VB N°
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                   value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                VL N°
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <input type="text" class="form-control" name="vehiculeVB">
                        </div>
                        <div class="form-group row">
                            <input type="text" class="form-control" name="vehiculeVL">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-3">
                <div class="form-group row">
                    <label class="col-sm-4">Tournée N°</label>
                    <input type="text" class="form-control col-sm-8" name="noTournee">
                </div>
            </div>
        </div>
        <br/>

        <!-- REMETTANTS -->
        <p>REMETTANTS</p>
        <hr class="title-separator"/>
        <br/>

        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-4"><label>Opération</label></div>
                    <div class="col">
                        <select class="form-control" name="operateurRadio">
                            <option value="opérateur radio 1">Opérateur radio 1</option>
                            <option value="opérateur radio 2">Opérateur radio 2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group row">
                    <label class="col-sm-4">Nom</label>
                    <input type="text" class="form-control col-sm-8" name="operateurRadioNom">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Prénom</label>
                    <input type="text" class="form-control col-sm-8" name="operateurRadioPrenom">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Fonction</label>
                    <input type="text" class="form-control col-sm-8" name="operateurRadioFonction">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Matricule</label>
                    <input type="text" class="form-control col-sm-8" name="operateurRadioMatricule">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure de prise de service</label>
                    <input type="time" class="form-control col-sm-8" name="operateurRadioHeurePrise">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure de fin de service</label>
                    <input type="time" class="form-control col-sm-8" name="operateurRadioHeureFin">
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-8">
                <table class="table table-borderless">

                    <thead>
                    <tr>
                        <td>INTITULE</td>
                        <td>OUI</td>
                        <td>NON</td>
                        <td>QUANTITE</td>
                        <td>HEURE DE RETOUR</td>
                        <td>CONVOYEUR</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Pièce de véhicule</td>
                        <td><input type="radio" name="remettantPieceVehicule" value="1"></td>
                        <td><input type="radio" name="remettantPieceVehicule" value="0"></td>
                        <td><input type="number" min="0" name="remettantPieceVehiculeQuantite" class="form-control"
                                  ></td>
                        <td><input type="time" name="remettantPieceVehiculeHeureRetour" class="form-control">
                        </td>
                        <td><select name="remettantPieceVehiculeConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Clés véhicule</td>
                        <td><input type="radio" name="remettantCleVehicule" value="1"></td>
                        <td><input type="radio" name="remettantCleVehicule" value="0"></td>
                        <td><input type="number" min="0" name="remettantCleVehiculeQuantite" class="form-control"></td>
                        <td><input type="time" name="remettantCleVehiculeHeureRetour" class="form-control">
                        </td>
                        <td><select name="remettantCleVehiculeConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Téléphone</td>
                        <td><input type="radio" name="remettantTelephone" value="1"></td>
                        <td><input type="radio" name="remettantTelephone" value="0"></td>
                        <td><input type="number" min="0" name="remettantTelephoneQuantite" class="form-control"
                                  ></td>
                        <td><input type="time" name="remettantTelephoneHeureRetour" class="form-control"></td>
                        <td><select name="remettantTelephoneConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Radio portative</td>
                        <td><input type="radio" name="remettantRadio" value="1"></td>
                        <td><input type="radio" name="remettantRadio" value="0"></td>
                        <td><input type="number" min="0" name="remettantRadioQuantite" class="form-control">
                        </td>
                        <td><input type="time" name="remettantRadioHeureRetour" class="form-control"></td>
                        <td><select name="remettantRadioConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>G. P. B</td>
                        <td><input type="radio" name="remettantGBP" value="1"></td>
                        <td><input type="radio" name="remettantGBP" value="0"></td>
                        <td><input type="number" min="0" name="remettantGBPQuantite" class="form-control">
                        </td>
                        <td><input type="time" name="remettantGBPHeureRetour" class="form-control"></td>
                        <td><select name="remettantGBPConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>P. A</td>
                        <td><input type="radio" name="remettantPA" value="1"></td>
                        <td><input type="radio" name="remettantPA" value="0"></td>
                        <td><input type="number" min="0" name="remettantPAQuantite" class="form-control"></td>
                        <td><input type="time" name="remettantPAHeureRetour" class="form-control"></td>
                        <td><select name="remettantPAConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>F. P</td>
                        <td><input type="radio" name="remettantFP" value="1"></td>
                        <td><input type="radio" name="remettantFP" value="0"></td>
                        <td><input type="number" min="0" name="remettantFPQuantite" class="form-control"></td>
                        <td><input type="time" name="remettantFPHeureRetour" class="form-control"></td>
                        <td><select name="remettantFPConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>P. M</td>
                        <td><input type="radio" name="remettantPM" value="1"></td>
                        <td><input type="radio" name="remettantPM" value="0"></td>
                        <td><input type="number" min="0" name="remettantPMQuantite" class="form-control"></td>
                        <td><input type="time" name="remettantPMHeureRetour" class="form-control"></td>
                        <td><select name="remettantPMConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Minutions</td>
                        <td><input type="radio" name="remettantMunition" value="1"></td>
                        <td><input type="radio" name="remettantMunition" value="0"></td>
                        <td><input type="number" min="0" name="remettantMunitionQuantite" class="form-control"
                                  ></td>
                        <td><input type="time" name="remettantMunitionHeureRetour" class="form-control"></td>
                        <td><select name="remettantMunitionConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>TAG Convoyeur CC12</td>
                        <td><input type="radio" name="remettantTAG" value="1"></td>
                        <td><input type="radio" name="remettantTAG" value="0"></td>
                        <td><input type="number" min="0" name="remettantTAGQuanite" class="form-control"></td>
                        <td><input type="time" name="remettantTAGHeureRetour" class="form-control"></td>
                        <td><select name="remettantTAGConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- BENEFICIAIRES -->
        <p>BENEFICIAIRES</p>
        <hr class="title-separator"/>
        <br/>

        <p>MATERIEL</p>
        <div class="row">
            <div class="col-8">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <td>CONVOYEUR</td>
                        <td>OUI</td>
                        <td>NON</td>
                        <td>INTITULE</td>
                        <td>QUANTITE</td>
                        <td>HEURE DE REMISE</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><select name="beneficiairePieceVehiculeConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiairePieceVehicule" value="1"></td>
                        <td><input type="radio" name="beneficiairePieceVehicule" value="0"></td>
                        <td>Pièce de véhicule</td>
                        <td><input type="number" min="0" name="beneficiairePieceVehiculeQuantite" class="form-control"
                                  ></td>
                        <td><input type="time" name="beneficiairePieceVehiculeHeureRetour" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td><select name="beneficiaireCleVehiculeConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiaireCleVehicule" value="1"></td>
                        <td><input type="radio" name="beneficiaireCleVehicule" value="0"></td>
                        <td>Clés véhicule</td>
                        <td><input type="number" min="0" name="beneficiaireCleVehiculeQuantite" class="form-control"></td>
                        <td><input type="time" name="beneficiaireCleVehiculeHeureRetour" class="form-control"></td>

                    </tr>
                    <tr>
                        <td><select name="beneficiaireTelephoneConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiaireTelephone" value="1"></td>
                        <td><input type="radio" name="beneficiaireTelephone" value="0"></td>
                        <td>Téléphone</td>
                        <td><input type="number" min="0" name="beneficiaireTelephoneQuantite" class="form-control"
                                  ></td>
                        <td><input type="time" name="beneficiaireTelephoneHeureRetour" class="form-control"></td>

                    </tr>
                    <tr>
                        <td><select name="beneficiaireRadioConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiaireRadio" value="1"></td>
                        <td><input type="radio" name="beneficiaireRadio" value="0"></td>
                        <td>Radio portative</td>
                        <td><input type="number" min="0" name="beneficiaireRadioQuantite" class="form-control">
                        </td>
                        <td><input type="time" name="beneficiaireRadioHeureRetour" class="form-control"></td>

                    </tr>
                    <tr>
                        <td><select name="beneficiaireGBPConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiaireGBP" value="1"></td>
                        <td><input type="radio" name="beneficiaireGBP" value="0"></td>
                        <td>G. P. B</td>
                        <td><input type="number" min="0" name="beneficiaireGBPQuantite" class="form-control">
                        </td>
                        <td><input type="time" name="beneficiaireGBPHeureRetour" class="form-control"></td>

                    </tr>
                    <tr>
                        <td><select name="beneficiairePAConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiairePA" value="1"></td>
                        <td><input type="radio" name="beneficiairePA" value="0"></td>
                        <td>P. A</td>
                        <td><input type="number" min="0" name="beneficiairePAQuantite" class="form-control"></td>
                        <td><input type="time" name="beneficiairePAHeureRetour" class="form-control"></td>

                    </tr>
                    <tr>
                        <td><select name="beneficiaireFPConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiaireFP" value="1"></td>
                        <td><input type="radio" name="beneficiaireFP" value="0"></td>
                        <td>F. P</td>
                        <td><input type="number" min="0" name="beneficiaireFPQuantite" class="form-control"></td>
                        <td><input type="time" name="beneficiaireFPHeureRetour" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><select name="beneficiairePMConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiairePM" value="1"></td>
                        <td><input type="radio" name="beneficiairePM" value="0"></td>
                        <td>P. M</td>
                        <td><input type="number" min="0" name="beneficiairePMQuantite" class="form-control"></td>
                        <td><input type="time" name="beneficiairePMHeureRetour" class="form-control"></td>

                    </tr>
                    <tr>
                        <td><select name="beneficiaireMunitionConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiaireMunition" value="1"></td>
                        <td><input type="radio" name="beneficiaireMunition" value="0"></td>
                        <td>Minutions</td>
                        <td><input type="number" min="0" name="beneficiaireMunitionQuantite" class="form-control"
                                  ></td>
                        <td><input type="time" name="beneficiaireMunitionHeureRetour" class="form-control"></td>

                    </tr>
                    <tr>
                        <td><select name="beneficiaireTAGConvoyeur" class="form-control">
                                <option value="CB">CB</option>
                                <option value="CC">CC</option>
                                <option value="CG">CG</option>
                            </select></td>
                        <td><input type="radio" name="beneficiaireTAG" value="1"></td>
                        <td><input type="radio" name="beneficiaireTAG" value="0"></td>
                        <td>TAG Convoyeur CC12</td>
                        <td><input type="number" min="0" name="beneficiaireTAGHeureRetour" class="form-control"></td>
                        <td><input type="time" name="remettantTAGHeureRetour" class="form-control"></td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Valider</button>
            <button class="btn btn-danger" type="reset">Annuler</button>
        </div>
    </form>
</div>
@endsection
