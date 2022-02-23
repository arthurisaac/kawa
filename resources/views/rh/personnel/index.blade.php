@extends('bases.rh')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
    @extends('bases.toolbar', ["title" => "RH", "subTitle" => "Personnel"])
@section("nouveau")
    <a href="/personnel-liste" class="btn btn-sm btn-primary">Liste</a>
@endsection
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif

        @if(session()->get('success'))
            <div class="alert alert-success" id="successAlert">
                {{ session()->get('success') }}
                <br>
                <br>
                <button class="btn btn-outline-dark btn-sm" id="continueBtn">Continuer</button>
                <a href="/personnel-liste" class="btn btn-info btn-sm">Consulter la liste</a>
            </div>
        @endif

        <form method="post" action="{{ route('personnel.store') }}" enctype="multipart/form-data">
            @csrf

            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="personnel-tab" data-toggle="tab" href="#personnel" role="tab"
                       aria-controls="personne" aria-selected="true">Information personnel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="infos-tab" data-toggle="tab" href="#infos" role="tab"
                       aria-controls="infos" aria-selected="false">Informations complementaires</a>
                </li>
                {{--<li class="nav-item">
                    <a class="nav-link" id="affectation-tab" data-toggle="tab" href="#affectation" role="tab"
                       aria-controls="affectation" aria-selected="false">Affectation</a>
                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" id="conges-tab" data-toggle="tab" href="#conges" role="tab"
                       aria-controls="conges" aria-selected="false">Gestion des conges</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sanctions-tab" data-toggle="tab" href="#sanctions" role="tab"
                       aria-controls="sanctions" aria-selected="false">Gestion des sanctions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="gestion-mission-tab" data-toggle="tab" href="#gestion-mission" role="tab"
                       aria-controls="gestion-mission" aria-selected="false">Gestion des missions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="gestion-absences-tab" data-toggle="tab" href="#gestion-absences" role="tab"
                       aria-controls="gestion-absences" aria-selected="false">Gestion des absences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="gestion-contrats-tab" data-toggle="tab" href="#gestion-contrats" role="tab"
                       aria-controls="gestion-contrats" aria-selected="false">Gestion des contrats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="gestion-explication-tab" data-toggle="tab" href="#gestion-explication"
                       role="tab"
                       aria-controls="gestion-explication" aria-selected="false">Gestion des explications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="gestion-affectation-tab" data-toggle="tab" href="#gestion-affectation"
                       role="tab"
                       aria-controls="gestion-affectation" aria-selected="false">Gestion des affectations</a>
                </li>
            </ul>
            <br>
            <div class="card card-xl-stretch">
                <div class="card-body pt-3">
                    <div class="tab-content">
                <div class="tab-pane fade show active" id="personnel" role="tabpanel" aria-labelledby="personnel-tab">
                    <div class="container">
                        <br>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group row">
                                    <label class="col-sm-4">Matricule</label>
                                    <input type="text" class="form-control col-sm-6" name="matricule"
                                           value={{$nextId}} required/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Centre</label>
                                    <select class="form-control col-sm-6" name="centre" id="centre" required>
                                        <option>Choisir centre</option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Centre régional</label>
                                    <select class="form-control col-sm-6" name="centreRegional" id="centre_regional"
                                            required></select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom et prénoms</label>
                                    <input type="text" name="nomPrenoms" class="form-control col-sm-6" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date de naissance</label>
                                    <input type="date" name="dateNaissance" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date d’entrée dans la société</label>
                                    <input type="date" name="dateEntreeSociete" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date de sortie</label>
                                    <input type="date" name="dateSortie" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Type de sortie</label>
                                    <select name="typeSortie" class="form-control col-sm-6">
                                        <option></option>
                                        <option value="Fin contrat">Fin contrat</option>
                                        <option value="Fin contrat">Licenciement</option>
                                        <option value="Fin contrat">Abandon de poste</option>
                                        <option value="Fin contrat">Retraite</option>
                                        <option value="Fin contrat">Décès</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Fontion</label>
                                    <input type="text" name="fonction" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Service</label>
                                    <input type="text" name="service" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nature du contrat</label>
                                    <select name="natureContrat" class="form-control col-sm-6">
                                        <option value="CDD">CDD</option>
                                        <option value="CDI">CDI</option>
                                        <option value="PRESTATAIRE">PRESTATAIRE</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Numéro CNPS</label>
                                    <input type="number" name="numeroCNPS" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Situation matrimoniale</label>
                                    <input type="text" name="situationMatrimoniale" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nombre d'enfants</label>
                                    <input type="number" min="0" name="nombreEnfants" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Photo</label>
                                    <input type="file" name="photo" id="photo" class="form-control-file col-sm-6">
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="tab-pane fade" id="affectation" role="tabpanel" aria-labelledby="affectation-tab">
                    <div class="container">
                        <br/>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-md-2">Matricule</label>
                                    <input type="text" class="form-control col-md-4" name="matricule"
                                           value={{$nextId}} required/>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2">Centre</label>
                                    <select class="Combobox col-md-4" name="centre" id="centre" required>
                                        <option>Choisir centre</option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Centre régional</label>
                                    <select class="Combobox col-md-4" name="centreRegional" id="centre_regional"
                                            required></select>
                                </div>
                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Sécurité</label></div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="securite"
                                                   value="Responsable de sécurité">
                                            <label class="form-check-label">
                                                Responsable de sécurité
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="securite"
                                                   value="Chargé de sécurité">
                                            <label class="form-check-label">
                                                Chargé de sécurité
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="securite"
                                                   value="Opérateur radio">
                                            <label class="form-check-label">
                                                Opérateur radio
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br/>

                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Transport</label></div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="transport"
                                                   value="Responsable de sécurité">
                                            <label class="form-check-label">
                                                Responsable de sécurité
                                            </label>
                                        </div>
                                        <div class="row" style="align-items: center;">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport"
                                                           value="Convoyeur">
                                                    <label class="form-check-label">
                                                        Convoyeur
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport"
                                                           value="Chef de bord">
                                                    <label class="form-check-label">
                                                        Chef de bord
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport"
                                                           value="Chauffeur">
                                                    <label class="form-check-label">
                                                        Chauffeur
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport"
                                                           value="Garde">
                                                    <label class="form-check-label">
                                                        Garde
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <br/>

                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Caisse</label></div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caisse"
                                                   value="Chargée de caisse">
                                            <label class="form-check-label">
                                                Chargée de caisse
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caisse"
                                                   value="Chargée adjointe de caisse">
                                            <label class="form-check-label">
                                                Chargée adjointe de caisse
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caisse"
                                                   value="Caissière">
                                            <label class="form-check-label">
                                                Caissière
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caisse" value="Trieuse">
                                            <label class="form-check-label">
                                                Trieuse
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <br/>

                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Régulation</label></div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="regulation"
                                                   value="Chargée de la régulation">
                                            <label class="form-check-label">
                                                Chargée de la régulation
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="regulation"
                                                   value="Chargée adjointe de la régulation">
                                            <label class="form-check-label">
                                                Chargée adjointe de la régulation
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br/>

                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Siège</label></div>
                                    <div class="col">
                                        <div class="row" style="align-items: center;">
                                            <div class="col-3"><label>Service</label></div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="RESSOURCES HUMAINES">
                                                    <label class="form-check-label">
                                                        RESSOURCES HUMAINES
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="INFORMATIQUE">
                                                    <label class="form-check-label">
                                                        INFORMATIQUE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="LOGISTIQUE">
                                                    <label class="form-check-label">
                                                        LOGISTIQUE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="MONETIQUE">
                                                    <label class="form-check-label">
                                                        MONETIQUE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="GARAGE">
                                                    <label class="form-check-label">
                                                        GARAGE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="SSB">
                                                    <label class="form-check-label">
                                                        SSB
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row" style="align-items: center;">
                                            <div class="col-3"><label>Direction</label></div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeDirection"
                                                           value="DIRECTION FINANCIERE ET COMPTABLE">
                                                    <label class="form-check-label">
                                                        DIRECTION FINANCIERE ET COMPTABLE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeDirection"
                                                           value="DIRECTION COMMERCIALE ET MARKETING">
                                                    <label class="form-check-label">
                                                        DIRECTION COMMERCIALE ET MARKETING
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeDirection"
                                                           value="DIRECTION DES OPERATIONS">
                                                    <label class="form-check-label">
                                                        DIRECTION DES OPERATIONS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row" style="align-items: center;">
                                            <div class="col-3"><label>Direction générale</label></div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="siegeDirectionGenerale"
                                                           value="DIRECTION GENERALE ADJOINTE">
                                                    <label class="form-check-label">
                                                        DIRECTION GENERALE ADJOINTE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="siegeDirectionGenerale" value="ASISTANTE EXECUTIVE">
                                                    <label class="form-check-label">
                                                        ASISTANTE EXECUTIVE
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>--}}
                <div class="tab-pane fade" id="conges" role="tabpanel" aria-labelledby="conges-tab">
                    <div class="container">
                        <br>
                        <button type="button" id="addRowConges" class="btn btn-sm btn-dark">Ajouter</button>
                        <br>
                        <br>
                        <table class="table table-bordered table-hover" style="width: 100%" id="tableConge">
                            <thead>
                            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                                <th>Date du dernier départ</th>
                                <th>Date du prochain départ</th>
                                <th>Nombre de jours pris</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td><input type="date" name="dateDernierDepartConge[]" class="form-control"></td>
                                <td><input type="date" name="dateProchainDepartConge[]" class="form-control"></td>
                                <td><input type="text" name="nombreJourPris[]" class="form-control"></td>
                                <td><a class="btn btn-danger btn-sm" onclick="supprimerCongeTableLine(this)"></a></td>
                            </tr>

                            </tbody>
                        </table>
                        {{--<div class="row">
                            <div class="col-5">
                                <br/>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date du dernier départ en congé</label>
                                    <input type="date" name="dateDernierDepartConge" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date du prochain départ en congé</label>
                                    <input type="date" name="dateProchainDepartConge" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nombre de jours pris</label>
                                    <input type="number" min="0" name="nombreJourPris" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nombre de jours pris</label>
                                    <input type="number" min="0" name="nombreJourRestant" class="form-control col-sm-6">
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
                <div class="tab-pane fade" id="sanctions" role="tabpanel" aria-labelledby="sanctions-tab">
                    <div class="container">
                        <br>
                        <button type="button" id="addRowSanction" class="btn btn-sm btn-dark">Ajouter</button>
                        <br>
                        <br>
                        <table class="table table-bordered" id="tableSanction">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Sanction</th>
                                <th>Motif</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 0; $i <= 2; $i++)
                                <tr>
                                    <td><input type="date" name="sanction_date[]" class="form-control"></td>
                                    <td><select type="text" name="sanction_sanction[]" class="form-control">
                                            <option>Avertissement</option>
                                            <option>Mise à pied</option>
                                            <option>Licenciement</option>
                                        </select></td>
                                    <td><input type="text" name="sanction_motif[]" class="form-control"></td>
                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerSanctionTableLine(this)"></a>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="infos" role="tabpanel" aria-labelledby="infos-tab">
                    <div class="container">
                        <div class="row">
                            <br>
                            <div class="col-5">
                                <br/>
                                <div class="form-group row">
                                    <label class="col-sm-4">Adresse géographique</label>
                                    <input type="text" name="adresseGeographique" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Contact personnels</label>
                                    <input type="text" name="contactPersonnel" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom du père</label>
                                    <input type="text" name="nomPere" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom de la mère</label>
                                    <input type="text" name="nomMere" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom du conjoint</label>
                                    <input type="text" name="nomConjoint" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Personnes à contacter en cas d'urgence</label>
                                    <input type="text" name="personneContacter" class="form-control col-sm-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="gestion-mission" role="tabpanel" aria-labelledby="gestion-mission-tab">
                    <div class="container">
                        <br>
                        <button type="button" id="addRowMission" class="btn btn-sm btn-dark">Ajouter</button>
                        <br>
                        <br>
                        <table class="table table-bordered" id="tableMission">
                            <thead>
                            <tr>
                                <th>Début mission</th>
                                <th>Fin mission</th>
                                <th>Nbre de jours</th>
                                <th>Lieu</th>
                                <th>Motif</th>
                                <th>Frais</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 0; $i <= 2; $i++)
                                <tr>
                                    <td><input type="date" name="missions_debut[]" class="form-control"></td>
                                    <td><input type="date" name="missions_fin[]" class="form-control"></td>
                                    <td><input type="number" min="0" name="missions_nbre_jours[]"
                                               class="form-control"></td>
                                    <td><input type="text" name="missions_lieu[]" class="form-control"></td>
                                    <td><input type="text" name="missions_motif[]" class="form-control"></td>
                                    <td><input type="number" min="0" name="missions_frais[]" class="form-control">
                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerMissionTableLine(this)"></a>
                                    </td>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="gestion-absences" role="tabpanel" aria-labelledby="gestion-absences-tab">
                    <div class="container">
                        <br>
                        <button type="button" id="addRowAbsences" class="btn btn-sm btn-dark">Ajouter</button>
                        <br>
                        <br>
                        <table class="table table-bordered" id="tableAbsences">
                            <thead>
                            <tr>
                                <th>Date absence</th>
                                <th>Fin absence</th>
                                <th>Nbre de jours</th>
                                <th>Motif</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 0; $i < 2; $i++)
                                <tr>
                                    <td><input type="date" name="absence_debut[]" class="form-control"></td>
                                    <td><input type="date" name="absence_fin[]" class="form-control"></td>
                                    <td><input type="number" name="absence_nombre_jours[]" class="form-control"></td>
                                    <td><input type="text" name="absence_motif[]" class="form-control"></td>
                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerAbsenceTableLine(this)"></a>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="gestion-contrats" role="tabpanel" aria-labelledby="gestion-contrats-tab">
                    <div class="container">
                        <br>
                        <button type="button" id="addRowContrats" class="btn btn-sm btn-dark">Ajouter</button>
                        <br>
                        <br>
                        <table class="table table-bordered" id="tableContrats">
                            <thead>
                            <tr>
                                <th>Type de contrat</th>
                                <th>Début contrat</th>
                                <th>Fin contrat</th>
                                <th>Nbre de jours</th>
                                <th>Fonction</th>
                                <th>Salaire</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 0; $i <= 2; $i++)
                                <tr>
                                    <td><select type="text" name="contrat_type_contrat[]" class="form-control">
                                            <option>CDD</option>
                                            <option>CDI</option>
                                            <option>STAGE</option>
                                            <option>INTERIM</option>
                                            <option>IMMERSION</option>
                                        </select></td>
                                    <td><input type="date" name="contrat_debut_contrat[]" class="form-control"></td>
                                    <td><input type="date" name="contrat_fin_contrat[]" class="form-control"></td>
                                    <td><input type="number" name="contrat_nombre_jours[]" class="form-control"></td>
                                    <td><input type="text" name="contrat_fonction[]" class="form-control"></td>
                                    <td><input type="text" name="contrat_salaire[]" class="form-control"></td>
                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerContratTableLine(this)"></a>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="gestion-explication" role="tabpanel"
                     aria-labelledby="gestion-explication-tab">
                    <div class="container">
                        <br>
                        <button type="button" id="addRowExplication" class="btn btn-sm btn-dark">Ajouter</button>
                        <br>
                        <br>
                        <table class="table table-bordered" id="tableExplication">
                            <thead>
                            <tr>
                                <th>Date demande d'explication</th>
                                <th>Motif demande explication</th>
                                <th>Sanctions</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 0; $i < 2; $i++)
                                <tr>
                                    <td><input type="date" name="demande_date_demande[]" class="form-control"></td>
                                    <td><input type="text" name="demande_motif[]" class="form-control"></td>
                                    <td><input type="text" name="demande_sanctions[]" class="form-control"></td>
                                    <td><a class="btn btn-danger btn-sm"
                                           onclick="supprimerExplicationTableLine(this)"></a></td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="gestion-affectation" role="tabpanel"
                     aria-labelledby="gestion-affectation-tab">
                    <div class="container">
                        <br>
                        <button type="button" id="addRowAffection" class="btn btn-sm btn-dark">Ajouter</button>
                        <br>
                        <br>
                        <table class="table table-bordered" id="tableAffectation">
                            <thead>
                            <tr>
                                <th>Date d'affectation</th>
                                <th>Centre</th>
                                <th>Motif</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 0; $i < 2; $i++)
                                <tr>
                                    <td><input type="date" name="affectation_date[]" class="form-control"></td>
                                    <td><input type="text" name="affectation_centre[]" class="form-control"></td>
                                    <td><input type="text" name="affectation_motif[]" class="form-control"></td>
                                    <td><a class="btn btn-danger btn-sm"
                                           onclick="supprimerAffectationTableLine(this)"></a></td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
            </div>

            <br>
            <br>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
            </div>

        </form>
    </div>
