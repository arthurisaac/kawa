@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">APPRO CARBURANT</h2></div>
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

    <form method="post" action="{{ route('ticket-carburant.store') }}">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Date</label>
                    <input type="date" class="form-control col-sm-7" name="date" value="{{date('Y-m-d')}}"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Heure</label>
                    <input type="time" class="form-control col-sm-7" name="heure" value="{{date('H:i')}}"/>
                </div>
                <div class="form-group row">
                    <label for="centre" class="col-sm-5">Centre Régional</label>
                    <select name="centre" id="centre" class="form-control col-sm-7" required>
                        <option></option>
                        @foreach ($centres as $centre)
                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="centre_regional" class="col-sm-5">Centre</label>
                    <select id="centre_regional" name="centre_regional" class="form-control col-sm-7" required>
                        <option></option>
                    </select>
                </div>
                <div class="form-group row" style="display: none">
                    <label class="col-sm-5">Lieu</label>
                    <input type="text" class="form-control col-sm-7" name="lieu"/>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-5">N° Ticket</label>
                    <input type="number" class="form-control col-sm-7" name="numeroTicket"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">N° Carte carburant</label>
                    <select class="form-control form-control-sm col-md-7" name="numeroCarteCarburant">
                        <option>Selectionnez numéro</option>
                        @foreach($cartes as $carte)
                        <option value="{{$carte->numeroCarte}}">{{$carte->numeroCarte}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Im véhicule</label>
                    <select class="form-control form-control-sm col-md-7" name="idVehicule">
                        <option>Selectionnez véhicule</option>
                        @foreach($vehicules as $vehicule)
                        <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-sm btn-block">OK</button>
                <button type="reset" class="btn btn-danger btn-sm btn-block">Annuler</button>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row"  style="display: none">
                    <label class="col-sm-5">Solde</label>
                    <input type="number" class="form-control col-sm-7" name="solde"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Solde précedent</label>
                    <input type="number" class="form-control col-sm-7" name="soldePrecedent"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5"  style="display: none">Utilisation</label>
                    <select class="form-control form-control-sm col-md-7" name="utilisation">
                        <option value="Vidange">Vidange</option>
                        <option value="Carburant">Carburant</option>
                        <option value="Lavage">Lavage</option>
                        <option value="Lubrifiant">Lubrifiant</option>
                    </select>
                </div>
                <div class="form-group row"  style="display: none">
                    <label class="col-sm-5">Kilometrage</label>
                    <input type="number" class="form-control col-sm-7" name="kilometrage"/>
                </div>
                <div class="form-group row"  style="display: none">
                    <label class="col-sm-5">Litrage</label>
                    <input type="number" class="form-control col-sm-7" name="litrage"/>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <br>
                    <input type="number" class="form-control col-sm-7" name="total" readonly/>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        $("#centre").on("change", function () {
            $("#centre_regional option").remove();
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
    })
</script>
@endsection
