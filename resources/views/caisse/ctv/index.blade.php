@extends('base')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
    <div class="burval-container">
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

            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-5">Centre regional</label>
                        <select name="centre" id="centre" class="form-control col-7" >
                            <option></option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre_regional" class="col-5">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col-7" >
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control col-sm-7" />
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="heurePrise" class="col-sm-5">Heure de prise de service</label>
                        <input type="time" name="heurePriseBox" class="form-control col-sm-7" />
                    </div>
                </div>
                <div class="col">

                    <div class="form-group row">
                        <label for="heureFin" class="col-sm-5">Heure de fin de service</label>
                        <input type="time" name="heureFinBox" id="heureFinBox" class="form-control col-sm-7"/>
                    </div>
                </div>
                <div class="col"></div>
            </div><br />

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
            <div class="tab-content">
                <div class="tab-pane fade show active" id="operatrice" role="tabpanel"
                     aria-labelledby="operatrice-tab">
                    <h6>Operatrice de tri</h6>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" id="add">Ajouter</button>
                    <br>
                    <br>
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
                            <td><select name="operatrice[]" class="form-control col-sm-7" >
                                    <option></option>
                                    @foreach ($operatrices as $op)
                                        <option value="{{$op->id}}"> {{$op->nomPrenoms}}</option>
                                    @endforeach
                                </select></td>
                            <td><select name="numero[]" class="form-control col-sm-7" >
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
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="supprimerLigne(this)"></button></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="tab-pane fade show" id="bordereau" role="tabpanel"
                     aria-labelledby="bordereau-tab">
                    <h6>Bordereau</h6>
                    <div class="row" style="align-items: center;">
                        <div class="col-3">
                            <div class="form-group row">
                                <label for="caisse_numtour" class="col-sm-5">Numero de tournée</label>
                                <select name="tournee" id="caisse_numtour" class="form-control col-sm-7">
                                    <option></option>
                                    @foreach($tournees as $tournee)
                                        <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5">Numero de bordereau</label>
                                <input type="number" name="bordereau" class="form-control col-sm-7"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row" style="align-items: center;">
                                <div class="col-4">
                                    <h6>Convoyeur garde</h6>
                                </div>
                                <div class="col-1">
                                    <hr class="burval-separator">
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-sm-5">Nom et prenoms</label>
                                        <select type="text" name="convoyeurGarde" id="convoyeurGarde" class="form-control col-sm-7">
                                            <option></option>
                                            @foreach ($convoyeurs as $garde)
                                                <option value="{{$garde->id}}"> {{$garde->nomPrenoms}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5">Fonction</label>
                                        <input type="text" name="convoyeurGardeFonction" id="convoyeurGardeFonction" class="form-control col-sm-7"/>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5">Matricule</label>
                                        <input type="text" name="convoyeurGardeMatricule" id="convoyeurGardeMatricule" class="form-control col-sm-7"/>
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
                                    <div class="form-group row">
                                        <label class="col-sm-5">Nom et prénoms</label>
                                        <select class="form-control col-sm-7" name="regulatrice" id="regulatrice">
                                            <option></option>
                                            @foreach ($regulatrices as $personnel)
                                                <option value="{{$personnel->id}}"> {{$personnel->nomPrenoms}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5">Fonction</label>
                                        <input type="text" name="regulatriceFonction" id="regulatriceFonction"
                                               class="form-control col-sm-7"/>
                                    </div>
                                    <div class="form-group row">
                                        <label for="caisse_matre" class="col-sm-5">Matricule</label>
                                        <input type="text" name="regulatriceMatricule" id="regulatriceMatricule" class="form-control col-sm-7"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="colis" role="tabpanel"
                     aria-labelledby="colis-tab">
                    <h6>Colis</h6>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-5">Securipack</label>
                                <select class="form-control col-sm-7" name="securipack">
                                    <option></option>
                                    <option>Extra grand</option>
                                    <option>Grand</option>
                                    <option>Moyen</option>
                                    <option>Petit</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5">Sac jute</label>
                                <select class="form-control col-sm-7" name="sacjute">
                                    <option></option>
                                    <option>Extra grand</option>
                                    <option>Grand</option>
                                    <option>Moyen</option>
                                    <option>Petit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="nombreColis" class="col-sm-5">Nombre</label>
                                <input type="number" name="nombreColis" id="nombreColis" class="form-control col-sm-7"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="numeroScelleColis" class="col-sm-5">Numero de scellé</label>
                                <textarea name="numeroScelleColis" id="numeroScelleColis" class="form-control col-sm-7"></textarea>
                            </div>
                        </div>
                        <div class="col">

                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="client" class="col-sm-5">Client</label>
                                <select class="form-control col-sm-7" id="client" name="client" >
                                    <option></option>
                                    @foreach ($clients as $client)
                                        <option value="{{$client->id}}"> {{$client->client_nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="site" class="col-sm-5">Site</label>
                                <select class="form-control col-sm-7" id="site" name="site" >
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}"> {{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="expediteur" class="col-sm-5">Expediteur</label>
                                <input type="text" class="form-control col-sm-7" id="expediteur" name="expediteur"  />
                            </div>
                            <div class="form-group row">
                                <label for="caisse_desti" class="col-sm-5">Destinataire</label>
                                <input type="text" class="form-control col-sm-7" id="destinataire" name="destinataire"  />
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col"></div>
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
                            <div class="form-group row">
                                <label for="montantAnnonce" class="col-sm-5">Montant annoncé</label>
                                <input type="number" name="montantAnnonce" id="montantAnnonce" value="0" class="form-control col-sm-7" readonly/>
                            </div>
                            <div class="form-group row">
                                <label for="montantReconnu" class="col-sm-5">Montant reconnu</label>
                                <input type="number" name="montantReconnu" id="montantReconnu" class="form-control col-sm-7" value="0" readonly/>
                            </div>
                            <div class="form-group row">
                                <label for="ecartConstate" class="col-sm-5">Ecart constaté</label>
                                <input type="number" name="ecartConstate" id="ecartConstate" class="form-control col-sm-7" value="0" readonly/>
                            </div>
                            <div class="form-group row">
                                <label for="montantFinal" class="col-sm-5">Montant final</label>
                                <input type="number" name="montantFinal" id="montantFinal" class="form-control col-sm-7" value="0"/=
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
                                        <label for="caisse_bc" class="col-sm-5">Billets calculés</label>
                                        <label><input type="radio" value="oui" name="billetsCalcules"> Oui</label>
                                        <label><input type="radio" value="non" name="billetsCalcules"> Non</label>
                                        <input type="number" name="billetsCalculesMontant" id="caisse_bc" class="form-control col-sm-4"/>
                                    </div>
                                    <div class="form-group row">
                                        <label for="caisse_bsav" class="col-sm-5">Billets sans valeurs</label>
                                        <label><input type="radio" value="oui" name="billetsSansValeurs"> Oui</label>
                                        <label><input type="radio" value="oui" name="billetsSansValeurs"> Non</label>
                                        <input type="number" name="billetsSansValeursMontant" id="caisse_bsav" class="form-control col-sm-4"/>
                                    </div>
                                    <div class="form-group row">
                                        <label for="caisse_busa" class="col-sm-5">Billets usagés</label>
                                        <label><input type="radio" value="oui" name="billetsUsages"> Oui</label>
                                        <label><input type="radio" value="non" name="billetsUsages"> Non</label>
                                        <input type="number" name="billetsUsagesMontant" id="caisse_busa" class="form-control col-sm-4"/>
                                    </div>
                                    <div class="form-group row">
                                        <label for="caisse_fau" class="col-sm-5">Faux billets</label>
                                        <label><input type="radio" value="oui" name="fauxBillets"> Oui</label>
                                        <label><input type="radio" value="non" name="fauxBillets"> Non</label>
                                        <input type="number" name="fauxBilletsMontant"  class="form-control col-sm-4"/>
                                    </div>


                                    <div class="form-group row">
                                        <label for="caisse_bide" class="col-sm-5">Billets déparaillés</label>
                                        <label><input type="radio" value="oui" name="billetsDeparailles"> Oui</label>
                                        <label><input type="radio" value="non" name="billetsDeparailles"> Non</label>
                                        <input type="number" name="billetsDeparaillesMontant" id="caisse_bide" class="form-control col-sm-4"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div><br />
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
    <script>
        let centres =  {!! json_encode($centres) !!};
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
            // Tableau montant annoncé
            $("#ba_nb10000").on("change", function() {
                $("#ba_nb10000_total").val(parseInt(this.value) * 10000);
            });
            $("#ba_nb5000").on("change", function() {
                $("#ba_nb5000_total").val(parseInt(this.value) * 5000);
            });
            $("#ba_nb2000").on("change", function() {
                $("#ba_nb2000_total").val(parseInt(this.value) * 2000);
            });
            $("#ba_nb1000").on("change", function() {
                $("#ba_nb1000_total").val(parseInt(this.value) * 1000);
            });
            $("#ba_nb500").on("change", function() {
                $("#ba_nb500_total").val(parseInt(this.value) * 500);
            });
            $("#ba_nb250").on("change", function() {
                $("#ba_nb250_total").val(parseInt(this.value) * 250);
            });
            $("#ba_nb200").on("change", function() {
                $("#ba_nb200_total").val(parseInt(this.value) * 200);
            });
            $("#ba_nb100").on("change", function() {
                $("#ba_nb100_total").val(parseInt(this.value) * 100);
            });
            $("#ba_nb50").on("change", function() {
                $("#ba_nb50_total").val(parseInt(this.value) * 50);
            });
            $("#ba_nb25").on("change", function() {
                $("#ba_nb25_total").val(parseInt(this.value) * 25);
            });
            $("#ba_nb10").on("change", function() {
                $("#ba_nb10_total").val(parseInt(this.value) * 10);
            });
            $("#ba_nb5").on("change", function() {
                $("#ba_nb5_total").val(parseInt(this.value) * 5);
            });
            $("#ba_nb1").on("change", function() {
                $("#ba_nb1_total").val(parseInt(this.value));
            });

            // Tableau montant reconnu
            $("#br_nb10000").on("change", function() {
                $("#br_nb10000_total").val(parseInt(this.value) * 10000);
            });
            $("#br_nb5000").on("change", function() {
                $("#br_nb5000_total").val(parseInt(this.value) * 5000);
            });
            $("#br_nb2000").on("change", function() {
                $("#br_nb2000_total").val(parseInt(this.value) * 2000);
            });
            $("#br_nb1000").on("change", function() {
                $("#br_nb1000_total").val(parseInt(this.value) * 1000);
            });
            $("#br_nb500").on("change", function() {
                $("#br_nb500_total").val(parseInt(this.value) * 500);
            });
            $("#br_nb250").on("change", function() {
                $("#br_nb250_total").val(parseInt(this.value) * 250);
            });
            $("#br_nb200").on("change", function() {
                $("#br_nb200_total").val(parseInt(this.value) * 200);
            });
            $("#br_nb100").on("change", function() {
                $("#br_nb100_total").val(parseInt(this.value) * 100);
            });
            $("#br_nb50").on("change", function() {
                $("#br_nb50_total").val(parseInt(this.value) * 50);
            });
            $("#br_nb25").on("change", function() {
                $("#br_nb25_total").val(parseInt(this.value) * 25);
            });
            $("#br_nb10").on("change", function() {
                $("#br_nb10_total").val(parseInt(this.value) * 10);
            });
            $("#br_nb5").on("change", function() {
                $("#br_nb5_total").val(parseInt(this.value) * 5);
            });
            $("#br_nb1").on("change", function() {
                $("#br_nb1_total").val(parseInt(this.value));
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
                    '                            <td><button type="button" class="btn btn-danger btn-sm" onclick="supprimerLigne(this)"></button></td>\n' +
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
