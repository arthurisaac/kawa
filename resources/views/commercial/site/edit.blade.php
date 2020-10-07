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
                        <option>{{$site->client}}</option>
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
                    <input type="tel" id="telephone" name="telephone" class="editbox col-sm-7"  value="{{$site->telephone}}"/>
                </div>
                <div class="form-group row">
                    <label for="numero_de_carte" class="col-sm-5">Numéro de carte</label>
                    <input id="numero_de_carte" name="no_carte" type="text" class="editbox col-sm-7"  value="{{$site->no_carte}}"/>
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
            <div class="col">
                <div>Objet-opération</div>
                <br/>
                <div style="display: flex; justify-content: space-around;">
                    <div>
                        <div class="checkbox">
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
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_garde_de_fond" name="objet_operation[]"
                                   value="Garde de fonds">
                            <label for="cb_garde_de_fond">Garde de fonds</label>
                        </div>
                    </div>
                    <div>
                        <div class="checkbox">
                            <input type="checkbox" id="cb_comptage_tri" name="objet_operation[]" value="Comptage + tri">
                            <label for="cb_comptage_tri">Comptage + tri</label>
                        </div>
                        <div class="checkbox">
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <br/>
                <br/>
                <div class="form-group">
                    <label for="forfait_mensuel_ctv">Forfait mensuel CTV</label>
                    <input id="forfait_mensuel_ctv" name="forfait_mensuel_ctv" type="number" min="0" class="editbox" value="{{$site->forfait_mensuel_ctv}}"/>
                </div>
                <div class="form-group">
                    <label for="forfait_mensuel_gdf">Forfait mensuel GDF</label>
                    <input id="forfait_mensuel_gdf" name="forfait_mensuel_gdf" type="number" min="0" class="editbox" value="{{$site->forfait_mensuel_gdf}}"/>
                </div>
                <div class="form-group">
                    <label for="forfait_mensuel_mad">Forfait mensuel MAD</label>
                    <input id="forfait_mensuel_mad" name="forfait_mensuel_mad" type="text" class="editbox" value="{{$site->forfait_mensuel_mad}}"/>
                </div>
            </div>

            <div class="col">
                <div>Régime</div>
                <br/>
                {{$site->regime}}
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
                    <input id="tarif_bitume" name="tarif_bitume" type="number" min="0" class="editbox col-sm-3" value="{{$site->tarif_bitume}}"/>
                </div>
                <div class="form-group row">
                    <label for="tarif_km_piste" class="col-sm-2">Tarif (HF) Km piste</label>
                    <input id="tarif_km_piste" name="tarif_km_piste" type="number" min="0" class="editbox col-sm-3" value="{{$site->tarif_km_piste}}"/>
                </div>
                <div class="form-group row">
                    <label for="tarif_tdf_vb" class="col-sm-2">Tarif (HF) TDF VB</label>
                    <input id="tarif_tdf_vb" name="tarif_tdf_vb" type="number" min="0" class="editbox col-sm-3" value="{{$site->tarif_tdf_vb}}"/>
                </div>
                <div class="form-group row">
                    <label for="tarif_tdf_vl" class="col-sm-2">Tarif (HF) TDF VL</label>
                    <input id="tarif_tdf_vl" name="tarif_tdf_vl" type="number" min="0" class="editbox col-sm-3" value="{{$site->tarif_tdf_vl}}"/>
                </div>
                <div class="form-group row">
                    <label for="tarif_collecte_caissiere" class="col-sm-2">Tarif (HF) Collecte caissière</label>
                    <input id="tarif_collecte_caissiere" name="tarif_collecte_caissiere" type="number" min="0"
                           class="editbox col-sm-3" value="{{$site->tarif_collecte_caissiere}}"/>
                </div>
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
