@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Départ tournée"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
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

            <form class="form-horizontal" action="{{ route('depart-tournee.store') }}" method="post">
                @csrf
                <div class="card card-xxl-stretch">
                    <div class="card-body bg-card-kawa pt-5">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="numero_tournee" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">N°Tournée:</label>
                                    <input type="text" class="form-control col" name="numeroTournee"
                                           id="numero_tournee" value="{{$num}}" readonly required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="date" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date fin</label>
                                    <input type="date" class="form-control col" name="date" id="date" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="vehicule" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Véhicule</label>
                                    <select
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Véhicule"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        name="idVehicule" id="vehicule">
                                        <option></option>
                                        @foreach($vehicules as $vehicule)
                                            <option
                                                value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="kmDepart" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Kilométrage départ</label>
                                    <input type="number" min="0" class="form-control col" name="kmDepart"
                                           id="kmDepart" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="chauffeur" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Chauffeur</label>
                                    <select class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Chauffeur"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            name="chauffeur" id="chauffeur">
                                        <option></option>
                                        @foreach($chauffeurs as $chauffeur)
                                            <option
                                                value="{{$chauffeur->id}}">{{$chauffeur->nomPrenoms}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="agentDeGarde" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Agent de garde</label>
                                    <select
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Agent de garde"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        id="agentDeGarde" name="agentDeGarde">
                                        <option></option>
                                        @foreach($agents as $agent)
                                            <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="chefDeBord" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Chef de bord</label>
                                    <select
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Chef de bord"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        id="chefDeBord" name="chefDeBord">
                                        <option></option>
                                        @foreach($chefBords as $chef)
                                            <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="coutTournee" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Coût tournée</label>
                                    <input type="number" min="0" value="0" class="form-control col text-danger"
                                           name="coutTournee" id="coutTournee" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="heureDepart" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2"">Heure départ</label>
                                    <input type="time" class="form-control col" name="heureDepart"
                                           id="heureDepart" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre régional</label>
                                    <select
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Centre régional"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        id="centre" name="centre">
                                        <option></option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">Centre
                                                de {{ $centre->centre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre</label>
                                    <select id="centre_regional" name="centre_regional"
                                            class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Centre"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            required>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card card-xl-stretch">
                    <div class="card-body bg-card-kawa">
                        <table id="data" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                               style="width: 100%;">
                            <thead>

                            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient">
                                <th>Site</th>
                                <th>Type opération</th>
                                <th>TDF</th>
                                <th>Montant TDF</th>
                                <th>Caisse</th>
                                <th>Montant Caisse</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i=0; $i<2; $i++)
                                <tr>
                                    <td>
                                        <select class="form-control" name="site[]" id="site{{$i}}">
                                            <option></option>
                                            @foreach ($sites as $site)
                                                <option value="{{$site->id}}">{{$site->site}}
                                                    | {{$site->clients->client_nom ?? ''}}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td>
                                        <select class="form-control" name="type[]">
                                            <option value="Enlèvement">Enlèvement</option>
                                            <option value="Dépôt">Dépôt</option>
                                            <option value="Enlèvement + Dépôt">Enlèvement + Dépôt</option>
                                            <option value="Enlèvement / R">Enlèvement / R</option>
                                            <option value="Dépôt / R">Dépôt / R</option>
                                            <option value="Enlèvement + Dépôt / R">Enlèvement + Dépôt / R</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="tdf[]" disabled>
                                            <option></option>
                                            <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                            <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                            <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                            <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                            <option value="oo_vb_intramuros">VB</option>
                                            <option value="oo_vl_intramuros">VL</option>
                                            <option value="oo_ass_appro">Assistance appro DAB</option>
                                            <option value="oo_dnf">Dépôt non facturé</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="montant_tdf[]" disabled/>
                                    </td>
                                    <td>
                                        <select class="form-control" name="caisse[]" disabled>
                                            <option></option>
                                            <option value="oo_mad">MAD</option>
                                            <option value="oo_collecte">Collecte</option>
                                            <option value="oo_cctv">CCTV</option>
                                            <option value="oo_collecte_caisse">Collecte Caisse</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="montant_caisse[]" disabled/>
                                    </td>
                                    <td><a class="btn btn-danger btn-sm" onclick="supprimer(this)"></a></td>
                                </tr>
                            @endfor
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6"></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" id="add">+</button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                        <a href="/depart-tournee-liste" class="btn btn-info btn-sm" style="margin-left: 20px">Fermer
                            et ouvrir la liste</a>
                        <br>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script>
        $(document).ready(function () {
            let centres = {!! json_encode($centres) !!};
            let centres_regionaux = {!! json_encode($centres_regionaux) !!};

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

            let index = 1;
            $("#add").on("click", function () {
                index++;
                $("#data").append('<tr>\n' +
                    '                            <td>\n' +
                    '                                <select class="form-control" name="site[]" id="site{{$i}}">\n' +
                    '                                    <option></option>\n' +
                    '                                    @foreach ($sites as $site)\n' +
                    '                                        <option value="{{$site->id}}">{{$site->site}} | {{$site->clients->client_nom ?? ''}}</option>\n' +
                    '                                    @endforeach\n' +
                    '                                </select>\n' +
                    '\n' +
                    '                            </td>\n' +
                    '                            <td>\n' +
                    '                                <select class="form-control" name="type[]">\n' +
                    '                                    <option>Enlèvement</option>\n' +
                    '                                    <option>Dépôt</option>\n' +
                    '                                    <option>Enlèvement + Dépôt</option>\n' +
                    '                                   <option>Enlèvement / R</option>\n' +
                    '                                    <option>Dépôt / R</option>\n' +
                    '                                    <option>Enlèvement + Dépôt / R</option>\n' +
                    '                                </select>\n' +
                    '                            </td>\n' +
                    '                            <td>\n' +
                    '                                <select class="form-control" name="tdf[]" disabled>\n' +
                    '                                    <option></option>\n' +
                    '                                    <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>\n' +
                    '                                    <option value="oo_vb_extramuros_piste">VB extramuros piste</option>\n' +
                    '                                    <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>\n' +
                    '                                    <option value="oo_vl_extramuros_piste">VL extramuros piste</option>\n' +
                    '                                    <option value="oo_vb_intramuros">VB</option>\n' +
                    '                                    <option value="oo_vl_intramuros">VL</option>\n' +
                    '                                    <option value="oo_ass_appro">Assistance Appro DAB</option>\n' +
                    '                                    <option value="oo_dnf">Dépôt non facturé</option>\n' +
                    '                                </select>\n' +
                    '                            </td>\n' +
                    '                            <td><input type="number" class="form-control" name="montant_tdf[]" disabled/></td>\n' +
                    '                            <td>\n' +
                    '                                <select class="form-control" name="caisse[]" disabled>\n' +
                    '                                    <option></option>\n' +
                    '                                    <option value="oo_mad">MAD</option>\n' +
                    '                                    <option value="oo_collecte">Collecte</option>\n' +
                    '                                    <option value="oo_cctv">CCTV</option>\n' +
                    '                                    <option value="oo_collecte_caisse">Collecte Caisse</option>\n' +
                    '                                </select>\n' +
                    '                            </td>\n' +
                    '                            <td><input type="number" class="form-control" name="montant_caisse[]" disabled/></td>\n' +
                    '                            <td><a class="btn btn-danger btn-sm" onclick="supprimer(this)"></a></td>\n' +
                    '                        </tr>');
            });
        });
    </script>
    <script>
        let vehicules = {!! json_encode($vehicules) !!};
        let sites = {!! json_encode($sites) !!};
        let cout = 0;
        let site = null;

    </script>
    <script>
        $(document).on('DOMNodeInserted', function () {
            // Activer les champs TDF et Caisse
            $("select[name='site[]']").on("change", siteChange);

            // Calculer count total à partir de TDF
            $("select[name='tdf[]']").on("change", tdfChange);

            // Calculer count total à partir de Caisse
            $("select[name='caisse[]']").on("change", caisseChange);
        });
    </script>
    <script>
        function siteChange() {
            let index = 0;
            const thisSite = this;
            // Trouver l'index du champs actuel
            $.each($("select[name='site[]']"), function (i) {
                const site = $("select[name='site[]']").get(i);
                if (thisSite === site) {
                    index = i;
                }
            });
            const site = sites.find(s => s.id === parseInt(this.value));
            if (site) {
                $("select[name='tdf[]']").eq(index).prop('disabled', false);
                $("select[name='caisse[]']").eq(index).prop('disabled', false);
            } else {
                console.log("Site non trouvé :-(");
            }
            tdfChange();
        }

        function tdfChange() {
            let coutTournee = 0;
            const thisTDF = this;
            // Trouver l'index du champs actuel
            $.each($("select[name='tdf[]']"), function (i) {
                const tdf = $("select[name='tdf[]']").get(i);
                if (thisTDF === tdf) {
                    index = i;
                }
                const siteInput = $("select[name='site[]']").get(i);
                const site = sites.find(s => s.id === parseInt(siteInput.value));
                const caisseInput = $("select[name='caisse[]']").get(i);
                if (site) {
                    const montantTDF = site[this.value] ?? 0;
                    const montantCaisse = site[caisseInput.value] ?? 0;
                    let cout = coutTournee += (parseFloat(montantTDF) ?? 0) + (parseFloat(montantCaisse) ?? 0);
                    $("#coutTournee").val(cout);
                    $("input[name='montant_tdf[]']").eq(i).val(montantTDF);
                } else {
                    console.log("Site non trouvé :-(");
                }
            });
        }

        function caisseChange() {
            let coutTournee = 0;
            const thisTDF = this;
            // Trouver l'index du champs actuel
            $.each($("select[name='caisse[]']"), function (i) {
                const tdf = $("select[name='caisse[]']").get(i);
                if (thisTDF === tdf) {
                    index = i;
                }
                const siteInput = $("select[name='site[]']").get(i);
                const site = sites.find(s => s.id === parseInt(siteInput.value));
                const tdfInput = $("select[name='tdf[]']").get(i);
                if (site) {
                    const montantCaisse = site[this.value] ?? 0;
                    const montantTDF = site[tdfInput.value] ?? 0;
                    let cout = coutTournee += (parseFloat(montantTDF) ?? 0) + (parseFloat(montantCaisse) ?? 0);
                    $("#coutTournee").val(cout);
                    $("input[name='montant_caisse[]']").eq(i).val(montantCaisse);
                } else {
                    console.log("Site non trouvé :-(");
                }
            });

        }

        function supprimer(e) {
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("data").deleteRow(indexLigne);
            siteChange();
            tdfChange();
        }
    </script>
@endsection
