@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Conteneur</h2></div><br />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('conteneur.store') }}">
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Conteneur</label>
                    <input type="text" class="form-control col-sm-8" name="conteneur"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Type de conteneur</label>
                    <select class="form-control col-sm-8" name="typeConteneur">
                        <option value="BANK">BANK</option>
                        <option value="MULTISHOP">MULTISHOP</option>
                        <option value="RS 12">RS 12</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Date de mise en vie</label>
                    <input type="date" class="form-control col-sm-8" name="dateMiseVie"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Durée de vie</label>
                    <input type="number" class="form-control col-sm-8" name="dureeVie"/>
                </div>
                <div class="form-group row">
                    <label class=" col-sm-4">ETAT</label>
                    <select class="form-control col-sm-8" name="etat">
                        <option value="EN VIE">EN VIE</option>
                        <option value="DEGRADER">DEGRADER</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Date dégradation</label>
                    <input type="date" class="form-control col-sm-8" name="dateDegradation"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Cause</label>
                    <input type="text" class="form-control col-sm-8" name="cause"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Remplacé par</label>
                    <input type="text" class="form-control col-sm-8" name="remplacePar"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Remplacé le</label>
                    <input type="date" class="form-control col-sm-8" name="remplaceLe"/>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Date maintenance eff</label>
                    <input type="date" class="form-control col-sm-8" name="dateMaintenanceEffectuee"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Date imputation</label>
                    <input type="date" class="form-control col-sm-8" name="dateImputation"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Centre</label>
                    <select class="form-control col-sm-8" name="centre" id="centre" required>
                        <option>Choisir centre</option>
                        @foreach ($centres as $centre)
                        <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Date renouvellement</label>
                    <input type="date" class="form-control col-sm-8" name="dateRenouvellement"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Imputation rapport</label>
                    <input type="text" class="form-control col-sm-8" name="imputationRaport"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Centre régional</label>
                    <select class="form-control  col-sm-8" name="centreRegional" id="centre_regional" required></select>
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
@endsection
