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
            <div class="col-7">
                <div>Objet-opération</div>
                <br/>
                <div class="row">
                    <div class="col">
                        <h6>Transport</h6>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">TDF VB (C)</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_tdf_vb" id="oo_tdf_vb">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">TDF VL (D)</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_tdf_vl" id="oo_tdf_vl">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">MAD CAISSE</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_mad_caisse" id="oo_mad_caisse">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Collecte</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_collecte" id="oo_collecte">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Collecte + caisse</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_collecte_caisse" id="oo_collecte_caisse">
                        </div>
                        {{--<div class="checkbox">
                            <input type="checkbox" id="cb_tdf_vb" name="objet_operation[]" value="TDF VB">
                            <label for="cb_tdf_vb">TDF VB</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_tdf_vl" name="objet_operation[]" value="TDF VL">
                            <label for="cb_tdf_vl">TDF VL</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_tdf_mad" name="objet_operation[]" value="MAD CAISSE">
                            <label for="cb_tdf_mad">MAD CAISSE</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_collecte" name="objet_operation[]" value="Collecte">
                            <label for="cb_collecte">Collecte</label>
                        </div>--}}
                    </div>
                    <div class="col">
                        <h6>Caisse</h6>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Garde de fonds</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_garde_fond" id="oo_garde_fond">
                        </div>
                        <div class="form-group row">
                            <label for="cb_tdf_vb" class="col-sm-6">Comptage + tri</label>
                            <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_comptage_tri" id="oo_comptage_tri">
                        </div>
                        {{--<div class="checkbox">
                            <input type="checkbox" id="cb_garde_de_fond" name="objet_operation[]"
                                   value="Garde de fonds">
                            <label for="cb_garde_de_fond">Garde de fonds</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_comptage_tri" name="objet_operation[]" value="Comptage + tri">
                            <label for="cb_comptage_tri">Comptage + tri</label>
                        </div>--}}
                    </div>
                    <div class="col">
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
                        {{--<div class="checkbox">
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
                        </div>--}}
                    </div>
                </div>
            </div>

            <div class="col">
                <br/>
                <br/>
                <div class="form-group row">
                    <label for="forfait_mensuel_ctv" class="col-sm-6">Forfait mensuel CTV</label>
                    <input id="forfait_mensuel_ctv" name="forfait_mensuel_ctv" type="number" min="0" class="form-control col-sm-6"/>
                </div>
                <div class="form-group row">
                    <label for="forfait_mensuel_gdf" class="col-sm-6">Forfait mensuel GDF</label>
                    <input id="forfait_mensuel_gdf" name="forfait_mensuel_gdf" type="number" min="0" class="form-control col-sm-6"/>
                </div>
                <div class="form-group row">
                    <label for="forfait_mensuel_mad" class="col-sm-6">Forfait mensuel MAD</label>
                    <input id="forfait_mensuel_mad" name="forfait_mensuel_mad" type="text" class="form-control col-sm-6"/>
                </div>
            </div>

            <div class="col">
                <div>Régime</div>
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
                    <input id="tarif_km_piste" name="tarif_km_piste" type="number" min="0" class="editbox col-sm-3"/>
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
        <br />
        <div class="row">
            <div class="form-group row col-3">
                <label class="col-sm-4">Coût</label>
                <input type="number" class="form-control col-sm-8" id="oo_total" name="oo_total" readonly />
            </div>
        </div>
    </form>
</div>
<script>
    let centres = {!! json_encode($centres) !!};
    let centres_regionaux = {!! json_encode($centres_regionaux) !!};
    let total = 0;

    $(document).ready( function () {
        $("#oo_total").val(total);
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

        $("#oo_tdf_vb").on("change", function() {
            total = parseInt(this.value);
            $("#oo_total").val(total);
        });
        $("#oo_tdf_vl").on("change", function() {
            total = parseInt(this.value);
            $("#oo_total").val(total);
        });
        $("#oo_mad_caisse").on("change", function() {
            total = parseInt(this.value);
            $("#oo_total").val(total);
        });
        $("#oo_collecte").on("change", function() {
            total = parseInt(this.value);
            $("#oo_total").val(total);
        });
    });
</script>
@endsection
