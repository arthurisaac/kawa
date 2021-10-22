@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Départ tournée</h2></div>
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

        <form method="post" action="{{ route('depart-tournee.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>N°Tournée:</label>
                        <input type="text" class="form-control" name="numeroTournee" value="{{$num}}" readonly
                               required/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" required/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Véhicule</label>
                        <select class="form-control" name="idVehicule" id="vehicule">
                            <option></option>
                            @foreach($vehicules as $vehicule)
                                <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Kilométrage départ</label>
                        <input type="number" class="form-control" name="kmDepart" id="kmDepart" min="0" required/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Chauffeur</label>
                        <select class="form-control" name="chauffeur" id="chauffeur">
                            <option></option>
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
                            <option></option>
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
                            <option></option>
                            @foreach($chefBords as $chef)
                                <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Coût tournée</label>
                        <input type="number" class="form-control" min="0" value="0" name="coutTournee"
                               id="coutTournee"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Heure départ</label>
                        <input type="time" class="form-control" name="heureDepart"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="centre">Centre Régional</label>
                        <select name="centre" id="centre" class="form-control" required>
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
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <br/>

            <button type="button" class="btn btn-sm btn-primary" id="add">+</button>
            <br>
            <br>
            <div >
                <table id="data" class="table table-sm table-bordered">
                    <thead>
                    <tr>
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
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
                                </select>

                            </td>
                            <td>
                                <select class="form-control" name="type[]">
                                    <option>Enlèvement</option>
                                    <option>Dépôt</option>
                                    <option>Enlèvement + Dépôt</option>
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
                                </select>
                            </td>
                            <td><input type="number" class="form-control" name="montant_tdf[]" disabled/></td>
                            <td>
                                <select class="form-control" name="caisse[]" disabled>
                                    <option></option>
                                    <option value="oo_mad">MAD</option>
                                    <option value="oo_collecte">Collecte</option>
                                    <option value="oo_cctv">CCTV</option>
                                    <option value="oo_collecte_caisse">Collecte Caisse</option>
                                </select>
                            </td>
                            <td><input type="number" class="form-control" name="montant_caisse[]" disabled/></td>
                            <td><a class="btn btn-danger btn-sm" onclick="supprimer(this)"></a></td>
                        </tr>
                    @endfor
                    </tbody>
                </table>

            </div>
            <br>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="/depart-tournee-liste" class="btn btn-info" style="margin-left: 20px">Fermer et ouvrir la liste</a>
        </form>
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
                    '                                        <option value="{{$site->id}}">{{$site->site}}</option>\n' +
                    '                                    @endforeach\n' +
                    '                                </select>\n' +
                    '                            </td>\n' +
                    '                            <td>\n' +
                    '                                <select class="form-control" name="type[]">\n' +
                    '                                    <option>Enlèvement</option>\n' +
                    '                                    <option>Dépôt</option>\n' +
                    '                                    <option>Enlèvement + Dépôt</option>\n' +
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

        function supprimer(e) {
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("data").deleteRow(indexLigne);
            siteChange();
            tdfChange();
        }

        /* $("#vehicule").on("change", function () {
             $("#chauffeur option").remove();
             const vehicule = vehicules.find(v => v.id === parseInt(this.value));
             if (vehicule) {
                 $('#chauffeur').append($('<option>', {
                     value: vehicule.chauffeur_titulaires.id,
                     text: vehicule.chauffeur_titulaires.nomPrenoms
                 }));
                 $('#chauffeur').append($('<option>', {
                     value: vehicule.chauffeur_suppleants.id,
                     text: vehicule.chauffeur_suppleants.nomPrenoms
                 }));
             }
         });*/

        /*$("select[name='type[]']").on("change", function () {
            cout = 0;
            let i = -1;
            $.each($("select[name='type[]']"), function () {
                i++;
                const type = $("select[name='type[]']").get(i);
                const site = $("select[name='site[]']").get(i);
                if (type.value && site.value) {

                    const site1 = sites.find(s => s.id === parseInt(site.value));
                    if (site1) {
                        const prix = site1[type.value];
                        console.log(prix);
                        if (!isNaN(prix)) cout += parseInt(prix);
                        $("#coutTournee").val(cout);
                    }
                }

            });
        });*/

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
    </script>
@endsection
