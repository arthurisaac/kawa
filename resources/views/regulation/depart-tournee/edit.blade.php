@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Régulation départ tournée</h2></div>
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


        <form action="{{ route('regulation-depart-tournee.update', $tournee->id) }}" method="post">
            @csrf
            @method("PATCH")
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4">Date départ</label>
                            <input type="text" name="date" id="date" value="{{$tournee->date}}" class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="heure" class="col-sm-4">Heure départ</label>
                            <input type="text" name="heure" id="heure" value="{{$tournee->heure}}" class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group row">
                            <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                            <select class="form-control col-sm-8" name="noTournee" id="noTournee">
                                <option>{{$tournee->noTournee}}</option>
                                @foreach($tournees as $tournee)
                                    <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Véhicule</label>
                            <input class="form-control col-sm-8" name="vehicule" id="vehicule" value="{{$tournee->tournees->vehicules->immatriculation?? "Donnée indisponible"}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Chauffeur:</label>
                            <input class="form-control col-sm-8" name="chauffeur" id="chauffeur" value="{{$tournee->tournees->chauffeurs->nomPrenoms ?? "Données indisponible"}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Agent garde</label>
                            <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" value="{{$tournee->tournees->agentDeGarde->nomPrenoms ?? "Données indisponible"}}"  readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4">Chef de bord</label>
                            <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" value="{{$tournee->tournees->chefDeBords->nomPrenoms ?? "Données indisponible"}}" readonly/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre" class="col-sm-4">Centre régional</label>
                            <input name="centre" id="centre" class="form-control col-sm-8" value="{{$tournee->tournees->centre}}" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre_regional" class="col-sm-4">Centre</label>
                            <input id="centre_regional" name="centre_regional" class="form-control col-sm-8" value="{{$tournee->tournees->centre}}" readonly/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="container">
                <br>
                <button type="button" id="addRowSite" class="btn btn-sm btn-dark">Ajouter</button>
                <br>
                <br>
                <table class="table table-bordered" id="tableSite">
                    <thead>
                    <tr>
                        <th>Site</th>
                        <th>Client</th>
                        <th>Nature</th>
                        <th>Numéros scellé</th>
                        <th>Nbre colis</th>
                        <th>Montant</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sitesItems as $site)
                        <tr>
                            <td>
                                <select name="site_edit[]" class="form-control">
                                    <option value="{{$site->site}}">{{$site->sites->site}}</option>
                                    @foreach($sites as $s)
                                        <option value="{{$s->id}}">{{$s->site}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="id[]" value="{{$site->id}}">
                            </td>
                            <td><input type="text" name="client_edit[]" value="{{$site->client}}" class="form-control"></td>
                            <td><select name="nature_edit[]" class="form-control">
                                    <option>{{$site->nature}}</option>
                                    <option>envoi</option>
                                    <option>tri</option>
                                    <option>transite</option>
                                    <option>approvisionnement</option>
                                </select></td>
                            <td><input type="text" name="numero_scelle_edit[]" value="{{$site->numero_scelle}}" class="form-control"></td>
                            <td><input type="number" name="nbre_colis_edit[]" value="{{$site->nbre_colis}}" class="form-control"></td>
                            <td><input type="text" name="montant_edit[]" value="{{$site->montant}}" class="form-control"></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><select name="site[]" class="form-control">
                                @foreach($sites as $site)
                                    <option value="{{$site->id}}">{{$site->site}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" name="client[]" class="form-control"></td>
                        <td><input type="text" name="nature[]" class="form-control"></td>
                        <td><input type="text" name="numero_scelle[]" class="form-control"></td>
                        <td><input type="number" name="nbre_colis[]" class="form-control"></td>
                        <td><input type="text" name="montant[]" class="form-control"></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4" style="vertical-align: center;">TOTAL</td>
                        <td><input type="number" name="totalColis" value="{{$tournee->totalColis}}" class="form-control"></td>
                        <td><input type="number" name="totalMontant" value="{{$tournee->totalMontant}}" class="form-control"></td>
                    </tr>
                    </tfoot>
                </table>
                <br>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>

    </div>
    <script>
        let tournees = {!! json_encode($tournees) !!};
        let sites = {!! json_encode($sites) !!};
        $(document).ready(function () {
            $("#noTournee").on("change", function () {
                $("#vehicule").val("");
                $("#chauffeur").val("");
                $("#chefDeBord").val("");
                $("#agentDeGarde").val("");
                $("#centre_regional option").remove();

                const tournee = tournees.find(t => t.id === parseInt(this.value ?? 0));
                if (tournee) {
                    $("#vehicule").val(tournee.vehicules.immatriculation);
                    $("#chauffeur").val(tournee.chauffeurs.nomPrenoms);
                    $("#chefDeBord").val(tournee.chef_de_bords.nomPrenoms);
                    $("#agentDeGarde").val(tournee.agent_de_gardes.nomPrenoms);
                    $("#centre").val(tournee.centre);
                    $("#centre_regional").val(tournee.centre_regional);

                    const commerciaux = sites.filter(site => {
                        return site.centre === tournee.centre;
                    });
                    console.log(commerciaux);
                    commerciaux.map(({id, site, clients}) => {
                        $('#asSite').append($('<option>', {
                            value: id,
                            text: `${site} (${clients.client_nom})`
                        }));
                    })
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            // Gestion des missions
            $("#addRowSite").on("click", function () {
                $('#tableSite').append('<tr>\n' +
                    '                        <td><select name="site[]" class="form-control">\n' +
                    '                                @foreach($sites as $site)\n' +
                    '                                    <option value="{{$site->id}}">{{$site->site}}</option>\n' +
                    '                                @endforeach\n' +
                    '                            </select>\n' +
                    '                        </td>\n' +
                    '                        <td><input type="text" name="client[]" class="form-control"></td>\n' +
                    '                        <td><select name="nature[]" class="form-control">\n' +
                    '                                    <option>envoi</option>\n' +
                    '                                    <option>tri</option>\n' +
                    '                                    <option>transite</option>\n' +
                    '                                    <option>approvisionnement</option>\n' +
                    '                                </select></td>\n' +
                    '                        <td><input type="number" name="nbre_colis[]" class="form-control"></td>\n' +
                    '                        <td><input type="text" name="numero_scelle[]" class="form-control"></td>\n' +
                    '                        <td><input type="text" name="montant[]" class="form-control"></td>\n' +
                    '                    </tr>');
            });
        })
    </script>
@endsection
