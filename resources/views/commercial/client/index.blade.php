{{--@extends('base')--}}

{{--@section('main')--}}
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
    <br/>contrat_objet
    @endif

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('commercial-client.store') }}">
        @csrf
        <!-- INFORMATIONS GENERALE -->
        <p>INFORMATIONS GENERALES</p>
        <hr class="title-separator"/>
        <br/>

        <input type="hidden" name="id_client" id="id_client"/>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="client_nom" class="col-sm-5">Nom du client</label>
                    <input type="text" name="client_nom" id="client_nom" class="editbox col-sm-7" required/>
                    <div>
                        <ul id="list-clients"></ul>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="client_situation_geographique" class="col-sm-5">Situation géographique</label>
                    <input type="text" name="client_situation_geographique" id="client_situation_geographique"
                           class="editbox col-sm-7"/>
                </div>
                <div class="form-group row">
                    <label for="client_tel" class="col-sm-5">TEL/FAX</label>
                    <input type="text" name="client_tel" id="client_tel" class="editbox col-sm-7"/>
                </div>
                <div class="form-group row">
                    <label for="client_regime" class="col-sm-5">Régime impot</label>
                    <input type="text" name="client_regime_impot" id="client_regime_impot" class="editbox col-sm-7"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label for="client_boite_postale" class="col-sm-5">Boîte postale</label>
                    <input type="text" name="client_boite_postale" id="client_boite_postale" class="editbox col-sm-7"/>
                </div>
                <div class="form-group row">
                    <label for="client_ville" class="col-sm-5">Ville</label>
                    <input type="text" name="client_ville" id="client_ville" class="editbox col-sm-7"/>
                </div>
                <div class="form-group row">
                    <label for="client_rc" class="col-sm-5">RC</label>
                    <input type="text" name="client_rc" id="client_rc" class="editbox col-sm-7"/>
                </div>
                <div class="form-group row">
                    <label for="client_ncc" class="col-sm-5">NCC</label>
                    <input type="text" name="client_ncc" id="client_ncc" class="editbox col-sm-7"/>
                </div>
            </div>
            <div class="col">
                <div>
                    <button class="btn btn-primary button" type="submit">Valider</button>
                </div>
                <br/>
                <div>
                    <button class="btn btn-danger button" type="reset">Annuler</button>
                </div>
                <br/>
                <br/>
                <div>
                    <a href="javascript:popupwnd('commercial-site','no','no','no','no','no','no','','','1200','600')"
                       target="_self" class="btn btn-primary" type="button" style="min-width: 150px">Site</a>
                </div>
            </div>
        </div>

        <!-- CONTACT -->
        <br/>
        <p>CONTACT</p>
        <hr class="title-separator"/>
        <br/>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="contact_nom" class="col-sm-5">Nom contact</label>
                    <input type="text" name="contact_nom" id="contact_nom" class="editbox col-sm-7">
                </div>
                <div class="form-group row">
                    <label for="contact_email" class="col-sm-5">Email</label>
                    <input type="email" name="contact_email" id="contact_email" class="editbox col-sm-7">
                </div>
                <div class="form-group row">
                    <label for="contact_portefeuille" class="col-sm-5">Porte feuille client</label>
                    <input type="text" name="contact_portefeuille" id="contact_portefeuille" class="editbox col-sm-7">
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label for="contact_fonction" class="col-sm-5">Fonction</label>
                    <input type="text" name="contact_fonction" id="contact_fonction" class="editbox col-sm-7">
                </div>
                <div class="form-group row">
                    <label for="contact_portable" class="col-sm-5">Tel portable</label>
                    <input type="tel" name="contact_portable" id="contact_portable" class="editbox col-sm-7">
                </div>
                <div class="form-group row">
                    <label for="contact_secteur_activite" class="col-sm-5">Secteur d'activité</label>
                    <input type="text" name="contact_secteur_activite" id="contact_secteur_activite"
                           class="editbox col-sm-7">
                </div>
            </div>
            <div class="col"></div>
        </div>

        <!-- CONTRAT -->
        <br/>
        <p>CONTRAT</p>
        <hr class="title-separator"/>
        <br/>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="contrat_numero" class="col-sm-5">N° Contrat</label>
                    <input type="text" name="contrat_numero" id="contrat_numero" class="editbox col-sm-7">
                </div>
                <div class="form-group row">
                    <label for="contrat_date_effet" class="col-sm-5">Date effet</label>
                    <input type="date" name="contrat_date_effet" id="contrat_date_effet" class="editbox col-sm-7">
                </div>
                <div class="form-group row">
                    <label for="contrat_duree" class="col-sm-5">Durée</label>
                    <input type="number" name="contrat_duree" id="contrat_duree" class="editbox col-sm-7">
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
                            <input type="checkbox" id="cb_garde_de_fond" name="contrat_objet[]" value="Garde de fonds">
                            <label for="cb_garde_de_fond">Garde de fonds</label>
                        </div>
                    </div>
                    <div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_comptage_tri" name="contrat_objet[]" value="Comptage + tri">
                            <label for="cb_comptage_tri">Comptage + tri</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_gestion_atm" name="contrat_objet[]" value="Gestion ATM">
                            <label for="cb_gestion_atm">Gestion ATM</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_maintenance" name="contrat_objet[]" value="Maintenance ATM">
                            <label for="cb_maintenance">Maintenance ATM</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="Checkbox2" name="contrat_objet[]" value="Consommable ATM">
                            <label for="Checkbox2">Consommable ATM</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_petit_materiel" name="contrat_objet[]" value="Petit matériel">
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

        <!-- BASE TARIFAIRE -->
        <br/>
        <p>BASE TARIFAIRE</p>
        <hr class="title-separator"/>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="bt_tdf_vb" class="col-sm-3">TDF VB</label>
                    <select name="base_tdf_vb" id="bt_tdf_vb" class="Combobox col-sm-9">
                        <option value="km bitume">km bitume</option>
                        <option value="km piste">km piste</option>
                        <option value="intra muros">intra muros</option>
                        <option value="banque centrale">banque centrale</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="bt_tdf_vl" class="col-sm-3">TDF VL</label>
                    <select name="base_tdf_vl" id="bt_tdf_vl" class="Combobox col-sm-9">
                        <option value="km bitume">km bitume</option>
                        <option value="km piste">km piste</option>
                        <option value="intra muros">intra muros</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="bt_mad_caisse" class="col-sm-3">MAD CAISSE</label>
                    <input type="text" id="bt_mad_caisse" name="base_mad_caisse" class="editbox col-sm-9"/>
                </div>
                <div class="form-group row">
                    <label for="bt_collecte" class="col-sm-3">Collecte</label>
                    <input type="text" id="bt_collecte" name="base_collecte" class="editbox col-sm-9"/>
                </div>
            </div>
            <div class="col">
                <div class="two-columns two-columns-center">
                    <div>
                        <p>Petit matériel</p>
                    </div>
                    <div class="vertical_separator" style="height: 6rem"></div>
                    <div>
                        <div class="form-group row">
                            <label for="bt_petit_materiel_securipack" class="col-sm-5">Sécuripack</label>
                            <select name="base_petit_materiel_securipack" id="bt_petit_materiel_securipack"
                                    class="Combobox col-sm-7">
                                <option value="extra grand">Extra grand</option>
                                <option>Grand</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Petit">Petit</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="bt_petit_materiel_sacjute" class="col-sm-5">Sac jute</label>
                            <select name="base_petit_materiel_sacjute" id="bt_petit_materiel_sacjute"
                                    class="Combobox col-sm-7">
                                <option value="extra grand">Extra grand</option>
                                <option>Grand</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Petit">Petit</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="bt_petit_materiel_scelle" class="col-sm-5">Scellé</label>
                            <input type="text" name="base_petit_materiel_scelle" id="bt_petit_materiel_scelle"
                                   class="editbox col-sm-7">
                        </div>
                    </div>
                </div>
                <br/>
                <div class="two-columns two-columns-center">
                    <div>
                        <p>Garde de fonds</p>
                    </div>
                    <div class="vertical_separator" style="height: 10rem"></div>
                    <div>
                        <div class="form-group row">
                            <label for="bt_garde_fonds_cout_unitaire" class="col-sm-6">Cout unitaire</label>
                            <input type="number" min="0" id="bt_garde_fonds_cout_unitaire"
                                   name="base_garde_de_fonds_cout_unitaire" class="editbox col-sm-6">
                        </div>
                        <div class="form-group row">
                            <label for="bt_garde_fonds_montant_garde_cu" class="col-sm-6">Montant gardé</label>
                            <input type="number" min="0" id="bt_garde_fonds_montant_garde_cu"
                                   name="base_garde_de_fonds_montant_garde_cu" class="editbox col-sm-6">
                        </div>
                        <hr/>
                        <div>
                            <div class="form-group row">
                                <label for="bt_garde_fonds_cout_forfaitaire" class="col-sm-6">Cout forfaitaire</label>
                                <input type="text" min="0" id="bt_garde_fonds_cout_forfaitaire"
                                       name="base_garde_de_fonds_cout_forfetaire" class="editbox col-sm-6">
                            </div>
                            <div class="form-group row">
                                <label for="bt_garde_fonds_montant_garde_cf" class="col-sm-6">Montant gardé</label>
                                <input type="number" min="0" id="bt_garde_fonds_montant_garde_cf"
                                       name="base_garde_de_fonds_montant_garde_cf" class="editbox col-sm-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="two-columns two-columns-center">
                    <div>
                        <p>Comptage + tri</p>
                    </div>
                    <div class="vertical_separator" style="height: 4rem"></div>
                    <div>
                        <div class="form-group">
                            <label for="bt_comptage_cout_unitaire">Coût unitaire</label>
                            <input type="number" min="0" name="base_comptage_tri_cout_unitaire" id="bt_comptage_cout_unitaire"
                                   class="editbox"/>
                        </div>
                        <div class="form-group">
                            <label for="bt_comptage_montant_ctv">Montant CTV</label>
                            <input type="number" min="0" name="base_comptage_tri_montant_ctv" id="bt_comptage_montant_ctv"
                                   class="editbox"/>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="form-group row">
                    <label for="bt_gestion_atm" class="col-sm-5">Gestion ATM</label>
                    <input type="text" name="base_gestion_atm" id="bt_gestion_atm" class="editbox col-sm-7">
                </div>
                <div class="form-group row">
                    <label for="bt_maintenance_atm" class="col-sm-5">Maintenance ATM</label>
                    <input type="text" name="base_maintenance_atm" id="bt_maintenance_atm" class="editbox col-sm-7">
                </div>
                <div class="form-group row">
                    <label for="bt_consommable_atm" class="col-sm-5">Consommable ATM</label>
                    <input type="text" name="base_consommable_atm" id="bt_consommable_atm" class="editbox col-sm-7">
                </div>
                <!--<input type="hidden" name="id_client"id="id_client">-->
            </div>
        </div>

    </form>
