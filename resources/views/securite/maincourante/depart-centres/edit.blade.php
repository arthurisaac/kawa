@extends('bases.securite')

@section("main")
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Main Courante | Départ Centre"])
@section("nouveau")
    <a href="/maincourante-departcentreliste" class="btn btn-sm btn-primary">Liste départ centre</a>
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

        <div class="card card-xl-stretch">
            <div class="card-header border-0 py-5 bg-gradient-kawa">
                <h3 class="card-title fw-bolder">Main Courante Modification</h3>
            </div>
            <div class="card-body bg-card-kawa pt-3">
                <div class="row">
                    <div class="col">
                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                            <label for="date" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Date</label>
                            <input type="text" name="date" id="date" value="{{$centre->tournees->date ?? ''}}"
                                   class="form-control form-control-solid col"
                                   readonly/>
                        </div>
                    </div>

                    <div class="col">
                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                            <label for="no_tournee" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">N°Tournée</label>
                                <input class="form-control form-control-solid col" name="noTournee" id="noTournee" value="{{$centre->tournees->numeroTournee ?? ''}} // {{$centre->tournees->vehicules->code ?? ""}}" readonly/>
                        </div>
                    </div>

                    <div class="col">
                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Véhicule</label>
                            <input class="form-control form-control-solid col" name="vehicule" id="vehicule"
                                   value="{{$centre->tournees->vehicules->immatriculation ?? ""}}" readonly/>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex flex-column mb-7 col-md-8 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Chef de bord</label>
                            <input class="form-control form-control-solid col" name="chefDeBord" id="chefDeBord"
                                   value="{{$centre->tournees->chefDeBords->nomPrenoms ?? ""}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column mb-7 col-md-8 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Agent garde</label>
                            <input class="form-control form-control-solid col" name="agentDeGarde" id="agentDeGarde"
                                   value="{{$centre->tournees->agentDeGarde->nomPrenoms ?? ""}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column mb-7 col-md-8 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Chauffeur:</label>
                            <input class="form-control form-control-solid col" name="chauffeur" id="chauffeur"
                                   value="{{$centre->tournees->chauffeurs->nomPrenoms ?? ""}}" readonly/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex flex-column mb-7 col-md-8 fv-row fv-plugins-icon-container">
                            <label for="centre" class="d-flex align-items-center fs-6 text-dark fw-bold form-label mb-2">Centre
                                régional</label>
                            <input name="centre" id="centre" class="form-control form-control-solid col-sm-8"
                                   value="{{$centre->tournees->centre}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column mb-7 col-md-8 fv-row fv-plugins-icon-container">
                            <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Centre</label>
                            <input id="centre_regional" name="centre_regional"
                                   class="form-control form-control-solid col-sm-8"
                                   value="{{$centre->tournees->centre}}" readonly/>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>

        <br>

        <form method="post" action="/maincourante-departcentre/{{$centre->id}}" novalidate
              id="departCentre">
            @csrf
            @method('PATCH')

            <div class="card card-xl-stretch">
                <div class="card-body bg-card-kawa 3">
                    <input type="hidden" name="maincourante" value="departCentre"/>
                    <br/>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="heure_depart" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Heure départ</label>
                                <input type="time" name="heureDepart" value="{{$centre->heureDepart}}"
                                       class="form-control col-sm-8"/>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="km_depart" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Km départ</label>
                                <input type="number" name="kmDepart" value="{{$centre->kmDepart}}"
                                       class="form-control col-sm-8"/>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="km_depart" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Niveau carburant</label>
                                <select name="niveauCarburant" class="form-control col-sm-8">
                                    <option>{{$centre->niveauCarburant}}</option>
                                    @foreach($optionNiveauCarburant as $option)
                                        <option>{{$option->option}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="observation" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Observation:</label>
                                <textarea name="observation" id="dcObservation"
                                          class="form-control col-sm-8">{{$centre->observation}}</textarea>
                            </div>

                        </div>
                        <div class="col-8">

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit" id="dcSubmit">Enregistrer</button>
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
