@extends('base')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
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

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('materiel.update', $materiel->id) }}">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-2">Date</label>
                    <input type="date" class="form-control col" name="date" value="{{$materiel->date}}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="centre">Centre Régional</label>
                    <select name="centre" id="centre" class="form-control" required>
                        <option>{{$materiel->centre}}</option>
                        @foreach ($centres as $centre)
                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="centre_regional">Centre</label>
                    <select id="centre_regional" name="centre_regional" class="form-control" required>
                        <option>{{$materiel->centre_regional}}</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <br>
        <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="equipages-tab" data-toggle="tab" href="#equipages" role="tab"
                   aria-controls="equipages" aria-selected="true">EQUIPAGES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="remettant-tab" data-toggle="tab" href="#remettant"
                   role="tab"
                   aria-controls="remettant" aria-selected="false">REMETTANT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="beneficiaire-tab" data-toggle="tab" href="#beneficiaire"
                   role="tab"
                   aria-controls="beneficiaire" aria-selected="false">BENEFICIAIRE</a>
            </li>
        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="equipages" role="tabpanel"
                 aria-labelledby="equipages-tab">
                <!-- INFORMATIONS GENERALE -->
                <p>INFORMATIONS GENERALES</p>
                <hr class="title-separator"/>
                <br/>
                <div class="row">
                    <div class="col">
                        <p class="text-center">Equipage</p>
                        <hr/>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-2"><label>CB</label></div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="cbMatricule" class="col-sm-4">Matricule</label>
                                            <select type="text" name="cbMatricule" id="cbMatricule"
                                                    class="form-control col-sm-8">
                                                <option value="{{$materiel->cbMatricule}}">{{$materiel->cbs->matricule ?? ""}}</option>
                                                @foreach($personnels as $personnel)
                                                    <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                        | {{$personnel->nomPrenoms}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Nom</label>
                                            <input type="text" class="form-control col-sm-8" name="cbNom" value="{{$materiel->cbs->nomPrenoms}}">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Fonction</label>
                                            <input type="text" class="form-control col-sm-8" name="cbFonction" value="{{$materiel->cbs->fonction}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-2"><label>CC</label></div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="ccMatricule" class="col-sm-4">Matricule</label>
                                            <select type="text" name="ccMatricule" id="ccMatricule"
                                                    class="form-control col-sm-8">
                                                <option value="{{$materiel->ccMatricule}}">{{$materiel->ccs->nomPrenoms ?? ""}}</option>
                                                @foreach($personnels as $personnel)
                                                    <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                        | {{$personnel->nomPrenoms}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Nom</label>
                                            <input type="text" class="form-control col-sm-8" name="ccNom" value="{{$materiel->ccs->nomPrenoms ?? ""}}">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Fonction</label>
                                            <input type="text" class="form-control col-sm-8" name="ccFonction" value="{{$materiel->ccs->fonction ?? ""}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-2"><label>CG</label></div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="cgMatricule" class="col-sm-4">Matricule</label>
                                            <select type="text" name="cgMatricule" id="cgMatricule"
                                                    class="form-control col-sm-8">
                                                <option value="{{$materiel->cgMatricule}}">{{$materiel->cgs->matricule ?? ''}}</option>
                                                @foreach($personnels as $personnel)
                                                    <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                        | {{$personnel->nomPrenoms}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Nom</label>
                                            <input type="text" class="form-control col-sm-8" name="cgNom" value="{{$materiel->cgs->nomPrenoms ?? ''}}">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Fonction</label>
                                            <input type="text" class="form-control col-sm-8" name="cgFonction" value="{{$materiel->cgs->fonction ?? ''}}">
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
                                    <input type="text" class="form-control" name="vehiculeVB" value="{{$materiel->vehiculeVB}}">
                                </div>
                                <div class="form-group row">
                                    <input type="text" class="form-control" name="vehiculeVL" value="{{$materiel->vehiculeVL}}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="form-group row">
                            <label class="col-sm-4">Tournée N°</label>
                            <select class="form-control col-sm-8" name="noTournee" required>
                                <option value="{{$materiel->noTournee}}">{{$materiel->tournees->numeroTournee ?? 'Donnée indisponible'}}</option>
                                @foreach($tournees as $tournee)
                                    <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                                @endforeach
                            </select>
                            {{--<input type="text" class="form-control col-sm-8" name="noTournee" required>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="remettant" role="tabpanel"
                 aria-labelledby="remettant-tab">

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
                                    <option>{{$materiel->operateurRadio}}</option>
                                    <option value="opérateur radio 1">Opérateur radio 1</option>
                                    <option value="opérateur radio 2">Opérateur radio 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="operateurRadio" class="col-sm-4">Matricule</label>
                            <select type="text" name="operateurRadioMatricule" id="operateurRadioMatricule"
                                    class="form-control col-sm-8">
                                <option value="{{$materiel->operateurRadioMatricule}}">{{$materiel->operateurRadios->matricule ?? ''}}</option>
                                @foreach($personnels as $personnel)
                                    <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                        | {{$personnel->nomPrenoms}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Nom</label>
                            <input type="text" class="form-control col-sm-8" name="operateurRadioNom" value="{{$materiel->operateurRadios->matricule ?? ''}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Fonction</label>
                            <input type="text" class="form-control col-sm-8" name="operateurRadioFonction" value="{{$materiel->operateurRadios->fonction ?? ''}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Heure de prise de service</label>
                            <input type="time" class="form-control col-sm-8" name="operateurRadioHeurePrise" value="{{$materiel->operateurRadioHeurePrise}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Heure de fin de service</label>
                            <input type="time" class="form-control col-sm-8" name="operateurRadioHeureFin" value="{{$materiel->operateurRadioHeureFin}}">
                        </div>
                    </div>
                </div>
                <br />
                {{--TODO--}}
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
            </div>
            <div class="tab-pane fade show" id="beneficiaire" role="tabpanel"
                 aria-labelledby="beneficiaire-tab">

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
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Valider</button>
            <button class="btn btn-danger" type="reset">Annuler</button>
        </div>
    </form>
</div>
    <script>
        let personnels =  {!! json_encode($personnels) !!};

        $(document).ready(function () {
            $("#cbMatricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("input[name=cbNom]").val(personnel.nomPrenoms);
                    $("input[name=cbFonction]").val(personnel.fonction);
                }
            });
            $("#ccMatricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("input[name=ccNom]").val(personnel.nomPrenoms);
                    $("input[name=ccFonction]").val(personnel.fonction);
                }
            });
            $("#cgMatricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("input[name=cgNom]").val(personnel.nomPrenoms);
                    $("input[name=cgFonction]").val(personnel.fonction);
                }
            });
            $("#operateurRadioMatricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("input[name=operateurRadioNom]").val(personnel.nomPrenoms);
                    $("input[name=operateurRadioFonction]").val(personnel.fonction);
                }
            });
        })
    </script>
@endsection
