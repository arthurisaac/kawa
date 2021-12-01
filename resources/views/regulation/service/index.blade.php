@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Service</h2></div>
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

        <form method="post" action="{{ route('regulation-service.store') }}">
        @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" name="date" class="form-control col-sm-7" value="{{date('Y-m-d')}}" required />
                    </div>
                    <div class="form-group row">
                        <label for="centre" class="col-sm-5">Centre</label>
                        <select name="centre" id="centre" class="form-control col-sm-7" required>
                            <option>Choisir centre</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="centre_regional" class="col-sm-5">Centre régional</label>
                        <select id="centre_regional" name="centreRegional" class="form-control col-sm-7" required>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row" style="align-items: center;">
                        <div class="col-4">
                            <h6>Chargé de régulation</h6>
                        </div>
                        <div class="col-1">
                            <hr class="burval-separator" style="height: 35vh">
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="chargeeRegulation" class="col-sm-5">Matricule</label>
                                <select type="text" name="chargeeRegulation" id="chargeeRegulation" class="form-control col-sm-7">
                                    <option></option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{$personnel->id}}">{{$personnel->matricule}} | {{$personnel->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="nomchargeeRegulation" class="col-sm-5">Nom et Prenom(s)</label>
                                <input type="text" name="nomchargeeRegulation" id="nomchargeeRegulation" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="fonctionchargeeRegulation" class="col-sm-5">Fonction</label>
                                <input type="text" name="fonctionchargeeRegulation" id="fonctionchargeeRegulation" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <label for="matriculechargeeRegulation" class="col-sm-5">Matricule</label>
                                <input type="text" name="matriculechargeeRegulation" id="matriculechargeeRegulation" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeeRegulationHPS" class="col-sm-5">Heure de prise de service</label>
                                <input type="time" name="chargeeRegulationHPS" id="chargeeRegulationHPS" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeeRegulationHFS" class="col-sm-5">Heure de fin de service</label>
                                <input type="time" name="chargeeRegulationHFS" id="chargeeRegulationHFS" class="form-control col-sm-7"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="align-items: center;">
                        <div class="col-4">
                            <h6>Chargée de régulation adjointe</h6>
                        </div>
                        <div class="col-1">
                            <hr class="burval-separator" style="height: 33vh;">
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="chargeeRegulationAdjoint" class="col-sm-5">Matricule</label>
                                <select type="text" name="chargeeRegulationAdjointe" id="chargeeRegulationAdjoint" class="form-control col-sm-7">
                                    <option></option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{$personnel->id}}">{{$personnel->matricule}} | {{$personnel->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="nomchargeeRegulationAdjoint" class="col-sm-5">Nom et Prenom(s)</label>
                                <input type="text" name="nomchargeeRegulationAdjoint" id="nomchargeeRegulationAdjoint" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="fonctionchargeeRegulationAdjoint" class="col-sm-5">Fonction</label>
                                <input type="text" name="fonctionchargeeRegulationAdjoint" id="fonctionchargeeRegulationAdjoint" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <label for="matriculechargeeRegulationAdjoint" class="col-sm-5">Matricule</label>
                                <input type="text" name="matriculechargeeRegulationAdjoint" id="matriculechargeeRegulationAdjoint" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeeRegulationAdjointHPS" class="col-sm-5">Heure de prise de service</label>
                                <input type="time" name="chargeeRegulationAdjointHPS" id="chargeeRegulationAdjointHPS" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeeRegulationAdjointHFS" class="col-sm-5">Heure de fin de service</label>
                                <input type="time" name="chargeeRegulationAdjointHFS" id="chargeeRegulationAdjointHFS" class="form-control col-sm-7"/>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col-4">
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
        });
    </script>

    <script>
        let personnels =  {!! json_encode($personnels) !!};
        $(document).ready(function() {
            $("#chargeeRegulationAdjoint").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#nomchargeeRegulationAdjoint").val(personnel.nomPrenoms);
                    $("#fonctionchargeeRegulationAdjoint").val(personnel.fonction);
                    $("#matriculechargeeRegulationAdjoint").val(personnel.matricule);
                }
            });

            $("#chargeeRegulation").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#nomchargeeRegulation").val(personnel.nomPrenoms);
                    $("#fonctionchargeeRegulation").val(personnel.fonction);
                    $("#matriculechargeeRegulation").val(personnel.matricule);
                }
            });
        });

    </script>

@endsection
