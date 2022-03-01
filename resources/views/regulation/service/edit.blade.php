@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Mofification Service"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
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
            <form method="post" action="{{ route('regulation-service.update', $id) }}">
            @method('PATCH')
            @csrf
                <div class="card card-xl-stretch">
                    <div class="card-header border-0 py-5 bg-gradient-kawa">
                        <h3 class="card-title fw-bolder">Service</h3>
                    </div>
                    <div class="card-body bg-card-kawa pt-3">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date</label>
                                    <input type="date" name="date" class="form-control col-sm-7" value="{{$service->date}}" required />
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre</label>
                                    <select name="centre" id="centre"
                                            class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Centre"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            required>
                                        <option>{{$service->centre}}</option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre régional</label>
                                    <select id="centre_regional" name="centreRegional"
                                            class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Centre régional"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            required>
                                        <option>{{$service->centreRegional}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-xl-stretch">
                    <div class="card-header bg-border-0 py-5">
                        <h3 class="card-title fw-bolder">
                            Chargé de régulation
                        </h3>
                    </div>
                    <div class="card-body bg-card-kawa pt-1">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="chargeeRegulation" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                    <select type="text" name="chargeeRegulation" id="chargeeRegulation"
                                            class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Matricule"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true">
                                        <option value="{{$service->chargeeRegulation}}">{{$service->chargeRegulations->matricule ?? "Donnée indisponible"}} | {{$service->chargeRegulations->nomPrenoms ?? "---"}}</option>
                                        @foreach($personnels as $personnel)
                                            <option value="{{$personnel->id}}">{{$personnel->matricule}} | {{$personnel->nomPrenoms}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="nomchargeeRegulation" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom et Prenom(s)</label>
                                    <input type="text" name="nomchargeeRegulation" id="nomchargeeRegulation" value="{{$service->chargeRegulations->nomPrenoms ?? ""}}" class="form-control col-sm-7"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="fonctionchargeeRegulation" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction</label>
                                    <input type="text" name="fonctionchargeeRegulation" id="fonctionchargeeRegulation" value="{{$service->chargeRegulations->fonction ?? ""}}" class="form-control col-sm-7"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container" style="display: none;">
                                        <label for="matriculechargeeRegulation" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                        <input type="text" name="matriculechargeeRegulation" id="matriculechargeeRegulation" value="{{$service->chargeRegulations->matricule ?? ""}}" class="form-control col-sm-7"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="chargeeRegulationHPS" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de prise de service</label>
                                        <input type="time" name="chargeeRegulationHPS" id="chargeeRegulationHPS" value="{{$service->chargeeRegulationHPS}}" class="form-control col-sm-7"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="chargeeRegulationHFS" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de fin de service</label>
                                        <input type="time" name="chargeeRegulationHFS" id="chargeeRegulationHFS" value="{{$service->chargeeRegulationHFS}}" class="form-control col-sm-7"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-xl-stretch">
                        <div class="card-header bg-border-0 py-5">
                            <h3 class="card-title fw-bolder">Chargée de régulation adjointe</h3>
                        </div>
                        <div class="card-body bg-card-kawa">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="chargeeRegulationAdjoint" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                        <select type="text" name="chargeeRegulationAdjointe" id="chargeeRegulationAdjoint"
                                                class="form-select form-select-solid select2-hidden-accessible"
                                                data-control="select2"
                                                data-placeholder="Matricule"
                                                data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true">
                                            <option value="{{$service->chargeeRegulationAdjointe}}">{{$service->chargeRegulationAdjointes->matricule ?? "Donnée indisponible"}} | {{$service->chargeRegulationAdjointes->nomPrenoms ?? "___"}}</option>
                                            @foreach($personnels as $personnel)
                                                <option value="{{$personnel->id}}">{{$personnel->matricule}} | {{$personnel->nomPrenoms}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="nomchargeeRegulationAdjoint" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom et Prenom(s)</label>
                                        <input type="text" name="nomchargeeRegulationAdjoint" id="nomchargeeRegulationAdjoint" value="{{$service->chargeRegulationAdjointes->nomPrenoms ?? ''}}" class="form-control col-sm-7"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="fonctionchargeeRegulationAdjoint" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction</label>
                                        <input type="text" name="fonctionchargeeRegulationAdjoint" id="fonctionchargeeRegulationAdjoint" value="{{$service->chargeRegulationAdjointes->fonction ?? ''}}" class="form-control col-sm-7"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="matriculechargeeRegulationAdjoint" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matricule</label>
                                            <input type="text" name="matriculechargeeRegulationAdjoint" id="matriculechargeeRegulationAdjoint" value="{{$service->chargeRegulationAdjointes->matricule ?? ''}}" class="form-control col-sm-7"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="chargeeRegulationAdjointHPS" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de prise de service</label>
                                            <input type="time" name="chargeeRegulationAdjointHPS" id="chargeeRegulationAdjointHPS" value="{{$service->chargeeRegulationAdjointeHPS}}" class="form-control col-sm-7"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="chargeeRegulationAdjointHFS" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure de fin de service</label>
                                            <input type="time" name="chargeeRegulationAdjointHFS" id="chargeeRegulationAdjointHFS" value="{{$service->chargeeRegulationAdjointeHFS}}" class="form-control col-sm-7"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            for (let i = 1; i <= 10; i++) {
                $('.numeroBox').append($('<option>', {text: i, value: i}));
            }

            let operatrice = 1;
            $("#ajouterOperatrice").on("click", function () {
                operatrice++;
                const customHTML = '<div class="row" style="align-items: center;">\n' +
                    '                        <div class="col-4">\n' +
                    '                            <h6>Opératrice de caisse n°<span>' + operatrice + '</span></h6>\n' +
                    '                        </div><input name="numeroOperatriceCaisse[]" type="hidden" value="' + operatrice + '">\n' +
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
