@extends('base')

@section('main')
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
    <br />
    <div class="tab-content">
        <div class="tab-pane fade show active" id="depart-centre" role="tabpanel" aria-labelledby="depart-centre-tab">
            <div class="container">
                <form method="post" action="{{ route('maincourante.store') }}">
                    @csrf
                    <input type="hidden" name="maincourante" value="departCentre" />
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
                                <textarea name="observation" id="observation" class="form-control col-sm-8"></textarea>
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
                <form method="post"  action="{{ route('maincourante.store') }}">
                    <input type="hidden" name="maincourante" value="arriveeSite" />
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="date" class="col-sm-4">Date</label>
                                <input type="date" name="date[]" class="form-control col-sm-8"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-4">Véhicule</label>
                                <!--<input type="text" name="vehicule[]" class="form-control"/>-->
                                <select class="form-control col-sm-8" name="vehicule[]">
                                    <option>Selectionnez véhicule</option>
                                    @foreach($vehicules as $vehicule)
                                    <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-4">Chef de bord</label>
                                <!--<input type="text" name="chefDeBord[]" class="form-control col-sm-8"/>-->
                                <select class="form-control col-sm-8" name="chefDeBord[]">
                                    <option></option>
                                    @foreach($chefBords as $chef)
                                    <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-4">SITE 1</label>
                                <input type="text" name="site[]" class="form-control col-sm-8"/>
                                <input type="hidden" name="numeroSite[]" value="1" class="form-control col-sm-8"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="vehicule" class="col-sm-4">Chauffeur</label>
                                <!--<input type="text" name="chauffeur" class="form-control"/>-->
                                <select class="form-control col-sm-8" name="chauffeur[]">
                                    <option></option>
                                    @foreach($chauffeurs as $chauffeur)
                                    <option value="{{$chauffeur->id}}">{{$chauffeur->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                    <br />
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="depart-site" role="tabpanel" aria-labelledby="depart-site-tab">
            <div class="container">
                <form method="post" action="{{ route('maincourante.store') }}">
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="date" class="col-sm-4">Date</label>
                                <input type="date" name="date" class="form-control col-sm-8"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="vehicule" class="col-sm-4">Véhicule</label>
                                <input type="text" name="vehicule" id="vehicule" class="form-control col-sm-8"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-4">Chef_de_bord</label>
                                <input type="text" name="chef_de_bord" class="form-control col-sm-8"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-4">SITE 1</label>
                                <input type="text" name="chef_de_bord" class="form-control col-sm-8"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-4">Chauffeur</label>
                                <input type="text" name="chauffeur" class="form-control col-sm-8"/>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-6">Fin Op</label>
                                <input type="text" name="chauffeur" class="form-control col-sm-6"/>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Heure de départ</label>
                                <input type="text" name="heure_de_depart" id="heure_de_depart" class="form-control col-sm-6"/>
                            </div>
                            <div class="form-group row">
                                <label id="km_depart" class="col-sm-6">Kilométrage de depart</label>
                                <input type="text" name="km_depart" id="km_depart" class="form-control col-sm-6"/>
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
                                        <div class="col">
                                            <div class="form-group">
                                                <label id="nombre_total_colis">Nombre total de colis</label>
                                                <select name="nombre_total_colis" id="nombre_total_colis"
                                                        class="Combobox col-sm-6">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Type de colis</label>
                                            <div class="form-group row">
                                                <label id="nombre_total_colis">Sécuripack</label>
                                                <select name="nombre_total_colis" id="nombre_total_colis"
                                                        class="Combobox col-sm-6">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label id="sac_jute">Sac jute</label>
                                                <select name="sac_jute" id="sac_jute" class="Combobox col-sm-6">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="nombre_colis">Nombre de colis</label>
                                            <div class="form-group row">
                                                <input type="number" name="nombre_colis_securipack" id="nombre_colis"
                                                       class="form-control col-sm-6"/>
                                            </div>
                                            <div class="form-group row">
                                                <input type="number" min="0" name="nombre_colis_securipack"
                                                       id="nombre_colis_securipack" class="form-control col-sm-6"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="no_scelle">Nombre de colis</label>
                                            <div class="form-group row">
                                                <select name="sac_jute" id="no_scelle" class="Combobox col-sm-6">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <select name="sac_jute" class="Combobox col-sm-6">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Montant annoncé</label>
                                            <div class="form-group row">
                                                <inupt type="number" min="0" name="montant_annonce_securipack"/>
                                            </div>
                                            <div class="form-group row">
                                                <inupt type="number" min="0" name="montant_annonce_sac_jute"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                        <div class="col">
                                            <button class="btn btn-primary btn-sm">Valider</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <button class="btn btn-primary btn-sm" type="button" id="nouveau-colis">+</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-6">N° de bordereau</label>
                                    <input type="text" class="col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6">Destination</label>
                                    <input type="text" class="col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6">Kilométrage départ</label>
                                    <input type="text" class="col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6">Observation</label>
                                    <input type="text" class="col-sm-6">
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>SITE 1</td>
                                <td>Date</td>
                                <td>Heure de départ</td>
                                <td>N° Tournée</td>
                                <td>Type colis</td>
                                <td>Nombre de colis</td>
                                <td>N° Sécuripack</td>
                                <td>Destination</td>
                                <td>Observation</td>


                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:center;vertical-align:middle;width:65px;height:74px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                        <div>Nombr</div>
                                        <div>e de</div>
                                        <div>colis</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:center;vertical-align:middle;width:65px;height:74px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                        <div>Num&eacute;r</div>
                                        <div>o</div>
                                        <div>s&eacute;cup</div>
                                        <div>ack</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:center;vertical-align:middle;width:65px;height:74px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                        <div>Destin</div>
                                        <div>ation</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:center;vertical-align:middle;width:65px;height:74px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                        <div>Obser</div>
                                        <div>vation</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:center;vertical-align:middle;width:86px;height:74px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div> Num&eacute;ro</div>
                                        <div>borderea</div>
                                        <div>u</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:center;vertical-align:middle;width:86px;height:74px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div style="text-align:left">Destination</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:center;vertical-align:middle;width:86px;height:74px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div style="text-align:left"> Kilom&eacute;trage d&eacute;part</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:center;vertical-align:middle;width:86px;height:74px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div style="text-align:left"> Fin Op</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:center;vertical-align:middle;height:74px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div style="text-align:left"> Nombre total colis</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:65px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:65px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:65px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:65px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:65px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:65px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:65px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:65px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:65px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:86px;height:50px;">
                                    <div style="font-family:Arial;font-size:13px;color:#000000;">
                                        <div>&nbsp;</div>
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:86px;height:50px;">
                                    <div style="font-family:'Segoe UI';font-size:12px;color:#000000;">
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:86px;height:50px;">
                                    <div style="font-family:'Segoe UI';font-size:12px;color:#000000;">
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;width:86px;height:50px;">
                                    <div style="font-family:'Segoe UI';font-size:12px;color:#000000;">
                                    </div>
                                </td>
                                <td style="background-color:transparent;background-image:none;border:1px solid #C0C0C0;text-align:left;vertical-align:top;height:50px;">
                                    <div style="font-family:'Segoe UI';font-size:12px;color:#000000;">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>

        </div>
        <div class="tab-pane fade" id="arrivee-centre" role="tabpanel" aria-labelledby="arrivee-centre-tab">
            <form>
                <div >
                    <form name="departcentre" method="post" action="" enctype="multipart/form-data" id="Form13">
                        <label>Heure arrivée:</label>
                        <input type="text">
                        <label>Km arrivé:</label>
                        <input type="text" >
                        <label>Observation:</label>
                        <textarea name="TextArea1"></textarea>
                        <input type="submit" name="save" >
                    </form>
                </div>
                <form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form14">
                    <label>Véhicule:</label>
                    <label>Chef de bord:</label>
                    <input type="text">
                    <label>Agent garde:</label>
                    <input type="text">
                    <label>Chauffeur:</label>
                    <label>Date:</label>
                    <input type="date">
                    <input type="text">
                    <input type="text">
                    <label>N°Tournée:</label>
                    <select name="Combobox1" size="1">
                    </select>
                </form>
                <table>
                    <tr>
                        <td>N&deg;Tourn&eacute;e</td>
                        <td>Date</td>
                        <td>Heure arriv&eacute;e</td>
                        <td>km arriv&eacute;</td>
                        <td>Observation</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="tab-pane fade" id="tournee-centre" role="tabpanel" aria-labelledby="tournee-centre-tab">
            <form>
                <div>
                    <form name="departcentre" method="post" action="" enctype="multipart/form-data" id="Form13">
                        <label>Heure arrivée:</label>
                        <input type="text">
                        <label>Km arrivé:</label>
                        <input type="text">
                        <label>Observation:</label>
                        <textarea name="TextArea1"
                                  rows="5" cols="46" autocomplete="off" spellcheck="false"></textarea>
                        <input type="submit">
                    </form>
                </div>
                <div >
                    <form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form14">
                        <label>Véhicule:</label>
                        <label>Chef de bord:</label>
                        <input type="text">
                        <label>Agent garde:</label>
                        <input type="text">
                        <label>Chauffeur:</label>
                        <label>Date:</label>
                        <input type="date">
                        <input type="text">
                        <input type="text">
                        <label>N°Tournée:</label>
                        <select name="Combobox1" size="1">
                        </select>
                    </form>
                </div>
                <table>
                    <tr>
                        <td>N&deg;Tourn&eacute;e</td>
                        <td>Date</td>
                        <td>Heure arriv&eacute;e</td>
                        <td>km arriv&eacute;</td>
                        <td>Observation</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="tab-pane fade" id="info-site" role="tabpanel" aria-labelledby="info-site-tab">
            <form>
                <select>
                </select>
                <select>
                    <option value="Centre Abidjan Nord">Centre Abidjan Nord</option>
                    <option value="Centre Abidjan Sud">Centre Abidjan Sud</option>
                    <option value="Centre Abengourou">Centre Abengourou</option>
                    <option value="Centre de Yamoussokro">Centre de Yamoussokro</option>
                    <option value="Centre de Bouak&#233;">Centre de Bouak&#233;</option>
                    <option value="Centre de Korogo">Centre de Korogo</option>
                    <option value="Centre de Man">Centre de Man</option>
                    <option value="Centre de Daloa">Centre de Daloa</option>
                    <option value="Centre de San Pedro">Centre de San Pedro</option>
                </select>
                <label>Centre régional</label>
                <label>Centre:</label>
                <label>N° Tournée</label>
                <input type="date">
                <label>Date fin:</label>
                <input type="date">
                <label>Date début:</label>
                <input type="text">
                <table>
                    <tr>
                        <td>Date</td>
                        <td>N&deg; Tourn&eacute;e</td>
                        <td>Site</td>
                        <td>Heure arriv&eacute;e</td>
                        <td>Heure dep</td>
                        <td>Dur&eacute;e</td>
                        <td>Observation</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </form>
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
<script>
    let centres =  {!! json_encode($centres) !!};
    let centres_regionaux = {!! json_encode($centres_regionaux) !!};

    $(document).ready( function () {
        $("#centre").on("change", function () {
            $("#centre_regional option").remove();
            $('#centre_regional').append($('<option>', { text: "Choisir centre régional" }));

            const centre = centres.find(c => c.centre === this.value);
            const regions = centres_regionaux.filter( region => {
                return region.id_centre === centre.id;
            });
            regions.map( ({centre_regional}) => {
                $('#centre_regional').append($('<option>', {
                    value: centre_regional,
                    text: centre_regional
                }));
            })
        });

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
    });
</script>
@endsection
