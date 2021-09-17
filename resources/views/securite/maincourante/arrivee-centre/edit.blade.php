@extends("base")

@section("main")
    <div class="container">
        <br>
        <h2 class="heading">Arrivee centre</h2>
        <a href="/maincourante-arriveecentre">Liste arrivée centre</a>
        <br>
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
            <div class="alert alert-success" id="successAlert">
                {{ session()->get('success') }}
            </div>
        @endif
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="date" class="col-sm-4">Date</label>
                        <input type="text" name="date" id="date" value="{{$centre->tournees->date}}" class="form-control col-sm-8"
                               readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                        <input class="form-control col-sm-8" name="noTournee" id="noTournee" value="{{$centre->tournees->numeroTournee}}" readonly />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Véhicule</label>
                        <input class="form-control col-sm-8" name="vehicule" id="vehicule" value="{{$centre->tournees->vehicules->immatriculation?? "Donnée indisponible"}}" readonly/>
                        {{--<select class="form-control col-sm-8" name="vehicule" id="vehicule">
                            <option></option>
                            @foreach($vehicules as $vehicule)
                                <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                            @endforeach
                        </select>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Chef de bord</label>
                        <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" value="{{$centre->tournees->chefDeBords->nomPrenoms ?? "Données indisponible"}}" readonly/>
                        {{--<select class="form-control col-sm-8" name="chefDeBord">
                            <option></option>
                            @foreach($chefBords as $chef)
                                <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>
                            @endforeach
                        </select>--}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Agent garde</label>
                        <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" value="{{$centre->tournees->agentDeGarde->nomPrenoms ?? "Données indisponible"}}"  readonly/>
                        {{--<select class="form-control col-sm-8" name="agentDeGarde">
                            <option></option>
                            @foreach($agents as $agent)
                                <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>
                            @endforeach
                        </select>--}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Chauffeur:</label>
                        <input class="form-control col-sm-8" name="chauffeur" id="chauffeur" value="{{$centre->tournees->chauffeurs->nomPrenoms ?? "Données indisponible"}}" readonly/>
                        {{--<select class="form-control col-sm-8" name="chauffeur" id="chauffeur">
                            <option></option>
                        </select>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-sm-4">Centre régional</label>
                        <input name="centre" id="centre" class="form-control col-sm-8" value="{{$centre->tournees->centre}}" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre_regional" class="col-sm-4">Centre</label>
                        <input id="centre_regional" name="centre_regional" class="form-control col-sm-8" value="{{$centre->tournees->centre}}" readonly/>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <div class="container-fluid">
            <form method="post" action="/maincourante-arriveecentre/{{$centre->id}}" id="arriveeCentre" novalidate>
                @csrf
                @method("PATCH")

                <input type="hidden" name="maincourante" value="arriveeCentre"/>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <label class="col-sm-5">Heure arrivée</label>
                            <input type="time" name="heureArrivee" value="{{$centre->heureArrivee}}" class="form-control col-sm-7"/>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5">Km arrivé</label>
                            <input type="number" name="kmArrive" value="{{$centre->kmArrive}}" class="form-control col-sm-7"/>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5">Niveau carburant</label>
                            <select name="niveauCarburant" class="form-control col-sm-7">
                                <option>{{$centre->niveauCarburant}}</option>
                                <option>1/4</option>
                                <option>2/4</option>
                                <option>3/4</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5">Fin de tournée</label>
                            <select name="finTournee" class="form-control col-sm-7">
                                <option>{{$centre->finTournee}}</option>
                                <option>fin</option>
                                <option>transite</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5">Date arrivée centre</label>
                            <input type="date" name="dateArrivee" value="{{$centre->dateArrivee}}" class="form-control col-sm-7"/>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5">Observation</label>
                            <textarea name="observation" class="form-control col-sm-7">{{$centre->observation}}</textarea>
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit" id="acSubmit">Valider</button>
                    </div>
                </div>
            </form>
        </div>

    </div>


    <script>
        $(document).ready(function () {
            $('#listeArriveeCentre').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
