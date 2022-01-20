@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Achat matériel</h2></div>
        <br/>
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

        <form enctype="multipart/form-data" method="post" action="{{ route('informatique-achat-materiel.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-5">Centre</label>
                        <select class="form-control col-md-7" name="centre" id="centre" required>
                            <option></option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Centre régional</label>
                        <select class="form-control col-md-7" name="centreRegional" id="centre_regional"
                                required></select>
                    </div>
                    <div class="form-group row">
                        <label for="fournisseur" class="col-md-5">Fournisseur</label>
                        <select class="form-control col-md-7" name="fournisseur" id="fournisseur">
                            <option></option>
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}">{{$fournisseur->libelleFournisseur}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Service</label>
                        <input class="form-control col-md-7" name="service"/>
                    </div>
                    <div class="form-group row">
                        <label for="date_achat" class="col-md-5">Date achat</label>
                        <input type="date" class="form-control col-md-7" name="date_achat" id="date_achat" required/>
                    </div>
                    <div class="form-group row">
                        <label for="date_fin" class="col-md-5">Date fin de vie</label>
                        <input type="date" class="form-control col-md-7" name="date_fin" id="date_fin" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Duree de vie</label>
                        <input type="number" class="form-control col-md-7" name="duree" id="duree" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Référence</label>
                        <input type="text" class="form-control col-md-7" name="reference" required/>
                    </div>
                    <div class="form-group row">
                        <label for="categorie" class="col-md-5">Catégorie</label>
                        <select class="form-control col-md-7" name="categorie" id="categorie">
                            <option></option>
                            @foreach($categories as $categorie)
                                <option>{{$categorie->categorie}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Libellé</label>
                        <select class="form-control col-md-7" name="libelle" id="libelle"></select>
                    </div>
                    <div class="form-group row">
                        <label for="caracteristique" class="col-md-5">Caracteristique</label>
                        <textarea class="form-control col-md-7" name="caracteristique" id="caracteristique"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Prix unitaire</label>
                        <input type="number" class="form-control col-md-7" name="prixUnitaire" id="prixUnitaire"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Quanité</label>
                        <input type="number" class="form-control col-md-7" name="quantite" id="quantite" min="0"
                               value="0"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Montant</label>
                        <input type="number" class="form-control col-md-7" name="montant" id="montant" readonly/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Facture</label>
                        <input type="file" class="form-control-file col-md-7" name="factureJointe"/>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        let categories = {!! json_encode($categories) !!};
        let libelles = {!! json_encode($libelles) !!};

        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', { text: "Choisir centre régional" }));

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

            $("#prixUnitaire").on("change", function () {
                const prixUnitaire = parseInt(this.value);
                const quantite = parseInt($("#quantite").val());
                $("#montant").val(prixUnitaire * quantite);
            });
            $("#quantite").on("change", function () {
                const quantite = parseInt(this.value);
                const prixUnitaire = parseInt($("#prixUnitaire").val());
                $("#montant").val(prixUnitaire * quantite);
            });
            $("#categorie").on("change", function () {
                $("#libelle option").remove();
                const categorie = categories.find(c => c.categorie === this.value);
                const libs = libelles.filter(lib => {
                    return lib.categorie_id === categorie.id;
                });
                libs.map(({libelle}) => {
                    $('#libelle').append($('<option>', {
                        text: libelle
                    }));
                })
            });
            $("#date_achat").on("change", function () {
                const da_value = this.value;
                const df_value = $("#date_fin").val();

                if (da_value && df_value) {
                    const da_date = new Date(da_value);
                    const df_date = new Date(df_value);

                    const diff_in_time = df_date.getTime() - da_date.getTime();
                    const diff_in_day = diff_in_time /(1000 * 3600 * 24);

                    $("#duree").val(diff_in_day);
                }
            });
            $("#date_fin").on("change", function () {
                const da_value = $("#date_achat").val();
                const df_value = this.value;

                if (da_value && df_value) {
                    const da_date = new Date(da_value);
                    const df_date = new Date(df_value);

                    const diff_in_time = df_date.getTime() - da_date.getTime();
                    const diff_in_day = diff_in_time /(1000 * 3600 * 24);

                    $("#duree").val(diff_in_day);
                }

            });
        });
    </script>
@endsection
