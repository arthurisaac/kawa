@extends('bases.caisse')
@extends('bases.toolbar', ["title" => "Caisse Centrale", "subTitle" => "Caisse centrale liste de service"])
@section('main')
    <link rel="stylesheet" href="{{ asset('css/burval.css') }}">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
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
            <form class="form-horizontal" action="{{ route('caisse-entree-colis.store') }}" id="target" method="post">
                    <div class="card card-xxl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Caisse centrale Sortie de colis</h3>
                        </div>
                        <div class="card-body pt-5">
                            <div class="row">
                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="date"
                                           class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2"
                                    >Date</label>
                                    <input type="date" class="col-sm-6 form-control form-control" id="date" name="date" value="{{date("Y-m-d")}}" required>
                                </div>

                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="heure"
                                           class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure
                                    </label>
                                    <input type="time" class="col-sm-6 form-control form-control" name="heure" id="heure" value="{{date("H:i")}}" readonly>
                                </div>

                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="noTournee"
                                           class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">N°Tournée
                                    </label>
                                    <select
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="N° Tournée"
                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        name="noTournee" id="noTournee" required>
                                        <option></option>
                                        @foreach($tournees as $tournee)
                                            <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="vehicule"
                                           class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Véhicule</label>
                                    <input type="text" class="col-sm-6 form-control form-control" name="vehicule" id="vehicule" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="agentDeGarde"
                                           class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Agent de garde</label>
                                    <input type="text" class="col-sm-6 form-control form-control" name="agentDeGarde" id="agentDeGarde" readonly>
                                </div>
                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="chefDeBord"
                                           class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Chef de bord</label>
                                    <input type="text" class="col-sm-6 form-control form-control" name="chefDeBord" id="chefDeBord" readonly>
                                </div>
                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="chauffeur"
                                           class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Chauffeur</label>
                                    <input type="text" class="col-sm-6 form-control form-control" name="chauffeur" id="chauffeur" readonly>
                                </div>
                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="centre"
                                           class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre régional</label>
                                    <input type="text" class="col-sm-6 form-control form-control" name="centre" id="centre" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre</label>
                                    <input type="text" class="col-sm-6 form-control form-control" name="centre_regional" id="centre_regional" required>
                                </div>
                                <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                    <label for="remettant" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Remettant ( Agent de régulation)</label>
                                    <input type="text" class="col-sm-6 form-control form-control" name="remettant" id="remettant" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    @csrf
                    <div class="container-fluid">
                        <button type="button" id="add" class="btn btn-sm btn-dark">Ajouter</button>
                        <br>
                        <br>
                        <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%;" id="table">
                            <thead>
                            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
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
                                <td><select name="devise[]" class="form-control">
                                        @foreach($devises as $devise)
                                            <option>{{$devise->devise}}</option>
                                        @endforeach
                                    </select></td>
                                <td><input type="number" name="valeur[]" value="0" class="form-control"></td>
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
                                <td class="pt-10"><a class="btn btn-sm btn-danger" onclick="supprimer(this)"></a></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td style="vertical-align: center;">TOTAL</td>
                                <td></td>
                                <td><input type="number" name="totalValeurXOF" id="totalValeurXOF" class="form-control"
                                           readonly></td>
                                <td></td>
                                <td><input type="number" name="totalColis" id="totalColis" class="form-control" readonly></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                        <br>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                            <br>
                        </div>
                    </div>
                </form>

