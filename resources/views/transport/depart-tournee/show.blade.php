@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Tournée"])
@section("nouveau")
    <a href="/depart-tournee" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
    <div class="burval-container">
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

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>N°Tournée:</label>
                    <input type="text" class="form-control" name="numeroTournee" value="{{$tournee->numeroTournee}}"
                           readonly/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="{{$tournee->date}}" readonly/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Véhicule</label>
                    <select class="form-control" name="idVehicule" id="vehicule" readonly>
                        <option value="{{$tournee->idVehicule}}">{{$tournee->vehicules->immatriculation}}</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Kilométrage départ</label>
                    <input type="number" class="form-control" name="kmDepart" value="{{$tournee->kmDepart}}"
                           id="kmDepart" min="0" readonly/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Chauffeur</label>
                    <select class="form-control" name="chauffeur" id="chauffeur" readonly>
                        <option
                            value="{{$tournee->chauffeur}}">{{$tournee->chauffeurs->nomPrenoms ?? 'Utilisateur inexistant ' . $tournee->chauffeur}}</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Agent de garde</label>
                    <select class="form-control" name="agentDeGarde" readonly>
                        <option
                            value="{{$tournee->agentDeGarde}}">{{$tournee->agentDeGardes->nomPrenoms ?? 'Utilisateur inexistant ' . $tournee->agentDeGarde}}</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Chef de bord</label>
                    <select class="form-control" name="chefDeBord" readonly>
                        <option
                            value="{{$tournee->chefDeBord}}">{{$tournee->chefDeBords->nomPrenoms ?? 'Utilisateur inexistant ' . $tournee->chefDeBord}}</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Coût tournée</label>
                    <input type="number" class="form-control" min="0" name="coutTournee"
                           value="{{$tournee->coutTournee}}" id="coutTournee" readonly/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Heure départ</label>
                    <input type="time" class="form-control" name="heureDepart" value="{{$tournee->heureDepart}}" readonly/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Km arrivé</label>
                    <input type="number" class="form-control" name="kmArrivee" value="{{$tournee->kmArrivee}}" readonly/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Heure arrivé</label>
                    <input type="time" class="form-control" name="heureArrivee" value="{{$tournee->heureArrivee}}" readonly/>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <br/>

        <div class="row">
            @foreach ($sites as $site)
                <div class="col-4">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site</label>
                                <select class="form-control" name="site[]" readonly>
                                    <option value="{{$site->site}}">{{$site->sites->site ?? $site->site}}</option>
                                </select>
                                <input type="hidden" name="site_id[]" value="{{$site->id}}" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>heure</label>
                                <input type="time" class="form-control" name="heure[]"
                                       value="{{$site->heure}}" readonly/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type[]" readonly>
                                    <option>{{$site->type}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
            <div class="col-4">
                <div class="col"></div>
            </div>
        </div>

        <div class="row sitesListes"></div>

    </div>
@endsection
