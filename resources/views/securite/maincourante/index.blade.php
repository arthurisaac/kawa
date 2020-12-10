@extends('base')

@section('main')
    <style>
        .nav-tabs {
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            border: none;
        }

        .nav-tabs .nav-link {
            border: none;
            border-radius: 0;
            transition: color .2s ease-out;
        }

        .tabs-dark .nav-link {
            color: #fff;
        }

        .tabs-light .nav-link {
            color: rgba(0, 0, 0, .5);
        }

        .tabs-dark .nav-link:not(.active):hover {
            color: #aeb0b3;
        }

        .tabs-light .nav-link:not(.active):hover {
            color: #495057;
        }

        .nav-pills .nav-link {
            border-radius: 2px;
            color: #495057;
            transition: color .2s ease-out, box-shadow .2s;
        }

        .nav-pills .nav-link:hover {
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);

        }

        .nav-pills .nav-item {
            margin: 0 5px;
        }

        .nav-pills.pills-dark .nav-link.active {
            background-color: #343a40 !important;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        }

        .nav-pills.pills-dark .nav-link:not(.active):hover {
            color: #1d1e22;
        }

        .tabs-marker .nav-link {
            position: relative;
        }

        .tabs-marker .nav-link.active .marker {
            height: 30px;
            width: 30px;
            left: 50%;
            bottom: -30px;
            transform: translatex(-50%);
            position: absolute;
            overflow: hidden;
        }

        .tabs-marker .nav-link.active .marker:after {
            content: "";
            height: 15px;
            width: 15px;
            top: -8px;
            left: 50%;
            transform: rotate(45deg) translatex(-50%);
            transform-origin: left;
            background-color: #fff;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            position: absolute;
        }
    </style>
    <div class="burval-container">
        <div><h2 class="heading">Maincourante</h2></div>
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

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="date" class="col-sm-4">Date</label>
                        <input type="date" name="date" class="form-control col-sm-8"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                        <select class="form-control col-sm-8" name="noTournee">
                            <option>Selectionnez numéro</option>
                            @foreach($tournees as $tournee)
                                <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label id="vehicule" class="col-sm-4">Véhicule</label>
                        <!--<input type="text" name="vehicule" id="vehicule" class="form-control col-sm-8"/>-->
                        <select class="form-control col-sm-8" name="vehicule">
                            <option>Selectionnez véhicule</option>
                            @foreach($vehicules as $vehicule)
                                <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Chef de bord</label>
                        <!--<input type="date" name="chef_de_bord" class="form-control col-sm-8"/>-->
                        <select class="form-control col-sm-8" name="chefDeBord">
                            <option></option>
                            @foreach($chefBords as $chef)
                                <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Agent garde</label>
                        <!--<input type="text" name="agent_garde" class="form-control col-sm-8"/>-->
                        <select class="form-control col-sm-8" name="agentDeGarde">
                            <option></option>
                            @foreach($agents as $agent)
                                <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Chauffeur:</label>
                        <!--<input type="text" name="chauffeur" class="form-control col-sm-8"/>-->
                        <select class="form-control col-sm-8" name="chauffeur">
                            <option></option>
                            @foreach($chauffeurs as $chauffeur)
                                <option value="{{$chauffeur->id}}">{{$chauffeur->nomPrenoms}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <br />
        <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="depart-centre-tab" data-toggle="tab" href="#depart-centre" role="tab"
                   aria-controls="depart-centre" aria-selected="true">Départ Centre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="arrivee-site-tab" data-toggle="tab" href="#arrivee-site" role="tab"
                   aria-controls="arrivee-site" aria-selected="false">Arrivée site</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="depart-site-tab" data-toggle="tab" href="#depart-site" role="tab"
                   aria-controls="depart-site" aria-selected="false">Départ site</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="arrivee-centre-tab" data-toggle="tab" href="#arrivee-centre" role="tab"
                   aria-controls="arrivee-centre" aria-selected="false">Arrivée centre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tournee-centre-tab" data-toggle="tab" href="#tournee-centre" role="tab"
                   aria-controls="tournee-centre" aria-selected="false">Tournée centre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="info-site-tab" data-toggle="tab" href="#info-site" role="tab"
                   aria-controls="info-site" aria-selected="false">Info site</a>
            </li>
        </ul>
        <br/>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="depart-centre" role="tabpanel"
                 aria-labelledby="depart-centre-tab">
                <div class="container">
                    <form method="post" action="{{ route('maincourante.store') }}">
                        @csrf
                        <input type="hidden" name="maincourante" value="departCentre"/>
                        <br/>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label for="heure_depart" class="col-sm-4">Heure départ</label>
                                    <input type="time" name="heureDepart" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label for="km_depart" class="col-sm-4">Km départ</label>
                                    <input type="time" name="kmDepart" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label for="observation" class="col-sm-4">Observation:</label>
                                    <textarea name="observation" id="observation"
                                              class="form-control col-sm-8"></textarea>
                                </div>

                                <div class="form-group row">
                                    <span class="col-4"></span>
                                    <button class="btn btn-sm btn-primary" type="submit">Enregistrer</button>
                                </div>

                            </div>
                            <div class="col-8">
                                <table class="table table-bordered" id="listeDepartCentre">
                                    <thead>
                                    <tr>
                                        <td>N°Tournée</td>
                                        <td>Date</td>
                                        <td>Heure</td>
                                        <td>Code</td>
                                        <td>Km départ</td>
                                        <td>Observation</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($departCentres as $centre)
                                        <tr>
                                            <td>{{$centre->noTournee}}</td>
                                            <td>{{date('d/m/Y', strtotime($centre->date))}}</td>
                                            <td>{{$centre->heureDepart}}</td>
                                            <td>{{$centre->code}}</td>
                                            <td>{{$centre->kmDepart}}</td>
                                            <td>{{$centre->observation}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="arrivee-site" role="tabpanel" aria-labelledby="arrivee-site-tab">
                <div class="container">
                    <form method="post" action="{{ route('maincourante.store') }}">
                        <input type="hidden" name="maincourante" value="arriveeSite"/>
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-4">SITE 1</label>
                                    <input type="text" name="site[]" class="form-control col-sm-8"/>
                                    <input type="hidden" name="numeroSite[]" value="1" class="form-control col-sm-8"/>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label for="heure_depart" class="col-sm-4">Heure départ</label>
                                    <input type="time" name="heureDepart[]" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Km départ</label>
                                    <input type="time" name="kmDepart[]" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Observation:</label>
                                    <textarea name="observation[]" class="form-control col-sm-8"></textarea>
                                </div>

                                <div class="form-group row">
                                    <span class="col-4"></span>
                                    <button class="btn btn-sm btn-primary" type="submit">Enregistrer</button>
                                </div>

                            </div>
                            <div class="col-8">
                                <table class="table table-bordered" id="listeArriveeSite" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <td>Site Numero</td>
                                        <td>Site</td>
                                        <td>Date</td>
                                        <td>Heure</td>
                                        <!--<td>Code</td>-->
                                        <td>Km départ</td>
                                        <td>Observation</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($arriveeSites as $arriveeSite)
                                        <tr>
                                            <td>{{$arriveeSite->numeroSite}}</td>
                                            <td>{{$arriveeSite->site}}</td>
                                            <td>{{$arriveeSite->date}}</td>
                                            <td>{{$arriveeSite->heureDepart}}</td>
                                            <td>{{$arriveeSite->kmDepart}}</td>
                                            <td>{{$arriveeSite->observation}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br/>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="depart-site" role="tabpanel" aria-labelledby="depart-site-tab">
                <div class="container">
                    <form method="post" action="{{ route('maincourante.store') }}">
                        @csrf

                        <input type="hidden" name="maincourante" value="departSite"/>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-4">SITE
                                        <select name="numeroSite[]">
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
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                        </select>
                                    </label>
                                    <input type="text" name="site[]" class="form-control col-sm-8"/>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-6">Fin Op</label>
                                    <input type="date" name="finOp[]" class="form-control col-sm-6"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6">Heure de départ</label>
                                    <input type="time" name="heureDepart[]" class="form-control col-sm-6"/>
                                </div>
                                <div class="form-group row">
                                    <label id="km_depart" class="col-sm-6">Kilométrage de depart</label>
                                    <input type="number" name="kmDepart[]" id="kmDepart" class="form-control col-sm-6"/>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-10">
                                    <div class="colis">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label>Nombre total de colis</label>
                                                    <select name="totalColis[]"
                                                            class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>Type de colis</label>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">Sécuripack</label>
                                                    <select name="typeColisSecuripack[]"
                                                            class="form-control col-sm-6">
                                                        <option value="extra grand">Extra grand</option>
                                                        <option>Grand</option>
                                                        <option value="Moyen">Moyen</option>
                                                        <option value="Petit">Petit</option>
                                                    </select>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">Sac jute</label>
                                                    <select name="typeColisSacjute[]" class="form-control col-sm-6">
                                                        <option value="extra grand">Extra grand</option>
                                                        <option>Grand</option>
                                                        <option value="Moyen">Moyen</option>
                                                        <option value="Petit">Petit</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label for="nombre_colis">Nombre de colis</label>
                                                <div class="form-group">
                                                    <input type="number" name="nombreColisSecuripack[]"
                                                           id="nombre_colis"
                                                           class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" min="0" name="nombreColisSacjute[]"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>N° de scellé</label>
                                                <div class="form-group row">
                                                    <select name="numeroScelleSecuripack[]" class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </div>
                                                <div class="form-group row">
                                                    <select name="numeroScelleSacjute[]" class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>Montant annoncé</label>
                                                <div class="form-group">
                                                    <input type="number" min="0" name="montantAnnonceSecuripack[]"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" min="0" name="montantAnnonceSacjute[]"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="row">
                                            <div class="col"></div>
                                            <div class="col"></div>
                                            <div class="col"></div>
                                            <div class="col"></div>
                                            <div class="col">
                                                <button class="btn btn-primary btn-sm">Valider</button>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>

                                <div class="col-2">
                                    <br/>
                                    <button class="btn btn-primary" type="button" id="nouveau-colis">+</button>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-sm-6">N° de bordereau</label>
                                        <input type="text" class="form-control col-sm-6" name="bordereau[]">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6">Destination</label>
                                        <input type="text" class="form-control col-sm-6" name="destination[]">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6">Observation</label>
                                        <textarea class="form-control col-sm-6" name="observation[]"></textarea>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary btn-sm">Enregistrer</button>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
                            </div>
                            <br/>
                        </div>
                    </form>

                    <div style="width: 100%; overflow-x: scroll;">
                        <table class="table table-bordered" style="width: 100%;" id="listeDepartSite1">
                            <thead>
                            <tr>
                                <th>No site</th>
                                <th>SITE</th>
                                <th>Date</th>
                                <th>Heure de départ</th>
                                {{--<th>Type colis</th>
                                <th>Nombre de colis</th>
                                <th>N° Sécuripack</th>--}}
                                <th>Destination</th>
                                <th>Observation</th>
                                {{-- <th>Nombre de colis</th>
                                 <th>Numéro sécuripack</th>--}}
                                <th>Numéro bordereau</th>
                                <th>Kilométrage départ</th>
                                <th>Fin Op</th>
                                <th>Nombre total colis</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($departSites as $depart)
                                <tr>
                                    <td>{{$depart->numeroSite}}</td>
                                    <td>{{$depart->site}}</td>
                                    <td>{{date('d-m-Y', strtotime($depart->date))}}</td>
                                    <td>{{$depart->heureDepart}}</td>
                                    {{--<td></td>
                                    <td></td>
                                    <td></td>--}}
                                    <td>{{$depart->destination}}</td>
                                    <td>{{$depart->observation}}</td>
                                    {{--<td></td>
                                    <td></td>--}}
                                    <td>{{$depart->bordereau}}</td>
                                    <td>{{$depart->kmDepart}}</td>
                                    <td>{{ date('d-m-Y', strtotime($depart->finOp)) }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                    <br/>
                    <br/>
                    <div class="form-group row">
                        <label class="col-sm-2">Numéro du site</label>
                        <select name="numeroSite" id="numeroSite" class="form-control col-sm-2">
                            <option value="0">0</option>
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
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div style="width: 100%; overflow-x: scroll;">
                        <table class="table table-bordered" style="width: 100%;" id="listeDepartParSite">
                            <thead>
                            <tr>
                                <th>No site</th>
                                <th>SITE</th>
                                <th>Date</th>
                                <th>Heure de départ</th>
                                <th>Destination</th>
                                <th>Observation</th>
                                <th>Numéro bordereau</th>
                                <th>Kilométrage départ</th>
                                <th>Fin Op</th>
                                <th>Nombre total colis</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="arrivee-centre" role="tabpanel" aria-labelledby="arrivee-centre-tab">
                <div class="container">
                    <form method="post" action="{{ route('maincourante.store') }}">
                        @csrf
                        <input type="hidden" name="maincourante" value="arriveeCentre"/>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-sm-5">Heure arrivée</label>
                                    <input type="time" name="heureArrivee" class="form-control col-sm-7"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Km arrivé</label>
                                    <input type="number" name="kmArrive" class="form-control col-sm-7"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Observation</label>
                                    <textarea name="observation" class="form-control col-sm-7"></textarea>
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                            </div>
                            <div class="col">
                                <table class="table table-bordered" style="width: 100%;" id="listeArriveeCentre">
                                    <thead>
                                    <tr>
                                        <th>N°Tournée</th>
                                        <th>Date</th>
                                        <th>Heure arrivée</th>
                                        <th>Km arrivé</th>
                                        <th>Observation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($arriveeCentres as $centre)
                                        <tr>
                                            <td>{{$centre->tournee}}</td>
                                            <td>{{$centre->date}}</td>
                                            <td>{{$centre->heureArrivee}}</td>
                                            <td>{{$centre->kmArrive}}</td>
                                            <td>{{$centre->observation}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="tournee-centre" role="tabpanel" aria-labelledby="tournee-centre-tab">
                <div class="container">
                    <form method="post" action="{{ route('maincourante.store') }}">
                        @csrf
                        <input type="hidden" name="maincourante" value="tourneeCentre"/>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-sm-5">Centre</label>
                                    <select name="centre" id="centre" class="form-control col-sm-7">
                                        <option>Choisir centre</option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="centre_regional" class="col-sm-5">Centre régional</label>
                                    <select id="centre_regional" name="centreRegional" class="form-control col-sm-7">
                                        <option>Choisir centre régional</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-sm-5">Date début</label>
                                    <input type="date" name="dateDebut" class="form-control col-sm-7">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-sm-5">Date fin</label>
                                    <input type="date" name="dateFin" class="form-control col-sm-7">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                            <button class="btn btn-danger btn-sm" type="annuler">Annuler</button>
                        </div>
                    </form>
                    <div style="width: 100%; overflow-x: scroll;">
                        <br/>
                        <br/>
                        <table style="width: 100%;" class="table table-bordered" id="listeTourneeCentre">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>N° Tournee</th>
                                <th>Véhicule</th>
                                <th>Chauffeur</th>
                                <th>Chef de bord</th>
                                <th>Agent de garde</th>
                                <th>Centre</th>
                                <th>Centre régional</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tourneeCentres as $tournee)
                                <tr>
                                    <td>{{$tournee->date}}</td>
                                    <td>{{$tournee->tournee}}</td>
                                    <td>{{$tournee->vehicules->immatriculation}}</td>
                                    <td>{{$tournee->personnesChauffeur->nomPrenoms}}</td>
                                    <td>{{$tournee->personnesChef->nomPrenoms}}</td>
                                    <td>{{$tournee->personnesDeGarde->nomPrenoms}}</td>
                                    <td>{{$tournee->centre}}</td>
                                    <td>{{$tournee->centreRegional}}</td>
                                    <td>{{$tournee->dateDebut}}</td>
                                    <td>{{$tournee->dateFin}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="info-site" role="tabpanel" aria-labelledby="info-site-tab">

            </div>
        </div>

    </div>
    <script src="js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#Tabs2").tabs(
                {
                    show: false,
                    hide: false,
                    event: 'click',
                    collapsible: false
                });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#listeArriveeSite').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeDepartCentre').DataTable({
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
        let tourneeCentres =  {!! json_encode($tourneeCentres) !!};
        console.log(tourneeCentres);

        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                $('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

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


            //
            const colisHTML = '<div class="row">\n' +
                '                                        <div class="col-2">\n' +
                '                                            <div class="form-group">\n' +
                '                                                <label>Nombre total de colis</label>\n' +
                '                                                <select name="totalColis[]"\n' +
                '                                                        class="form-control">\n' +
                '                                                    <option>1</option>\n' +
                '                                                    <option>2</option>\n' +
                '                                                </select>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div class="col">\n' +
                '                                            <label>Type de colis</label>\n' +
                '                                            <div class="form-group row">\n' +
                '                                                <label class="col-sm-6">Sécuripack</label>\n' +
                '                                                <select name="typeColisSecuripack[]"\n' +
                '                                                        class="form-control col-sm-6">\n' +
                '                                                    <option value="extra grand">Extra grand</option>\n' +
                '                                                    <option>Grand</option>\n' +
                '                                                    <option value="Moyen">Moyen</option>\n' +
                '                                                    <option value="Petit">Petit</option>\n' +
                '                                                </select>\n' +
                '                                            </div>\n' +
                '                                            <div class="form-group row">\n' +
                '                                                <label class="col-sm-6">Sac jute</label>\n' +
                '                                                <select name="typeColisSacjute[]" class="form-control col-sm-6">\n' +
                '                                                    <option value="extra grand">Extra grand</option>\n' +
                '                                                    <option>Grand</option>\n' +
                '                                                    <option value="Moyen">Moyen</option>\n' +
                '                                                    <option value="Petit">Petit</option>\n' +
                '                                                </select>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div class="col-2">\n' +
                '                                            <label for="nombre_colis">Nombre de colis</label>\n' +
                '                                            <div class="form-group">\n' +
                '                                                <input type="number" name="nombreColisSecuripack[]" id="nombre_colis"\n' +
                '                                                       class="form-control"/>\n' +
                '                                            </div>\n' +
                '                                            <div class="form-group">\n' +
                '                                                <input type="number" min="0" name="nombreColisSacjute[]"\n' +
                '                                                       class="form-control"/>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div class="col">\n' +
                '                                            <label>N° de scellé</label>\n' +
                '                                            <div class="form-group row">\n' +
                '                                                <select name="numeroScelleSecuripack[]" class="form-control">\n' +
                '                                                    <option>1</option>\n' +
                '                                                    <option>2</option>\n' +
                '                                                </select>\n' +
                '                                            </div>\n' +
                '                                            <div class="form-group row">\n' +
                '                                                <select name="numeroScelleSacjute[]" class="form-control">\n' +
                '                                                    <option>1</option>\n' +
                '                                                    <option>2</option>\n' +
                '                                                    <option>3</option>\n' +
                '                                                </select>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div class="col">\n' +
                '                                            <label>Montant annoncé</label>\n' +
                '                                            <div class="form-group">\n' +
                '                                                <input type="number" min="0" name="montantAnnonceSecuripack[]" class="form-control">\n' +
                '                                            </div>\n' +
                '                                            <div class="form-group">\n' +
                '                                                <input type="number" min="0" name="montantAnnonceSacjute[]" class="form-control">\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>';
            $("#nouveau-colis").on("click", function () {
                $(".colis").append(colisHTML);
            })
        });
    </script>

    <script>
        function deleteDepartSite(id) {
            $.ajax({
                url: "{{ route('deleteDepartSite') }}",
                type: "GET",
                data: {'id': id},
                success: function (data) {
                    alert('Enregistrement supprimé');
                    window.location.reload();
                    //console.log(data);
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

@endsection
