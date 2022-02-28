@extends('bases.securite')

@section("main")
@section("nouveau")
    <a href="/maincourante-arriveecentreliste" class="btn btn-sm btn-primary">Liste arrivée centre</a>
@endsection
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
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
        <div class="card card-xl-stretch">
            <div class="card-body bg-card-kawa 3">
                <div class="row">
                    <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                        <label for="date" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Date</label>
                        <input type="text" name="date" id="date" value="{{$centre->tournees->date}}"
                               class="form-control col-sm-8"
                               readonly/>
                    </div>
                    <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                        <label for="no_tournee"
                               class="d-flex align-items-center fs-6 fw-bold form-label mb-2">N°Tournée</label>
                        <input class="form-control col-sm-8" name="noTournee" id="noTournee"
                               value="{{$centre->tournees->numeroTournee}}" readonly/>
                    </div>
                    <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Véhicule</label>
                        <input class="form-control col-sm-8" name="vehicule" id="vehicule"
                               value="{{$centre->tournees->vehicules->immatriculation?? "Donnée indisponible"}}"
                               readonly/>
                    </div>
                </div>
                <div class="row">

                    <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Chef de bord</label>
                        <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord"
                               value="{{$centre->tournees->chefDeBords->nomPrenoms ?? "Données indisponible"}}"
                               readonly/>
                    </div>
                    <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Agent garde</label>
                        <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde"
                               value="{{$centre->tournees->agentDeGarde->nomPrenoms ?? "Données indisponible"}}"
                               readonly/>
                    </div>
                    <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Chauffeur:</label>
                        <input class="form-control col-sm-8" name="chauffeur" id="chauffeur"
                               value="{{$centre->tournees->chauffeurs->nomPrenoms ?? "Données indisponible"}}"
                               readonly/>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                        <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Centre régional</label>
                        <input name="centre" id="centre" class="form-control col-sm-8"
                               value="{{$centre->tournees->centre}}" readonly/>
                    </div>
                    <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                        <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Centre</label>
                        <input id="centre_regional" name="centre_regional" class="form-control col-sm-8"
                               value="{{$centre->tournees->centre}}" readonly/>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>

        <br>
        <form method="post" action="/maincourante-arriveecentre/{{$centre->id}}" id="arriveeCentre" novalidate>
            @csrf
            @method("PATCH")

            <div class="card card-xl-stretch">
                <div class="card-body bg-card-kawa 3">
                    <input type="hidden" name="maincourante" value="arriveeCentre"/>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="col-sm-5">Heure arrivée</label>
                                <input type="time" name="heureArrivee" value="{{$centre->heureArrivee}}"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="col-sm-5">Km arrivé</label>
                                <input type="number" name="kmArrive" value="{{$centre->kmArrive}}"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="col-sm-5">Niveau carburant</label>
                                <select name="niveauCarburant" class="form-control col-sm-7">
                                    <option>{{$centre->niveauCarburant}}</option>
                                    <option>1/4</option>
                                    <option>2/4</option>
                                    <option>3/4</option>
                                </select>
                            </div>
                            {{--<div class="form-group row" style="display: none;">
                                <label class="col-sm-5">Fin de tournée</label>
                                <select name="finTournee" class="form-control col-sm-7">
                                    <option>{{$centre->finTournee}}</option>
                                    <option>fin</option>
                                    <option>transite</option>
                                </select>
                            </div>--}}
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="col-sm-5">Date arrivée centre</label>
                                <input type="date" name="dateArrivee" value="{{$centre->dateArrivee}}"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="col-sm-5">Observation</label>
                                <textarea name="observation"
                                          class="form-control col-sm-7">{{$centre->observation}}</textarea>
                            </div>
                            <br>
                            <button class="btn btn-primary btn-sm" type="submit" id="acSubmit">Valider</button>
                        </div>
                    </div>
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
