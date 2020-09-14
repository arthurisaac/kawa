@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Véhicule</h2></div><br />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    <form method="post" action="{{ route('vehicule.store') }}">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Immatriculation</label>
                    <input type="text" class="form-control" name="immatriculation"/>
                </div>
                <div class="form-group">
                    <label>Marque</label>
                    <input type="text" class="form-control" name="marque"/>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type">
                        <option value="VL">VL</option>
                        <option value="VL">VB</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" class="form-control-file" name="photo"/>
                </div>
            </div>
            <div class="col">
                <br />
                <button class="btn btn-primary btn-sm btn-block" type="submit">Valider</button><br />
                <button class="btn btn-danger btn-sm btn-block" type="reset">Annuler</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Code</label>
                    <input type="text" class="form-control" name="code"/>
                </div>
                <div class="form-group">
                    <label>DPMC</label>
                    <input type="date" class="form-control" name="DPMC"/>
                </div>
                <div class="form-group">
                    <label>Centre</label>
                    <select class="form-control" name="centre" id="centre" required>
                        <option>Choisir centre</option>
                        @foreach ($centres as $centre)
                        <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>N°Chassis</label>
                    <input type="text" class="form-control" name="num_chassis"/>
                </div>
                <div class="form-group">
                    <label>Date d'aquisition</label>
                    <input type="date" class="form-control" name="dateAcquisition"/>
                </div>
                <div class="form-group">
                    <label>Centre régional</label>
                    <select class="form-control" name="centreRegional" id="centre_regional" required></select>
                </div>
            </div>
            <div class="col"></div>
        </div><br />

        <div class="row" style="align-items: center;">
            <div class="col-2">
                <label>Chauffeur titulaire</label>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-md-3">Nom </label>
                    <input type="text" class="editbox col-md-4" name="chauffeurTitulaireNom"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Prénom</label>
                    <input type="text" class="editbox col-md-4" name="chauffeurTitulairePrenom"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Fonction</label>
                    <input type="text" class="editbox col-md-4" name="chauffeurTitulaireFonction"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Matricule</label>
                    <input type="text" class="editbox col-md-4" name="chauffeurTitulaireMatricule"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Date d'affection</label>
                    <input type="date" class="editbox col-md-4" name="chauffeurTitulaireDateAffection"/>
                </div>
            </div>
        </div><br />
        <div class="row" style="align-items: center;">
            <div class="col-2">
                <label>Chauffeur Suppléant</label>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-md-3">Nom</label>
                    <input type="text" class="editbox col-md-4" name="chauffeurSuppleantNom"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Prénom</label>
                    <input type="text" class="editbox col-md-4" name="chauffeurSuppleantPrenom"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Fonction</label>
                    <input type="text" class="editbox col-md-4" name="chauffeurSuppleantFonction"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Matricule</label>
                    <input type="text" class="editbox col-md-4" name="chauffeurSuppleantMatricule"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Date d'affection</label>
                    <input type="date" class="editbox col-md-4" name="chauffeurSuppleantDateAffection"/>
                </div>
            </div>
        </div><br />

        <!--<button type="reset" class="btn btn-danger btn-sm">Annuler</button>-->
        <button type="submit" class="btn btn-primary btn-sm">Valider</button>
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
@endsection
