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
                        <label class="col-md-5">Service</label>
                        <input class="form-control col-md-7" name="service" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Date</label>
                        <input type="date" class="form-control col-md-7" name="date" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Référence</label>
                        <input type="text" class="form-control col-md-7" name="reference" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Libellé</label>
                        <input type="text" class="form-control col-md-7" name="libelle" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Prix unitaire</label>
                        <input type="number" class="form-control col-md-7" name="prixUnitaire" id="prixUnitaire" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Quanité</label>
                        <input type="number" class="form-control col-md-7" name="quantite" id="quantite" min="0" value="0" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Montant</label>
                        <input type="number" class="form-control col-md-7" name="montant" id="montant" readonly required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Facture</label>
                        <input type="file" class="form-control-file col-md-7" name="factureJointe" />
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

        $(document).ready( function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', { text: "Choisir centre régional" }));

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

            $("#prixUnitaire").on("change", function() {
                const prixUnitaire = parseInt(this.value);
                const quantite = parseInt($("#quantite").val());
                $("#montant").val(prixUnitaire*quantite);
            });
            $("#quantite").on("change", function() {
                const quantite = parseInt(this.value);
                const prixUnitaire = parseInt($("#prixUnitaire").val());
                $("#montant").val(prixUnitaire*quantite);
            })
        });
    </script>
@endsection
