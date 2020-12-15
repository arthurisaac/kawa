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

    <form method="post" action="{{ route('commercial-site.update', $site->id) }}">
        @method('PATCH')
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="client" class="col-sm-5">Client</label>
                    <select name="client" id="client" class="Combobox col-sm-7" required>
                        <option value="{{$site->clients->id}}">{{$site->clients->client_nom}}</option>
                        @foreach ($clients as $client)
                            <option value="{{$client->id}}"> {{$client->client_nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="site" class="col-sm-5">Site</label>
                    <input id="site" type="text" name="site" class="editbox col-sm-7" value="{{$site->site}}" required/>
                </div>
                <div class="form-group row">
                    <label for="nom_contact" class="col-sm-5">Nom contact du site</label>
                    <input id="nom_contact" type="text" name="nom_contact_site" value="{{$site->nom_contact_site}}" class="editbox col-sm-7"/>
                </div>
                <div class="form-group row">
                    <label for="fonction_contact" class="col-sm-5">Fonction du contact</label>
                    <input id="fonction_contact" type="text" name="fonction_contact" value="{{$site->fonction_contact}}" class="editbox col-sm-7"/>
                </div>
            </div>

            <div class="col">
                <div class="form-group row">
                    <label for="centre" class="col-sm-5">Centre</label>
                    <select name="centre" id="centre" class="form-control col-sm-7" required>
                        <option>{{$site->centre}}</option>
                        @foreach ($centres as $centre)
                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="centre_regional" class="col-sm-5">Centre régional</label>
                    <select id="centre_regional" name="centre_regional" class="form-control col-sm-7" required>
                        <option>{{$site->centre_regional}}</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="telephone" class="col-sm-5">Telephone</label>
                    <input type="tel" id="telephone" name="telephone" value="{{$site->telephone}}" class="editbox col-sm-7"/>
                </div>
                <div class="form-group row">
                    <label for="numero_de_carte" class="col-sm-5">Numéro de carte</label>
                    <input id="numero_de_carte" name="no_carte" type="text" value="{{$site->no_carte}}" class="editbox col-sm-7"/>
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
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_vb_extamuros_bitume"
                                   id="oo_tdf_vb"
                                   value="{{$site->oo_vb_extamuros_bitume}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">VB extramuros piste</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_vb_extramuros_piste"
                                   id="oo_tdf_vl"
                                   value="{{$site->oo_vb_extramuros_piste}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">VL extramuros bitume</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_vl_extramuros_bitume"
                                   value="{{$site->oo_vl_extramuros_bitume}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">VL extramuros piste</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_vl_extramuros_piste"
                                   value="{{$site->oo_vl_extramuros_piste}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">VB (INTRAMUROS)</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_vb_intramuros"
                                   value="{{$site->oo_vb_intramuros}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">VL (INTRAMUROS)</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_vl_intramuros"
                                   id="oo_tdf_vl"
                                   value="{{$site->oo_vl_intramuros}}">
                        </div>
                    </div>
                    <div class="col">
                        <h6>CAISSIERES</h6>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">MAD</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_mad" value="{{$site->oo_mad}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Collecte</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_collecte"
                                   value="{{$site->oo_collecte}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">CCTV</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_cctv"
                            value="{{$site->oo_cctv}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Collecte caisse</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_collecte_caisse"
                                   value="{{$site->oo_collecte_caisse}}">
                        </div>
                    </div>
                    <div class="col">
                        <h6>ATM</h6>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Borne chèque</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_borne_cheque"
                            value="{{$site->oo_borne_cheque}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Borne des opérations</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_borne_operation"
                                   value="{{$site->oo_borne_operation}}">
                        </div>
                        <div class="form-group">
                            <label for="cb_tdf_vb" class="col-sm-6">Gestion des GAB</label>
                            <div class="row">
                                <label class="col-sm-6">Niveau I</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                       name="oo_gestion_gab_prix1"
                                       placeholder="Prix" min="0"
                                       value="{{$site->oo_gestion_gab_prix1}}">
                            </div>
                            <div class="row">
                                <label class="col-sm-6">Niveau II</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                       name="oo_gestion_gab_prix2"
                                       placeholder="Prix" min="0"
                                       value="{{$site->oo_gestion_gab_prix2}}">
                            </div>
                            <div class="row">
                                <label class="col-sm-6">Niveau II</label>
                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                       name="oo_gestion_gab_prix3"
                                       placeholder="Prix" min="0"
                                       value="{{$site->oo_gestion_gab_prix3}}">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Maintenance N2\N3</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_maintenance_n2"
                                   id="oo_garde_fond"
                                   value="{{$site->oo_maintenance_n2}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Vente\location ATM</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_vente_location"
                                   id="oo_garde_fond"
                                   value="{{$site->oo_vente_location}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Vente consommables</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_vente_consommables"
                                   id="oo_garde_fond"
                                   value="{{$site->oo_vente_consommables}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Vente pièces détachées</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm"
                                   name="oo_vente_pieces_detachees"
                                   id="oo_garde_fond"
                                   value="{{$site->oo_vente_pieces_detachees}}">
                        </div>
                    </div>
                    <div class="col">
                        <h6>PETIT MATERIEL</h6>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Sécuripacks</label>
                            <select class="col-sm-6 form-control form-control-sm" name="oo_securipack">
                                <option>{{$site->oo_securipack}}</option>
                                <option value="Extra grand">Extra grand</option>
                                <option value="Grand">Grand</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Petit">Petit</option>
                            </select>
                            <input type="number" min="0" class="offset-6 col-sm-6 form-control form-control-sm"
                                   name="oo_securipack_prix"
                            value="{{$site->oo_securipack_prix}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Sac jute</label>
                            <select class="col-sm-6 form-control form-control-sm" name="oo_sac_juste">
                                <option>{{$site->oo_sac_juste}}</option>
                                <option value="Extra grand">Extra grand</option>
                                <option value="Grand">Grand</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Petit">Petit</option>
                            </select>
                            <input type="number" min="0" class="offset-6 col-sm-6 form-control form-control-sm"
                                   name="oo_sac_juste_prix"
                                   value="{{$site->oo_sac_juste_prix}}">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Scellé</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_scelle"
                                   id="oo_garde_fond"
                                   value="{{$site->oo_scelle}}">
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
        <br/>
        <div class="row">
            <div class="form-group row col-3">
                <label class="col-sm-4">Coût</label>
                <input type="number" class="form-control col-sm-8" id="oo_total" name="oo_total" value="{{$site->oo_total}}" readonly/>
            </div>
        </div>
    </form>
</div>
<script>
    let centres =  {!! json_encode($centres) !!};
    let centres_regionaux = {!! json_encode($centres_regionaux) !!};

    $(document).ready( function () {
        $("#centre").on("change", function () {
            $("#centre_regional option").remove();
            $('#centre_regional').append($('<option>', { text: "Choisir centre régional" }));

            const centre = centres.find(c => c.centre === this.value);
            const regions = centres_regionaux.filter( region => {
                return region.id_centre === centre.id;
            });
            regions.map( ({centre_regional}) => {
                $('#centre_regional').append($('<option>', {
                    value: centre_regional,
                    text: centre_regional
                }));
            })
        });
    });
</script>
<script>
    let site =  {!! json_encode($site) !!};
    $(document).ready(function () {

        const objet_operation = site.objet_operation + "";
        const objet_operation_array = objet_operation.split(',');

        $("input[name='objet_operation[]']").map(function () {
            const value = $(this).val();
            if (objet_operation_array.includes(value)) $(this).prop("checked", true);
        });

        $("input[name='regime']").map(function () {
            const value = $(this).val();
            if (site.regime === value) $(this).prop("checked", true);
        });
    });

</script>
@endsection
