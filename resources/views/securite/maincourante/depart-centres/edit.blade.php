@extends("base")

@section("main")
    <div class="container">
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
        <br>
        <h2 class="heading">Départ centre</h2>
        <a href="/maincourante-departcentreliste">Liste depart centre</a>
        <br>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="date" class="col-sm-4">Date</label>
                        <input type="text" name="date" id="date" value="{{$centre->tournees->date ?? ''}}" class="form-control col-sm-8"
                               readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                        <input class="form-control col-sm-8" name="noTournee" id="noTournee" value="{{$centre->tournees->numeroTournee ?? ''}} // {{$centre->tournees->vehicules->code ?? ""}}" readonly />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Véhicule</label>
                        <input class="form-control col-sm-8" name="vehicule" id="vehicule" value="{{$centre->tournees->vehicules->immatriculation?? ""}}" readonly/>
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
                        <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" value="{{$centre->tournees->chefDeBords->nomPrenoms ?? ""}}" readonly/>
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
                        <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" value="{{$centre->tournees->agentDeGarde->nomPrenoms ?? ""}}"  readonly/>
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
                        <input class="form-control col-sm-8" name="chauffeur" id="chauffeur" value="{{$centre->tournees->chauffeurs->nomPrenoms ?? ""}}" readonly/>
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
            <form method="post" action="/maincourante-departcentre/{{$centre->id}}" novalidate id="departCentre">
                @csrf
                @method('PATCH')

                <input type="hidden" name="maincourante" value="departCentre"/>
                <br/>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <label for="heure_depart" class="col-sm-4">Heure départ</label>
                            <input type="time" name="heureDepart" value="{{$centre->heureDepart}}" class="form-control col-sm-8"/>
                        </div>
                        <div class="form-group row">
                            <label for="km_depart" class="col-sm-4">Km départ</label>
                            <input type="number" name="kmDepart" value="{{$centre->kmDepart}}" class="form-control col-sm-8"/>
                        </div>
                        <div class="form-group row">
                            <label for="km_depart" class="col-sm-4">Niveau carburant</label>
                            <select name="niveauCarburant" class="form-control col-sm-8">
                                <option>{{$centre->niveauCarburant}}</option>
                                @foreach($optionNiveauCarburant as $option)
                                    <option>{{$option->option}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="observation" class="col-sm-4">Observation:</label>
                            <textarea name="observation" id="dcObservation"
                                      class="form-control col-sm-8">{{$centre->observation}}</textarea>
                        </div>

                        <div class="form-group row">
                            <span class="col-4"></span>
                            <button class="btn btn-sm btn-primary" type="submit" id="dcSubmit">Enregistrer
                            </button>
                        </div>

                    </div>
                    <div class="col-8">

                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#listeDepartCentre').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>

    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "maincourante-departcentre/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeDepartCentre").deleteRow(indexLigne);
                    },
                    error: function (xhr) {
                        alert("Une erreur s'est produite");
                    }
                });

            }

        }
    </script>
@endsection
