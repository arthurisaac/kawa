@extends('bases.informatique')

@section('main')
    @extends('bases.toolbar', ["title" => "Informatique", "subTitle" => "Opération maintenance"])
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
            <form class="form-horizontal" method="post" action="{{ route('informatique-maintenance.store') }}">
            @csrf
            <div class="card card-xl stretch">
                <div class="card-header border-0 py-3 bg-warning">
                    <h3 class="card-title fw-bolder">
                        Maintenance
                    </h3>
                </div>
                <div class="card-body bg-card-kawa pt-3">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre</label>
                                <select
                                    class="form-select form-select-solid select2-hidden-accessible combobox"
                                    data-control="select2"
                                    data-placeholder="Centre"
                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                    data-kt-select2="true"
                                    aria-hidden="true"
                                    name="centre" id="centre" required>
                                    <option></option>
                                    @foreach ($centres as $centre)
                                        <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre régional</label>
                                    <select
                                        class="form-select form-select-solid select2-hidden-accessible combobox"
                                        data-control="select2"
                                        data-placeholder="Centre régional"
                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        name="centreRegional" id="centre_regional" required></select>
                                </div>
                            </div>
                    </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Service</label>
                                    <input class="form-control col-md-7" type="text" name="service" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date</label>
                                    <input class="form-control col-md-7" type="date" name="date" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Matériels défectueux</label>
                                    <input class="form-control col-md-7" type="text" name="materielDefectueux" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Rapport sur le matériel</label>
                                    <textarea class="form-control col-md-7" name="rapportMateriel" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date début intervention</label>
                                    <input class="form-control col-md-7" type="date" name="dateDebut" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date fin intervention</label>
                                    <input class="form-control col-md-7" type="date" name="dateFin" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Opération effectuée après rapport</label>
                                    <div class="form-check offset-5">
                                        <input class="form-check-input" type="radio" name="operationEffectuee" value="Maintenance effectuée et réparée">
                                        <label class="form-check-label">
                                            Maintenance effectuée et réparée
                                        </label>
                                    </div>
                                    <div class="form-check offset-5">
                                        <input class="form-check-input" name="operationEffectuee" type="radio" value="Nouveau matériel">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">
                                            Nouveau matériel
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card-footer">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
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
                // $('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

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
@endsection
