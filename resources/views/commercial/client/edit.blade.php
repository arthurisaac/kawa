@extends('bases.commercial')

@section('main')
    @extends('bases.toolbar', ["title" => "Commercial", "subTitle" => "Client"])
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
    <div class="burval-container">
        <div><h2 class="heading">Client</h2></div>
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

        <form method="post" action="{{ route('commercial-client.update', $client->id) }}">
        @method('PATCH')
        @csrf

            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="info-c-tab" data-toggle="tab" href="#info-c" role="tab"
                       aria-controls="info" aria-selected="true">Information générale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-c" role="tab"
                       aria-controls="contact-c" aria-selected="false">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contrat-tab" data-toggle="tab" href="#contrat-c" role="tab"
                       aria-controls="contrat-c" aria-selected="false">Contrat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-c-tab" data-toggle="tab" href="#base-c" role="tab"
                       aria-controls="base" aria-selected="false">Base tarifaire</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="info-c" role="tabpanel" aria-labelledby="info-c-tab">
                    <div class="container">
                        <br>
                        <!-- INFORMATIONS GENERALE -->
                        <p>INFORMATIONS GENERALES</p>
                        <hr class="title-separator"/>
                        <br/>

                        <input type="hidden" name="id_client" id="id_client"/>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="client_nom" class="col-sm-5">Nom du client</label>
                                    <input type="text" name="client_nom" id="client_nom" class="form-control col-sm-7" required/>
                                    <div>
                                        <ul id="list-clients"></ul>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_situation_geographique" class="col-sm-5">Situation géographique</label>
                                    <input type="text" name="client_situation_geographique" id="client_situation_geographique"
                                           class="form-control col-sm-7"/>
                                </div>
                                <div class="form-group row">
                                    <label for="client_tel" class="col-sm-5">TEL/FAX</label>
                                    <input type="text" name="client_tel" id="client_tel" class="form-control col-sm-7"/>
                                </div>
                                <div class="form-group row">
                                    <label for="client_regime" class="col-sm-5">Régime impot</label>
                                    <input type="text" name="client_regime_impot" id="client_regime_impot"
                                           class="form-control col-sm-7"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="client_boite_postale" class="col-sm-5">Boîte postale</label>
                                    <input type="text" name="client_boite_postale" id="client_boite_postale"
                                           class="form-control col-sm-7"/>
                                </div>
                                <div class="form-group row">
                                    <label for="client_ville" class="col-sm-5">Ville</label>
                                    <input type="text" name="client_ville" id="client_ville" class="form-control col-sm-7"/>
                                </div>
                                <div class="form-group row">
                                    <label for="client_rc" class="col-sm-5">RC</label>
                                    <input type="text" name="client_rc" id="client_rc" class="form-control col-sm-7"/>
                                </div>
                                <div class="form-group row">
                                    <label for="client_ncc" class="col-sm-5">NCC</label>
                                    <input type="text" name="client_ncc" id="client_ncc" class="form-control col-sm-7"/>
                                </div>
                                <div class="form-group row">
                                    <label for="client_secteur_activite" class="col-sm-5">Secteur d'activité</label>
                                    <select name="client_secteur_activite" id="client_secteur_activite" class="form-control col-sm-7">
                                        <option>{{$client->client_secteur_activite}}</option>
                                        @foreach ($secteur_activites as $secteur_activite)
                                            <option>{{ $secteur_activite->option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="centre" class="col-sm-5">Centre Régional</label>
                                    <select name="centre" id="centre" class="form-control col" required>
                                        <option>{{$client->centre}}</option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="centre_regional" class="col-sm-5">Centre</label>
                                    <select id="centre_regional" name="centre_regional" class="form-control col" required>
                                        <option>{{$client->centre_regional}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                {{--<div>
                                    <button class="btn btn-primary btn-sm button" type="submit">Valider</button>
                                </div>
                                <br/>
                                <div>
                                    <button class="btn btn-danger btn-sm button" type="reset">Annuler</button>
                                </div>--}}
                                <br/>
                                <br/>
                                <div>
                                    <a href="javascript:popupwnd('commercial-site','no','no','no','no','no','no','','','1200','600')"
                                       target="_self" class="btn btn-sm btn-outline-info" type="button" style="min-width: 150px">Site</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-c" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="container">
                    <!-- CONTACT -->
                    <br/>
                    <p>CONTACT</p>
                    <hr class="title-separator"/>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="contact_nom" class="col-sm-5">Nom contact</label>
                                <input type="text" name="contact_nom" id="contact_nom" class="form-control col-sm-7">
                            </div>
                            <div class="form-group row">
                                <label for="contact_email" class="col-sm-5">Email</label>
                                <input type="email" name="contact_email" id="contact_email" class="form-control col-sm-7">
                            </div>
                            <div class="form-group row">
                                <label for="contact_portefeuille" class="col-sm-5">Porte feuille client</label>
                                <input type="text" name="contact_portefeuille" id="contact_portefeuille"
                                       class="form-control col-sm-7">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="contact_fonction" class="col-sm-5">Fonction</label>
                                <input type="text" name="contact_fonction" id="contact_fonction" class="form-control col-sm-7">
                            </div>
                            <div class="form-group row">
                                <label for="contact_portable" class="col-sm-5">Tel portable</label>
                                <input type="tel" name="contact_portable" id="contact_portable" class="form-control col-sm-7">
                            </div>
                            <div class="form-group row">
                                <label for="contact_secteur_activite" class="col-sm-5">Secteur d'activité</label>
                                <input type="text" name="contact_secteur_activite" id="contact_secteur_activite"
                                       class="form-control col-sm-7">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contrat-c" role="tabpanel" aria-labelledby="contrat-tab">
                    <div class="container">
                    <!-- CONTRAT -->
                    <br/>
                    <p>CONTRAT</p>
                    <hr class="title-separator"/>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="contrat_numero" class="col-sm-5">N° Contrat</label>
                                <input type="text" name="contrat_numero" id="contrat_numero" class="form-control col-sm-7">
                            </div>
                            <div class="form-group row">
                                <label for="contrat_date_effet" class="col-sm-5">Date effet</label>
                                <input type="date" name="contrat_date_effet" id="contrat_date_effet" class="form-control col-sm-7">
                            </div>
                            <div class="form-group row">
                                <label for="contrat_duree" class="col-sm-5">Durée</label>
                                <input type="number" name="contrat_duree" id="contrat_duree" class="form-control col-sm-7">
                            </div>
                        </div>
                        <div class="col">
                            <div>Objet</div>
                            <div class="two-columns" style="justify-content: start;">
                                <div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_tdf_vb" name="contrat_objet[]" value="TDF VB">
                                        <label for="cb_tdf_vb">TDF VB</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_tdf_vl" name="contrat_objet[]" value="TDF VL">
                                        <label for="cb_tdf_vl">TDF VL</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_tdf_mad" name="contrat_objet[]" value="MAD CAISSE">
                                        <label for="cb_tdf_mad">MAD CAISSE</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_collecte" name="contrat_objet[]" value="Collecte">
                                        <label for="cb_collecte">Collecte</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_garde_de_fond" name="contrat_objet[]"
                                               value="Garde de fonds">
                                        <label for="cb_garde_de_fond">Garde de fonds</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_comptage_tri" name="contrat_objet[]"
                                               value="Comptage + tri">
                                        <label for="cb_comptage_tri">Comptage + tri</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_gestion_atm" name="contrat_objet[]" value="Gestion ATM">
                                        <label for="cb_gestion_atm">Gestion ATM</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_maintenance" name="contrat_objet[]"
                                               value="Maintenance ATM">
                                        <label for="cb_maintenance">Maintenance ATM</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="Checkbox2" name="contrat_objet[]" value="Consommable ATM">
                                        <label for="Checkbox2">Consommable ATM</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_petit_materiel" name="contrat_objet[]"
                                               value="Petit matériel">
                                        <label for="cb_petit_materiel">Petit matériel</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div>Desserte</div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_dess_banque_cantrale" name="contrat_desserte[]"
                                       value="Banque centrale">
                                <label for="cb_dess_banque_cantrale">Banque centrale</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_dess_agence_principale" name="contrat_desserte[]"
                                       value="Agence principale">
                                <label for="cb_dess_agence_principale">Agence principale</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_dess_agence_secondaire" name="contrat_desserte[]"
                                       value="Agence secondaire">
                                <label for="cb_dess_agence_secondaire">Agence secondaire</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_dess_cash_pointe" name="contrat_desserte[]" value="Cash pointe">
                                <label for="cb_dess_cash_pointe">Cash pointe</label>
                            </div>
                        </div>
                        <div class="col">
                            <div>Fréquence Op:</div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_fo_permanent" name="contrat_frequence_op[]" value="Permanent">
                                <label for="cb_fo_permanent">Permanent</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_fo_permanent" name="contrat_frequence_op[]" value="Appel">
                                <label for="cb_fo_permanent">Appel</label>
                            </div>
                            <br/>

                            <div>Régime</div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_intra_muros" name="contrat_regime[]" value="Intra muros">
                                <label for="cb_intra_muros">Intra muros</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_intra_muros" name="contrat_regime[]" value="Extra muros">
                                <label for="cb_extra_muros">Extra muros</label>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="base-c" role="tabpanel" aria-labelledby="base-c-tab">
                    <div class="container">
                        <!-- BASE TARIFAIRE -->
                        <br/>
                        <p>BASE TARIFAIRE</p>
                        <hr class="title-separator"/>
                        <div class="row">
                            <div class="col">
                                <h6>Petit matériel</h6>
                                <div>
                                    <label>Petit matériel :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="extra grand" name="base_petit_materiel_securipack" id="base_petit_materiel_securipack">
                                        <label class="form-check-label" for="base_petit_materiel_securipack">
                                            Extra grand
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="grand" name="base_petit_materiel_securipack" id="flexCheckDefault">
                                        <label class="form-check-label">
                                            Grand
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="moyen" name="base_petit_materiel_securipack" id="flexCheckDefault">
                                        <label class="form-check-label">
                                            Moyen
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="petit" name="base_petit_materiel_securipack" id="flexCheckDefault">
                                        <label class="form-check-label">
                                            Petit
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label>Sac jute :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="extra grand" name="base_petit_materiel_sacjute" id="base_petit_materiel_sac_jute">
                                        <label class="form-check-label" for="base_petit_materiel_sacjute">
                                            Extra grand
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="grand" name="base_petit_materiel_sacjute" id="base_petit_materiel_sac_jute">
                                        <label class="form-check-label" for="base_petit_materiel_sac_jute">
                                            Grand
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="moyen" name="base_petit_materiel_sacjute" id="flexCheckDefault">
                                        <label class="form-check-label" for="base_petit_materiel_sac_jute">
                                            Moyen
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="petit" name="base_petit_materiel_sacjute" id="flexCheckDefault">
                                        <label class="form-check-label" for="base_petit_materiel_sac_jute">
                                            Petit
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label>Scellé :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="scelle" id="base_petit_materiel_scelle" name="base_petit_materiel_scelle">
                                        <label class="form-check-label" for="base_petit_materiel_scelle">
                                            Scellé
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">Garde de fond / montant forfaitaire</label>
                                            <input type="number" min="0"
                                                   name="base_garde_de_fonds_montant_forfaitaire" value="{{$client->base_garde_de_fonds_montant_forfaitaire}}" class="form-control col-sm-6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                {{--<div class="two-columns two-columns-center">
                                    <div>
                                        <p>Comptage + tri</p>
                                    </div>
                                    <div class="vertical_separator" style="height: 4rem"></div>
                                    <div>
                                        <div class="form-group">
                                            <label for="bt_comptage_cout_unitaire">Coût unitaire</label>
                                            <input type="number" min="0" name="base_comptage_tri_cout_unitaire"
                                                   id="bt_comptage_cout_unitaire"
                                                   class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="bt_comptage_montant_ctv">Montant CTV</label>
                                            <input type="number" min="0" name="base_comptage_tri_montant_ctv"
                                                   id="bt_comptage_montant_ctv"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                </div>--}}

                                <div class="form-group row">
                                    <label for="bt_comptage_montant_forfaitaire" class="col-sm-5">Comptage + tri / montant forfaitaire</label>
                                    <input type="text" name="base_comptage_montant_forfaitaire" value="{{$client->base_comptage_montant_forfaitaire}}" id="bt_comptage_montant_forfaitaire" class="form-control col-sm-7">
                                </div>
                                <br/>
                                <h6>ATM</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="gestion" name="bt_atm" id="bt_atm">
                                    <label class="form-check-label" for="bt_atm">
                                        Gestion
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="maintenance" name="bt_atm" id="bt_atm">
                                    <label class="form-check-label" for="bt_atm">
                                        Maintenance
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="consommable" name="bt_atm" id="bt_atm">
                                    <label class="form-check-label" for="bt_atm">
                                        Consommable
                                    </label>
                                </div>
                            {{--<div class="form-group row">
                                <label for="bt_gestion_atm" class="col-sm-5">Gestion ATM</label>
                                <input type="text" name="base_gestion_atm" id="bt_gestion_atm" class="form-control col-sm-7">
                            </div>
                            <div class="form-group row">
                                <label for="bt_maintenance_atm" class="col-sm-5">Maintenance ATM</label>
                                <input type="text" name="base_maintenance_atm" id="bt_maintenance_atm" class="form-control col-sm-7">
                            </div>
                            <div class="form-group row">
                                <label for="bt_consommable_atm" class="col-sm-5">Consommable ATM</label>
                                <input type="text" name="base_consommable_atm" id="bt_consommable_atm" class="form-control col-sm-7">
                            </div>--}}
                            <!--<input type="hidden" name="id_client"id="id_client">-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div>
                <button class="btn btn-primary btn-sm button" type="submit">Valider</button>
            </div>
        </form>
    </div>
    <script>
        let client =  {!! json_encode($client) !!};
        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

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

            const contrat_objet = client.contrat_objet + "";
            const contrat_objet_array = contrat_objet.split(',');
            const contrat_desserte = client.contrat_desserte + "";
            const contrat_desserte_array = contrat_desserte.split(',');
            const contrat_frequence_op = client.contrat_frequence_op + "";
            const contrat_frequence_op_array = contrat_frequence_op.split(',');
            const contrat_regime = client.contrat_regime + "";
            const contrat_regime_array = contrat_regime.split(',');

            $("input[name='contrat_objet[]']").map(function () {
                const value = $(this).val();
                if (contrat_objet_array.includes(value)) $(this).prop("checked", true);
            });
            $("input[name='contrat_desserte[]']").map(function () {
                const value = $(this).val();
                if (contrat_desserte_array.includes(value)) $(this).prop("checked", true);
            });
            $("input[name='contrat_frequence_op[]']").map(function () {
                const value = $(this).val();
                if (contrat_frequence_op_array.includes(value)) $(this).prop("checked", true);
            });
            $("input[name='contrat_regime[]']").map(function () {
                const value = $(this).val();
                if (contrat_regime_array.includes(value)) $(this).prop("checked", true);
            });

            $("#id_client").val(client.id);
            $("#client_nom").val(client.client_nom);
            $("#client_situation_geographique").val(client.client_situation_geographique);
            $("#client_tel").val(client.client_tel);
            $("#client_regime_impot").val(client.client_regime_impot);
            $("#client_boite_postale").val(client.client_boite_postale);
            $("#client_ville").val(client.client_ville);
            $("#client_rc").val(client.client_rc);
            $("#client_ncc").val(client.client_ncc);
            $("#contact_nom").val(client.contact_nom);
            $("#contact_email").val(client.contact_email);
            $("#contact_portefeuille").val(client.contact_portefeuille);
            $("#contact_fonction").val(client.contact_fonction);
            $("#contact_portable").val(client.contact_portable);
            $("#contact_secteur_activite").val(client.contact_secteur_activite);
            $("#contrat_numero").val(client.contrat_numero);
            $("#contrat_date_effet").val(client.contrat_date_effet);
            $("#contrat_duree").val(client.contrat_duree);
            $("#bt_tdf_vb").val(client.base_tdf_vb);
            $("#bt_tdf_vl").val(client.base_tdf_vl);
            $("#bt_mad_caisse").val(client.base_mad_caisse);
            $("#bt_collecte").val(client.base_collecte);
            $("#bt_petit_materiel_securipack").val(client.base_petit_materiel_securipack);
            $("#bt_petit_materiel_sacjute").val(client.base_petit_materiel_sacjute);
            $("#bt_petit_materiel_scelle").val(client.base_petit_materiel_scelle);
            $("#bt_garde_fonds_cout_unitaire").val(client.base_garde_de_fonds_cout_unitaire);
            $("#bt_garde_fonds_montant_garde_cu").val(client.base_garde_de_fonds_montant_garde_cu);
            $("#bt_garde_fonds_cout_forfaitaire").val(client.base_garde_de_fonds_cout_forfetaire);
            $("#bt_garde_fonds_montant_garde_cf").val(client.base_garde_de_fonds_montant_garde_cf);
            $("#bt_comptage_cout_unitaire").val(client.base_comptage_tri_cout_unitaire);
            $("#bt_comptage_montant_ctv").val(client.base_comptage_tri_montant_ctv);
            $("#bt_gestion_atm").val(client.base_gestion_atm);
            $("#bt_maintenance_atm").val(client.base_maintenance_atm);
            $("#bt_consommable_atm").val(client.base_consommable_atm);

            $("input[name='base_petit_materiel_sacjute']").map(function () {
                const value = $(this).val();
                if (client.base_petit_materiel_sacjute === value) $(this).prop("checked", true);
            });

            $("input[name='base_petit_materiel_securipack']").map(function () {
                const value = $(this).val();
                if (client.base_petit_materiel_securipack === value) $(this).prop("checked", true);
            });

            $("input[name='base_petit_materiel_scelle']").map(function () {
                const value = $(this).val();
                if (client.base_petit_materiel_scelle === value) $(this).prop("checked", true);
            });

            $("input[name='bt_atm']").map(function () {
                const value = $(this).val();
                if (client.bt_atm === value) $(this).prop("checked", true);
            });
        });

    </script>
@endsection
