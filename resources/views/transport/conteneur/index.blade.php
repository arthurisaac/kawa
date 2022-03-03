@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Conteneur"])
    <div class="burval-container">
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

        <div class="row gy-5 g-xxl-12">
            <div class="col-xxl-12">
                <form class="form-horizontal" method="post" action="{{ route('conteneur.store') }}">
                    <div class="card card-xxl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Nouveau conteneur</h3>
                        </div>
                        <div class="card-body bg-card-kawa pt-5">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="conteneur" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Conteneur</label>
                                        <input type="text" class="form-control col" id="conteneur" name="conteneur" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="typeConteneur" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Type de conteneur</label>
                                        <select
                                            class="form-select form-select-solid select2-hidden-accessible combobox"
                                            data-control="select2"
                                            data-placeholder="Type de conteneur"
                                            data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            name="typeConteneur" id="typeConteneur" required>
                                            <option></option>
                                            <option value="BANK">BANK</option>
                                            <option value="MULTISHOP">MULTISHOP</option>
                                            <option value="RS 12">RS 12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="dateMiseVie" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date de mise en vie</label>
                                        <input type="date" class="form-control col" name="dateMiseVie" id="dateMiseVie" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="dureeVie" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Durée de vie</label>
                                        <input type="number" class="form-control col" name="dureeVie" id="dureeVie" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="etat" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Etat</label>
                                        <select
                                            class="form-select form-select-solid select2-hidden-accessible combobox"
                                            data-control="select2"
                                            data-placeholder="Etat"
                                            data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            name="etat" id="etat" required>
                                            <option value=""></option>
                                            <option value="EN VIE">EN VIE</option>
                                            <option value="DEGRADER">DEGRADER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="dateDegradation" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date dégradation</label>
                                        <input type="date" class="form-control col" name="dateDegradation" id="dateDegradation" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cause" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Cause</label>
                                        <input type="text" class="form-control col" name="cause" id="cause" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="remplacePar" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Remplacé par</label>
                                        <input type="text" class="form-control col" name="remplacePar" id="remplacePar" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="remplaceLe" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Remplacé le</label>
                                        <input type="date" class="form-control col" name="remplaceLe" id="remplaceLe" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="dateMaintenanceEffectuee" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date maintenance eff</label>
                                        <input type="date" class="form-control col" name="dateMaintenanceEffectuee" id="dateMaintenanceEffectuee" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="dateImputation" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date imputation</label>
                                        <input type="text" class="form-control col" name="dateImputation" id="dateImputation" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre</label>
                                        <select name="centre" id="centre"
                                                class="form-select form-select-solid select2-hidden-accessible combobox"
                                                data-control="select2"
                                                data-placeholder="Centre"
                                                data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true">
                                            <option>Choisir centre</option>
                                            @foreach ($centres as $centre)
                                                <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre régional</label>
                                        <select name="centreRegional" id="centre_regional"
                                                class="form-select form-select-solid select2-hidden-accessible combobox"
                                                data-control="select2"
                                                data-placeholder="Centre régional"
                                                data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true"></select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="dateRenouvellement" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date renouvellement</label>
                                        <input type="date" class="form-control col" name="dateRenouvellement" id="dateRenouvellement" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="imputationRaport" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Imputation rapport</label>
                                        <input type="text" class="form-control col" name="imputationRaport" id="imputationRaport" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        <br>
                    </div>
                    @csrf
                </form>
            </div>
        </div>

{{--    <form method="post" action="{{ route('conteneur.store') }}">--}}
{{--        @csrf--}}

{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Conteneur</label>--}}
{{--                    <input type="text" class="form-control col-sm-8" name="conteneur"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Type de conteneur</label>--}}
{{--                    <select class="form-control col-sm-8" name="typeConteneur">--}}
{{--                        <option value="BANK">BANK</option>--}}
{{--                        <option value="MULTISHOP">MULTISHOP</option>--}}
{{--                        <option value="RS 12">RS 12</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Date de mise en vie</label>--}}
{{--                    <input type="date" class="form-control col-sm-8" name="dateMiseVie"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Durée de vie</label>--}}
{{--                    <input type="number" class="form-control col-sm-8" name="dureeVie"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class=" col-sm-4">ETAT</label>--}}
{{--                    <select class="form-control col-sm-8" name="etat">--}}
{{--                        <option value="EN VIE">EN VIE</option>--}}
{{--                        <option value="DEGRADER">DEGRADER</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Date dégradation</label>--}}
{{--                    <input type="date" class="form-control col-sm-8" name="dateDegradation"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Cause</label>--}}
{{--                    <input type="text" class="form-control col-sm-8" name="cause"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Remplacé par</label>--}}
{{--                    <input type="text" class="form-control col-sm-8" name="remplacePar"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Remplacé le</label>--}}
{{--                    <input type="date" class="form-control col-sm-8" name="remplaceLe"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <button type="submit" class="btn btn-primary btn-sm">Valider</button>--}}
{{--                <button type="reset" class="btn btn-danger btn-sm">Annuler</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Date maintenance eff</label>--}}
{{--                    <input type="date" class="form-control col-sm-8" name="dateMaintenanceEffectuee"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Date imputation</label>--}}
{{--                    <input type="date" class="form-control col-sm-8" name="dateImputation"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Centre</label>--}}
{{--                    <select class="form-control col-sm-8" name="centre" id="centre" required>--}}
{{--                        <option>Choisir centre</option>--}}
{{--                        @foreach ($centres as $centre)--}}
{{--                        <option value="{{$centre->centre}}">{{$centre->centre}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Date renouvellement</label>--}}
{{--                    <input type="date" class="form-control col-sm-8" name="dateRenouvellement"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Imputation rapport</label>--}}
{{--                    <input type="text" class="form-control col-sm-8" name="imputationRaport"/>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Centre régional</label>--}}
{{--                    <select class="form-control  col-sm-8" name="centreRegional" id="centre_regional" required></select>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </form>--}}
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
