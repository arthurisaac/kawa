@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Site</h2></div>
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

        <form method="post" action="{{ route('commercial-site.store') }}">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="client" class="col-sm-5">Client</label>
                        <select name="client" id="client" class="Combobox col-sm-7" required>
                            <option></option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}"> {{$client->client_nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="site" class="col-sm-5">Site</label>
                        <input id="site" type="text" name="site" class="editbox col-sm-7" required/>
                    </div>
                    <div class="form-group row">
                        <label for="nom_contact" class="col-sm-5">Nom contact du site</label>
                        <input id="nom_contact" type="text" name="nom_contact_site" class="editbox col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label for="fonction_contact" class="col-sm-5">Fonction du contact</label>
                        <input id="fonction_contact" type="text" name="fonction_contact" class="editbox col-sm-7"/>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-sm-5">Centre</label>
                        <select name="centre" id="centre" class="form-control col-sm-7" required>
                            <option>Choisir centre</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="centre_regional" class="col-sm-5">Centre régional</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col-sm-7" required>
                            <option>Choisir centre régional</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="telephone" class="col-sm-5">Telephone</label>
                        <input type="tel" id="telephone" name="telephone" class="editbox col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label for="numero_de_carte" class="col-sm-5">Numéro de carte</label>
                        <input id="numero_de_carte" name="no_carte" type="text" class="editbox col-sm-7"/>
                    </div>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary button">Valider</button>
                    <br/>
                    <br/>
                    <button type="reset" class="btn btn-danger button">Annuler</button>
                </div>

            </div>

            <br/>
            <br/>
            <div class="row">
                <div class="col-10">
                    <div>Objet-opération</div>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <h6>Transport</h6>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">VB extramuros bitume</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_vb_extamuros_bitume"
                                       id="oo_tdf_vb">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">VB extramuros piste</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_vb_extramuros_piste"
                                       id="oo_tdf_vl">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">VL extramuros bitume</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_vl_extramuros_bitume"
                                       id="oo_tdf_vl">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">VB (INTRAMUROS)</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_vb_intramuros"
                                       id="oo_tdf_vl">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">VL (INTRAMUROS)</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_vl_intramuros"
                                       id="oo_tdf_vl">
                            </div>
                        </div>
                        <div class="col">
                            <h6>CAISSIERES</h6>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">MAD</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_mad">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Collecte</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                       name="oo_collecte">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">CCTV</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                       name="oo_cctv">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Collecte caisse</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                       name="oo_collecte_caisse">
                            </div>
                        </div>
                        <div class="col">
                            <h6>ATM</h6>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Borne chèque</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_borne_cheque">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Borne des opérations</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_borne_operation">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Gestion des GAB</label>
                                <select class="col-sm-6 form-control form-control-sm" name="oo_gestion_gab_niveau" style="margin-bottom: 10px;">
                                    <option>Niveau I</option>
                                    <option>Niveau II</option>
                                    <option>Appov</option>
                                </select>
                                <input type="number" class="offset-6 col-sm-6 form-control form-control-sm" name="oo_gestion_gab_prix"
                                        placeholder="Prix" min="0">
                            </div>

                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Maintenance N2\N3</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_maintenance_n2"
                                       id="oo_garde_fond">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Vente\location ATM</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_vente_location"
                                       id="oo_garde_fond">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Vente consommables</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_vente_consommables"
                                       id="oo_garde_fond">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Vente pièces détachées</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_vente_pieces_detachees"
                                       id="oo_garde_fond">
                            </div>
                        </div>
                        <div class="col">
                            <h6>PETIT MATERIEL</h6>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Sécuripacks</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_securipack"
                                       id="oo_garde_fond">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Sac jute</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_sac_juste"
                                       id="oo_garde_fond">
                            </div>
                            <div class="form-group row">
                                <label for="cb_tdf_vb" class="col-sm-6">Scellé</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_scelle"
                                       id="oo_garde_fond">
                            </div>
                        </div>
                        {{--<div class="col">
                            <h6>Opération dabiste</h6>
                            <div class="form-group row">
                                <label class="col-sm-6">Gestion ATM</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_gestion_atm" id="oo_gestion_atm">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Maintenance ATM</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_maintenance_atm" id="oo_maintenance_atm">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Consommable ATM</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_consommable_atm" id="oo_consommable_atm">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Petit matériel</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_petit_materiel" id="oo_petit_materiel">
                            </div>
                            --}}{{--<div class="checkbox">
                                <input type="checkbox" id="cb_gestion_atm" name="objet_operation[]" value="Gestion ATM">
                                <label for="cb_gestion_atm">Gestion ATM</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_maintenance" name="objet_operation[]" value="Maintenance ATM">
                                <label for="cb_maintenance">Maintenance ATM</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="Checkbox2" name="objet_operation[]" value="Consommable ATM">
                                <label for="Checkbox2">Consommable ATM</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="cb_petit_materiel" name="objet_operation[]"
                                       value="Petit matériel">
                                <label for="cb_petit_materiel">Petit matériel</label>
                            </div>--}}{{--
                        </div>--}}
                    </div>
                </div>

                {{--<div class="col">
                    <br/>
                    <br/>
                    <div class="form-group row">
                        <label for="forfait_mensuel_ctv" class="col-sm-6">Forfait mensuel CTV</label>
                        <input id="forfait_mensuel_ctv" name="forfait_mensuel_ctv" type="number" min="0"
                               class="form-control col-sm-6"/>
                    </div>
                    <div class="form-group row">
                        <label for="forfait_mensuel_gdf" class="col-sm-6">Forfait mensuel GDF</label>
                        <input id="forfait_mensuel_gdf" name="forfait_mensuel_gdf" type="number" min="0"
                               class="form-control col-sm-6"/>
                    </div>
                    <div class="form-group row">
                        <label for="forfait_mensuel_mad" class="col-sm-6">Forfait mensuel MAD</label>
                        <input id="forfait_mensuel_mad" name="forfait_mensuel_mad" type="text"
                               class="form-control col-sm-6"/>
                    </div>
                </div>--}}

                <div class="col">
                    <div>Régime</div>
                    <br/>
                    <br/>
                    <div class="checkbox">
                        <input type="checkbox" id="cb_intra_muros" name="regime" value="Intra muros">
                        <label for="cb_intra_muros">Intra muros</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="cb_intra_muros" name="regime" value="Extra muros">
                        <label for="cb_extra_muros">Extra muros</label>
                    </div>
                </div>
            </div>

            <br/>
            <br/>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="tarif_bitume" class="col-sm-2">Tarif (HF) Km bitume</label>
                        <input id="tarif_bitume" name="tarif_bitume" type="number" min="0" class="editbox col-sm-3"/>
                    </div>
                    <div class="form-group row">
                        <label for="tarif_km_piste" class="col-sm-2">Tarif (HF) Km piste</label>
                        <input id="tarif_km_piste" name="tarif_km_piste" type="number" min="0"
                               class="editbox col-sm-3"/>
                    </div>
                    <div class="form-group row">
                        <label for="tarif_tdf_vb" class="col-sm-2">Tarif (HF) TDF VB</label>
                        <input id="tarif_tdf_vb" name="tarif_tdf_vb" type="number" min="0" class="editbox col-sm-3"/>
                    </div>
                    <div class="form-group row">
                        <label for="tarif_tdf_vl" class="col-sm-2">Tarif (HF) TDF VL</label>
                        <input id="tarif_tdf_vl" name="tarif_tdf_vl" type="number" min="0" class="editbox col-sm-3"/>
                    </div>
                    <div class="form-group row">
                        <label for="tarif_collecte_caissiere" class="col-sm-2">Tarif (HF) Collecte caissière</label>
                        <input id="tarif_collecte_caissiere" name="tarif_collecte_caissiere" type="number" min="0"
                               class="editbox col-sm-3"/>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="form-group row col-3">
                    <label class="col-sm-4">Coût</label>
                    <input type="number" class="form-control col-sm-8" id="oo_total" name="oo_total" readonly/>
                </div>
            </div>
        </form>
    </div>
    <script>
        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        let total = 0;

        $(document).ready(function () {
            $("#oo_total").val(total);
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                $('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

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

            $("#oo_tdf_vb").on("change", function () {
                total = parseInt(this.value);
                $("#oo_total").val(total);
            });
            $("#oo_tdf_vl").on("change", function () {
                total = parseInt(this.value);
                $("#oo_total").val(total);
            });
            $("#oo_mad_caisse").on("change", function () {
                total = parseInt(this.value);
                $("#oo_total").val(total);
            });
            $("#oo_collecte").on("change", function () {
                total = parseInt(this.value);
                $("#oo_total").val(total);
            });
        });
    </script>
@endsection
