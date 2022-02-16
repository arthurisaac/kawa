@extends('bases.carburant')

@section('main')
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "APPRO CARBURANT"])
    <div class="burval-container">
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

        <div class="row gy-5 g-xxl-8">
            <div class="col-xxl-9">
                <form method="post" action="{{ route('ticket-carburant.store') }}">
                    <div class="card card-xl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Nouveau Appro Carburant</h3>
                        </div>
                        <div class="card-body pt-5">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="date" class="col-5">Date</label>
                                        <input type="date" class="form-control col" id="date" name="date" value="{{date('Y-m-d')}}"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="heure" class="col-5">Heure</label>
                                        <input type="time" class="form-control col" id="heure" name="heure" value="{{date('H:i')}}"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="centre" class="col-5">Centre Régional</label>
                                        <select name="centre" id="centre" class="form-control col" required>
                                            <option></option>
                                            @foreach ($centres as $centre)
                                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="centre_regional" class="col-5">Centre</label>
                                        <select id="centre_regional" name="centre_regional" class="form-control col" required>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="numeroTicket" class="col-5">N° Ticket</label>
                                        <input id="numeroTicket" type="number" class="form-control col" name="numeroTicket"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="numeroCarteCarburant" class="col-5">N° Carte carburant</label>
                                        <select id="numeroCarteCarburant" class="form-control col" name="numeroCarteCarburant">
                                            <option>Selectionnez numéro</option>
                                            @foreach($cartes as $carte)
                                                <option value="{{$carte->numeroCarte}}">{{$carte->numeroCarte}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="idVehicule" class="col-5">Im Vehicule</label>
                                        <select class="form-control col" name="idVehicule">
                                            <option>Selectionnez véhicule</option>
                                            @foreach($vehicules as $vehicule)
                                                <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="solde" class="col-5">Solde</label>
                                        <input type="number" class="form-control col" name="solde"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="soldePrecedent" class="col-5">Montant</label>
                                        <input type="number" class="form-control col" id="soldePrecedent" name="soldePrecedent"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row" style="display: none;">
                                        <label for="lieu" class="col-5">Lieu</label>
                                        <input id="lieu" type="text" class="form-control col" name="lieu"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row" style="display: none">
                                        <label id="utilisation" class="col-5">Utilisation</label>
                                        <select id="utilisation" class="form-control col" name="utilisation">
                                            <option value="Vidange">Vidange</option>
                                            <option value="Carburant">Carburant</option>
                                            <option value="Lavage">Lavage</option>
                                            <option value="Lubrifiant">Lubrifiant</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group row"  style="display: none">
                                        <label id="kilometrage" class="col-5">Kilometrage</label>
                                        <input id="kilometrage" type="number" class="form-control col" name="kilometrage"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row" style="display: none;">
                                        <label id="litrage" class="col-5">Litrage</label>
                                        <input type="number" class="form-control col" id="litrage" name="litrage"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row" style="display: none;">
                                        <label id="total" class="col-5">Total</label>
                                        <br>
                                        <input type="number" class="form-control col-sm-7" name="total" readonly/>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col text-right"></div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="reset" class="btn btn-info btn-sm">Annuler</button>
                            <button class="btn btn-primary btn-sm" type="submit">OK</button>
                        </div>
                    </div>
                    @csrf

                </form>
            </div>
        </div>

        {{--    <form >--}}
        {{--        @csrf--}}
        {{--        <div class="row">--}}
        {{--            <div class="col">--}}
        {{--                <div class="form-group row">--}}
        {{--                    <label class="col-sm-5">Date</label>--}}
        {{--                    <input type="date" class="form-control col-sm-7" name="date" value="{{date('Y-m-d')}}"/>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row">--}}
        {{--                    <label class="col-sm-5">Heure</label>--}}
        {{--                    <input type="time" class="form-control col-sm-7" name="heure" value="{{date('H:i')}}"/>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row">--}}
        {{--                    <label for="centre" class="col-sm-5">Centre Régional</label>--}}
        {{--                    <select name="centre" id="centre" class="form-control col-sm-7" required>--}}
        {{--                        <option></option>--}}
        {{--                        @foreach ($centres as $centre)--}}
        {{--                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>--}}
        {{--                        @endforeach--}}
        {{--                    </select>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row">--}}
        {{--                    <label for="centre_regional" class="col-sm-5">Centre</label>--}}
        {{--                    <select id="centre_regional" name="centre_regional" class="form-control col-sm-7" required>--}}
        {{--                        <option></option>--}}
        {{--                    </select>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row" style="display: none">--}}
        {{--                    <label class="col-sm-5">Lieu</label>--}}
        {{--                    <input type="text" class="form-control col-sm-7" name="lieu"/>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row">--}}
        {{--                    <label  class="col-sm-5">N° Ticket</label>--}}
        {{--                    <input type="number" class="form-control col-sm-7" name="numeroTicket"/>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row">--}}
        {{--                    <label class="col-sm-5">N° Carte carburant</label>--}}
        {{--                    <select class="form-control form-control-sm col-md-7" name="numeroCarteCarburant">--}}
        {{--                        <option>Selectionnez numéro</option>--}}
        {{--                        @foreach($cartes as $carte)--}}
        {{--                        <option value="{{$carte->numeroCarte}}">{{$carte->numeroCarte}}</option>--}}
        {{--                        @endforeach--}}
        {{--                    </select>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row">--}}
        {{--                    <label class="col-sm-5">Im véhicule</label>--}}
        {{--                    <select class="form-control form-control-sm col-md-7" name="idVehicule">--}}
        {{--                        <option>Selectionnez véhicule</option>--}}
        {{--                        @foreach($vehicules as $vehicule)--}}
        {{--                        <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>--}}
        {{--                        @endforeach--}}
        {{--                    </select>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-2">--}}

        {{--            </div>--}}
        {{--            <div class="col"></div>--}}
        {{--        </div>--}}
        {{--        <div class="row">--}}
        {{--            <div class="col">--}}
        {{--                <div class="form-group row"  >--}}
        {{--                    <label class="col-sm-5">Solde</label>--}}
        {{--                    <input type="number" class="form-control col-sm-7" name="solde"/>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row">--}}
        {{--                    <label class="col-sm-5">Montant</label>--}}
        {{--                    <input type="number" class="form-control col-sm-7" name="soldePrecedent"/>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row" style="display: none">--}}
        {{--                    <label class="col-sm-5"  >Utilisation</label>--}}
        {{--                    <select class="form-control form-control-sm col-md-7" name="utilisation">--}}
        {{--                        <option value="Vidange">Vidange</option>--}}
        {{--                        <option value="Carburant">Carburant</option>--}}
        {{--                        <option value="Lavage">Lavage</option>--}}
        {{--                        <option value="Lubrifiant">Lubrifiant</option>--}}
        {{--                    </select>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row"  style="display: none">--}}
        {{--                    <label class="col-sm-5">Kilometrage</label>--}}
        {{--                    <input type="number" class="form-control col-sm-7" name="kilometrage"/>--}}
        {{--                </div>--}}
        {{--                <div class="form-group row"  style="display: none">--}}
        {{--                    <label class="col-sm-5">Litrage</label>--}}
        {{--                    <input type="number" class="form-control col-sm-7" name="litrage"/>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-2">--}}
        {{--                <div class="form-group" style="display: none;">--}}
        {{--                    <br>--}}
        {{--                    <input type="number" class="form-control col-sm-7" name="total" readonly/>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="col"></div>--}}
        {{--        </div>--}}
        {{--    </form>--}}
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
