@extends("base")

@section("main")
    <div class="container">
        <br>
        <h2 class="heading">Départ site</h2>
        <a href="/maincourante-departsiteliste">Liste depart site</a>
        <br>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="date" class="col-sm-4">Date</label>
                        <input type="text" name="date" id="date" value="{{$site->tournees->date}}" class="form-control col-sm-8"
                               readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                        <input class="form-control col-sm-8" name="noTournee" id="noTournee" value="{{$site->tournees->numeroTournee}}" readonly />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Véhicule</label>
                        <input class="form-control col-sm-8" name="vehicule" id="vehicule" value="{{$site->tournees->vehicules->immatriculation?? "Donnée indisponible"}}" readonly/>
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
                        <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" value="{{$site->tournees->chefDeBords->nomPrenoms ?? "Données indisponible"}}" readonly/>
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
                        <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" value="{{$site->tournees->agentDeGarde->nomPrenoms ?? "Données indisponible"}}"  readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Chauffeur:</label>
                        <input class="form-control col-sm-8" name="chauffeur" id="chauffeur" value="{{$site->tournees->chauffeurs->nomPrenoms ?? "Données indisponible"}}" readonly/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-sm-4">Centre régional</label>
                        <input name="centre" id="centre" class="form-control col-sm-8" value="{{$site->tournees->centre}}" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre_regional" class="col-sm-4">Centre</label>
                        <input id="centre_regional" name="centre_regional" class="form-control col-sm-8" value="{{$site->tournees->centre}}" readonly/>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <div class="container-fluid">
            <form method="post" action="/maincourante-departsite/{{$site->id}}" id="departSite" novalidate>
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-6">Heure de départ</label>
                            <input type="time" name="heureDepart" value="{{$site->heureDepart}}"
                                   class="form-control col-sm-6"/>
                        </div>
                        <div class="form-group row">
                            <label id="km_depart" class="col-sm-6">Kilométrage de depart</label>
                            <input type="number" name="kmDepart" id="kmDepart" value="{{$site->kmDepart}}"
                                   class="form-control col-sm-6"/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-6">Date départ site</label>
                                <input type="date" class="form-control col-sm-6" name="departSite"
                                       value="{{$site->depart_site}}">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Destination</label>
                                <input type="text" class="form-control col-sm-6" name="destination"
                                       value="{{$site->destination}}">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Observation</label>
                                <textarea class="form-control col-sm-6" name="observation">{{$site->observation}}</textarea>
                            </div>
                            <div class="row">
                                <button class="btn btn-primary btn-sm" type="submit" id="dsSubmit">Enregistrer
                                </button>
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


    <script>
        $(document).ready(function () {
            $('#listeDepartSite').DataTable({
                "order": [[0, "desc"]],
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
                    url: "maincourante-departsite/" + id,
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
                        document.getElementById("liste").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                }).done(function () {
                    // TODO hide loader
                });


            }

        }
    </script>
@endsection
