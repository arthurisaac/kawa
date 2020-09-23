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
            <br/>contrat_objet
        @endif

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('caisse-service.store') }}">
        @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" name="date" class="form-control col-sm-7" required />
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
                            <option>Choisir centre régional</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row" style="align-items: center;">
                        <div class="col-4">
                            <h6>Chargé de caisse</h6>
                        </div>
                        <div class="col-1">
                            <hr class="burval-separator" style="height: 35vh">
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="chargeCaisse" class="col-sm-5">Matricule</label>
                                <select type="text" name="chargeCaisse" id="chargeCaisse" class="form-control col-sm-7">
                                    <option></option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{$personnel->id}}">{{$personnel->matricule}} | {{$personnel->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="nomChargeCaisse" class="col-sm-5">Nom et Prenom(s)</label>
                                <input type="text" name="nomChargeCaisse" id="nomChargeCaisse" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="fonctionChargeCaisse" class="col-sm-5">Fonction</label>
                                <input type="text" name="fonctionChargeCaisse" id="fonctionChargeCaisse" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="matriculeChargeCaisse" class="col-sm-5">Matricule</label>
                                <input type="text" name="matriculeChargeCaisse" id="matriculeChargeCaisse" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeCaisseHPS" class="col-sm-5">Heure de prise de service</label>
                                <input type="time" name="chargeCaisseHPS" id="chargeCaisseHPS" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeCaisseHFS" class="col-sm-5">Heure de fin de service</label>
                                <input type="time" name="chargeCaisseHFS" id="chargeCaisseHFS" class="form-control col-sm-7"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="align-items: center;">
                        <div class="col-4">
                            <h6>Chargée de caisse adjointe</h6>
                        </div>
                        <div class="col-1">
                            <hr class="burval-separator" style="height: 33vh;">
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="chargeCaisseAdjoint" class="col-sm-5">Matricule</label>
                                <select type="text" name="chargeCaisseAdjoint" id="chargeCaisseAdjoint" class="form-control col-sm-7">
                                    <option></option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{$personnel->id}}">{{$personnel->matricule}} | {{$personnel->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="nomChargeCaisseAdjoint" class="col-sm-5">Nom et Prenom(s)</label>
                                <input type="text" name="nomChargeCaisseAdjoint" id="nomChargeCaisseAdjoint" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="fonctionChargeCaisseAdjoint" class="col-sm-5">Fonction</label>
                                <input type="text" name="fonctionChargeCaisseAdjoint" id="fonctionChargeCaisseAdjoint" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="matriculeChargeCaisseAdjoint" class="col-sm-5">Matricule</label>
                                <input type="text" name="matriculeChargeCaisseAdjoint" id="matriculeChargeCaisseAdjoint" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeCaisseAdjointHPS" class="col-sm-5">Heure de prise de service</label>
                                <input type="time" name="chargeCaisseAdjointHPS" id="chargeCaisseAdjointHPS" class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeCaisseAdjointHFS" class="col-sm-5">Heure de fin de service</label>
                                <input type="time" name="chargeCaisseAdjointHFS" id="chargeCaisseAdjointHFS" class="form-control col-sm-7"/>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col-6" id="operatriceRow">
                    <div class="row" style="align-items: center;">
                        <div class="col-4">
                            <h6>Opératrice de caisse n°<span>1</span></h6>
                            <input name="numeroOperatriceCaisse[]" type="hidden" value="1">
                        </div>
                        <div class="col-1">
                            <hr class="burval-separator">
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-5">Nom et Prenom</label>
                                <select type="text" name="operatriceCaisse[]" class="form-control col-sm-7">
                                    <option></option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{$personnel->id}}">{{$personnel->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5">Numéro de box</label>
                                <select name="operatriceCaisseBox[]" class="form-control col-sm-7 numeroBox"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <br />
                    <br />
                    <button class="btn btn-primary btn-sm" type="button" id="ajouterOperatrice">Ajouter +</button>
                </div>
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
        $(document).ready(function () {
            for (let i = 1; i <= 10; i++ ) {
                $('.numeroBox').append($('<option>', {text: i, value: i}));
            }

            let operatrice = 1;
            $("#ajouterOperatrice").on("click", function() {
                operatrice++;
                const customHTML = '<div class="row" style="align-items: center;">\n' +
                    '                        <div class="col-4">\n' +
                    '                            <h6>Opératrice de caisse n°<span>'+operatrice+'</span></h6>\n' +
                    '                        </div><input name="numeroOperatriceCaisse[]" type="hidden" value="'+operatrice+'">\n' +
                    '                        <div class="col-1">\n' +
                    '                            <hr class="burval-separator">\n' +
                    '                        </div>\n' +
                    '                        <div class="col">\n' +
                    '                            <div class="form-group row">\n' +
                    '                                <label class="col-sm-5">Nom et Prenom</label>\n' +
                    '                                <select type="text" name="operatriceCaisse[]" class="form-control col-sm-7">\n' +
                    '                                    <option></option>\n' +
                    '                                    @foreach($personnels as $personnel)\n' +
                    '                                        <option value="{{$personnel->id}}">{{$personnel->nomPrenoms}}</option>\n' +
                    '                                    @endforeach\n' +
                    '                                </select>\n' +
                    '                            </div>\n' +
                    '                            <div class="form-group row">\n' +
                    '                                <label class="col-sm-5">Numéro de box</label>\n' +
                    '                                <select name="operatriceCaisseBox[]" class="form-control col-sm-7 numeroBox">' +
                    '                               <option value=1>1</option>' +
                    '                               <option value=2>2</option>' +
                    '                               <option value=3>3</option>' +
                    '                               <option value=4>4</option>' +
                    '                               <option value=5>5</option>' +
                    '                               <option value=6>6</option>' +
                    '                               <option value=7>7</option>' +
                    '                               <option value=8>8</option>' +
                    '                               <option value=9>9</option>' +
                    '                               <option value=10>10</option>' +
                    '                               </select>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>';

                $("#operatriceRow").append(customHTML);
            });
        });
    </script>
    <script>
        let personnels =  {!! json_encode($personnels) !!};
        $(document).ready(function() {
            $("#chargeCaisseAdjoint").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#nomChargeCaisseAdjoint").val(personnel.nomPrenoms);
                    $("#fonctionChargeCaisseAdjoint").val(personnel.fonction);
                    $("#matriculeOperatrice").val(personnel.matricule);
                }
            });

            $("#chargeCaisse").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#nomChargeCaisse").val(personnel.nomPrenoms);
                    $("#fonctionChargeCaisse").val(personnel.fonction);
                    $("#matriculeChargeCaisse").val(personnel.matricule);
                }
            });
        });

    </script>

@endsection
