@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Départ tournée</h2></div>
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

        <form method="post" action="{{ route('depart-tournee.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>N°Tournée:</label>
                        <input type="text" class="form-control" name="numeroTournee" value="{{$num}}" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Véhicule</label>
                        <select class="form-control" name="idVehicule" id="vehicule">
                            <option></option>
                            @foreach($vehicules as $vehicule)
                                <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Kilométrage départ</label>
                        <input type="number" class="form-control" name="kmDepart" id="kmDepart" min="0" value="0" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Chauffeur</label>
                        <select class="form-control" name="chauffeur" id="chauffeur">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Agent de garde</label>
                        <select class="form-control" name="agentDeGarde">
                            <option></option>
                            @foreach($agents as $agent)
                                <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Chef de bord</label>
                        <select class="form-control" name="chefDeBord">
                            <option></option>
                            @foreach($chefBords as $chef)
                                <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Coût tournée</label>
                        <input type="number" class="form-control" min="0" value="0" name="coutTournee" id="coutTournee"/>
                    </div>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 1</label>
                                <select class="form-control" name="site[]" id="site1">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 8</label>
                                <select class="form-control" name="site[]" id="site8">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 15</label>
                                <select class="form-control" name="site[]" id="site15">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 2</label>
                                <select class="form-control" name="site[]" id="site2">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 9</label>
                                <select class="form-control" name="site[]" id="site9">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 16</label>
                                <select class="form-control" name="site[]" id="site16">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 3</label>
                                <select class="form-control" name="site[]" id="site3">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 10</label>
                                <select class="form-control" name="site[]" id="site10">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 17</label>
                                <select class="form-control" name="site[]" id="site17">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 4</label>
                                <select class="form-control" name="site[]" id="site4">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 11</label>
                                <select class="form-control" name="site[]" id="site11">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 18</label>
                                <select class="form-control" name="site[]" id="site18">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 5</label>
                                <select class="form-control" name="site[]" id="site5">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 12</label>
                                <select class="form-control" name="site[]" id="site12">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 19</label>
                                <select class="form-control" name="site[]" id="site19">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 6</label>
                                <select class="form-control" name="site[]" id="site6">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 13</label>
                                <select class="form-control" name="site[]" id="site13">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 20</label>
                                <select class="form-control" name="site[]" id="site20">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 6</label>
                                <select class="form-control" name="site[]" id="site6">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                    <option value="oo_vb_intramuros">VB</option>
                                    <option value="oo_vl_intramuros">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 13</label>
                                <select class="form-control" name="site[]" id="site13">
                                    <option></option>
                                    @foreach ($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]">
                                    <option></option>
                                    <option value="VB extramuros bitume">VB extramuros bitume</option>
                                    <option value="VB extramuros piste">VB extramuros piste</option>
                                    <option value="VL extramuros bitume">VL extramuros bitume</option>
                                    <option value="VL extramuros piste">VL extramuros piste</option>
                                    <option value="VB">VB</option>
                                    <option value="VL">VL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <br/>
                    <button class="btn btn-primary">Enregistrer</button>
                    <button class="btn btn-danger">Annuler</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        let vehicules = {!! json_encode($vehicules) !!};
        let sites = {!! json_encode($sites) !!};
        let cout = 0;
        let site = null;

        $("#vehicule").on("change", function () {
            $("#chauffeur option").remove();
            const vehicule = vehicules.find(v => v.id === parseInt(this.value));
            if (vehicule) {
                $('#chauffeur').append($('<option>', {
                    value: vehicule.chauffeur_titulaire.id,
                    text: vehicule.chauffeur_titulaire.nomPrenoms
                }));
                $('#chauffeur').append($('<option>', {
                    value: vehicule.chauffeur_suppleant.id,
                    text: vehicule.chauffeur_suppleant.nomPrenoms
                }));
            }
        });



        $("select[name='type[]']").on("change", function() {
            cout = 0;

            $.each( $( "select[name='type[]']" ), function() {
                console.log(this.value);
                site = sites.find(s => s.id === parseInt(this.value));
                if (site) {
                    cout += parseInt(site[this.value]);
                    console.log(site[this.value]);
                    $("#coutTournee").val(cout);
                }
            });
        });

       é/* $("select[name='site[]']").on("change", function() {
            site = sites.find(s => s.id === parseInt(this.value));
        });

        $("select[name='type[]']").on("change", function() {
            console.log(this);
            if (site) {
                cout += parseInt(site[this.value]);
                console.log(site[this.value]);
                $("#coutTournee").val(cout);
            }
        });*/

        $("#kmDepart").on("change", function() {
            $("#coutTournee").val( cout * parseInt(this.value));
        })

    </script>
@endsection