{{--                <div class="row gy-5 g-xxl-12">--}}
{{--                    <div class="col-xxl-12">--}}
{{--                        <form class="form-horizontal" action="{{ route('caisse-entree-colis.store') }}" id="target" method="post">--}}
{{--                            <div class="card card-xxl-stretch">--}}
{{--                                <div class="card-header border-0 py-5 bg-warning">--}}
{{--                                    <h3 class="card-title fw-bolder">Caisse centrale</h3>--}}
{{--                                </div>--}}
{{--                                <div class="card-body pt-5">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="date" class="col-sm-5">Date</label>--}}
{{--                                                <input type="date" class="form-control col" id="date" name="date" value="{{date("Y-m-d")}}" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="heure" class="col-sm-5">Heure</label>--}}
{{--                                                <input type="text" class="form-control col" name="heure" id="heure" value="{{date("H:i")}}" readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="noTournee" class="col-sm-5">N°Tournée</label>--}}
{{--                                                <select class="form-control col" name="noTournee" id="noTournee" required>--}}
{{--                                                    <option></option>--}}
{{--                                                    @foreach($tournees as $tournee)--}}
{{--                                                        <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <br>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="vehicule" class="col-sm-5">Véhicule</label>--}}
{{--                                                <input type="text" class="form-control col" name="vehicule" id="vehicule" readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="agentDeGarde" class="col-sm-5">Agent de garde</label>--}}
{{--                                                <input type="text" class="form-control col" name="agentDeGarde" id="agentDeGarde" readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="chefDeBord" class="col-sm-5">Chef de bord</label>--}}
{{--                                                <input type="text" class="form-control col" name="chefDeBord" id="chefDeBord" readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <br>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="chauffeur" class="col-sm-5">Chauffeur</label>--}}
{{--                                                <input type="text" class="form-control col" name="chauffeur" id="chauffeur" readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="centre" class="col-sm-5">Centre régional</label>--}}
{{--                                                <input type="text" class="form-control col" name="centre" id="centre" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="centre_regional" class="col-sm-5">Centre</label>--}}
{{--                                                <input type="text" class="form-control col" name="centre_regional" id="centre_regional" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="remettant" class="col-sm-5">Remettant ( Agent de régulation)</label>--}}
{{--                                                <input type="text" class="form-control col" name="remettant" id="remettant" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            @csrf--}}
{{--            <div class="container-fluid">--}}
{{--                <br>--}}
{{--                <button type="button" id="add" class="btn btn-sm btn-dark">Ajouter</button>--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%;" id="table">--}}
{{--                    <thead>--}}
{{--                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);--}}
{{--background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">--}}
{{--                        <th>Colis</th>--}}
{{--                        <th>Devise</th>--}}
{{--                        <th>Valeur colis</th>--}}
{{--                        <th>Numéros scellé (Réference)</th>--}}
{{--                        <th>Nbre total colis</th>--}}
{{--                        <th>Site</th>--}}
{{--                        <th>Client</th>--}}
{{--                        <th></th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td><select name="colis[]" class="form-control">--}}
{{--                                <option></option>--}}
{{--                                <option>Sac jute</option>--}}
{{--                                <option>Keep safe</option>--}}
{{--                                <option>Caisse</option>--}}
{{--                                <option>Conteneur</option>--}}
{{--                            </select></td>--}}
{{--                        <td><select name="caisse_entree_devise[]" class="form-control">--}}
{{--                                @foreach($devises as $devise)--}}
{{--                                    <option>{{$devise->devise}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select></td>--}}
{{--                        <td><input type="text" name="caisse_entree_valeur_colis[]" value="0" class="form-control"></td>--}}
{{--                        <td><textarea name="scelle[]" class="form-control"></textarea></td>--}}
{{--                        <td><input type="number" name="nbre_colis[]" class="form-control"></td>--}}
{{--                        <td>--}}
{{--                            <select name="site[]" class="form-control">--}}
{{--                                <option></option>--}}
{{--                                @foreach($sites as $site)--}}
{{--                                    <option value="{{$site->id}}">{{$site->site}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </td>--}}
{{--                        <td><input type="text" name="client[]" class="form-control"></td>--}}
{{--                        <td><a class="btn btn-sm btn-danger" onclick="supprimer(this)"></a></td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                    <tfoot>--}}
{{--                    <tr>--}}
{{--                        <td style="vertical-align: center;">TOTAL</td>--}}
{{--                        <td></td>--}}
{{--                        <td><input type="number" name="totalValeurColis" id="totalValeurColis" class="form-control"--}}
{{--                                   readonly></td>--}}
{{--                        <td></td>--}}
{{--                        <td><input type="number" name="totalColis" id="totalColis" class="form-control" readonly></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                    </tr>--}}
{{--                    </tfoot>--}}
{{--                </table>--}}
{{--                <br>--}}
{{--                <div class="card-footer">--}}
{{--                    <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>--}}
{{--                    <br>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </form>--}}
{{--            </div></div>--}}
        </div>
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
                    '                        <td class="pt-10"><a class="btn btn-sm btn-danger" onclick="supprimer(this)"></a></td>\n' +
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
