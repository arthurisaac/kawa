@extends('bases.informatique')

@section('main')
    @extends('bases.toolbar', ["title" => "Informatique", "subTitle" => "Mission"])
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

            <form class="form-horizontal" method="post" action="{{ route('informatique-mission.store') }}">
            @csrf
                <div class="card card-xl-stretch">
                    <div class="card-header border-0 py-5 bg-warning">
                        <h3 class="card-title fw-bolder">Mission</h3>
                    </div>
                    <div class="card-body bg-card-kawa pt-2">
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
                                        name="centreRegional" id="centre_regional"
                                        required></select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Service</label>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="col-sm-5">Du</label>
                                            <input type="date" class="form-control col-sm-7" name="debut" id="debut" required/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Au</label>
                                            <input type="date" class="form-control col-sm-7" name="fin" id="fin" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col">
                                 <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                     <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Service</label>
                                     <input type="text" class="form-control col-md-7" name="service" required/>
                                 </div>
                             </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nbre de jours</label>
                                    <input type="number" class="form-control col-md-7" name="nombreDeJours" id="nombreDeJours" readonly required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Objet de la mission</label>
                                    <input type="text" class="form-control col-md-7" name="objetMission" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Intervention effectuée</label>
                                    <textarea class="form-control col-md-7" name="interventionEffectuee" required></textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Rapport sur la mission</label>
                                    <textarea class="form-control col-md-7" name="rapportMission" required></textarea>
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
                });
            });

            $("#fin").on("change", function() {
                const debut = $('#debut').val();
                const fin = $('#fin').val();
                const dateDebut = new Date(debut);
                const dateFin = new Date(fin);
                const Difference_In_Days = ( dateFin.getTime() - dateDebut.getTime() ) / (1000 * 3600 * 24);
                $("#nombreDeJours").val(Difference_In_Days);
            })
        });
    </script>
@endsection
