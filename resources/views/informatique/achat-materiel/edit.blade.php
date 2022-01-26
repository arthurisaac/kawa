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

        <form method="post" action="{{ route('informatique-achat-materiel.update', $achat->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-5">Centre</label>
                        <select class="form-control col-md-7" name="centre" id="centre" required>
                            <option>{{$achat->centre}}</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Centre régional</label>
                        <select class="form-control col-md-7" name="centreRegional" id="centre_regional"
                                required>
                            <option>{{$achat->centreRegional}}</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Service</label>
                        <input class="form-control col-md-7" name="service" value="{{$achat->service}}" required/>
                    </div>
                    <div class="form-group row">
                        <label for="date_achat" class="col-md-5">Date achat</label>
                        <input type="date" class="form-control col-md-7" name="date_achat" id="date_achat" value="{{$achat->date_achat}}" required/>
                    </div>
                    <div class="form-group row">
                        <label for="date_fin" class="col-md-5">Date fin de vie</label>
                        <input type="date" class="form-control col-md-7" name="date_fin" id="date_fin" value="{{$achat->date_fin}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Référence</label>
                        <input type="text" class="form-control col-md-7" name="reference" value="{{$achat->reference}}"
                               required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Libellé</label>
                        <input type="text" class="form-control col-md-7" name="libelle" value="{{$achat->libelle}}"
                               required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Prix unitaire</label>
                        <input type="number" class="form-control col-md-7" name="prixUnitaire" id="prixUnitaire"
                               value="{{$achat->prixUnitaire}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Quanité</label>
                        <input type="number" class="form-control col-md-7" name="quantite" id="quantite" min="0"
                               value="{{$achat->quantite}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Montant</label>
                        <input type="number" class="form-control col-md-7" name="montant" id="montant"
                               value="{{$achat->montant}}" readonly required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Facture</label>
                        <input type="file" class="form-control-file col-md-7" name="factureJointe"/>
                    </div>
                    @if ($achat->factureJointe)
                        <a href="{{ asset('storage/uploads/'.$achat->factureJointe) }}" target="_blank">Voir Facture</a>
                    @endif
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
            })
        });
    </script>
@endsection