</div>
<script>
    let clients =  {!! json_encode($clients) !!};
    // console.log(clients);

    $(document).ready( function () {
        $("input[name='client_nom']").on("keyup", function () {
            const current_word = this.value;
            clearData();
            for (let i = 0; i < clients.length; i++) {
                if (clients[i].client_nom === current_word) populateData(clients[i]);
            }
        });
    });

    function populateData(client) {
        const contrat_objet = client.contrat_objet + "";
        const contrat_objet_array = contrat_objet.split(',');
        const contrat_desserte = client.contrat_desserte + "";
        const contrat_desserte_array = contrat_desserte.split(',');
        const contrat_frequence_op = client.contrat_frequence_op + "";
        const contrat_frequence_op_array = contrat_frequence_op.split(',');
        const contrat_regime = client.contrat_regime + "";
        const contrat_regime_array = contrat_regime.split(',');

        $("input[name='contrat_objet[]']").map( function(){
            const value =  $(this).val();
            if (contrat_objet_array.includes(value)) $(this).prop("checked", true);
        });
        $("input[name='contrat_desserte[]']").map( function(){
            const value =  $(this).val();
            if (contrat_desserte_array.includes(value)) $(this).prop("checked", true);
        });
        $("input[name='contrat_frequence_op[]']").map( function(){
            const value =  $(this).val();
            if (contrat_frequence_op_array.includes(value)) $(this).prop("checked", true);
        });
        $("input[name='contrat_regime[]']").map( function(){
            const value =  $(this).val();
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
        // $("#contrat_objet").val(contrat_objet_array);
        // $("#contrat_desserte").val(client.contrat_desserte);
        // $("#contrat_frequence_op").val(client.contrat_frequence_op);
        // $("#contrat_regime").val(client.contrat_regime);
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
    }
    function clearData() {
        $("input[name='contrat_objet[]']").map( function(){
            $(this).prop("checked", false);
        });
        $("input[name='contrat_desserte[]']").map( function(){
            $(this).prop("checked", false);
        });
        $("input[name='contrat_frequence_op[]']").map( function(){
            $(this).prop("checked", false);
        });
        $("input[name='contrat_regime[]']").map( function(){
            $(this).prop("checked", false);
        });

        $("#id_client").val("");
        $("#client_situation_geographique").val("");
        $("#client_tel").val("");
        $("#client_regime").val("");
        $("#client_boite_postale").val("");
        $("#client_ville").val("");
        $("#client_rc").val("");
        $("#client_ncc").val("");
        $("#contact_nom").val("");
        $("#contact_email").val("");
        $("#contact_portefeuille").val("");
        $("#contact_fonction").val("");
        $("#contact_portable").val("");
        $("#contact_secteur_activite").val("");
        $("#contrat_numero").val("");
        $("#contrat_date_effet").val("");
        $("#contrat_duree").val("");
        $("#contrat_objet").val("");
        $("#contrat_desserte").val("");
        $("#contrat_frequence_op").val("");
        $("#contrat_regime").val("");
        $("#bt_tdf_vb").val("");
        $("#bt_tdf_vl").val("");
        $("#bt_mad_caisse").val("");
        $("#bt_collecte").val("");
        $("#bt_petit_materiel_securipack").val("");
        $("#bt_petit_materiel_sacjute").val("");
        $("#bt_petit_materiel_scelle").val("");
        $("#bt_garde_fonds_cout_unitaire").val("");
        $("#bt_garde_fonds_montant_garde_cu").val("");
        $("#bt_garde_fonds_cout_forfaitaire").val("");
        $("#bt_garde_fonds_montant_garde_cf").val("");
        $("#bt_comptage_cout_unitaire").val("");
        $("#bt_comptage_montant_ctv").val("");
        $("#bt_gestion_atm").val("");
        $("#bt_maintenance_atm").val("");
        $("#bt_consommable_atm").val("");
    }
</script>
