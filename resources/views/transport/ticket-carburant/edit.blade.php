@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">APPRO CARBURANT</h2></div>
        <a href="/ticket-carburant-liste" class="btn btn-link btn-sm">Liste</a>
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

        <form method="post" action="{{ route('ticket-carburant.update', $id) }}">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" class="form-control col-sm-7" name="date" value="{{$carburant->date}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Heure</label>
                        <input type="time" class="form-control col-sm-7" name="heure" value="{{$carburant->heure}}}"/>
                    </div>
                    <div class="form-group row">
                        <label for="centre" class="col-sm-5">Centre Régional</label>
                        <select name="centre" id="centre" class="form-control col-sm-7" required>
                            <option>{{$carburant->centre}}</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="centre_regional" class="col-sm-5">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col-sm-7" required>
                            <option>{{$carburant->centre_regional}}</option>
                        </select>
                    </div>
                    <div class="form-group row" style="display: none">
                        <label class="col-sm-5">Lieu</label>
                        <input type="text" class="form-control col-sm-7" name="lieu" value="{{$carburant->lieu}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">N° Ticket</label>
                        <input type="number" class="form-control col-sm-7" name="numeroTicket"
                               value="{{$carburant->numeroTicket}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">N° Carte carburant</label>
                        <select class="form-control form-control-sm col-md-7" name="numeroCarteCarburant">
                            <option>{{$carburant->numeroCarteCarburant}}</option>
                            @foreach($cartes as $carte)
                                <option value="{{$carte->numeroCarte}}">{{$carte->numeroCarte}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Im véhicule</label>
                        <select class="form-control form-control-sm col-md-7" name="idVehicule">
                            <option value="{{$carburant->idVehicule}}">{{$carburant->vehicules->immatriculation ?? ''}}</option>
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
                    <div class="form-group row" style="display: none">
                        <label class="col-sm-5">Solde</label>
                        <input type="number" class="form-control col-sm-7" name="solde" value="{{$carburant->solde}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Montant</label>
                        <input type="number" class="form-control col-sm-7" name="soldePrecedent" value="{{$carburant->soldePrecedent}}"/>
                    </div>
                    <div class="form-group row" style="display: none">
                        <label class="col-sm-5">Utilisation</label>
                        <select class="form-control form-control-sm col-md-7" name="utilisation">
                            <option value="Vidange">{{$carburant->utilisation}}</option>
                            <option value="Vidange">Vidange</option>
                            <option value="Carburant">Carburant</option>
                            <option value="Lavage">Lavage</option>
                            <option value="Lubrifiant">Lubrifiant</option>
                        </select>
                    </div>
                    <div class="form-group row" style="display: none">
                        <label class="col-sm-5">Kilometrage</label>
                        <input type="number" class="form-control col-sm-7" name="kilometrage" value="{{$carburant->kilometrage}}"/>
                    </div>
                    <div class="form-group row" style="display: none">
                        <label class="col-sm-5">Litrage</label>
                        <input type="number" class="form-control col-sm-7" name="litrage" value="{{$carburant->litrage}}"/>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group" style="display: none;">
                        <br>
                        <input type="number" class="form-control col-sm-7" name="total" readonly/>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
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
