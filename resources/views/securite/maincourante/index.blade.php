@extends('base')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
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
                        <input type="text" name="date" id="date" value="{{$date}}" class="form-control col-sm-8" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                        <select class="form-control col-sm-8" name="noTournee" id="noTournee">
                            <option></option>
                            @foreach($tournees as $tournee)
                                <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Véhicule</label>
                        <input class="form-control col-sm-8" name="vehicule" id="vehicule" readonly/>
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
                        <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" readonly/>
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
                        <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" readonly/>
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
                        <input class="form-control col-sm-8" name="chauffeur" id="chauffeur" readonly/>
                        {{--<select class="form-control col-sm-8" name="chauffeur" id="chauffeur">
                            <option></option>
                        </select>--}}
                    </div>
                </div>
            </div>
        </div>

        <br/>
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
                    <form method="post" action="{{ route('maincourante.store') }}" novalidate id="departCentre">
                        @csrf
                        <input type="hidden" name="maincourante" value="departCentre"/>
                        <br/>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label for="heure_depart" class="col-sm-4">Heure départ</label>
                                    <input type="time" name="dcHeureDepart" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label for="km_depart" class="col-sm-4">Km départ</label>
                                    <input type="number" name="dcKmDepart" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label for="observation" class="col-sm-4">Observation:</label>
                                    <textarea name="dcObservation" id="dcObservation"
                                              class="form-control col-sm-8"></textarea>
                                </div>

                                <div class="form-group row">
                                    <span class="col-4"></span>
                                    <button class="btn btn-sm btn-primary" type="button" id="dcSubmit">Enregistrer
                                    </button>
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
                                            <td>{{$centre->tournees->numeroTournee}}</td>
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
                    <form method="post" action="{{ route('maincourante.store') }}" novalidate>
                        <input type="hidden" name="maincourante" value="arriveeSite"/>
                        @csrf
                        <br/>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label for="heure_depart" class="col-sm-4">N°Bordereau</label>
                                    <input type="text" name="asNumeroBordereau" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">SITE</label>
                                    <select type="text" name="asSite" id="asSite" class="form-control col-sm-8">
                                    </select>
                                    <input type="hidden" name="numeroSite" value="1" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label for="heure_depart" class="col-sm-4">Heure d'arrivée</label>
                                    <input type="time" name="asHeureArrivee" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Km d'arrivée</label>
                                    <input type="number" min="0" name="asKmArrivee" class="form-control col-sm-8"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Observation</label>
                                    <textarea name="asObservation" class="form-control col-sm-8"></textarea>
                                </div>

                                <div class="form-group row">
                                    <span class="col-4"></span>
                                    <button class="btn btn-sm btn-primary" type="button" id="asSubmit">Enregistrer
                                    </button>
                                </div>

                            </div>
                            <div class="col-8">
                                <table class="table table-bordered" id="listeArriveeSite" style="width: 100%">
                                    <thead>
                                    <tr>
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
                                            <td>{{$arriveeSite->sites->site ?? "Non précisé"}}</td>
                                            <td>{{$arriveeSite->tournees->date ?? $arriveeSite->tournees }}</td>
                                            <td>{{$arriveeSite->heureArrivee}}</td>
                                            <td>{{$arriveeSite->kmArrivee}}</td>
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
                    <form method="post" action="{{ route('maincourante.store') }}" id="departSite" novalidate>
                        @csrf

                        <input type="hidden" name="maincourante" value="departSite"/>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-6">Heure de départ</label>
                                    <input type="time" name="heureDepart" class="form-control col-sm-6"/>
                                </div>
                                <div class="form-group row">
                                    <label id="km_depart" class="col-sm-6">Kilométrage de depart</label>
                                    <input type="number" name="kmDepart" id="kmDepart" class="form-control col-sm-6"/>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-sm-6">N° de bordereau</label>
                                        <input type="text" class="form-control col-sm-6" name="bordereau">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6">Destination</label>
                                        <input type="text" class="form-control col-sm-6" name="destination">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6">Observation</label>
                                        <textarea class="form-control col-sm-6" name="observation"></textarea>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary btn-sm" type="button" id="dsSubmit">Enregistrer
                                        </button>
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($departSites as $depart)
                                <tr>
                                    <td>{{$depart->site}}</td>
                                    {{--<td>{{$depart->sites->site}}</td>--}}
                                    <td>{{date('d-m-Y', strtotime($depart->tournees->date ?? ""))}}</td>
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
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                    <br/>
                    <br/>
                </div>

            </div>
            <div class="tab-pane fade" id="arrivee-centre" role="tabpanel" aria-labelledby="arrivee-centre-tab">
                <div class="container">
                    <form method="post" action="{{ route('maincourante.store') }}" id="arriveeCentre" novalidate>
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
                                <button class="btn btn-primary btn-sm" type="button" id="acSubmit">Valider</button>
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
                                            <td>{{$centre->tournees->numeroTournee}}</td>
                                            <td>{{$centre->tournees->date}}</td>
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
                    <form method="post" action="{{ route('maincourante.store') }}" id="tourneeCentre" novalidate>
                        @csrf
                        <input type="hidden" name="maincourante" value="tourneeCentre"/>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-sm-5">Centre</label>
                                    <select name="centre" id="centre" class="form-control col-sm-7" required>
                                        <option></option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="centre_regional" class="col-sm-5">Centre régional</label>
                                    <select id="centre_regional" name="centreRegional" class="form-control col-sm-7"
                                            required>
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
                            <button class="btn btn-primary btn-sm" type="button" id="tcSubmit">Valider</button>
                            <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
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
                                    <td>{{$tournee->tournees->date ?? "Indisponible"}}</td>
                                    <td>{{$tournee->tournees->numeroTournee  ?? "Indisponible"}}</td>
                                    <td>{{$tournee->details->vehicules->immatriculation ?? "Indisponible"}}</td>
                                    <td>{{$tournee->details->chauffeurs->nomPrenoms ?? ""}}</td>
                                    <td>{{$tournee->details->chefDeBords->nomPrenoms ?? ""}}</td>
                                    <td>{{$tournee->details->agentDeGardes->nomPrenoms ?? ""}}</td>
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
        let tournees =  {!! json_encode($tournees) !!};

        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        let departSites = {!! json_encode($sitesDepartTournees) !!};
        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                $('#centre_regional').append($('<option>', {text: ""}));

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

            $("#noTournee").on("change", function () {
                $("#chauffeur").val("");
                $("#chefDeBord").val("");
                $("#agentDeGarde").val("");
                $("#date").val("");
                $("#vehicule").val("");
                $("#asSite option").remove();
                const tournee = tournees.find(v => v.id === parseInt(this.value));
                const departSite = departSites.filter(v => {
                    return parseInt(v.idTourneeDepart) === parseInt(this.value);
                });
                if (departSite) {
                    departSite.map(d => {
                        $('#asSite').append($('<option>', {
                            value: d.sites.id,
                            text: d.sites.site
                        }));
                    });
                }

                if (tournee) {
                    if (tournee.chauffeurs) $("#chauffeur").val(tournee.chauffeurs.nomPrenoms);
                    if (tournee.chef_de_bords) $("#chefDeBord").val(tournee.chef_de_bords.nomPrenoms);
                    if (tournee.agent_de_gardes) $("#agentDeGarde").val(tournee.agent_de_gardes.nomPrenoms);
                    if (tournee.vehicules) $("#vehicule").val(tournee.vehicules.immatriculation);
                    $("#date").val(tournee.date);


                }
            });
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

    <script>
        $(document).ready(function () {

            $("#dcSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();

                const noTournee = $("#noTournee").val();
                const dcHeureDepart = $("input[name=dcHeureDepart]").val();
                const dcKmDepart = $("input[name=dcKmDepart]").val();
                const dcObservation = $("textarea[name=dcObservation]").val();
                const asNumeroBordereau = $("textarea[name=asNumeroBordereau]").val();
                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: {
                        maincourante: "departCentre",
                        noTournee: noTournee,
                        heureDepart: dcHeureDepart,
                        kmDepart: dcKmDepart,
                        observation: dcObservation,
                        noBordereau: asNumeroBordereau,
                        _token: _token
                    },
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else {
                            alert("Enregistré avec succès!");
                            $("input[name=dcHeureDepart]").val("");
                            $("input[name=dcKmDepart]").val("");
                            $("textarea[name=dcObservation]").val("");
                        }
                    }
                })
            });

            $("#asSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();

                const noTournee = $("#noTournee").val();
                const site = $("select[name=asSite]").val();
                const heureArrivee = $("input[name=asHeureArrivee]").val();
                const kmArrivee = $("input[name=asKmArrivee]").val();
                const observation = $("textarea[name=asObservation]").val();
                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: {
                        maincourante: "arriveeSite",
                        noTournee: noTournee,
                        site: site,
                        heureArrivee: heureArrivee,
                        kmArrivee: kmArrivee,
                        observation: observation,
                        _token: _token
                    },
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else {
                            alert("Enregistré avec succès!");
                            $("input[name=asHeureArrivee]").val("");
                            $("input[name=asKmArrivee]").val("");
                            $("textarea[name=asObservation]").val("");
                        }
                    }
                })
            });

            $("#dsSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();
                const noTournee = $("#noTournee").val();
                const site = $("select[name=asSite]").val();

                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: $('#departSite').serialize() + `&maincourante=departSite&noTournee=${noTournee}&_token=${_token}&site=${site}`,
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else if (response.errors) {
                            alert(JSON.stringify(response.errors));
                        } else {
                            alert("Enregistré avec succès!");
                            document.getElementById('departSite').reset();
                        }
                    }
                })
            });

            $("#acSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();
                const noTournee = $("#noTournee").val();

                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: $('#arriveeCentre').serialize() + `&noTournee=${noTournee}&_token=${_token}`,
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else {
                            alert("Enregistré avec succès!");
                            document.getElementById('arriveeCentre').reset();
                        }
                        console.log(response);
                    }
                })
            });

            $("#tcSubmit").on("click", function () {
                const _token = $("input[name=_token]").val();
                const noTournee = $("#noTournee").val();

                $.ajax({
                    url: "{{ route('maincourante.store') }}",
                    type: "POST",
                    data: $('#tourneeCentre').serialize() + `&noTournee=${noTournee}&_token=${_token}`,
                    success: function (response) {
                        if (response.errorInfo) {
                            alert(response.errorInfo);
                        } else {
                            alert("Enregistré avec succès!");
                            document.getElementById('tourneeCentre').reset();
                        }
                        console.log(response);
                    }
                })
            })
        });
    </script>
@endsection
