@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Main Courante Nouveau"])
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <br>
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

            <div class="row gy-5 g-xxl-12">
                <div class="col-xxl-12">
                    <div class="card card-xxl-stretch">
                        <div class="card-header border-0 py-5 bg-gradient-kawa">
                            <h3 class="card-title fw-bolder">Main Courante</h3>
                        </div>
                        <div class="card-body pt-5">
                            <div class="row">
                                <div class="col">
                                     <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="date" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date</label>
                                        <input type="text" name="date" id="date" value="{{$date}}"
                                               class="form-control col" readonly/>
                                    </div>
                                </div>
                                <div class="col">
                                     <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="no_tournee" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">N°Tournée</label>
                                        <select
                                            class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="N° Tournée"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            name="noTournee" id="noTournee">
                                            <option></option>
                                            @foreach($tournees as $tournee)
                                                <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}
                                                    // {{$tournee->vehicules->code ?? ""}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                     <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Véhicule</label>
                                        <input class="form-control col" name="vehicule" id="vehicule" readonly/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Chef de bord</label>
                                        <input class="form-control col" name="chefDeBord" id="chefDeBord" readonly/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                     <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Agent garde</label>
                                        <input class="form-control col" name="agentDeGarde" id="agentDeGarde" readonly/>
                                    </div>
                                </div>
                                <div class="col">
                                     <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Chauffeur:</label>
                                        <input class="form-control col" name="chauffeur" id="chauffeur" readonly/>
                                    </div>
                                </div>
                                <div class="col">
                                     <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre regional</label>
                                        <input name="centre" id="centre" class="form-control col" readonly/>
                                    </div>
                                </div>
                                <div class="col">
                                     <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre</label>
                                        <input id="centre_regional" name="centre_regional" class="form-control col"
                                               readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="depart-centre-tab" data-toggle="tab" href="#depart-centre" role="tab"
                       aria-controls="depart-centre" aria-selected="true">Départ Centre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="arrivee-site-tab" data-toggle="tab" href="#arrivee-site" role="tab"
                       aria-controls="arrivee-site" aria-selected="false">Arrivée site</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" id="depart-site-tab" data-toggle="tab" href="#depart-site" role="tab"
                       aria-controls="depart-site" aria-selected="false">Départ site</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" id="arrivee-centre-tab" data-toggle="tab" href="#arrivee-centre" role="tab"
                       aria-controls="arrivee-centre" aria-selected="false">Arrivée centre</a>
                </li>
                {{--<li class="nav-item">
                    <a class="nav-link" id="tournee-centre-tab" data-toggle="tab" href="#tournee-centre" role="tab"
                       aria-controls="tournee-centre" aria-selected="false">Tournée centre</a>
                </li>--}}
            </ul>
            <br>
            <div class="card card-xxl-stretch">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="depart-centre" role="tabpanel"
                         aria-labelledby="depart-centre-tab">
                        <div class="container-fluid">
                            <form method="post" action="/maincourante-departcentre" id="departCentre">
                                @csrf
                                <input type="hidden" name="maincourante" value="departCentre"/>
                                <input type="hidden" name="tournee" class="noTournee"/>
                                <br/>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="heure_depart" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure départ</label>
                                            <input type="time" name="dcHeureDepart" class="form-control col editbox"
                                                   value="{{date('H:i')}}"/>
                                        </div>
                                         <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="km_depart" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Km départ</label>
                                            <input type="number" name="dcKmDepart" class="form-control col editbox"/>
                                        </div>
                                         <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="km_depart" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Niveau carburant</label>
                                            <select name="dcNiveauCarburant"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Niveau carburant"
                                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option></option>
                                                @foreach($optionNiveauCarburant as $option)
                                                    <option>{{$option->option}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                         <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="observation" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Observation:</label>
                                            <textarea name="dcObservation" id="dcObservation"
                                                      class="form-control col editbox"></textarea>
                                        </div>

                                        <br>
                                         <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <span class="col-4"></span>
                                            <button class="btn btn-sm btn-primary" type="submit">Enregistrer
                                            </button>
                                        </div>

                                    </div>
                                    <div class="col-8">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="arrivee-site" role="tabpanel" aria-labelledby="arrivee-site-tab">
                        <div class="container-fluid">
                            <form method="post" action="/maincourante-arriveesite">
                                @csrf
                                <input type="hidden" name="maincourante" value="arriveeSite"/>
                                <input type="hidden" name="tournee" class="noTournee"/>
                                <br/>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">SITE</label>
                                            <select type="text" name="asSite" id="asSite"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Site"
                                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                @foreach($sites as $site)
                                                    <option value="{{$site->id}}">{{$site->site}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="heure_depart" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Type opération</label>
                                            <select name="asTypeOperation"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Type opération"
                                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option></option>
                                                <option>Enlèvement</option>
                                                <option>Dépot</option>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="asDateArrivee" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date arrivée sur site</label>
                                            <input type="date" name="asDateArrivee" class="form-control col-sm-8"
                                                   value="{{date('Y-m-d')}}"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label id="km_depart" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Kilométrage arrivée</label>
                                            <input type="number" name="asKm" id="kmDepart"
                                                   class="form-control col-sm-8"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="asDateArrivee" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure arrivée sur site</label>
                                            <input type="time" name="asHeureArrivee" class="form-control col-sm-8"
                                                   value="{{date('H:i')}}"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="asDebutOpération" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure début opération</label>
                                            <input type="time" name="asDebutOperation" id="asDebutOperation"
                                                   class="form-control col-sm-8" value="{{date('H:i')}}"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="asFinOperation" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure fin opération</label>
                                            <input type="time" name="asFinOperation" id="asFinOperation"
                                                   class="form-control col-sm-8"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="asTempsOperation" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Temps opération (mn)</label>
                                            <input type="number" name="asTempsOperation" id="asTempsOperation"
                                                   class="form-control col-sm-8" readonly/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="asNbColis" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nombre de colis récupérés</label>
                                            <input type="number" name="asNbColis" id="asNbColis"
                                                   class="form-control col-sm-8" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <span style="border-left: 1px solid #000; display: inline-block; height: 100vh; margin: 0 20px;"></span>
                                    </div>
                                    <div class="col">
                                        <button type="button" id="arriveeSiteColisButton" class="btn btn-sm btn-dark mt-9" style="float: right">
                                            Ajouter
                                        </button>
                                        <br>
                                        <br>
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                               id="tableASColis">
                                            <thead>
                                            <tr>
                                                <th style="width: 200px">Colis</th>
                                                <th>N° Colis</th>
                                                <th>N° Bordereau</th>
                                                {{--<th>Montant annoncé</th>--}}
                                                <th>Nombre de colis</th>
                                                {{--<th>Nature colis</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <select name="asColis[]" class="form-select form-select-solid select2-hidden-accessible"
                                                            data-control="select2"
                                                            data-placeholder="Colis"
                                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                            data-kt-select2="true"
                                                            aria-hidden="true">
                                                        <option>Keep Safe</option>
                                                        <option>Sac juste</option>
                                                        <option>Pierres précieuses</option>
                                                        <option>Caisse</option>
                                                        <option>Conteneur</option>
                                                    </select>
                                                </td>
                                                <td><textarea name="asNumColis[]" class="form-control"
                                                              rows="1"></textarea></td>
                                                <td><select name="asNumBordereau[]" class="form-select form-select-solid select2-hidden-accessible"
                                                            data-control="select2"
                                                            data-placeholder="Numéro bordereau"
                                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                            data-kt-select2="true"
                                                            aria-hidden="true">
                                                        <option></option>
                                                        @foreach($optionBordereau as $option)
                                                            <option>{{$option->numero}}</option>
                                                        @endforeach
                                                    </select></td>
                                                {{--<td><input type="number" name="asMontantAnnonce[]" class="form-control"/></td>--}}
                                                <td><input type="number" min="0" name="asNombreColis[]"
                                                           class="form-control"/>
                                                </td>
                                                {{--<td><input type="text" name="asNatureColis[]" class="form-control"/></td>--}}
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <div class="row">
                                        <div class="col" style="display: none;">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure de départ</label>
                                                <input type="time" name="asHeure" class="form-control col-sm-6"
                                                       value="{{date('H:i')}}"/>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date départ site</label>
                                                <input type="datetime-local" class="form-control col-sm-8"
                                                       name="asDepartSite"
                                                       value="{{date('Y-m-d\TH:i')}}">
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Prochaine destination</label>
                                                <select class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Prochaine destination"
                                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true"
                                                        name="asDestination"
                                                        id="prochaineDestination">
                                                    @foreach($sites as $site)
                                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Observation</label>
                                                <textarea class="form-control col-sm-8" name="asObservation"></textarea>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                    </div>
                                    <br/>
                                </div>

                                <br/>
                                <br/>
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">                                 <button class="btn btn-sm btn-primary" type="submit">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="depart-site" role="tabpanel" aria-labelledby="depart-site-tab">
                        <div class="container-fluid">
                            <form method="post" action="{{ route('maincourante.store') }}" id="departSite" novalidate>
                                @csrf

                                <input type="hidden" name="tournee" class="noTournee"/>
                                <input type="hidden" name="maincourante" value="departSite"/>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure de départ</label>
                                            <input type="time" name="heureDepart" class="form-control col-sm-6"
                                                   value="{{date('H:i')}}"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label id="km_depart" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Kilométrage de depart</label>
                                            <input type="number" name="kmDepart" id="kmDepart"
                                                   class="form-control col-sm-6"/>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date départ site</label>
                                                <input type="date" class="form-control col-sm-6" name="departSite"
                                                       value="{{date('Y-m-d')}}">
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Prochaine destination</label>
                                                <select class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-placeholder="Prochaine destination"
                                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true" name="destination"
                                                        id="prochaineDestination"></select>
                                            </div>
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Observation</label>
                                                <textarea class="form-control col-sm-6" name="observation"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="btn btn-primary btn-sm" type="button" id="dsSubmit">
                                                        Enregistrer
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                    </div>
                                    <br/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="arrivee-centre" role="tabpanel" aria-labelledby="arrivee-centre-tab">
                        <div class="container-fluid">
                            <br>
                            <form method="post" action="/maincourante-arriveecentre" id="arriveeCentre">
                                @csrf
                                <input type="hidden" name="maincourante" value="arriveeCentre"/>
                                <input type="hidden" name="tournee" class="noTournee"/>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure arrivée</label>
                                            <input type="time" name="heureArrivee" class="form-control col-sm-7"
                                                   value="{{date('H:i')}}"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Km arrivé</label>
                                            <input type="number" name="kmArrive" class="form-control col-sm-7"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Niveau carburant</label>
                                            <select name="niveauCarburant"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Niveau carburant"
                                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option></option>
                                                @foreach($optionNiveauCarburant as $option)
                                                    <option>{{$option->option}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container" style="display: none;">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Fin de tournée</label>
                                            <select name="finTournee"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Fin de tournée"
                                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option></option>
                                                <option>fin</option>
                                                <option>transite</option>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date arrivée centre</label>
                                            <input type="date" name="dateArrivee" class="form-control col-sm-7"
                                                   value="{{date('Y-m-d')}}"/>
                                        </div>
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Observation</label>
                                            <textarea name="observation" class="form-control col-sm-7"></textarea>
                                        </div>
                                        <br>
                                        <div class="d-flex flex-column mb-7 col-md-6 fv-row fv-plugins-icon-container">
                                            <span class="col-4"></span>
                                            <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery-ui.min.js"></script>
    <script>
        let tournees = {!! json_encode($tournees) !!};
        let sites = {!! json_encode($sites) !!};
        let sitesTournees = {!! json_encode($sitesTournees) !!};
        $(document).ready(function () {
            $("#noTournee").on("change", function () {
                $("#vehicule").val("");
                $("#chauffeur").val("");
                $("#chefDeBord").val("");
                $("#agentDeGarde").val("");
                $("#centre_regional option").remove();
                $(".noTournee").val("");
                const tournee = tournees.find(t => t.id === parseInt(this.value ?? 0));
                if (tournee) {
                    $("#vehicule").val(tournee.vehicules?.immatriculation ?? '');
                    $("#chauffeur").val(tournee.chauffeurs?.nomPrenoms ?? '');
                    $("#chefDeBord").val(tournee.chef_de_bords?.nomPrenoms ?? '');
                    $("#agentDeGarde").val(tournee.agent_de_gardes?.nomPrenoms ?? '');
                    $("#centre").val(tournee.centre);
                    $("#centre_regional").val(tournee.centre_regional);
                    $(".noTournee").val(tournee.id);
                    // Filtrer les sites par centre
                    /*
                    const commerciaux = sites.filter(site => {
                        return site.centre === tournee.centre;
                    });
                    commerciaux.map(({id, site, clients}) => {
                        $('#asSite').append($('<option>', {
                            value: id,
                            text: `${site} (${clients.client_nom})`
                        }));
                    })
                    */
                    // Filtrer les sites par tournee site
                    /* const commercial_site = sitesTournees.filter(site => {
                        return site.idTourneeDepart === tournee.id;
                    });
                   $("#asSite option").remove();
                    commercial_site.map(({sites}) => {
                        $('#asSite').append($('<option>', {
                            value: sites.id,
                            text: `${sites.site} (${sites.clients.client_nom})`
                        }));
                        $('#prochaineDestination').append($('<option>', {
                            value: sites.site,
                            text: `${sites.site} (${sites.clients.client_nom})`
                        }));
                    })*/
                }
            });
        });
    </script>
    <script>
        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));
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
            $("#Tabs2").tabs(
                {
                    show: false,
                    hide: false,
                    event: 'click',
                    collapsible: false
                });
            $("#arriveeSiteColisButton").on("click", function () {
                $("#tableASColis").append('<tr>\n' +
                    '                                        <td>\n' +
                    '                                            <select name="asColis[]" class="form-control">\n' +
                    '                                                <option>Keep Safe</option>\n' +
                    '                                                <option>Sac juste</option>\n' +
                    '                                                <option>Pierres précieuses</option>\n' +
                    '                                                <option>Caisse</option>\n' +
                    '                                                <option>Conteneur</option>\n' +
                    '                                            </select>\n' +
                    '                                        </td>\n' +
                    '                                        <td><textarea name="asNumColis[]"  rows="1" class="form-control"></textarea></td>\n' +
                    '                                        <td><select name="asNumBordereau[]" class="form-control">\n' +
                    '                                                <option></option>\n' +
                    '                                                @foreach($optionBordereau as $option)\n' +
                    '                                                    <option>{{$option->numero}}</option>\n' +
                    '                                                @endforeach\n' +
                    '                                            </select></td>\n' +
                    //'                                        <td><input type="number" name="asMontantAnnonce[]" class="form-control"/></td>\n' +
                    '                                        <td><input type="number" min="0" name="asNombreColis[]" class="form-control"/></td>\n' +
                    //'                                        <td><input type="text" name="asNatureColis[]" class="form-control"/></td>\n' +
                    '                                    </tr>')
            });
            $("#asDebutOperation").on("change", function () {
                const fin = $("#asFinOperation").val();
                if (fin !== undefined) {
                    console.log(fin);
                }
            });
            $("#asFinOperation").on("change", function () {
                const debut = $("#asDebutOperation").val();
                console.log("debut :", debut);
                console.log("fin :", this.value);
                const debutDate = new Date(`01/01/2021 ${debut}`);
                const finDate = new Date(`01/01/2021 ${this.value}`);
                $("#asTempsOperation").val(diff_hours(debutDate, finDate));
            });

            function diff_hours(dt2, dt1) {
                let diff = (dt2.getTime() - dt1.getTime()) / 1000;
                //diff /= (60 * 60);         //For Hours
                diff /= (60);         // For Minutes
                return Math.abs(Math.round(diff));
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#listeArriveeSite').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeDepartSite1').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeDepartParSite').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeTourneeCentre').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeArriveeCentre').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        })
    </script>
    <script>
        function deleteDepartSite(id) {
            $.ajax({
                url: "{{ route('deleteDepartSite') }}",
                type: "GET",
                data: {'id': id},
                success: function () {
                    alert('Enregistrement supprimé');
                    window.location.reload();
                }
            })
        }

        $(document).ready(function () {
            $("#numeroSite").on("change", function () {
                const numero = $(this).val();
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: {'numeroSite': numero},
                    success: function (data) {
                        $("#listeDepartParSite tbody tr").remove();
                        // console.log(data);
                        populateData(data);
                    }
                })
            });

            function populateData(data) {
                $.each(data, function (i, item) {
                    const tr = $('<tr>').append(
                        $('<td>').text(item.numeroSite),
                        $('<td>').text(item.site),
                        $('<td>').text(item.date),
                        $('<td>').text(item.heureDepart),
                        $('<td>').text(item.destination),
                        $('<td>').text(item.observation),
                        $('<td>').text(item.bordereau),
                        $('<td>').text(item.kmDepart),
                        $('<td>').text(item.finOp),
                        $('<td>').text(''),
                        $('<td>').append(
                            $("<input />", {
                                class: "btn btn-danger btn btn-delete-departSite",
                                type: "submit",
                                value: "Supprimer",
                                onClick: 'deleteDepartSite(' + item.id + ')'
                            })
                        )
                    );
                    $("#listeDepartParSite tbody").append(tr);
                });
            }
        })
    </script>
    <script>
        $(document).ready(function () {
            $("#dcSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();
                const noTournee = $("#noTournee").val();
                const dcHeureDepart = $("input[name=dcHeureDepart]").val();
                const dcKmDepart = $("input[name=dcKmDepart]").val();
                const dcObservation = $("textarea[name=dcObservation]").val();
                const asNumeroBordereau = $("textarea[name=asNumeroBordereau]").val();
                const dcNiveauCarburant = $("select[name=dcNiveauCarburant]").val();
                $("#dcSubmit").attr("disabled", "true");
                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: {
                        maincourante: "departCentre",
                        noTournee: noTournee,
                        heureDepart: dcHeureDepart,
                        kmDepart: dcKmDepart,
                        observation: dcObservation,
                        noBordereau: asNumeroBordereau,
                        niveauCarburant: dcNiveauCarburant,
                        _token: _token
                    },
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else {
                            $("input[name=dcHeureDepart]").val("");
                            $("input[name=dcKmDepart]").val("");
                            $("textarea[name=dcObservation]").val("");
                            if (confirm("Enregistré avec succès! Ouvrir la liste de depart centre ?")) {
                                window.location.replace("maincourante-departcentreliste");
                            }
                        }
                    }
                }).done(function () {
                    $("#dcSubmit").attr("disabled", "false");
                });
            });
            $("#asSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();
                const noTournee = $("#noTournee").val();
                const site = $("select[name=asSite]").val();
                const operation = $("select[name=asTypeOperation]").val();
                const dateArrivee = $("input[name=asDateArrivee]").val();
                const heureArrivee = $("input[name=asHeureArrivee]").val();
                const debutOperation = $("input[name=asDebutOperation]").val();
                const finOperation = $("input[name=asFinOperation]").val();
                const tempsOperation = $("input[name=asTempsOperation]").val();
                const asNbColis = $("input[name=asNbColis]").val();
                const asObservation = $("textarea[name=asObservation]").val();
                const asDestination = $("select[name=asDestination]").val();
                const asDepartSite = $("input[name=asDepartSite]").val();
                const asKm = $("input[name=asKm]").val();
                const asHeure = $("input[name=asHeure]").val();
                const asColis = [];
                const asNumColis = [];
                const asNumBordereau = [];
                const asMontantAnnonce = [];
                const asNatureColis = [];
                const asNombreColis = [];
                $('select[name^="asColis"]').each(function (i) {
                    asColis.push($(this).val())
                });
                $('input[name^="asNumColis"]').each(function () {
                    asNumColis.push($(this).val())
                });
                $('select[name^="asNumBordereau"]').each(function () {
                    asNumBordereau.push($(this).val())
                });
                $('input[name^="asMontantAnnonce"]').each(function () {
                    asMontantAnnonce.push($(this).val())
                });
                $('input[name^="asNatureColis"]').each(function () {
                    asNatureColis.push($(this).val())
                });
                $('input[name^="asNombreColis"]').each(function () {
                    asNombreColis.push($(this).val())
                });
                //const asColis = $("input[name=asColis]").val();
                //const asNumColis = $("input[name=asNumColis]").val();
                //const asNumBordereau = $("input[name=asNumBordereau]").val();
                //const asMontantAnnonce = $("input[name=asMontantAnnonce]").val();
                //const asNatureColis = $("input[name=asNatureColis]").val();
                //$("#asSubmit").attr("disabled", "true");
                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: {
                        maincourante: "arriveeSite",
                        noTournee: noTournee,
                        site: site,
                        operation,
                        dateArrivee,
                        heureArrivee: heureArrivee,
                        debutOperation: debutOperation,
                        finOperation: finOperation,
                        tempsOperation: tempsOperation,
                        asNbColis: asNbColis,
                        asColis,
                        asNumColis,
                        asNumBordereau,
                        asMontantAnnonce,
                        asNatureColis,
                        asNombreColis,
                        asObservation,
                        asDestination,
                        asDepartSite,
                        asKm,
                        asHeure,
                        _token: _token
                    },
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else {
                            //alert("Enregistré avec succès!");
                            $("input[name=asHeureArrivee]").val("");
                            $("input[name=asKmArrivee]").val("");
                            $("textarea[name=asObservation]").val("");
                            if (confirm("Enregistré avec succès! Ouvrir la liste de arrivée site ?")) {
                                window.location.replace("maincourante-arriveesiteliste");
                            } else {
                                window.location.reload();
                            }
                        }
                    }
                })
                    .done(function () {
                        //$("#asSubmit").removeAttr("disabled");
                    });
            });
            $("#dsSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();
                const noTournee = $("#noTournee").val();
                const site = $("select[name=asSite]").val();
                $("#dsSubmit").attr("disabled", "true");
                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: $('#departSite').serialize() + `&maincourante=departSite&noTournee=${noTournee}&_token=${_token}&site=${site}`,
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else if (response.errors) {
                            alert(JSON.stringify(response.errors));
                        } else {
                            //alert("Enregistré avec succès!");
                            document.getElementById('departSite').reset();
                            if (confirm("Enregistré avec succès! Ouvrir la liste de départ site ?")) {
                                window.location.replace("maincourante-departsiteliste");
                            }
                        }
                    }
                })
                    .done(function () {
                        $("#dsSubmit").attr("disabled", "false");
                    });
            });
            $("#acSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();
                const noTournee = $("#noTournee").val();
                $("#acSubmit").attr("disabled", "true");
                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: $('#arriveeCentre').serialize() + `&noTournee=${noTournee}&_token=${_token}`,
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else {
                            //alert("Enregistré avec succès!");
                            document.getElementById('arriveeCentre').reset();
                            if (confirm("Enregistré avec succès! Ouvrir la liste de arrivée centre ?")) {
                                window.location.replace("maincourante-arriveecentreliste");
                            }
                        }
                        console.log(response);
                    }
                })
                    .done(function () {
                        $("#acSubmit").attr("disabled", "false");
                    });
            });
            $("#tcSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();
                const noTournee = $("#noTournee").val();
                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: $('#tourneeCentre').serialize() + `&noTournee=${noTournee}&_token=${_token}`,
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else {
                            alert("Enregistré avec succès!");
                            document.getElementById('tourneeCentre').reset();
                        }
                        console.log(response);
                    }
                })
            })
        });
    </script>
    <script>
        $(document).on('DOMNodeInserted', function () {
            $("input[name='asNombreColis[]']").on("change", function () {
                let total = 0;
                $.each($("input[name='asNombreColis[]']"), function (i) {
                    const nombre = $("input[name='asNombreColis[]']").get(i);
                    total += parseInt(nombre.value ?? 0)
                });
                $('#asNbColis').val(total);
            });
        });
    </script>
@endsection
