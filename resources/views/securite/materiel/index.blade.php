@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Matériel | Nouveau matériel"])
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
            </div>
            <br/>
        @endif

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('materiel.store') }}">
            @csrf
            <div class="card card-xxl-stretch">
                <div class="card-body pt-5">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Tournée N°</label>
                                <select  class="form-select form-select-solid select2-hidden-accessible"
                                         data-control="select2"
                                         data-placeholder="N° Tournée"
                                         data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                         data-kt-select2="true"
                                         aria-hidden="true"
                                         name="noTournee"
                                         id="noTournee"
                                         required>
                                    <option></option>
                                    @foreach($tournees as $tournee)
                                        <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                                    @endforeach
                                </select>
                                {{--<input type="text" class="form-control col-sm-8" name="noTournee" required>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date</label>
                                <input type="date" class="col-sm-6 form-control form-control" name="date" value="{{date('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2" for="centre">Centre</label>
                                <input name="centre" id="centre" class="col-sm-6 form-control form-control" readonly required />
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label  class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2" for="centre_regional">Centre Régional</label>
                                <input id="centre_regional" name="centre_regional" class="col-sm-6 form-control form-control" readonly required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                {{--<li class="nav-item">
                    <a class="nav-link" id="beneficiaire-tab" data-toggle="tab" href="#beneficiaire"
                       role="tab"
                       aria-controls="beneficiaire" aria-selected="false">BENEFICIAIRE</a>
                </li>--}}
            </ul>
            <br>
            <div class="card card-xxl-stretch">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="equipages" role="tabpanel"
                             aria-labelledby="equipages-tab">
                            <!-- INFORMATIONS GENERALE -->
                            <p>INFORMATIONS GENERALES</p>
                            <hr class="title-separator"/>
                            <br/>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col">
                                    <p class="text-center">Equipage</p>
                                    <hr/>
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                        <label for="cbMatricule" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Matricule</label>
                                                        <input type="text" name="cbMatricule" id="cbMatricule"
                                                               class="form-control col-sm-8" />
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom</label>
                                                        <input type="text" class="form-control col-sm-8" name="cbNom" id="cbNom">
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Fonction</label>
                                                        <input type="text" class="form-control col-sm-8" name="cbFonction" id="cbFonction">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                        <label for="cbMatricule" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Matricule</label>
                                                        <input type="text" name="ccMatricule" id="ccMatricule"
                                                               class="form-control col-sm-8" />
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom</label>
                                                        <input type="text" class="form-control col-sm-8" name="ccNom" id="ccNom">
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Fonction</label>
                                                        <input type="text" class="form-control col-sm-8" name="ccFonction" id="ccFonction">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                        <label for="cbMatricule" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Matricule</label>
                                                        <input type="text" name="cgMatricule" id="cgMatricule"
                                                               class="form-control col-sm-8"/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom</label>
                                                        <input type="text" class="form-control col-sm-8" name="cgNom" id="cgNom">
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Fonction</label>
                                                        <input type="text" class="form-control col-sm-8" name="cgFonction" id="cgFonction">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2"><label>Véhicule</label></div>
                                                <div class="col" style="display: none;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                                               id="exampleRadios1"
                                                               value="option1" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            VB N°
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                                               id="exampleRadios1"
                                                               value="option1" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            VL N°
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-4" style="display: none;">
                                                    <div class="form-group row">
                                                        <input type="text" class="form-control" name="vehiculeVB">
                                                    </div>
                                                    <div class="form-group row">
                                                        <input type="text" class="form-control" name="vehiculeVL">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <input type="text" class="form-control" id="vehicule">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">


                                </div>
                                <div class="col-3"></div>
                            </div>
                            <br/>
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
                                        <div class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2"><label>Opération</label></div>
                                        <div class="col">
                                            <select
                                                class="form-select form-select-solid select2-hidden-accessible"
                                                data-control="select2"
                                                data-placeholder="Opération"
                                                data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true"
                                                name="operateurRadio">
                                                <option value="opérateur radio 1">Opérateur radio 1</option>
                                                <option value="opérateur radio 2">Opérateur radio 2</option>
                                                <option value="responsable sécurité">Responsable de sécurité</option>
                                                <option value="responsable sécurité">Chef de sécurité</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="operateurRadio" class="col-sm-4">Matricule</label>
                                        <select type="text" name="operateurRadioMatricule" id="operateurRadioMatricule"
                                                class="form-select form-select-solid select2-hidden-accessible"
                                                data-control="select2"
                                                data-placeholder="Matricule"
                                                data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true">
                                            <option></option>
                                            @foreach($personnels as $personnel)
                                                <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                    | {{$personnel->nomPrenoms}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2"-4">Nom</label>
                                        <input type="text" class="col-sm-6 form-control form-control-sm" name="operateurRadioNom">
                                    </div>
                                    <div class="form-group row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2"-4">Fonction</label>
                                        <input type="text" class="col-sm-6 form-control form-control-sm" name="operateurRadioFonction">
                                    </div>
                                    <div class="form-group row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2"-4">Heure de prise de service</label>
                                        <input type="time" class="col-sm-6 form-control form-control-sm" name="operateurRadioHeurePrise">
                                    </div>
                                    <div class="form-group row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2"-4">Heure de fin de service</label>
                                        <input type="time" class="col-sm-6 form-control form-control-sm" name="operateurRadioHeureFin">
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div class="row">
                                <div class="col-10">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <td>INTITULE</td>
                                            <td>OUI</td>
                                            <td>NON</td>
                                            <td>QUANTITE</td>
                                            <td>HEURE DE REMISE</td>
                                            <td>CONVOYEUR</td>
                                            <td>HEURE DE RETOUR</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Pièce de véhicule</td>
                                            <td><input type="radio" name="remettantPieceVehicule" value="1"></td>
                                            <td><input type="radio" name="remettantPieceVehicule" value="0"></td>
                                            <td><input type="number" min="0" name="remettantPieceVehiculeQuantite" class="form-control col editbox"></td>
                                            <td><input type="time" name="remettantPieceVehiculeRemise" class="form-control col editbox">
                                            </td>
                                            <td><select name="remettantPieceVehiculeConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Pièce de véhicule"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantPieceVehiculeRetour" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Clés véhicule</td>
                                            <td><input type="radio" name="remettantCleVehicule" value="1"></td>
                                            <td><input type="radio" name="remettantCleVehicule" value="0"></td>
                                            <td><input type="number" min="0" name="remettantCleVehiculeQuantite" class="form-control col editbox"></td>
                                            <td><input type="time" name="remettantCleVehiculeRemise" class="form-control col editbox"></td>
                                            <td><select name="remettantCleVehiculeConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Clés véhicule"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantCleVehiculeRetour" class="form-control col editbox"></td>
                                        </tr>
                                        <tr>
                                            <td>Téléphone</td>
                                            <td><input type="radio" name="remettantTelephone" value="1"></td>
                                            <td><input type="radio" name="remettantTelephone" value="0"></td>
                                            <td><input type="number" min="0" name="remettantTelephoneQuantite" class="form-control col editbox"></td>
                                            <td><input type="time" name="remettantTelephoneRemise" class="form-control col editbox">
                                            </td>
                                            <td><select name="remettantTelephoneConvoyeur"
                                                        name="remettantCleVehiculeConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Téléphone"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantTelephoneRetour" class="form-control col editbox">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Radio portative</td>
                                            <td><input type="radio" name="remettantRadio" value="1"></td>
                                            <td><input type="radio" name="remettantRadio" value="0"></td>
                                            <td><input type="number" min="0" name="remettantRadioQuantite" class="form-control col editbox">
                                            </td>
                                            <td><input type="time" name="remettantRadioRemise" class="form-control col editbox">
                                            </td>
                                            <td><select name="remettantRadioConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Radio portative"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantRadioRetour" class="form-control col editbox"></td>

                                        </tr>
                                        <tr>
                                            <td>G. P. B</td>
                                            <td><input type="radio" name="remettantGBP" value="1"></td>
                                            <td><input type="radio" name="remettantGBP" value="0"></td>
                                            <td><input type="number" min="0" name="remettantGBPQuantite" class="form-control col editbox">
                                            </td>
                                            <td><input type="time" name="beneficiaireGBPRemise" class="form-control col editbox"></td>
                                            <td><select name="remettantGBPConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="G. P. B"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantGBPRetour" class="form-control col editbox"></td>
                                        </tr>
                                        <tr>
                                            <td>P. A</td>
                                            <td><input type="radio" name="remettantPA" value="1"></td>
                                            <td><input type="radio" name="remettantPA" value="0"></td>
                                            <td><input type="number" min="0" name="remettantPAQuantite" class="form-control col editbox">
                                            </td>
                                            <td><input type="time" name="remettantPARemise" class="form-control col editbox"></td>
                                            <td><select name="remettantPAConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="P. A"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantPARetour" class="form-control col editbox"></td>
                                        </tr>
                                        <tr>
                                            <td>F. P</td>
                                            <td><input type="radio" name="remettantFP" value="1"></td>
                                            <td><input type="radio" name="remettantFP" value="0"></td>
                                            <td><input type="number" min="0" name="remettantFPQuantite" class="form-control col editbox">
                                            </td>
                                            <td><input type="time" name="beneficiaireFPRemise" class="form-control col editbox"></td>
                                            <td><select name="remettantFPConvoyeur"  class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="F. P"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantFPRetour" class="form-control col editbox"></td>
                                        </tr>
                                        <tr>
                                            <td>P. M</td>
                                            <td><input type="radio" name="remettantPM" value="1"></td>
                                            <td><input type="radio" name="remettantPM" value="0"></td>
                                            <td><input type="number" min="0" name="remettantPMQuantite" class="form-control col editbox">
                                            </td>
                                            <td><input type="time" name="remettantPMRemise" class="form-control col editbox"></td>
                                            <td><select name="remettantPMConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="F. M"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantPMRetour" class="form-control col editbox"></td>
                                        </tr>
                                        <tr>
                                            <td>Minutions</td>
                                            <td><input type="radio" name="remettantMunition" value="1"></td>
                                            <td><input type="radio" name="remettantMunition" value="0"></td>
                                            <td><input type="number" min="0" name="remettantMunitionQuantite" class="form-control col editbox"></td>
                                            <td><input type="time" name="remettantMunitionRemise" class="form-control col editbox"></td>
                                            <td><select name="remettantMunitionConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Munitions"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantMunitionRetour" class="form-control col editbox">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Minutions PA</td>
                                            <td><input type="radio" name="remettantMunitionPA" value="1"></td>
                                            <td><input type="radio" name="remettantMunitionPA" value="0"></td>
                                            <td><input type="number" min="0" name="remettantMunitionPAQuantite" class="form-control col editbox"></td>
                                            <td><input type="time" name="remettantMunitionPARemise" class="form-control col editbox"></td>
                                            <td><select name="remettantMunitionPAConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Munitions PA"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantMunitionPARetour" class="form-control col editbox">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Minutions FM</td>
                                            <td><input type="radio" name="remettantMunitionFM" value="1"></td>
                                            <td><input type="radio" name="remettantMunitionFM" value="0"></td>
                                            <td><input type="number" min="0" name="remettantMunitionFMQuantite"
                                                       class="form-control col editbox"
                                                ></td>
                                            <td><input type="time" name="remettantMunitionFMRemise" class="form-control col editbox"></td>
                                            <td><select name="remettantMunitionFMConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Munitions FM"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantMunitionFMRetour" class="form-control col editbox">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Minutions FP</td>
                                            <td><input type="radio" name="remettantMunitionFP" value="1"></td>
                                            <td><input type="radio" name="remettantMunitionFP" value="0"></td>
                                            <td><input type="number" min="0" name="remettantMunitionFPQuantite" class="form-control col editbox"></td>
                                            <td><input type="time" name="remettantMunitionFPRemise" class="form-control col editbox"></td>
                                            <td><select name="remettantMunitionFPConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Munitions FP"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantMunitionFPRetour" class="form-control col editbox">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>TAG Convoyeur CC12</td>
                                            <td><input type="radio" name="remettantTAG" value="1"></td>
                                            <td><input type="radio" name="remettantTAG" value="0"></td>
                                            <td><input type="number" min="0" name="remettantTAGQuantite" class="form-control col editbox">
                                            </td>
                                            <td><input type="time" name="remettantTAGRemise" class="form-control col editbox"></td>
                                            <td><select name="remettantTAGConvoyeur"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="TAG Convoyeur CC12"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="time" name="remettantTAGRetour" class="form-control col editbox"></td>
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><select name="beneficiairePieceVehiculeConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiairePieceVehicule" value="1"></td>
                                            <td><input type="radio" name="beneficiairePieceVehicule" value="0"></td>
                                            <td>Pièce de véhicule</td>
                                            <td><input type="number" min="0" name="beneficiairePieceVehiculeQuantite"
                                                       class="form-control"></td>

                                        </tr>
                                        <tr>
                                            <td><select name="beneficiaireCleVehiculeConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiaireCleVehicule" value="1"></td>
                                            <td><input type="radio" name="beneficiaireCleVehicule" value="0"></td>
                                            <td>Clés véhicule</td>
                                            <td><input type="number" min="0" name="beneficiaireCleVehiculeQuantite"
                                                       class="form-control"></td>


                                        </tr>
                                        <tr>
                                            <td><select name="beneficiaireTelephoneConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiaireTelephone" value="1"></td>
                                            <td><input type="radio" name="beneficiaireTelephone" value="0"></td>
                                            <td>Téléphone</td>
                                            <td><input type="number" min="0" name="beneficiaireTelephoneQuantite"
                                                       class="form-control"
                                                ></td>

                                        </tr>
                                        <tr>
                                            <td><select name="beneficiaireRadioConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiaireRadio" value="1"></td>
                                            <td><input type="radio" name="beneficiaireRadio" value="0"></td>
                                            <td>Radio portative</td>
                                            <td><input type="number" min="0" name="beneficiaireRadioQuantite"
                                                       class="form-control">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><select name="beneficiaireGBPConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiaireGBP" value="1"></td>
                                            <td><input type="radio" name="beneficiaireGBP" value="0"></td>
                                            <td>G. P. B</td>
                                            <td><input type="number" min="0" name="beneficiaireGBPQuantite"
                                                       class="form-control">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><select name="beneficiairePAConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiairePA" value="1"></td>
                                            <td><input type="radio" name="beneficiairePA" value="0"></td>
                                            <td>P. A</td>
                                            <td><input type="number" min="0" name="beneficiairePAQuantite" class="form-control">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><select name="beneficiaireFPConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiaireFP" value="1"></td>
                                            <td><input type="radio" name="beneficiaireFP" value="0"></td>
                                            <td>F. P</td>
                                            <td><input type="number" min="0" name="beneficiaireFPQuantite" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><select name="beneficiairePMConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiairePM" value="1"></td>
                                            <td><input type="radio" name="beneficiairePM" value="0"></td>
                                            <td>P. M</td>
                                            <td><input type="number" min="0" name="beneficiairePMQuantite" class="form-control">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><select name="beneficiaireMunitionConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiaireMunition" value="1"></td>
                                            <td><input type="radio" name="beneficiaireMunition" value="0"></td>
                                            <td>Minutions</td>
                                            <td><input type="number" min="0" name="beneficiaireMunitionQuantite"
                                                       class="form-control"
                                                ></td>

                                        </tr>
                                        <tr>
                                            <td><select name="beneficiaireTAGConvoyeur" class="form-control">
                                                    <option value="CB">CB</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CG">CG</option>
                                                    <option value="CB + CC + CG">CB + CC + CG</option>
                                                </select></td>
                                            <td><input type="radio" name="beneficiaireTAG" value="1"></td>
                                            <td><input type="radio" name="beneficiaireTAG" value="0"></td>
                                            <td>TAG Convoyeur CC12</td>
                                            <td><input type="number" min="0" name="beneficiaireTAGHeureRetour"
                                                       class="form-control"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Valider</button>
                <button class="btn btn-danger" type="reset">Annuler</button>
            </div>
        </form>
    </div>
    <script>
        let personnels =  {!! json_encode($personnels) !!};
        let tournees = {!! json_encode($tournees) !!};
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
            $("#noTournee").on("change", function () {
                $("#cgMatricule").val("");
                $("#ccMatricule").val("");
                $("#cbMatricule").val("");

                const tournee = tournees.find(t => t.id === parseInt(this.value ?? 0));
                console.log(tournee);
                if (tournee) {
                    $("#cgMatricule").val(tournee.chauffeurs?.matricule ?? '');
                    $("#cgNom").val(tournee.chauffeurs?.nomPrenoms ?? '');
                    $("#cgFonction").val(tournee.chauffeurs?.fonction ?? '');

                    $("#ccMatricule").val(tournee.chef_de_bords?.matricule ?? '');
                    $("#ccNom").val(tournee.chef_de_bords?.nomPrenoms ?? '');
                    $("#ccFonction").val(tournee.chef_de_bords?.fonction ?? '');

                    $("#cbMatricule").val(tournee.agent_de_gardes?.matricule ?? '');
                    $("#cbNom").val(tournee.agent_de_gardes?.nomPrenoms ?? '');
                    $("#cbFonction").val(tournee.agent_de_gardes?.fonction ?? '');

                    $("#vehicule").val(tournee.vehicules?.immatriculation ?? '');
                    $("#centre").val(tournee.centre);
                    $("#centre_regional").val(tournee.centre_regional);
                }
            });

        })
    </script>
@endsection
