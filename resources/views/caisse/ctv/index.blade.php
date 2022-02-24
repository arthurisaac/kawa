@extends('bases.caisse')

@section('main')
@extends('bases.toolbar', ["title" => "Caisse centrale", "subTitle" => "CTV"])
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
        <div class="post d-flex flex-column-fluid" id="kt_post">

            <div id="kt_content_container" class="container-xxl">
                <div><h2 class="heading">CTV</h2></div>
                <br/>
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


        <form class="form-horizontal" method="post" action="{{ route('ctv.store') }}">
            @csrf

            <div class="card card-xxl-stretch">
                <div class="card-body pt-5">
                    <div class="row">
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre regional</label>
                                <select name="centre" id="centre"
                                    class="form-select form-select-solid select2-hidden-accessible combobox"
                                    data-control="select2"
                                    data-placeholder="Centre régional"
                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                    data-kt-select2="true"
                                    aria-hidden="true">
                                    <option></option>
                                    @foreach ($centres as $centre)
                                        <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre</label>
                                <select id="centre_regional" name="centre_regional"
                                    class="form-select form-select-solid select2-hidden-accessible combobox"
                                    data-control="select2"
                                    data-placeholder="Centre"
                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                    data-kt-select2="true"
                                    aria-hidden="true">
                                    <option></option>
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date</label>
                                <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control col editbox" />
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="heurePrise" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure de prise de service</label>
                                <input type="time" id="heurePrise" name="heurePrise" class="form-control col editbox" />
                            </div>
                    </div>
                    <div class="row">
                        <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                            <label for="heureFin" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure de fin de service</label>
                            <input type="time" name="heureFinBox" id="heureFinBox" class="form-control col editbox"/>
                        </div>
                    </div>

                    @csrf
                    <br>

                    <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="operatrice-tab" data-toggle="tab" href="#operatrice" role="tab"
                            aria-controls="operatrice" aria-selected="true">OPERATRICE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="bordereau-tab" data-toggle="tab" href="#bordereau" role="tab"
                            aria-controls="bordereau" aria-selected="false">BORDEREAU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="colis-tab" data-toggle="tab" href="#colis"
                            role="tab"
                            aria-controls="colis" aria-selected="false">COLIS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="billetage-tab" data-toggle="tab" href="#billetage"
                            role="tab"
                                aria-controls="billetage" aria-selected="false">BILLETAGES</a>
                        </li>
                    </ul>
                    <br>
                   <div class="card card-xxl-stretch">
                       <div class="card-body pt-0">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="operatrice" role="tabpanel"
                                aria-labelledby="operatrice-tab">

                                    <div class="row">
                                        <div class="col">
                                            <h6>Opératrice de tri</h6>
                                        </div>
                                    </div>
                                <table class="table table-bordered" id="mTable">
                                    <thead>
                                    <tr>
                                        <th>Opératrice</th>
                                        <th>Numéro de box</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><select name="operatrice[]"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Opératrice"
                                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true" >
                                                <option></option>
                                                @foreach ($operatrices as $op)
                                                    <option value="{{$op->id}}"> {{$op->nomPrenoms}}</option>
                                                @endforeach
                                            </select></td>
                                        <td><select name="numero[]"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Numéro de box"
                                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select></td>
                                        <td class="pt-8"><button type="button" class="btn btn-danger btn-sm" onclick="supprimerLigne(this)"></button></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade show" id="bordereau" role="tabpanel"
                                aria-labelledby="bordereau-tab">
                                <h6>Bordereau</h6>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="caisse_numtour" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Numero de tournée</label>
                                            <select name="tournee" id="caisse_numtour"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Numero de tournée"
                                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option></option>
                                                @foreach($tournees as $tournee)
                                                    <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Numero de bordereau</label>
                                            <input type="number" name="bordereau" class="col-sm-6 form-control form-control-sm"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row" style="align-items: center;">
                                            <div class="col-4">
                                                <h6>Convoyeur garde</h6>
                                            </div>
                                            <div class="col-1">
                                                <hr class="burval-separator">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom et prenoms</label>
                                                    <select type="text" name="convoyeurGarde" id="convoyeurGarde"
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            data-control="select2"
                                                            data-placeholder="Nom et prenoms"
                                                            data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                            data-kt-select2="true"
                                                            aria-hidden="true">
                                                        <option></option>
                                                        @foreach ($convoyeurs as $garde)
                                                            <option value="{{$garde->id}}"> {{$garde->nomPrenoms}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Fonction</label>
                                                    <input type="text" name="convoyeurGardeFonction" id="convoyeurGardeFonction" class="col-sm-6 form-control form-control-sm"/>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Matricule</label>
                                                    <input type="text" name="convoyeurGardeMatricule" id="convoyeurGardeMatricule" class="col-sm-6 form-control form-control-sm"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row"  style="align-items: center;">
                                            <div class="col-4">
                                                <h6>Régulatrice</h6>
                                            </div>
                                            <div class="col-1">
                                                <hr class="burval-separator">
                                            </div>
                                            <div class="col">
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom et prénoms</label>
                                                    <select
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Nom et prénoms"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true"
                                                        name="regulatrice" id="regulatrice">
                                                        <option></option>
                                                        @foreach ($regulatrices as $personnel)
                                                            <option value="{{$personnel->id}}"> {{$personnel->nomPrenoms}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Fonction</label>
                                                    <input type="text" name="regulatriceFonction" id="regulatriceFonction"
                                                        class="col-sm-6 form-control form-control-sm"/>
                                                </div>
                                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                    <label for="caisse_matre" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Matricule</label>
                                                    <input type="text" name="regulatriceMatricule" id="regulatriceMatricule" class="col-sm-6 form-control form-control-sm"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="colis" role="tabpanel"
                                aria-labelledby="colis-tab">
                                <div class="container-fluid">
                                    <h5>Colis</h5>
                                    <h6>Securipack</h6>
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Securipack</label>
                                                <select
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Securipack"
                                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true"
                                                    name="securipack">
                                                    <option></option>
                                                    <option>Extra grand</option>
                                                    <option>Grand</option>
                                                    <option>Moyen</option>
                                                    <option>Petit</option>
                                                </select>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Sac jute</label>
                                                <select class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Securipack"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true"
                                                        name="sacjute">
                                                    <option></option>
                                                    <option>Extra grand</option>
                                                    <option>Grand</option>
                                                    <option>Moyen</option>
                                                    <option>Petit</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="nombreColis"  class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nombre</label>
                                                <input type="number" name="nombreColis" id="nombreColis" class="col-sm-6 form-control form-control-sm"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="numeroScelleColis" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Numero de scellé</label>
                                                <textarea name="numeroScelleColis" id="numeroScelleColis" class="col-sm-6 form-control form-control-sm"></textarea>
                                            </div>
                                        </div>
                                        <div class="col">

                                        </div>
                                    </div><br />
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="client" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Client</label>
                                                <select class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Client"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true"
                                                        id="client" name="client" >
                                                    <option></option>
                                                    @foreach ($clients as $client)
                                                        <option value="{{$client->id}}"> {{$client->client_nom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="site" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Site</label>
                                                <select class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Site"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true" id="site" name="site" >
                                                    <option></option>
                                                    @foreach ($sites as $site)
                                                        <option value="{{$site->id}}"> {{$site->site}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="expediteur" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Expediteur</label>
                                                <input type="text" class="col-sm-6 form-control form-control-sm" id="expediteur" name="expediteur"  />
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="caisse_desti" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Destinataire</label>
                                                <input type="text" class="col-sm-6 form-control form-control-sm" id="destinataire" name="destinataire"  />
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="billetage" role="tabpanel"
                                aria-labelledby="billetage-tab">
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary btn-sm">Billetage annoncé</button>
                                        <br />
                                        <br />
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Billetage</th>
                                                <th>Francs CFA</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb10000" id="ba_nb10000" /></td>
                                                <td>10000</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb10000_total" id="ba_nb10000_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb5000" id="ba_nb5000" /></td>
                                                <td>5000</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb5000_total" id="ba_nb5000_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb2000" id="ba_nb2000" /></td>
                                                <td>2000</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb2000_total" id="ba_nb2000_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb1000" id="ba_nb1000" /></td>
                                                <td>1000</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb1000_total" id="ba_nb1000_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb500" id="ba_nb500" /></td>
                                                <td>500</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb500_total" id="ba_nb500_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb250" id="ba_nb250" /></td>
                                                <td>250</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb250_total" id="ba_nb250_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb200" id="ba_nb200" /></td>
                                                <td>200</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb200_total" id="ba_nb200_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb100" id="ba_nb100" /></td>
                                                <td>100</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb100_total" id="ba_nb100_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb50" id="ba_nb50" /></td>
                                                <td>50</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb50_total" id="ba_nb50_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb25" id="ba_nb25" /></td>
                                                <td>25</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb25_total" id="ba_nb25_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb10" id="ba_nb10" /></td>
                                                <td>10</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb10_total" id="ba_nb10_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb5" id="ba_nb5" /></td>
                                                <td>5</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb5_total" id="ba_nb5_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="ba_nb1" id="ba_nb1" /></td>
                                                <td>1</td>
                                                <td><input type="number" class="form-control form-control-sm form-control-bordeless" name="ba_nb1_total" id="ba_nb1_total" readonly /></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary btn-sm">Billetage reconnu</button>
                                        <br />
                                        <br />
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Billetage</th>
                                                <th>Francs CFA</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb10000" id="br_nb10000" /></td>
                                                <td>10000</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb10000_total" id="br_nb10000_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb5000" id="br_nb5000" /></td>
                                                <td>5000</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb5000_total" id="br_nb5000_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb2000" id="br_nb2000" /></td>
                                                <td>2000</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb2000_total" id="br_nb2000_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb1000" id="br_nb1000" /></td>
                                                <td>1000</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb1000_total" id="br_nb1000_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb500" id="br_nb500" /></td>
                                                <td>500</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb500_total" id="br_nb500_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb250" id="br_nb250" /></td>
                                                <td>250</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb250_total" id="br_nb250_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb200" id="br_nb200" /></td>
                                                <td>200</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb200_total" id="br_nb200_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb100" id="br_nb100" /></td>
                                                <td>100</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb100_total" id="br_nb100_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb50" id="br_nb50" /></td>
                                                <td>50</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb50_total" id="br_nb50_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb25" id="br_nb25" /></td>
                                                <td>25</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb25_total" id="br_nb25_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb10" id="br_nb10" /></td>
                                                <td>10</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb10_total" id="br_nb10_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb5" id="br_nb5" /></td>
                                                <td>5</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb5_total" id="br_nb5_total" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb1" id="br_nb1" /></td>
                                                <td>1</td>
                                                <td><input type="number" min="0" class="form-control form-control-sm" name="br_nb1_total" id="br_nb1_total" readonly /></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col"></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-6 fv-row fv-plugins-icon-container">
                                            <label for="montantAnnonce" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Montant annoncé</label>
                                            <input type="number" name="montantAnnonce" id="montantAnnonce" value="0" class="col-sm-6 form-control form-control-sm" readonly/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-6 fv-row fv-plugins-icon-container">
                                            <label for="montantReconnu" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Montant reconnu</label>
                                            <input type="number" name="montantReconnu" id="montantReconnu" class="col-sm-6 form-control form-control-sm" value="0" readonly/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-6 fv-row fv-plugins-icon-container">
                                            <label for="ecartConstate" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Ecart constaté</label>
                                            <input type="number" name="ecartConstate" id="ecartConstate" class="col-sm-6 form-control form-control-sm" value="0" readonly/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-6 fv-row fv-plugins-icon-container">
                                            <label for="montantFinal" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Montant final</label>
                                            <input type="number" name="montantFinal" id="montantFinal" class="col-sm-6 form-control form-control-sm" value="0"/=
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col">
                                        <div class="row" style="align-items: center;">
                                            <div class="col-3">
                                                <h6>Observation</h6>
                                            </div>
                                            <div class="col-1">
                                                <hr class="burval-separator">
                                            </div>
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label for="caisse_bc" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Billets calculés</label>
                                                    <label><input type="radio" value="oui" name="billetsCalcules"> Oui</label>
                                                    <label><input type="radio" value="non" name="billetsCalcules"> Non</label>
                                                    <input type="number" name="billetsCalculesMontant" id="caisse_bc" class="col-sm-6 form-control form-control-sm"/>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="caisse_bsav" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Billets sans valeurs</label>
                                                    <label><input type="radio" value="oui" name="billetsSansValeurs"> Oui</label>
                                                    <label><input type="radio" value="oui" name="billetsSansValeurs"> Non</label>
                                                    <input type="number" name="billetsSansValeursMontant" id="caisse_bsav" class="col-sm-6 form-control form-control-sm"/>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="caisse_busa" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Billets usagés</label>
                                                    <label><input type="radio" value="oui" name="billetsUsages"> Oui</label>
                                                    <label><input type="radio" value="non" name="billetsUsages"> Non</label>
                                                    <input type="number" name="billetsUsagesMontant" id="caisse_busa" class="col-sm-6 form-control form-control-sm"/>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="caisse_fau" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Faux billets</label>
                                                    <label><input type="radio" value="oui" name="fauxBillets"> Oui</label>
                                                    <label><input type="radio" value="non" name="fauxBillets"> Non</label>
                                                    <input type="number" name="fauxBilletsMontant"  class="col-sm-6 form-control form-control-sm"/>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="caisse_bide" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Billets déparaillés</label>
                                                    <label><input type="radio" value="oui" name="billetsDeparailles"> Oui</label>
                                                    <label><input type="radio" value="non" name="billetsDeparailles"> Non</label>
                                                    <input type="number" name="billetsDeparaillesMontant" id="caisse_bide" class="col-sm-6 form-control form-control-sm"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                </div><br />
                            </div>
                       </div>
                   </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary button" type="submit">Valider</button>
                        <button class="btn btn-danger button" type="reset">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        let montantAnnonce = 0;
        let montantReconnu = 0;

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
            // Tableau montant annoncé
            $("#ba_nb10000").on("change", function() {
                $("#ba_nb10000_total").val(parseInt(this.value) * 10000);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb5000").on("change", function() {
                $("#ba_nb5000_total").val(parseInt(this.value) * 5000);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb2000").on("change", function() {
                $("#ba_nb2000_total").val(parseInt(this.value) * 2000);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb1000").on("change", function() {
                $("#ba_nb1000_total").val(parseInt(this.value) * 1000);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb500").on("change", function() {
                $("#ba_nb500_total").val(parseInt(this.value) * 500);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb250").on("change", function() {
                $("#ba_nb250_total").val(parseInt(this.value) * 250);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb200").on("change", function() {
                $("#ba_nb200_total").val(parseInt(this.value) * 200);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb100").on("change", function() {
                $("#ba_nb100_total").val(parseInt(this.value) * 100);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb50").on("change", function() {
                $("#ba_nb50_total").val(parseInt(this.value) * 50);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb25").on("change", function() {
                $("#ba_nb25_total").val(parseInt(this.value) * 25);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb10").on("change", function() {
                $("#ba_nb10_total").val(parseInt(this.value) * 10);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb5").on("change", function() {
                $("#ba_nb5_total").val(parseInt(this.value) * 5);
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });
            $("#ba_nb1").on("change", function() {
                $("#ba_nb1_total").val(parseInt(this.value));
                calculerBilletageAnnonce();
                calculerEcartConstate();
            });

            // Tableau montant reconnu
            $("#br_nb10000").on("change", function() {
                $("#br_nb10000_total").val(parseInt(this.value) * 10000);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb5000").on("change", function() {
                $("#br_nb5000_total").val(parseInt(this.value) * 5000);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb2000").on("change", function() {
                $("#br_nb2000_total").val(parseInt(this.value) * 2000);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb1000").on("change", function() {
                $("#br_nb1000_total").val(parseInt(this.value) * 1000);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb500").on("change", function() {
                $("#br_nb500_total").val(parseInt(this.value) * 500);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb250").on("change", function() {
                $("#br_nb250_total").val(parseInt(this.value) * 250);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb200").on("change", function() {
                $("#br_nb200_total").val(parseInt(this.value) * 200);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb100").on("change", function() {
                $("#br_nb100_total").val(parseInt(this.value) * 100);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb50").on("change", function() {
                $("#br_nb50_total").val(parseInt(this.value) * 50);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb25").on("change", function() {
                $("#br_nb25_total").val(parseInt(this.value) * 25);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb10").on("change", function() {
                $("#br_nb10_total").val(parseInt(this.value) * 10);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb5").on("change", function() {
                $("#br_nb5_total").val(parseInt(this.value) * 5);
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
            $("#br_nb1").on("change", function() {
                $("#br_nb1_total").val(parseInt(this.value));
                calculerBilletageReconnu();
                calculerEcartConstate();
            });
        });
    </script>
    <script>
        function supprimerLigne(e) {
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("mTable").deleteRow(indexLigne);
        }

        let personnels = {!! json_encode($personnels) !!};
        $(document).ready(function () {
            $("#regulatrice").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                //console.log(personnel);
                if (personnel) {
                    //$("#regulatriceNomPrenoms").val(personnel.nomPrenoms);
                    $("#regulatriceFonction").val(personnel.fonction);
                    $("#regulatriceMatricule").val(personnel.matricule);
                    //$("#chauffeurTitulaireDateAffection").val(personnel.dateEntreeSociete);
                }
            });
            $("#convoyeurGarde").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                console.log(personnel);
                if (personnel) {
                    //$("#regulatriceNomPrenoms").val(personnel.nomPrenoms);
                    $("#convoyeurGardeFonction").val(personnel.fonction);
                    $("#convoyeurGardeMatricule").val(personnel.matricule);
                    //$("#chauffeurTitulaireDateAffection").val(personnel.dateEntreeSociete);
                }
            });
            //$("#mTable > tbody").html("");
            $("#add").on("click", function () {
                $("#mTable").append(' <tr>\n' +
                    '                            <td><select name="operatrice[]" class="form-control col-sm-7" >\n' +
                    '                                    <option></option>\n' +
                    '                                    @foreach ($operatrices as $operatrice)\n' +
                    '                                        <option value="{{$operatrice->id}}"> {{$operatrice->nomPrenoms}}</option>\n' +
                    '                                    @endforeach\n' +
                    '                                </select></td>\n' +
                    '                            <td><select name="numero[]" class="form-control col-sm-7" >\n' +
                    '                                    <option value="1">1</option>\n' +
                    '                                    <option value="2">2</option>\n' +
                    '                                    <option value="3">3</option>\n' +
                    '                                    <option value="4">4</option>\n' +
                    '                                    <option value="5">5</option>\n' +
                    '                                    <option value="6">6</option>\n' +
                    '                                    <option value="7">7</option>\n' +
                    '                                    <option value="8">8</option>\n' +
                    '                                    <option value="9">9</option>\n' +
                    '                                    <option value="10">10</option>\n' +
                    '                                </select></td>\n' +
                    '                            <td class="pt-8"><button type="button" class="btn btn-danger btn-sm" onclick="supprimerLigne(this)"></button></td>\n' +
                    '                        </tr>');
            });
            $("#montantAnnonce").on('change', function() {
                const montantReconnu = $("#montantReconnu").val();
                $("#ecartConstate").val(parseFloat(this.value ?? 0) - parseFloat(montantReconnu ?? 0))
            });
            $("#montantReconnu").on('change', function() {
                const montantAnnonce = $("#montantAnnonce").val();
                $("#ecartConstate").val(parseFloat(montantAnnonce ?? 0) - parseFloat(this.value ?? 0))
            });
        });
    </script>
@endsection
