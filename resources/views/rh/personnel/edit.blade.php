@extends('bases.rh')

@section('main')
    @extends('bases.toolbar', ["title" => "RH", "subTitle" => "Modification Personnel"])
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
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
            <form method="post" action="{{ route('personnel.update', $personnel->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div style="text-align: right; display: flex; justify-content: flex-end;">
                    <div style="margin-right: 10px;">
                        <h5>{{ $personnel->nomPrenoms }}</h5>
                        <p style="color: darkred">{{ $personnel->fonction }}</p>
                    </div>
                    <img
                        src="{{$personnel->photo ? (config('global.FILES_URL') . $personnel->photo)  : "/images/logonoir.png" }}"
                        alt="" style="height: 50px;">
                </div>
                <br>

                <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="personnel-tab" data-toggle="tab" href="#personnel" role="tab"
                           aria-controls="personne" aria-selected="true">Information personnel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="infos-tab" data-toggle="tab" href="#infos" role="tab"
                           aria-controls="infos" aria-selected="false">Informations complementaires</a>
                    </li>
                    {{--                <li class="nav-item">--}}
                    {{--                    <a class="nav-link" id="affectation-tab" data-toggle="tab" href="#affectation" role="tab"--}}
                    {{--                       aria-controls="affectation" aria-selected="false">Affectation</a>--}}
                    {{--                </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" id="conges-tab" data-toggle="tab" href="#conges" role="tab"
                           aria-controls="conges" aria-selected="false">Gestion des conges</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sanctions-tab" data-toggle="tab" href="#sanctions" role="tab"
                           aria-controls="sanctions" aria-selected="false">Gestion des sanctions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="gestion-mission-tab" data-toggle="tab" href="#gestion-mission"
                           role="tab"
                           aria-controls="gestion-mission" aria-selected="false">Gestion des missions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="gestion-absences-tab" data-toggle="tab" href="#gestion-absences"
                           role="tab"
                           aria-controls="gestion-absences" aria-selected="false">Gestion des absences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="gestion-contrats-tab" data-toggle="tab" href="#gestion-contrats"
                           role="tab"
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
                    <div class="card-body pt-3 py-0">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="personnel" role="tabpanel"
                                 aria-labelledby="personnel-tab">
                                <div>
                                    <br>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Matricule</label>
                                                <input type="text" class="form-control col-sm-6" name="matricule"
                                                       value={{$personnel->matricule}} required/>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre</label>
                                                <select class="form-select col-md-6" name="centre" id="centre" required>
                                                    <option value={{ $personnel->centre }}>{{ $personnel->centre }}
                                                    </option>
                                                    @foreach ($centres as $centre)
                                                        <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre régional</label>
                                                <select class="form-select col-md-6" name="centreRegional"
                                                        id="centre_regional"
                                                        required>
                                                    <option
                                                        value="{{ $personnel->centreRegional }}"> {{ $personnel->centreRegional }}</option>
                                                </select>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom et prénoms</label>
                                                <input type="text" name="nomPrenoms" class="form-control col-sm-6"
                                                       value="{{ $personnel->nomPrenoms }}" required>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date de naissance</label>
                                                <input type="date" name="dateNaissance" class="form-control col-sm-6"
                                                       value="{{ $personnel->dateNaissance }}">
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date d’entrée dans la société</label>
                                                <input type="date" name="dateEntreeSociete"
                                                       class="form-control col-sm-6"
                                                       value={{ $personnel->dateEntreeSociete }}>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date de sortie</label>
                                                <input type="date" name="dateSortie" class="form-control col-sm-6"
                                                       value="{{ $personnel->dateSortie }}">
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Type de sortie</label>
                                                <select name="typeSortie" class="form-control col-sm-6">
                                                    <option value="Fin contrat">Fin contrat</option>
                                                    <option value="Fin contrat">Licenciement</option>
                                                    <option value="Fin contrat">Abandon de poste</option>
                                                    <option value="Fin contrat">Retraite</option>
                                                    <option value="Fin contrat">Décès</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Fontion</label>
                                                <input type="text" name="fonction" class="form-control col-sm-6"
                                                       value="{{ $personnel->fonction }}">
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Service</label>
                                                <input type="text" name="service" class="form-control col-sm-6"
                                                       value="{{ $personnel->service }}">
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nature du contrat</label>
                                                <select name="natureContrat" class="form-control col-sm-6">
                                                    <option>{{ $personnel->natureContrat }}</option>
                                                    <option value="CDD">CDD</option>
                                                    <option value="CDI">CDI</option>
                                                    <option value="PRESTATAIRE">PRESTATAIRE</option>
                                                </select>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Numéro CNPS</label>
                                                <input type="number" name="numeroCNPS" class="form-control col-sm-6"
                                                       value={{ $personnel->numeroCNPS }}>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Situation matrimoniale</label>
                                                <input type="text" name="situationMatrimoniale"
                                                       class="form-control col-sm-6"
                                                       value="{{ $personnel->situationMatrimoniale }}">
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nombre d'enfants</label>
                                                <input type="number" min="0" name="nombreEnfants"
                                                       class="form-control col-sm-6"
                                                       value="{{ $personnel->nombreEnfants }}">
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Photo</label>
                                                <input type="file" name="photo" class="form-control form-control-file col-sm-6">
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="conges" role="tabpanel" aria-labelledby="conges-tab">
                                <div>
                                    <br>
                                    <button type="button" id="addRowConges" class="btn btn-sm btn-dark">Ajouter</button>
                                    <br>
                                    <br>
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="tableConge">
                                        <thead>
                                        <tr>
                                            <th>Date du dernier départ</th>
                                            <th>Date du prochain départ</th>
                                            <th>Nombre de jours pris</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($gestionConge as $gestion)
                                            <tr>
                                                <input type="hidden" name="conge_id[]" value="{{$gestion->id}}"
                                                       class="form-control">
                                                <td><input type="date" name="dateDernierDepartConge_edit[]"
                                                           value="{{$gestion->dernier}}" class="form-control"></td>
                                                <td><input type="date" name="dateProchainDepartConge[]"
                                                           value="{{$gestion->prochain}}" class="form-control"></td>
                                                <td><input type="text" name="nombreJourPris[]"
                                                           value="{{$gestion->jourPris}}"
                                                           class="form-control"></td>
                                                <td><a class="btn btn-danger btn-sm"
                                                       onclick="supprimerConge('{{$gestion->id}}', this)"></a></td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><input type="date" name="dateDernierDepartConge[]" class="form-control">
                                            </td>
                                            <td><input type="date" name="dateProchainDepartConge[]"
                                                       class="form-control"></td>
                                            <td><input type="text" name="nombreJourPris[]" class="form-control"></td>
                                            <td><a class="btn btn-danger btn-sm"
                                                   onclick="supprimerCongeTableLine(this)"></a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sanctions" role="tabpanel" aria-labelledby="sanctions-tab">
                                <div>
                                    <br>
                                    <button type="button" id="addRowSanction" class="btn btn-sm btn-dark">Ajouter
                                    </button>
                                    <br>
                                    <br>
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="tableSanction">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Sanction</th>
                                            <th>Motif</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($gestionSanction as $mission)
                                            <tr>
                                                <input type="hidden" name="sanction_id[]" value="{{$mission->id}}"
                                                       class="form-control">
                                                <td><input type="date" name="sanction_date_edit[]"
                                                           value="{{$mission->date}}" class="form-control"></td>
                                                <td><input type="text" name="sanction_sanction_edit[]"
                                                           value="{{$mission->sanction}}" class="form-control"></td>
                                                <td><input type="text" name="sanction_motif_edit[]"
                                                           value="{{$mission->motif}}" class="form-control"></td>
                                                <td></td>

                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><input type="date" name="sanction_date[]" class="form-control"></td>
                                            <td><select type="text" name="sanction_sanction[]" class="form-control">
                                                    <option>Avertissement</option>
                                                    <option>Mise à pied</option>
                                                    <option>Licenciement</option>
                                                </select></td>
                                            <td><input type="text" name="sanction_motif[]" class="form-control"></td>
                                            <td>><a class="btn btn-danger btn-sm"
                                                    onclick="supprimerSanctionTableLine(this)"></a></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="infos" role="tabpanel" aria-labelledby="infos-tab">
                                <div>
                                    <div class="row">
                                        <br>
                                        <div class="col-5">
                                            <br/>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Adresse géographique</label>
                                                <input type="text" name="adresseGeographique"
                                                       class="form-control col-sm-6"
                                                       value={{ $personnel->adresseGeographique }}>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Contact personnels</label>
                                                <input type="text" name="contactPersonnel" class="form-control col-sm-6"
                                                       value={{ $personnel->contactPersonnel }}>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom du père</label>
                                                <input type="text" name="nomPere" class="form-control col-sm-6"
                                                       value={{ $personnel->nomPere }}>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom de la mère</label>
                                                <input type="text" name="nomMere" class="form-control col-sm-6"
                                                       value={{ $personnel->nomMere }}>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom du conjoint</label>
                                                <input type="text" name="nomConjoint" class="form-control col-sm-6"
                                                       value={{ $personnel->nomConjoint }}>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Personnes à contacter en cas d'urgence</label>
                                                <input type="text" name="personneContacter"
                                                       class="form-control col-sm-6"
                                                       value={{ $personnel->personneContacter }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gestion-mission" role="tabpanel"
                                 aria-labelledby="gestion-mission-tab">
                                <div>
                                    <br>
                                    <button type="button" id="addRowMission" class="btn btn-sm btn-dark">Ajouter
                                    </button>
                                    <br>
                                    <br>
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="tableMission">
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
                                        @foreach($gestionMission as $mission)
                                            <tr>
                                                <td><input type="date" name="missions_debut_edit[]"
                                                           value="{{$mission->debut_mission}}" class="form-control">
                                                </td>
                                                <td><input type="date" name="missions_fin_edit[]"
                                                           value="{{$mission->fin_mission}}"
                                                           class="form-control"></td>
                                                <td><input type="number" min="0" name="missions_nbre_jours_edit[]"
                                                           value="{{$mission->nombre_jours}}"
                                                           class="form-control"></td>
                                                <td><input type="text" name="missions_lieu_edit[]"
                                                           value="{{$mission->lieu}}"
                                                           class="form-control"></td>
                                                <td><input type="text" name="missions_motif_edit[]"
                                                           value="{{$mission->motif}}"
                                                           class="form-control"></td>
                                                <td><input type="number" min="0" name="missions_frais_edit[]"
                                                           value="{{$mission->frais}}" class="form-control"></td>
                                                <td><input type="hidden" name="missions_ids_edit[]"
                                                           value="{{$mission->id}}"
                                                           class="form-control"></td>
                                                <td></td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><input type="date" name="missions_debut[]" class="form-control"></td>
                                            <td><input type="date" name="missions_fin[]" class="form-control"></td>
                                            <td><input type="number" min="0" name="missions_nbre_jours[]"
                                                       class="form-control"></td>
                                            <td><input type="text" name="missions_lieu[]" class="form-control"></td>
                                            <td><input type="text" name="missions_motif[]" class="form-control"></td>
                                            <td><input type="number" min="0" name="missions_frais[]"
                                                       class="form-control"></td>
                                            <td><a class="btn btn-danger btn-sm"
                                                   onclick="supprimerMissionTableLine(this)"></a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gestion-absences" role="tabpanel"
                                 aria-labelledby="gestion-absences-tab">
                                <div>
                                    <br>
                                    <button type="button" id="addRowAbsences" class="btn btn-sm btn-dark">Ajouter
                                    </button>
                                    <br>
                                    <br>
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="tableAbsences">
                                        <thead>
                                        <tr>
                                            <th>Début absence</th>
                                            <th>Fin absence</th>
                                            <th>Nbre de jours</th>
                                            <th>Motif</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($gestionAbsences as $data)
                                            <tr>
                                                <input type="hidden" value="{{$data->id}}">
                                                <td><input type="date" name="absence_debut_edit[]"
                                                           value="{{$data->debut_absence}}"
                                                           class="form-control"></td>
                                                <td><input type="date" name="absence_fin_edit[]"
                                                           value="{{$data->fin_absence}}"
                                                           class="form-control"></td>
                                                <td><input type="number" name="absence_nombre_jours_edit[]"
                                                           value="{{$data->nombre_jours}}" class="form-control"></td>
                                                <td><input type="text" name="absence_motif_edit[]"
                                                           value="{{$data->motif}}"
                                                           class="form-control"></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        @for($i = 0; $i <= 5; $i++)
                                            <tr>
                                                <td><input type="date" name="absence_debut[]" class="form-control"></td>
                                                <td><input type="date" name="absence_fin[]" class="form-control"></td>
                                                <td><input type="number" name="absence_nombre_jours[]"
                                                           class="form-control">
                                                </td>
                                                <td><input type="text" name="absence_motif[]" class="form-control"></td>
                                                <td><input type="number" name="absence_frais[]" class="form-control">
                                                </td>
                                                <td><a class="btn btn-danger btn-sm"
                                                       onclick="supprimerAbsenceTableLine(this)"></a>
                                                </td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gestion-contrats" role="tabpanel"
                                 aria-labelledby="gestion-contrats-tab">
                                <div>
                                    <br>
                                    <button type="button" id="addRowContrats" class="btn btn-sm btn-dark">Ajouter
                                    </button>
                                    <br>
                                    <br>
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="tableContrats">
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
                                        @foreach($gestionContrats as $gestion)
                                            <tr>
                                                <input type="hidden" name="contrat_id" value="{{$gestion->id}}">
                                                <td><input type="text" name="contrat_type_contrat_edit[]"
                                                           value="{{$gestion->type_contrat}}" class="form-control"></td>
                                                <td><input type="date" name="contrat_debut_contrat_edit[]"
                                                           value="{{$gestion->debut_contrat}}" class="form-control">
                                                </td>
                                                <td><input type="date" name="contrat_fin_contrat_edit[]"
                                                           value="{{$gestion->fin_contrat}}" class="form-control"></td>
                                                <td><input type="number" name="contrat_nombre_jours_edit[]"
                                                           value="{{$gestion->nombre_jours}}" class="form-control"></td>
                                                <td><input type="text" name="contrat_fonction_edit[]"
                                                           value="{{$gestion->fonction}}"
                                                           class="form-control"></td>
                                                <td><input type="text" name="contrat_salaire_edit[]"
                                                           value="{{$gestion->salaire}}"
                                                           class="form-control"></td>
                                                <td></td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><select type="text" name="contrat_type_contrat[]" class="form-control">
                                                    <option>CDD</option>
                                                    <option>CDI</option>
                                                    <option>STAGE</option>
                                                    <option>INTERIM</option>
                                                    <option>IMMERSION</option>
                                                </select></td>
                                            <td><input type="date" name="contrat_debut_contrat[]" class="form-control">
                                            </td>
                                            <td><input type="date" name="contrat_fin_contrat[]" class="form-control">
                                            </td>
                                            <td><input type="number" name="contrat_nombre_jours[]" class="form-control">
                                            </td>
                                            <td><input type="text" name="contrat_fonction[]" class="form-control"></td>
                                            <td><input type="text" name="contrat_salaire[]" class="form-control"></td>
                                            <td><a class="btn btn-danger btn-sm"
                                                   onclick="supprimerContratTableLine(this)"></a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gestion-explication" role="tabpanel"
                                 aria-labelledby="gestion-explication-tab">
                                <div>
                                    <br>
                                    <button type="button" id="addRowExplication" class="btn btn-sm btn-dark">Ajouter
                                    </button>
                                    <br>
                                    <br>
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="tableExplication">
                                        <thead>
                                        <tr>
                                            <th>Date demande d'explication</th>
                                            <th>Motif demande explication</th>
                                            <th>Sanctions</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($gestionExplications as $gestion)
                                            <tr>
                                                <input type="hidden" name="demande_id[]" value="{{$gestion->id}}">
                                                <td><input type="date" name="demande_date_demande_edit[]"
                                                           value="{{$gestion->date_demande}}" class="form-control"></td>
                                                <td><input type="text" name="demande_motif_edit[]"
                                                           value="{{$gestion->motif}}"
                                                           class="form-control"></td>
                                                <td><input type="text" name="demande_sanctions_edit[]"
                                                           value="{{$gestion->sanctions}}" class="form-control"></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td><input type="date" name="demande_date_demande[]" class="form-control">
                                            </td>
                                            <td><input type="text" name="demande_motif[]" class="form-control"></td>
                                            <td><input type="text" name="demande_sanctions[]" class="form-control"></td>
                                            <td><a class="btn btn-danger btn-sm"
                                                   onclick="supprimerExplicationTableLine(this)"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gestion-affectation" role="tabpanel"
                                 aria-labelledby="gestion-affectation-tab">
                                <div>
                                    <br>
                                    <button type="button" id="addRowAffection" class="btn btn-sm btn-dark">Ajouter
                                    </button>
                                    <br>
                                    <br>
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="tableAffectation">
                                        <thead>
                                        <tr>
                                            <th>Date d'affectation</th>
                                            <th>Centre</th>
                                            <th>Motif</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($gestionAffectation as $gestion)
                                            <tr>
                                                <input type="hidden" name="affectation_id[]" value="{{$gestion->id}}">
                                                <td><input type="date" name="affectation_date_edit[]"
                                                           value="{{$gestion->date_affectation}}" class="form-control">
                                                </td>
                                                <td><input type="text" name="affectation_centre_edit[]"
                                                           value="{{$gestion->centre}}"
                                                           class="form-control"></td>
                                                <td><input type="text" name="affectation_motif_edit[]"
                                                           value="{{$gestion->motif}}"
                                                           class="form-control"></td>
                                                <td></td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><input type="date" name="affectation_date[]" class="form-control"></td>
                                            <td><input type="text" name="affectation_centre[]" class="form-control">
                                            </td>
                                            <td><input type="text" name="affectation_motif[]" class="form-control"></td>
                                            <td><a class="btn btn-danger btn-sm"
                                                   onclick="supprimerAffectationTableLine(this)"></a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                    </div>
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
                })
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
        function supprimerConge(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "/personnel-conges-item/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        supprimerCongeTableLine(e);
                    },
                    error: function (xhr) {
                        alert("Une erreur s'est produite");
                    }
                }).done(function () {
                    // TODO hide loader
                });


            }

        }

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
