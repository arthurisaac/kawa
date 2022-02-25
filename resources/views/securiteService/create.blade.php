@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Service |"])
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

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <form method="post" action="{{ route('securite-service.store') }}">
            @csrf
            <div class="card card-xxl-stretch">
                <div class="card-body">
                 <div class="row">
                     <div class="col-2"></div>
                     <div class="col">
                         <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                             <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date</label>
                             <input type="date" class="col-sm-6 form-control form-control editbox" name="date" required/>
                         </div>
                     </div>
                     <div class="col">
                         <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                             <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre</label>
                             <select
                                 class="form-select form-select-solid select2-hidden-accessible"
                                 data-control="select2"
                                 data-placeholder="Centre"
                                 data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                 data-kt-select2="true"
                                 aria-hidden="true"
                                 name="centre" id="centre" required>
                                 <option></option>
                                 @foreach ($centres as $centre)
                                     <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="col">
                         <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                             <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre régional</label>
                             <select
                                 class="form-select form-select-solid select2-hidden-accessible"
                                 data-control="select2"
                                 data-placeholder="Centre régional"
                                 data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                 data-kt-select2="true"
                                 aria-hidden="true"
                                 name="centreRegional" id="centre_regional" required></select>
                         </div>
                     </div>
                 </div>
                    <div class="row">
                        <div class="col-2">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2" style="margin-top: 180px">Chargé de sécurité</label>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="matriculeChargeDeSecurite" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                <select type="text" name="matriculeChargeDeSecurite" id="matriculeChargeDeSecurite"
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Matricule régional"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true">
                                    <option></option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                            | {{$personnel->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom </label>
                                <input type="text" class="col-sm-6 form-control form-control editbox" name="nomChargeDeSecurite" id="nomChargeDeSecurite"/>
                            </div>
                            {{--<div class="form-group row">
                                <label class="col-md-3">Prénom</label>
                                <input type="text" class="editbox col-md-4" name="prenomChargeDeSecurite" required/>
                            </div>--}}
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction</label>
                                <input type="text" class="col-sm-6 form-control form-control editbox" name="fonctionChargeDeSecurite"
                                       id="fonctionChargeDeSecurite"/>
                            </div>
                            {{--<div class="form-group row">
                                <label class="col-md-3">Matricule</label>
                                <input type="text" class="editbox col-md-4" name="matriculeChargeDeSecurite"/>
                            </div>--}}
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de prise de service</label>
                                <input type="time" class="col-sm-6 form-control form-control editbox" name="hps_cs"/>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de fin de service</label>
                                <input type="time" class="col-sm-6 form-control form-control editbox" name="hfs_cs"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>

            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="equipe-1-tab" data-toggle="tab" href="#equipe1" role="tab"
                       aria-controls="depart-centre" aria-selected="true">PC Sécurité (matin)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="equipe-2-tab" data-toggle="tab" href="#equipe2" role="tab"
                       aria-controls="arrivee-site" aria-selected="false">PC Sécurité (soir)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="equipe-3-tab" data-toggle="tab" href="#equipe3" role="tab"
                       aria-controls="depart-site" aria-selected="false">PC Centrale (matin)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="equipe-4-tab" data-toggle="tab" href="#equipe4" role="tab"
                       aria-controls="equipe4" aria-selected="false">PC Centrale (soir)</a>
                </li>
            </ul>
            <div class="card card-xxl-stretch">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="equipe1" role="tabpanel" aria-labelledby="equipe-1-tab">
                            <div class="container-fluid">
                                <br />
                                <h3>EQUIPE 1</h3>

                                <div class="row">
                                    <div class="col">
                                        <div class="row" style="align-items: center;">
                                            <div class="col-2">
                                                <label>Opérateur radio n° 1</label>
                                            </div>
                                            <div class="col">
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label for="eop11Matricule" class="col-sm-3">Matricule</label>
                                                    <select type="text" name="eop11Matricule" id="eop11Matricule"
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            data-control="select2"
                                                            data-placeholder="Matricule"
                                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                            data-kt-select2="true"
                                                            aria-hidden="true">
                                                        <option></option>
                                                        @foreach($personnels as $personnel)
                                                            <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                                | {{$personnel->nomPrenoms}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom </label>
                                                    <input type="text" class="col-sm-6 form-control form-control editbox" name="eop11Nom" id="eop11Nom"/>
                                                </div>
                                                {{--<div class="form-group row">
                                                    <label class="col-md-3">Prénom</label>
                                                    <input type="text" class="editbox col-md-4" name="eop11Prenom" id="eop11Prenom"/>
                                                </div>--}}
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction</label>
                                                    <input type="text" class="col-sm-6 form-control form-control editbox" name="eop11Fonction" id="eop11Fonction"/>
                                                </div>
                                                {{--<div class="form-group row">
                                                    <label class="col-md-3">Matricule</label>
                                                    <input type="text" class="editbox col-md-4" name="eop11Matricule"/>
                                                </div>--}}
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de prise de service</label>
                                                    <input type="time" class="col-sm-6 form-control form-control editbox" name="hps_eop11" id="hps_eop11"/>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de fin de service</label>
                                                    <input type="time" class="col-sm-6 form-control form-control editbox" name="hfs_eop11" id="hfs_eop11"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row" style="align-items: center;">
                                            <div class="col-2">
                                                <label>Opérateur radio n° 2</label>
                                            </div>
                                            <div class="col">
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label for="eop12Matricule" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                                    <select type="text" name="eop12Matricule" id="eop12Matricule"
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            data-control="select2"
                                                            data-placeholder="Matricule"
                                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                            data-kt-select2="true"
                                                            aria-hidden="true">
                                                        <option></option>
                                                        @foreach($personnels as $personnel)
                                                            <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                                | {{$personnel->nomPrenoms}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom </label>
                                                    <input type="text" class="col-sm-6 form-control form-control editbox" name="eop112Nom" id="eop112Nom"/>
                                                </div>
                                                {{--<div class="form-group row">
                                                    <label class="col-md-3">Prénom</label>
                                                    <input type="text" class="editbox col-md-4" name="eop12Prenom" id="eop12Prenom"/>
                                                </div>--}}
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction</label>
                                                    <input type="text" class="col-sm-6 form-control form-control editbox" name="eop12Fonction" id="eop12Fonction"/>
                                                </div>
                                                {{--<div class="form-group row">
                                                    <label class="col-md-3">Matricule</label>
                                                    <input type="text" class="editbox col-md-4" name="eop12Matricule"/>
                                                </div>--}}
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de prise de service</label>
                                                    <input type="time" class="col-sm-6 form-control form-control editbox" name="hps_eop12" id="hps_eop12"/>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de fin de service</label>
                                                    <input type="time" class="col-sm-6 form-control form-control editbox" name="hfs_eop12" id="hfs_eop12"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="equipe2" role="tabpanel" aria-labelledby="equipe-2-tab">
                            <div class="container">
                                <br />
                                <h3>EQUIPE 2</h3>
                                <div class="row" style="align-items: center;">
                                    <div class="col-2">
                                        <label>Opérateur radio</label>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="eop21Matricule" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                            <select type="text" name="eop21Matricule" id="eop21Matricule"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Matricule"
                                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option></option>
                                                @foreach($personnels as $personnel)
                                                    <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                        | {{$personnel->nomPrenoms}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom</label>
                                            <input type="text" class="col-sm-6 form-control form-control editbox" name="eop21Nom" id="eop21Nom"/>
                                        </div>
                                        {{--<div class="form-group row">
                                            <label class="col-md-3">Prénom</label>
                                            <input type="text" class="editbox col-md-4" name="eop21Prenom" id="eop21Prenom"/>
                                        </div>--}}
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction</label>
                                            <input type="text" class="col-sm-6 form-control form-control editbox" name="eop21Fonction" id="eop21Fonction"/>
                                        </div>
                                        {{--<div class="form-group row">
                                            <label class="col-md-3">Matricule</label>
                                            <input type="text" class="editbox col-md-4" name="eop21Matricule"/>
                                        </div>--}}
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de prise de service</label>
                                            <input type="time" class="col-sm-6 form-control form-control editbox" name="hps_eop21" id="hps_eop21"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de fin de service</label>
                                            <input type="time" class="col-sm-6 form-control form-control editbox" name="hfs_eop21" id="hfs_eop21"/>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="equipe3" role="tabpanel" aria-labelledby="equipe-3-tab">
                            <div class="container">
                                <br />
                                <h3>EQUIPE 3</h3>
                                <div class="row">
                                    <div class="col">
                                        <div class="row" style="align-items: center;">
                                            <div class="col-2">
                                                <label>Opérateur radio n° 1</label>
                                            </div>
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label for="eop31Matricule" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                                    <select type="text" name="eop31Matricule" id="eop31Matricule"
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            data-control="select2"
                                                            data-placeholder="Matricule"
                                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                            data-kt-select2="true"
                                                            aria-hidden="true">
                                                        <option></option>
                                                        @foreach($personnels as $personnel)
                                                            <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                                | {{$personnel->nomPrenoms}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom </label>
                                                    <input type="text" class="col-sm-6 form-control form-control editbox" name="eop31Nom" id="eop31Nom"/>
                                                </div>
                                                {{--<div class="form-group row">
                                                    <label class="col-md-3">Prénom</label>
                                                    <input type="text" class="editbox col-md-4" name="eop31Prenom" id="eop31Prenom"/>
                                                </div>--}}
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction</label>
                                                    <input type="text" class="col-sm-6 form-control form-control editbox" name="eop31Fonction"
                                                           id="eop31Fonction"/>
                                                </div>
                                                {{--<div class="form-group row">
                                                    <label class="col-md-3">Matricule</label>
                                                    <input type="text" class="editbox col-md-4" name="eop31Matricule"/>
                                                </div>--}}
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de prise de service</label>
                                                    <input type="time" class="col-sm-6 form-control form-control editbox" name="hps_eop31" id="hps_eop31"/>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de fin de service</label>
                                                    <input type="time" class="col-sm-6 form-control form-control editbox" name="hfs_eop31" id="hfs_eop31"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row" style="align-items: center;">
                                            <div class="col-2">
                                                <label>Opérateur radio n° 2</label>
                                            </div>
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label for="eop32Matricule" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                                    <select type="text" name="eop32Matricule" id="eop32Matricule"
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            data-control="select2"
                                                            data-placeholder="Matricule"
                                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                            data-kt-select2="true"
                                                            aria-hidden="true">
                                                        <option></option>
                                                        @foreach($personnels as $personnel)
                                                            <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                                | {{$personnel->nomPrenoms}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom </label>
                                                    <input type="text" class="col-sm-6 form-control form-control editbox" name="eop32Nom" id="eop32Nom"/>
                                                </div>
                                                {{--<div class="form-group row">
                                                    <label class="col-md-3">Prénom</label>
                                                    <input type="text" class="editbox col-md-4" name="eop32Prenom" id="eop32Prenom"/>
                                                </div>--}}
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction</label>
                                                    <input type="text" class="col-sm-6 form-control form-control editbox" name="eop32Fonction"
                                                           id="eop32Fonction"/>
                                                </div>
                                                {{--<div class="form-group row">
                                                    <label class="col-md-3">Matricule</label>
                                                    <input type="text" class="editbox col-md-4" name="eop32Matricule"/>
                                                </div>--}}
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de prise de service</label>
                                                    <input type="time" class="col-sm-6 form-control form-control editbox" name="hps_eop32" id="hps_eop32"/>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de fin de service</label>
                                                    <input type="time" class="col-sm-6 form-control form-control editbox" name="hfs_eop32" id="hfs_eop32"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="equipe4" role="tabpanel" aria-labelledby="equipe-4-tab">
                            <div class="container">
                                <br />
                                <h3>EQUIPE 4</h3>
                                <div class="row" style="align-items: center;">
                                    <div class="col-2">
                                        <label>Opérateur</label>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="eop22Matricule" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                            <select type="text" name="eop22Matricule" id="eop22Matricule"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Matricule"
                                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option></option>
                                                @foreach($personnels as $personnel)
                                                    <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                        | {{$personnel->nomPrenoms}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom </label>
                                            <input type="text" class="col-sm-6 form-control form-control editbox" name="eop22Nom" id="eop22Nom"/>
                                        </div>
                                        {{--<div class="form-group row">
                                            <label class="col-md-3">Prénom</label>
                                            <input type="text" class="editbox col-md-4" name="eop22Prenom" id="eop22Prenom"/>
                                        </div>--}}
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction</label>
                                            <input type="text" class="col-sm-6 form-control form-control editbox" name="eop22Fonction" id="eop22Fonction"/>
                                        </div>
                                        {{--<div class="form-group row">
                                            <label class="col-md-3">Matricule</label>
                                            <input type="text" class="editbox col-md-4" name="eop22Matricule" id="eop22Matricule"/>
                                        </div>--}}
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de prise de service</label>
                                            <input type="time" class="col-sm-6 form-control form-control editbox" name="hps_eop22" id="hps_eop22"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de fin de service</label>
                                            <input type="time" class="col-sm-6 form-control form-control editbox" name="hfs_eop22" id="hfs_eop22"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <br />

           <div class="card-footer">
               <button type="submit" class="btn btn-primary btn-sm">Valider</button>
           </div>
        </form>
    </div>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        let personnels =  {!! json_encode($personnels) !!};

        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', { text: "Choisir centre régional" }));

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

            $("#matriculeChargeDeSecurite").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#nomChargeDeSecurite").val(personnel.nomPrenoms);
                    $("#fonctionChargeDeSecurite").val(personnel.fonction);
                }
            });

            $("#matriculeChargeDeSecurite").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#nomChargeDeSecurite").val(personnel.nomPrenoms);
                    $("#fonctionChargeDeSecurite").val(personnel.fonction);
                }
            });
            $("#eop11Matricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#eop11Nom").val(personnel.nomPrenoms);
                    $("#eop11Fonction").val(personnel.fonction);
                }
            });
            $("#eop12Matricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#eop112Nom").val(personnel.nomPrenoms);
                    $("#eop12Fonction").val(personnel.fonction);
                }
            });
            $("#eop21Matricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#eop21Nom").val(personnel.nomPrenoms);
                    $("#eop21Fonction").val(personnel.fonction);
                }
            });
            $("#eop22Matricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#eop22Nom").val(personnel.nomPrenoms);
                    $("#eop22Fonction").val(personnel.fonction);
                }
            });
            $("#eop31Matricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#eop31Nom").val(personnel.nomPrenoms);
                    $("#eop31Fonction").val(personnel.fonction);
                }
            });
            $("#eop32Matricule").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#eop32Nom").val(personnel.nomPrenoms);
                    $("#eop32Fonction").val(personnel.fonction);
                }
            });
        });
    </script>
@endsection