</div>
<script>
    let centres = {!! json_encode($centres) !!};
    let centres_regionaux = {!! json_encode($centres_regionaux) !!};

    $(document).ready(function () {
        $("#centre").on("change", function () {
            $("#centre_regional option").remove();

            const centre = centres.find(c => c.centre === this.value);
            const regions = centres_regionaux.filter(region => {
                return region.id_centre === centre.id;
            });
            regions.map(({centre_regional}) => {
                $('#centre_regional').append($('<option>', {
                    value: centre_regional,
                    text: centre_regional
                }));
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Gestion des missions
        $("#addRowMission").on("click", function () {
            $('#tableMission').append('<tr>\n' +
                '                                    <td><input type="date" name="missions_debut[]" class="form-control"></td>\n' +
                '                                    <td><input type="date" name="missions_fin[]" class="form-control"></td>\n' +
                '                                    <td><input type="number" min="0" name="missions_nbre_jours[]"\n' +
                '                                               class="form-control"></td>\n' +
                '                                    <td><input type="text" name="missions_lieu[]" class="form-control"></td>\n' +
                '                                    <td><input type="text" name="missions_motif[]" class="form-control"></td>\n' +
                '                                    <td><input type="number" min="0" name="missions_frais[]" class="form-control"></td>\n' +
                '                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerMissionTableLine(this)"></a></td>\n' +
                '                                </tr>');
        });

        // Gestion des absences
        $("#addRowAbsences").on("click", function () {
            $('#tableAbsences').append('<tr>\n' +
                '                                    <td><input type="date" name="absence_debut[]" class="form-control"></td>\n' +
                '                                    <td><input type="date" name="absence_fin[]" class="form-control"></td>\n' +
                '                                    <td><input type="number" name="absence_nombre_jours[]" class="form-control"></td>\n' +
                '                                    <td><input type="text" name="absence_motif[]" class="form-control"></td>\n' +
                '                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerAbsenceTableLine(this)"></a></td>\n' +
                '                                </tr>');
        });

        // Gestion des contrats
        $("#addRowContrats").on("click", function () {
            $('#tableContrats').append('<tr>\n' +
                '                                    <td><select type="text" name="contrat_type_contrat[]" class="form-control">\n' +
                '                                            <option>CDD</option>\n' +
                '                                            <option>CDI</option>\n' +
                '                                            <option>STAGE</option>\n' +
                '                                            <option>INTERIM</option>\n' +
                '                                            <option>IMMERSION</option>\n' +
                '                                        </select></td>\n' +
                '                                    <td><input type="date" name="contrat_debut_contrat[]" class="form-control"></td>\n' +
                '                                    <td><input type="date" name="contrat_fin_contrat[]" class="form-control"></td>\n' +
                '                                    <td><input type="number" name="contrat_nombre_jours[]" class="form-control"></td>\n' +
                '                                    <td><input type="text" name="contrat_fonction[]" class="form-control"></td>\n' +
                '                                    <td><input type="text" name="contrat_salaire[]" class="form-control"></td>\n' +
                '                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerContratTableLine(this)"></a></td>\n' +
                '                                </tr>');
        });

        // Gestion des explications
        $("#addRowExplication").on("click", function () {
            $('#tableExplication').append('<tr>\n' +
                '                                    <td><input type="date" name="demande_date_demande[]" class="form-control"></td>\n' +
                '                                    <td><input type="text" name="demande_motif[]" class="form-control"></td>\n' +
                '                                    <td><input type="text" name="demande_sanctions[]" class="form-control"></td>\n' +
                '                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerExplicationTableLine(this)"></a></td>\n' +
                '                                </tr>');
        });

        // Gestion des affectations
        $("#addRowAffection").on("click", function () {
            $('#tableAffectation').append('<tr>\n' +
                '                                    <td><input type="date" name="affectation_date[]" class="form-control"></td>\n' +
                '                                    <td><input type="text" name="affectation_centre[]" class="form-control"></td>\n' +
                '                                    <td><input type="text" name="affectation_motif[]" class="form-control"></td>\n' +
                '                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerAffectationTableLine(this)"></a></td>\n' +
                '                                </tr>');
        });

        // Gestion des sanctions
        $("#addRowSanction").on("click", function () {
            $('#tableSanction').append('<tr>\n' +
                '                                    <td><input type="date" name="sanction_date[]" class="form-control"></td>\n' +
                '                                    <td><select type="text" name="sanction_sanction[]" class="form-control">\n' +
                '                                            <option>Avertissement</option>\n' +
                '                                            <option>Mise à pied</option>\n' +
                '                                            <option>Licenciement </option>\n' +
                '                                        </select></td>\n' +
                '                                    <td><input type="text" name="sanction_motif[]" class="form-control"></td>\n' +
                '                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerSanctionTableLine(this)"></a></td>\n' +
                '                                </tr>');
        });

        // Gestion des congés
        $("#addRowConges").on("click", function () {
            $('#tableConge').append('<tr>\n' +
                '                                    <td><input type="date" name="dateDernierDepartConge[]" class="form-control"></td>\n' +
                '                                    <td><input type="date" name="dateProchainDepartConge[]" class="form-control"></td>\n' +
                '                                    <td><input type="text" name="nombreJourPris[]" class="form-control"></td>\n' +
                '                                    <td><a class="btn btn-danger btn-sm" onclick="supprimerCongeTableLine(this)"></a></td>\n' +
                '                                </tr>');
        });
    });
</script>

<script>
    function supprimerCongeTableLine(e) {
        const indexLigne = $(e).closest('tr').get(0).rowIndex;
        document.getElementById("tableConge").deleteRow(indexLigne);
    }

    function supprimerSanctionTableLine(e) {
        const indexLigne = $(e).closest('tr').get(0).rowIndex;
        document.getElementById("tableSanction").deleteRow(indexLigne);
    }

    function supprimerMissionTableLine(e) {
        const indexLigne = $(e).closest('tr').get(0).rowIndex;
        document.getElementById("tableMission").deleteRow(indexLigne);
    }

    function supprimerAbsenceTableLine(e) {
        const indexLigne = $(e).closest('tr').get(0).rowIndex;
        document.getElementById("tableAbsences").deleteRow(indexLigne);
    }

    function supprimerContratTableLine(e) {
        const indexLigne = $(e).closest('tr').get(0).rowIndex;
        document.getElementById("tableContrats").deleteRow(indexLigne);
    }

    function supprimerExplicationTableLine(e) {
        const indexLigne = $(e).closest('tr').get(0).rowIndex;
        document.getElementById("tableExplication").deleteRow(indexLigne);
    }

    function supprimerAffectationTableLine(e) {
        const indexLigne = $(e).closest('tr').get(0).rowIndex;
        document.getElementById("tableAffectation").deleteRow(indexLigne);
    }

    $(document).ready(function () {
        $("#continueBtn").on("click", function () {
            $("#successAlert").hide();
        });
    });
</script>

@endsection
