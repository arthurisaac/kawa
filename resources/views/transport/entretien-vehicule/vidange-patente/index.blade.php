@extends('bases.transport')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Patente</h2></div>
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
        </div><br />
    @endif

    <form method="post" action="{{ route('vidange-patente.store') }}">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="form-group row">
                    <label class="col-md-4">Date</label>
                    <input type="date" class="form-control col-md-8" name="date" required/>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Véhicule</label>
                    <select class="form-control form-control-sm col-md-8" name="idVehicule" id="vehicule" required>
                        <option></option>
                        @foreach($vehicules as $vehicule)
                        <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Centre</label>
                    <input type="text" class="form-control form-control-sm col-md-8" name="centre" id="centre" required readonly />
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Centre régional</label>
                    <input type="text" class="form-control form-control-sm col-md-8" name="centreRegional" id="centreRegional"
                           required readonly />
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Date de renouvellement</label>
                    <input type="date" class="form-control form-control-sm col-md-8" name="dateRenouvellement"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Prochain renouvellement</label>
                    <input type="date" class="form-control form-control-sm col-md-8" name="prochainRenouvellement"/>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Montant</label>
                    <input type="number" min="0" class="form-control form-control-sm col-md-8" name="montant"/>
                </div>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block btn-sm">Valider</button>
                <br/>
                <button type="reset" class="btn btn-danger btn-block btn-sm">Annuler</button>
                <br/>
            </div>
            <div class="col-6">
                <table class="table table-bordered" id="liste">
                    <thead>
                    <tr>
                        <th>Véhicule</th>
                        <th>Date</th>
                        <th>Prochain changement de patente</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vidanges as $vidange)
                    <td>{{$vidange->idVehicule}}</td>
                    <td>{{date('d/m/Y', strtotime($vidange->date))}}</td>
                    <td>{{date('d/m/Y', strtotime($vidange->prochainRenouvellement))}}</td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br/>
    </form>
</div>
<script>
    let centres = {!!json_encode($centres)!!};
    let centres_regionaux = {!!json_encode($centres_regionaux)!!};

    let vehicules = {!! json_encode($vehicules) !!};

    $(document).ready(function () {
        $("#vehicule").on("change", function () {
            const vehicule = vehicules.find(v => v.id === parseInt(this.value));
            if (vehicule) {
                $("#centre").val(vehicule.centre);
                $("#centreRegional").val(vehicule.centreRegional);
            }
        });
    });

    $(document).ready(function () {
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

        $('#liste').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
