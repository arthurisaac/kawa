@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Départ tournée"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
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

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <form method="post" action="{{ route('depart-tournee.update', $tournee->id) }}">
                @csrf
                @method('PATCH')

                <div class="card card-xxl-stretch">
                    <div class="card-body pt-5">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>N°Tournée:</label>
                                    <input type="text" class="form-control text-danger" name="numeroTournee"
                                           value="{{$tournee->numeroTournee}}"
                                           style="font-size: 20px; font-weight: bold;" readonly/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="date" value="{{$tournee->date}}"
                                           required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Véhicule</label>
                                    <select class="form-control" name="idVehicule" id="vehicule">
                                        <option
                                            value="{{$tournee->idVehicule}}">{{$tournee->vehicules->immatriculation ?? 'Vehicule inexistant' . $tournee->idVehicule}}</option>
                                        @foreach($vehicules as $vehicule)
                                            <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Kilométrage départ</label>
                                    <input type="number" class="form-control" name="kmDepart"
                                           value="{{$tournee->kmDepart}}"
                                           id="kmDepart" min="0"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Chauffeur</label>
                                    <select class="form-control" name="chauffeur" id="chauffeur">
                                        <option
                                            value="{{$tournee->chauffeur}}">{{$tournee->chauffeurs->nomPrenoms ?? 'Utilisateur inexistant ' . $tournee->chauffeur}}</option>
                                        @foreach($chauffeurs as $chauffeur)
                                            <option value="{{$chauffeur->id}}">{{$chauffeur->nomPrenoms}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Agent de garde</label>
                                    <select class="form-control" name="agentDeGarde">
                                        <option
                                            value="{{$tournee->agentDeGarde}}">{{$tournee->agentDeGardes->nomPrenoms ?? 'Utilisateur inexistant ' . $tournee->agentDeGarde}}</option>
                                        @foreach($agents as $agent)
                                            <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Chef de bord</label>
                                    <select class="form-control" name="chefDeBord">
                                        <option
                                            value="{{$tournee->chefDeBord}}">{{$tournee->chefDeBords->nomPrenoms ?? 'Utilisateur inexistant ' . $tournee->chefDeBord}}</option>
                                        @foreach($chefBords as $chef)
                                            <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Coût tournée</label>
                                    <input type="number" class="form-control form-control-lg" min="0" name="coutTournee"
                                           value="{{$tournee->coutTournee}}" id="coutTournee"
                                           style="font-size: 20px; font-weight: bold;"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Heure départ</label>
                                    <input type="time" class="form-control" name="heureDepart"
                                           value="{{$tournee->heureDepart}}"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="centre">Centre régional</label>
                                    <select name="centre" id="centre" class="form-control" required>
                                        <option>{{$tournee->centre}}</option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="centre_regional">Centre</label>
                                    <select id="centre_regional" name="centre_regional" class="form-control" required>
                                        <option>{{$tournee->centre_regional}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>

                <br>
                <table id="data" style="width: 100%" class="table table-sm table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <thead>
                    <tr>
                        <td>Site</td>
                        <th>Type opération</th>
                        <th>TDF</th>
                        <th>Montant TDF</th>
                        <th>Caisse</th>
                        <th>Montant Caisse</th>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sitesTournees as $site)
                        <input type="hidden" name="site_id[]" value="{{$site->id}}">
                        <tr>
                            <td>
                                <select class="form-control" name="site[]" id="site{{$site->id}}">
                                    <option value="{{$site->site}}">{{$site->sites->site ?? $site->site}}
                                        | {{$site->sites->clients->client_nom ?? ''}}</option>
                                    @foreach ($commercial_sites as $commercial)
                                        <option value="{{$commercial->id}}">{{$commercial->site}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select type="time" class="form-control" name="type[]">
                                    <option>{{$site->type}}</option>
                                    <option value="Enlèvement">Enlèvement</option>
                                    <option value="Dépôt">Dépôt</option>
                                    <option value="Enlèvement + Dépôt">Enlèvement + Dépôt</option>
                                    <option value="Enlèvement / R">Enlèvement / R</option>
                                    <option value="Dépôt / R">Dépôt / R</option>
                                    <option value="Enlèvement + Dépôt / R">Enlèvement + Dépôt / R</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="tdf[]">
                                    <option value="{{$site->tdf ? $site->tdf . '_edit' : ''}}">{{$site->tdf}}</option>
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
                            <td><input type="number" name="montant_tdf[]" value="{{$site->sites["$site->tdf"] ?? 0 }}"
                                       class="form-control"></td>
                            <td>
                                <select class="form-control" name="caisse[]">
                                    <option
                                        value="{{$site->caisse ? $site->caisse . '_edit' : ''}}">{{$site->caisse}}</option>
                                    <option value="oo_mad">MAD</option>
                                    <option value="oo_collecte">Collecte</option>
                                    <option value="oo_cctv">CCTV</option>
                                    <option value="oo_collecte_caisse">Collecte Caisse</option>
                                </select>
                            </td>
                            <td><input type="number" name="montant_caisse[]"
                                       value="{{$site->sites["$site->caisse"] ?? 0}}" class="form-control"></td>
                            <td><a class="btn btn-danger btn-sm" onclick="supprimer('{{$site->id}}',this)"></a></td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6"></td>
                        <td><button type="button" class="btn btn-sm btn-primary" id="add">+</button></td>
                    </tr>
                    </tfoot>
                </table>

                <div class="row">
                    <div class="col">
                        <br/>
                        <button class="btn btn-sm btn-primary">Enregistrer</button>
                        <button class="btn btn-sm btn-danger" type="button" onclick="window.history.back()">Annuler
                        </button>
                        <a href="/depart-tournee-liste" class="btn btn-sm btn-info" style="margin-left: 20px">Ouvrir laliste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

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

        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "/depart-tournee-item/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        supprimerLigne(e);
                        tdfChange();
                    },
                    error: function (err) {
                        console.error(err.responseJSON.message);
                        alert(err.responseJSON.message ?? "Une erreur s'est produite");
                    }
                });
            }
        }

        function supprimerLigne(e) {
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("data").deleteRow(indexLigne);
            tdfChange();
        }
    </script>
    <script>
        let sites = {!! json_encode($commercial_sites) !!};
        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        $(document).on('DOMNodeInserted', function () {

            const tdf = $("select[name='tdf[]']");
            $.each(tdf, function (i) {
                console.log(tdf.get(i).value);
            });
            $.each(tdf, function (i) {
                const tdfInput = tdf.get(i);
                switch (tdfInput.value) {
                    case "oo_vb_extamuros_bitume_edit":
                        //tdf.eq(i).val("oo_vb_extamuros_bitume");
                        $("select[name='tdf[]'] option[value=oo_vb_extamuros_bitume]").eq(i).attr('selected', 'selected');
                        break;
                    case "oo_vb_extramuros_piste_edit":
                        $("select[name='tdf[]'] option[value=oo_vb_extramuros_piste]").eq(i).attr('selected', 'selected');
                        break;
                    case "oo_vl_extramuros_bitume_edit":
                        $("select[name='tdf[]'] option[value=oo_vl_extramuros_bitume]").eq(i).attr('selected', 'selected');
                        break;
                    case "oo_vl_extramuros_piste_edit":
                        $("select[name='tdf[]'] option[value=oo_vl_extramuros_piste]").eq(i).attr('selected', 'selected');
                        break;
                    case "oo_vb_intramuros_edit":
                        $("select[name='tdf[]'] option[value=oo_vb_intramuros]").eq(i).attr('selected', 'selected');
                        break;
                    case "oo_vl_intramuros_edit":
                        $("select[name='tdf[]'] option[value=oo_vl_intramuros]").eq(i).attr('selected', 'selected');
                        break;
                    case "oo_ass_appro_edit":
                        $("select[name='tdf[]'] option[value=oo_ass_appro]").eq(i).attr('selected', 'selected');
                        break;
                    case "oo_dnf":
                        $("select[name='tdf[]'] option[value=oo_dnf]").eq(i).attr('selected', 'selected');
                        break;
                    default:
                        //tdf.eq(i).val("");
                        //console.log("aucun tdf");
                        break;
                }
            });

            const caisse = $("select[name='caisse[]']");
            $.each(caisse, function (i) {
                const caisseInput = caisse.get(i);
                switch (caisseInput.value) {
                    case "oo_mad_edit":
                        caisse.eq(i).val("oo_mad");
                        break;
                    case "oo_collecte_edit":
                        caisse.eq(i).val("oo_collecte");
                        break;
                    case "oo_cctv_edit":
                        caisse.eq(i).val("oo_cctv");
                        break;
                    case "oo_collecte_caisse_edit":
                        caisse.eq(i).val("oo_collecte_caisse");
                        break;
                    case "_edit":
                        caisse.eq(i).val("");
                        break;
                    default:
                        //caisse.eq(i).val("");
                        break;
                }
            });

            // Activer les champs TDF et Caisse
            $("select[name='site[]']").on("change", siteChange);

            // Calculer count total à partir de TDF
            tdf.on("change", tdfChange);

            // Calculer count total à partir de Caisse
            caisse.on("change", caisseChange);

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
        });
    </script>
    <script>
        $(document).ready(function () {

        });
    </script>
    <script>
        $(document).ready(function () {
            let index = 0;
            $("#add").on("click", function () {
                index++;
                $("#data").append('<tr>\n' +
                    '                            <input type="hidden" name="site_id[]">\n' +
                    '                            <td>\n' +
                    '                                <select class="form-control" name="site[]" id="site">\n' +
                    '                                    <option></option>\n' +
                    '                                    @foreach ($commercial_sites as $site)\n' +
                    '                                        <option value="{{$site->id}}">{{$site->site}} | {{$site->clients->client_nom}}</option>\n' +
                    '                                    @endforeach\n' +
                    '                                </select>\n' +
                    '\n' +
                    '                            </td>\n' +
                    '                            <td>\n' +
                    '                                <select class="form-control" name="type[]">\n' +
                    '                                    <option>Enlèvement</option>\n' +
                    '                                    <option>Dépôt</option>\n' +
                    '                                    <option>Enlèvement + Dépôt</option>\n' +
                    '                                    <option>Enlèvement / R</option>\n' +
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
                    '                                    <option value="oo_ass_appro">Assistance appro DAB</option>\n' +
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
@endsection
