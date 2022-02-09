@extends('bases.caisse')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
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
                        <input type="date" name="date" class="form-control col-sm-7" value="{{date('Y-m-d')}}" required/>
                    </div>
                    <div class="form-group row">
                        <label for="centre" class="col-sm-5">Centre</label>
                        <select name="centre" id="centre" class="form-control col-sm-7" required>
                            <option></option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="centre_regional" class="col-sm-5">Centre régional</label>
                        <select id="centre_regional" name="centreRegional" class="form-control col-sm-7"
                                required></select>
                    </div>
                </div>
            </div>
            <br>
            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="charge-caisse-tab" data-toggle="tab" href="#charge-caisse" role="tab"
                       aria-controls="charge-caisse" aria-selected="true">Chargé de caisse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="operatrice-caisse-tab" data-toggle="tab" href="#operatrice-caisse"
                       role="tab"
                       aria-controls="operatrice-caisse" aria-selected="false">Opératrice de caisse</a>
                </li>
            </ul>
            <br>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="charge-caisse" role="tabpanel"
                     aria-labelledby="charge-caisse-tab">
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
                                        <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                            | {{$personnel->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="nomChargeCaisse" class="col-sm-5">Nom et Prenom(s)</label>
                                <input type="text" name="nomChargeCaisse" id="nomChargeCaisse"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="fonctionChargeCaisse" class="col-sm-5">Fonction</label>
                                <input type="text" name="fonctionChargeCaisse" id="fonctionChargeCaisse"
                                       class="form-control col-sm-7"/>
                            </div>
                            {{--<div class="form-group row">
                                <label for="matriculeChargeCaisse" class="col-sm-5">Matricule</label>
                                <input type="text" name="matriculeChargeCaisse" id="matriculeChargeCaisse" class="form-control col-sm-7"/>
                            </div>--}}
                            <div class="form-group row">
                                <label for="chargeCaisseHPS" class="col-sm-5">Heure de prise de service</label>
                                <input type="time" name="chargeCaisseHPS" id="chargeCaisseHPS"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeCaisseHFS" class="col-sm-5">Heure de fin de service</label>
                                <input type="time" name="chargeCaisseHFS" id="chargeCaisseHFS"
                                       class="form-control col-sm-7"/>
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
                                <select type="text" name="chargeCaisseAdjoint" id="chargeCaisseAdjoint"
                                        class="form-control col-sm-7">
                                    <option></option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                            | {{$personnel->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="nomChargeCaisseAdjoint" class="col-sm-5">Nom et Prenom(s)</label>
                                <input type="text" name="nomChargeCaisseAdjoint" id="nomChargeCaisseAdjoint"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="fonctionChargeCaisseAdjoint" class="col-sm-5">Fonction</label>
                                <input type="text" name="fonctionChargeCaisseAdjoint" id="fonctionChargeCaisseAdjoint"
                                       class="form-control col-sm-7"/>
                            </div>
                            {{--<div class="form-group row">
                                <label for="matriculeChargeCaisseAdjoint" class="col-sm-5">Matricule</label>
                                <input type="text" name="matriculeChargeCaisseAdjoint" id="matriculeChargeCaisseAdjoint" class="form-control col-sm-7"/>
                            </div>--}}
                            <div class="form-group row">
                                <label for="chargeCaisseAdjointHPS" class="col-sm-5">Heure de prise de service</label>
                                <input type="time" name="chargeCaisseAdjointHPS" id="chargeCaisseAdjointHPS"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label for="chargeCaisseAdjointHFS" class="col-sm-5">Heure de fin de service</label>
                                <input type="time" name="chargeCaisseAdjointHFS" id="chargeCaisseAdjointHFS"
                                       class="form-control col-sm-7"/>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="operatrice-caisse" role="tabpanel"
                     aria-labelledby="operatrice-caisse-tab">

                    <button class="btn btn-primary btn-sm" type="button" id="ajouterOperatrice">Ajouter +</button>
                    <br>
                    <br>
                    <div class="row">
                        <table class="table table-striped table-bordered" id="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nom & Prenom</th>
                                <th>Heure départ</th>
                                <th>Heure arrivée</th>
                                <th>Box</th>
                                <th></th>
                            </tr>

                            </thead>
                            <tbody>
                            @for($i = 0; $i < 10; $i++)
                                <tr>
                                    <td><input name="numeroOperatriceCaisse[]" type="hidden" value="1"></td>
                                    <td><select name="operatriceCaisse[]" class="form-control">
                                            <option></option>
                                            @foreach($personnels as $personnel)
                                                <option value="{{$personnel->id}}">{{$personnel->nomPrenoms}}</option>
                                            @endforeach
                                        </select></td>
                                    <td><input type="time" name="heureArrivee[]" class="form-control" /></td>
                                    <td><input type="time" name="heureDepart[]" class="form-control" /></td>
                                    <td><select name="operatriceCaisseBox[]"
                                                class="form-control numeroBox">
                                            @for($i = 1; $i <= 10; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select></td>
                                    <td><a class="btn btn-sm btn-danger" onclick="supprimerLigne(this)"></a></td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                        <div class="col-6" id="operatriceRow"></div>

                    </div>
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
        function supprimerLigne(e) {
            console.log("ok");
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("table").deleteRow(indexLigne);
        }
    </script>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

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
            for (let i = 1; i <= 10; i++) {
                $('.numeroBox').append($('<option>', {text: i, value: i}));
            }

            let operatrice = 1;
            $("#ajouterOperatrice").on("click", function () {
                operatrice++;
                $("#table").append('<tr>\n' +
                    '                                    <td><input name="numeroOperatriceCaisse[]" type="hidden" value="1"></td>\n' +
                    '                                    <td><select name="operatriceCaisse[]" class="form-control">\n' +
                    '                                            <option></option>\n' +
                    '                                            @foreach($personnels as $personnel)\n' +
                    '                                                <option value="{{$personnel->id}}">{{$personnel->nomPrenoms}}</option>\n' +
                    '                                            @endforeach\n' +
                    '                                        </select></td>\n' +
                    '                                    <td><input type="time" name="heureArrivee[]" class="form-control" /></td>\n' +
                    '                                    <td><input type="time" name="heureDepart[]" class="form-control" /></td>' +
                    '                                    <td><select name="operatriceCaisseBox[]"\n' +
                    '                                                class="form-control numeroBox">\n' +
                    '                                            @for($i = 1; $i <= 10; $i++)\n' +
                    '                                                <option value="{{$i}}">{{$i}}</option>\n' +
                    '                                            @endfor\n' +
                    '                                        </select></td>\n' +
                    '                                    <td><a class="btn btn-sm btn-danger" onclick="supprimerLigne(this)"></a></td>\n' +
                    '                                </tr>');

            });
        });
    </script>
    <script>
        let personnels =  {!! json_encode($personnels) !!};
        $(document).ready(function () {
            $("#chargeCaisseAdjoint").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#nomChargeCaisseAdjoint").val(personnel.nomPrenoms);
                    $("#fonctionChargeCaisseAdjoint").val(personnel.fonction);
                    // $("#matriculeOperatrice").val(personnel.matricule);
                }
            });

            $("#chargeCaisse").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                if (personnel) {
                    $("#nomChargeCaisse").val(personnel.nomPrenoms);
                    $("#fonctionChargeCaisse").val(personnel.fonction);
                    // $("#matriculeChargeCaisse").val(personnel.matricule);
                }
            });
        });

    </script>

@endsection
