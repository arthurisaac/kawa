@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Bordereau</h2></div>
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
                <div class="col">
                    <!-- INFORMATIONS GENERALE -->
                    <p>INFORMATION GENERALE ENTREE DE STOCK</p>
                    <hr class="title-separator"/>
                    <br/>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group row">
                                <label class="col-sm-5">Date</label>
                                <input type="date" class="form-control col-sm-7" >
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label class="col-sm-5">Heure</label>
                                <input type="time" class="form-control col-sm-7" >
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label class="col-sm-5">Stock initial</label>
                                <input type="number" class="form-control col-sm-7" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group row">
                                <label class="col-sm-5">Numéro de début</label>
                                <input type="number" class="form-control col-sm-7" >
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label class="col-sm-5">Numéro de fin</label>
                                <input type="number" class="form-control col-sm-7" >
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label class="col-sm-5">Quantité</label>
                                <input type="number" class="form-control col-sm-7" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group row">
                                <label class="col-sm-5">Stock total</label>
                                <input type="number" class="form-control col-sm-7" >
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row" style="align-items: center;">
                                <div class="col-5"><label>Seuil alerte</label></div>
                                <div class="col-1">
                                    <hr class="burval-separator" style="height: 11vh">
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-sm-5">N°1</label>
                                        <select class="form-control col-sm-7">
                                            <option></option>
                                            <option>100</option>
                                            <option>200</option>
                                            <option>300</option>
                                            <option>400</option>
                                            <option>500</option>
                                            <option>600</option>
                                            <option>700</option>
                                            <option>800</option>
                                            <option>900</option>
                                            <option>1000</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5">N°2</label>
                                        <select class="form-control col-sm-7">
                                            <option></option>
                                            <option>100</option>
                                            <option>200</option>
                                            <option>300</option>
                                            <option>400</option>
                                            <option>500</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5">N°3</label>
                                        <select class="form-control col-sm-7">
                                            <option></option>
                                            <option>100</option>
                                            <option>200</option>
                                            <option>300</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- INFORMATIONS GENERALE -->
                    <p>AFFECTATION</p>
                    <hr class="title-separator"/>
                    <br/>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group row">
                                <label class="col-sm-5">Date</label>
                                <input type="date" class="form-control col-sm-7" >
                            </div>
                        </div>
                        <div class="col-4">
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
                                    <option>Choisir centre régional</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transport" value="Transport">
                                <label class="form-check-label">
                                    Transport
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transport" value="Caisse">
                                <label class="form-check-label">
                                    Caisse
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row" style="align-items: center;">
                                <div class="col-4"><label>Responsable de service</label></div>
                                <div class="col-1">
                                    <hr class="burval-separator" style="height: 11vh">
                                </div>
                                <div class="col-5">
                                    <div class="form-group row">
                                        <label for="chargeeRegulation" class="col-sm-5">Matricule</label>
                                        <select type="text" name="chargeeRegulation" id="chargeeRegulation" class="form-control col-sm-7" required>
                                            <option></option>
                                            @foreach($personnels as $personnel)
                                                <option value="{{$personnel->id}}">{{$personnel->matricule}} | {{$personnel->nomPrenoms}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5">Nom</label>
                                        <input class="form-control col-sm-7" type="text" />
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5">Prenom</label>
                                        <input class="form-control col-sm-7" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-sm-5">Numéro de début</label>
                                    <input type="number" class="form-control col-sm-7" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-sm-5">Numéro de fin</label>
                                    <input type="number" class="form-control col-sm-7" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-sm-5">Quantité affectée</label>
                                    <input type="number" class="form-control col-sm-7" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group row">
                                <label class="col-sm-5">Stock actuel</label>
                                <input type="number" class="form-control col-sm-7" >
                            </div>
                        </div>
                    </div><br /><br />

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                            <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                        </div>
                    </div>
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
                    $("#matriculeOperatrice").val(personnel.matricule);
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
