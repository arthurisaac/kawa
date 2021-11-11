@extends("base")

@section("main")
    <div class="container-fluid">
        <br>
        <h2 class="heading">Arrivée site</h2>
        <a href="/maincourante-arriveesiteliste">Liste arrivée site</a>
        <br>
        <br>
        <br>
        @if ($site->tournees)
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
                        <input class="form-control col-sm-8" name="noTournee" id="noTournee" value="{{$site->tournees->numeroTournee}} || {{$site->tournees->vehicules->code ?? ""}}" readonly />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Véhicule</label>
                        <input class="form-control col-sm-8" name="vehicule" id="vehicule" value="{{$site->tournees->vehicules->immatriculation ?? "Donnée indisponible"}}" readonly/>
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
                        <input class="form-control col-sm-8" name="chauffeur" id="chauffeur" value="{{$site->tournees->chauffeurs->nomPrenoms ?? "Données indisponible"}}" readonly/>
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
        @else
            <div>Donnée tournées indisponible</div>
        @endif
        <div class="container-fluid">
            <form method="post" action="/maincourante-arriveesiteliste/{{$site->id}}" novalidate>
                <input type="hidden" name="maincourante" value="arriveeSite"/>
                @method('PATCH')
                @csrf

                <br/>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <label class="col-sm-4">SITE</label>
                            <select type="text" name="asSite" id="asSite" class="form-control col-sm-8">
                                <option value="{{$site->site}}">{{$site->sites->site ?? "Site inexistant"}}</option>
                                @foreach($sites as $s)
                                    <option value="{{$s->id}}">{{$s->site}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="heure_depart" class="col-sm-4">Type opération</label>
                            <select name="asTypeOperation" class="form-control col-sm-8">
                                <option>{{$site->operation}}</option>
                                <option>Enlèvement</option>
                                <option>Dépot</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="asDateArrivee" class="col-sm-4">Date arrivée sur site</label>
                            <input type="date" name="asDateArrivee" value="{{$site->dateArrivee}}"
                                   class="form-control col-sm-8"/>
                        </div>
                        <div class="form-group row">
                            <label for="asDateArrivee" class="col-sm-4">Heure arrivée sur site</label>
                            <input type="time" name="asHeureArrivee" value="{{$site->heureArrivee}}"
                                   class="form-control col-sm-8"/>
                        </div>
                        <div class="form-group row">
                            <label for="asDebutOpération" class="col-sm-4">Heure début opération</label>
                            <input type="time" name="asDebutOperation" id="asDebutOperation"
                                   class="form-control col-sm-8" value="{{$site->debutOperation}}"/>
                        </div>
                        <div class="form-group row">
                            <label for="asFinOperation" class="col-sm-4">Heure fin opération</label>
                            <input type="time" name="asFinOperation" id="asFinOperation"
                                   class="form-control col-sm-8" value="{{$site->finOperation}}"/>
                        </div>
                        <div class="form-group row">
                            <label for="asTempsOperation" class="col-sm-4">Temps opération (mn)</label>
                            <input type="number" name="asTempsOperation" id="asTempsOperation"
                                   class="form-control col-sm-8" value="{{$site->tempsOperation}}" readonly/>
                        </div>
                        <div class="form-group row">
                            <label for="asNbColis" class="col-sm-4">Nombre de colis récupérés</label>
                            <input type="number" name="asNbColis" id="asNbColis" value="{{$site->nombre_colis}}"
                                   class="form-control col-sm-8"/>
                        </div>

                        <br>
                        <div class="form-group row" style="display: none;">
                            <label class="col-sm-6">Heure de départ</label>
                            <input type="time" name="asHeure" class="form-control col-sm-6" value="{{date('H:i')}}"/>
                        </div>
                        <div class="form-group row">
                            <label id="km_depart" class="col-sm-4">Kilométrage arrivée</label>
                            <input type="number" name="asKm" value="{{$site->asKm}}" id="kmDepart" class="form-control col"/>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4">Date départ site</label>
                            <input type="date" class="form-control col" name="asDepartSite" value="{{$site->asDepartSite}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Prochaine destination</label>
                            <select class="form-control col" name="asDestination" id="prochaineDestination">
                                <option>{{$site->asDestination}}</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Observation</label>
                            <textarea class="form-control col" name="asObservation">{{$site->asObservation}}</textarea>
                        </div>
                    </div>
                    <div class="col">

                        <br>
                        <button type="button" id="arriveeSiteColisButton" class="btn btn-sm btn-dark">Ajouter
                        </button>
                        <br>
                        <br>
                        <table class="table table-bordered" id="tableASColis">
                            <thead>
                            <tr>
                                <th>Colis</th>
                                <th>N° Colis</th>
                                <th>N° Bordereau</th>
                                <th>Montant annoncé</th>
                                <th>Nombre de colis</th>
                                <th>Nature colis</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($arriveeColis as $colis)
                                <tr>
                                    <td>
                                        <input type="hidden" name="colis_id[]" value="{{$colis->id}}">
                                        <select name="asColis_edit[]" class="form-control">
                                            <option>{{$colis->colis}}</option>
                                            <option>Keep Safe</option>
                                            <option>Sac juste</option>
                                            <option>Pierres précieuses</option>
                                        </select>
                                    </td>
                                    <td><input type="number" name="asNumColis_edit[]" value="{{$colis->num_colis}}"
                                               class="form-control"/></td>
                                    <td><input type="text" name="asNumBordereau_edit[]" value="{{$colis->bordereau}}"
                                               class="form-control"/></td>
                                    <td><input type="number" name="asMontantAnnonce_edit[]" value="{{$colis->montant}}"
                                               class="form-control"/></td>
                                    <td><input type="text" name="asNatureColis_edit[]" value="{{$colis->nature}}"
                                               class="form-control"/></td>
                                    <td><input type="text" name="asNombreColis_edit[]" value="{{$colis->asNombreColis}}"
                                               class="form-control"/></td>
                                    <td><a class="btn btn-sm btn-danger" onclick="supprimerItem('{{$colis->id}}',this)"></a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <select name="asColis[]" class="form-control">
                                        <option>Keep Safe</option>
                                        <option>Sac juste</option>
                                        <option>Pierres précieuses</option>
                                    </select>
                                </td>
                                <td><input type="number" name="asNumColis[]" class="form-control"/></td>
                                <td><input type="text" name="asNumBordereau[]" class="form-control"/></td>
                                <td><input type="number" name="asMontantAnnonce[]" class="form-control"/></td>
                                <td><input type="text" name="asNatureColis[]" class="form-control"/></td>
                                <td><a class="btn btn-sm btn-danger" onclick="supprimer(this)"></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br/>
                <div class="form-group">
                    <button class="btn btn-sm btn-primary" type="submit" id="asSubmit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $("#arriveeSiteColisButton").on("click", function () {
                $("#tableASColis").append('<tr>\n' +
                    '                                        <td>\n' +
                    '                                            <select name="asColis[]" class="form-control">\n' +
                    '                                                <option>Keep Safe</option>\n' +
                    '                                                <option>Sac juste</option>\n' +
                    '                                                <option>Pierres précieuses</option>\n' +
                    '                                            </select>\n' +
                    '                                        </td>\n' +
                    '                                        <td><input type="number" name="asNumColis[]" class="form-control"/></td>\n' +
                    '                                        <td><input type="text" name="asNumBordereau[]" class="form-control"/></td>\n' +
                    '                                        <td><input type="number" name="asMontantAnnonce[]" class="form-control"/></td>\n' +
                    '                                        <td><input type="text" name="asNatureColis[]" class="form-control"/></td>\n' +
                    '                                        <td><a class="btn btn-sm btn-danger" onclick="supprimerLigne(this)"></a></td>\n' +
                    '                                    </tr>')
            });
        });
    </script>
    <script>
        function supprimerLigne(e) {
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("arriveeSiteColisButton").deleteRow(indexLigne);
        }
        function supprimerItem(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "<?php echo e(csrf_token()); ?>";
                $.ajax({
                    url: "/maincourante-arriveesiteitem/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        window.location.reload(true);
                        supprimerLigne(e);
                    },
                    error: function (err) {
                        console.error(err.responseJSON.message);
                        alert(err.responseJSON.message ?? "Une erreur s'est produite");
                    }
                }).done(function () {
                    // TODO hide loader
                });
            }
        }

        $(document).ready(function () {
            $('#listeArriveeSite').DataTable({
                "language": {
                    "url": "French.json"
                }
            });

            $("#asDebutOperation").on("change", function () {
                const fin = $("#asFinOperation").val();
                if (fin !== undefined) {
                    console.log(fin);
                }
            });

            $("#asFinOperation").on("change", function () {
                const debut = $("#asDebutOperation").val();
                console.log("debut :", debut);
                console.log("fin :", this.value);
                const debutDate = new Date(`01/01/2021 ${debut}`);
                const finDate = new Date(`01/01/2021 ${this.value}`);
                $("#asTempsOperation").val(diff_hours(debutDate, finDate));
            });

            function diff_hours(dt2, dt1) {
                let diff = (dt2.getTime() - dt1.getTime()) / 1000;
                //diff /= (60 * 60);         //For Hours
                diff /= (60);         // For Minutes
                return Math.abs(Math.round(diff));
            }

        });
    </script>
@endsection
