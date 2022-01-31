@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée de colis</h2></div>
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

        <form action="{{ route('caisse-entree-colis.store') }}" id="target" method="post">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4">Date</label>
                            <input type="date" name="date" id="date" value="{{date("Y-m-d")}}" class="form-control col-sm-8"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="heure" class="col-sm-4">Heure</label>
                            <input type="text" name="heure" id="heure" value="{{date("H:i")}}"
                                   class="form-control col-sm-8" readonly/>
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
                        <div class="form-group row" >
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
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre" class="col-sm-4">Centre regional</label>
                            <input name="centre" id="centre" class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="centre_regional" class="col-sm-4">Centre</label>
                            <input id="centre_regional" name="centre_regional" class="form-control col-sm-8" readonly/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4">Remettant ( Agent de régulation)</label>
                            <input type="text" name="remettant" id="remettant" value="" class="form-control col-sm-8"/>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="container-fluid">
                <br>
                <button type="button" id="add" class="btn btn-sm btn-dark">Ajouter</button>
                <br>
                <br>
                <table class="table table-bordered" id="table">
                    <thead>
                    <tr>
                        <th>Colis</th>
                        <th>Devise</th>
                        <th>Valeur colis</th>
                        <th>Numéros scellé (Réference)</th>
                        <th>Nbre total colis</th>
                        <th>Site</th>
                        <th>Client</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><select name="colis[]" class="form-control">
                                <option></option>
                                <option>Sac jute</option>
                                <option>Keep safe</option>
                                <option>Caisse</option>
                                <option>Conteneur</option>
                            </select></td>
                        <td><select name="caisse_entree_devise[]" class="form-control">
                                @foreach($devises as $devise)
                                    <option>{{$devise->devise}}</option>
                                @endforeach
                            </select></td>
                        <td><input type="text" name="caisse_entree_valeur_colis[]" value="0" class="form-control"></td>
                        <td><textarea name="scelle[]" class="form-control"></textarea></td>
                        <td><input type="number" name="nbre_colis[]" class="form-control"></td>
                        <td>
                            <select name="site[]" class="form-control">
                                <option></option>
                                @foreach($sites as $site)
                                    <option value="{{$site->id}}">{{$site->site}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" name="client[]" class="form-control"></td>
                        <td><a class="btn btn-sm btn-danger" onclick="supprimer(this)"></a></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td style="vertical-align: center;">TOTAL</td>
                        <td></td>
                        <td><input type="number" name="totalValeurColis" id="totalValeurColis" class="form-control"
                                   readonly></td>
                        <td></td>
                        <td><input type="number" name="totalColis" id="totalColis" class="form-control" readonly></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                <br>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>

    </div>

    <script>
        function separateNumbers(e){
            try {
                let str = e.value?.replace(/\s/g, '');
                const donnee = parseFloat(str);
                $(e).val(Number(donnee).toLocaleString());
            } catch (e) {
                console.log(e)
            }
        }

        function removeSpace(str) {
            return str.replace(/\s/g, '');
        }

        function changeValeurColis() {
            let total = 0;
            separateNumbers(this);

            $.each($("input[name='caisse_entree_valeur_colis[]']"), function (i) {
                const nbre = $("input[name='caisse_entree_valeur_colis[]'").get(i).value;
                total += parseFloat(removeSpace(nbre)) ?? 0;
            });
            $("#totalValeurColis").val(total);
        }

        function changeNombreColis() {
            let totalColis = 0;
            $.each($("input[name='nbre_colis[]']"), function (i) {
                const nbre = $("input[name='nbre_colis[]'").get(i).value;
                totalColis += parseFloat(nbre) ?? 0;
            });
            $("#totalColis").val(totalColis);
        }
        function supprimer(e) {
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("table").deleteRow(indexLigne);
            changeNombreColis();
            changeValeurColis();
        }
    </script>
    <script>
        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        let sites = {!! json_encode($sites) !!};
        let tournees = {!! json_encode($tournees) !!};
        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();

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
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#add").on("click", function () {
                $('#table').append('<tr>\n' +
                    '                        <td><select name="colis[]" class="form-control">\n' +
                    '                                <option></option>\n' +
                    '                                <option>Sac jute</option>\n' +
                    '                                <option>Keep safe</option>\n' +
                    '                                <option>Caisse</option>\n' +
                    '                                <option>Conteneur</option>\n' +
                    '                            </select></td>\n' +
                    '                        <td><select name="caisse_entree_devise[]" class="form-control">\n' +
                    '                                <option></option>\n' +
                    '                                @foreach($devises as $devise)\n' +
                    '                                    <option>{{$devise->devise}}</option>\n' +
                    '                                @endforeach\n' +
                    '                            </select></td>\n' +
                    '                        <td><input type="text" name="caisse_entree_valeur_colis[]" value="0" class="form-control"></td>\n' +
                    '                        <td><textarea name="scelle[]" class="form-control"></textarea></td>\n' +
                    '                        <td><input type="number" name="nbre_colis[]" class="form-control"></td>\n' +
                    '                        <td>\n' +
                    '                            <select name="site[]" class="form-control">\n' +
                    '                                <option></option>\n' +
                    '                                @foreach($sites as $site)\n' +
                    '                                    <option value="{{$site->id}}">{{$site->site}}</option>\n' +
                    '                                @endforeach\n' +
                    '                            </select>\n' +
                    '                        </td>\n' +
                    '                        <td><input type="text" name="client[]" class="form-control"></td>\n' +
                    '                        <td><a class="btn btn-sm btn-danger" onclick="supprimer(this)"></a></td>\n' +
                    '                    </tr>');
            });

            $("#target").submit(function () {
                removeSpaceValeurColis();
                enableAllColisField();
                return true;
            });
        })
    </script>
    <script>
        $(document).on('DOMNodeInserted', function () {
            $("input[name='montant[]']").on("change", function () {
                let montantTotal = 0;
                $.each($("input[name='montant[]']"), function (i) {
                    const montant = $("input[name='montant[]'").get(i).value;
                    montantTotal += parseFloat(montant) ?? 0;
                });
                $("#totalMontant").val(montantTotal);

            });
            $("input[name='nbre_colis[]']").on("change", function () {
                let totalColis = 0;
                $.each($("input[name='nbre_colis[]']"), function (i) {
                    const nbre = $("input[name='nbre_colis[]'").get(i).value;
                    totalColis += parseFloat(nbre) ?? 0;
                });
                $("#totalColis").val(totalColis);

            });

            $("select[name='site[]']").on("change", function () {
                let index = 0;
                const thisSite = this;
                $.each($("select[name='site[]']"), function (i) {
                    const site = $("select[name='site[]']").get(i);
                    if (thisSite === site) {
                        index = i;
                    }
                });
                const site = sites.find(s => s.id === parseInt(this.value));
                if (site) {
                    $("input[name='client[]']").eq(index).val(site.clients.client_nom);
                } else {
                    console.log("Site non trouvé :-(");
                }
            });
            $("input[name='caisse_entree_valeur_colis[]']").on("change", changeValeurColis);
        });
    </script>

@endsection
