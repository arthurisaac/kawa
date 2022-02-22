@extends('bases.transport')

@section('main')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <br/>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <form method="post" action="{{ route('vehicule.update', $vehicule->id) }}">
                @csrf
                @method('PATCH')

                <div class="card card-xl-stretch">
                    <div class="card-body pt-5">
                        <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="vehicule-tab" data-toggle="tab" href="#vehicule"
                                   role="tab"
                                   aria-controls="depart-centre" aria-selected="true">Véhicules</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="chauffeur-titulaire-tab" data-toggle="tab"
                                   href="#chauffeur-titulaire"
                                   role="tab"
                                   aria-controls="arrivee-site" aria-selected="false">Chauffeur titulaire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="chauffeur-suppleant-tab" data-toggle="tab"
                                   href="#chauffeur-suppleant"
                                   role="tab"
                                   aria-controls="depart-site" aria-selected="false">Chauffeur suppléant</a>
                            </li>
                        </ul>
                        <br>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="vehicule" role="tabpanel"
                                 aria-labelledby="vehicule-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Immatriculation</label>
                                                <input type="text" class="form-control" name="immatriculation"
                                                       value="{{$vehicule->immatriculation}}" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Marque</label>
                                                <input type="text" class="form-control" name="marque"
                                                       value="{{$vehicule->marque}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select class="form-control" name="type" required>
                                                    <option>{{$vehicule->type}}</option>
                                                    <option value="VL">VL</option>
                                                    <option value="VL">VB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Photo</label>
                                                <input type="file" class="form-control-file" name="photo"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <br/>
                                            <button class="btn btn-primary btn-sm btn-block" type="submit">Valider
                                            </button>
                                            <br/>
                                            <button class="btn btn-danger btn-sm btn-block" type="reset">Annuler
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Code</label>
                                                <input type="text" class="form-control" name="code"
                                                       value="{{$vehicule->code}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>DPMC</label>
                                                <input type="date" class="form-control" name="DPMC"
                                                       value="{{$vehicule->DPMC}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Centre</label>
                                                <select class="form-control" name="centre" id="centre" required>
                                                    <option>{{$vehicule->centre}}</option>
                                                    @foreach ($centres as $centre)
                                                        <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>N°Chassis</label>
                                                <input type="text" class="form-control" name="num_chassis"
                                                       value="{{$vehicule->num_chassis}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Date d'aquisition</label>
                                                <input type="date" class="form-control" name="dateAcquisition"
                                                       value="{{$vehicule->dateAcquisition}}" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Centre régional</label>
                                                <select class="form-control" name="centreRegional" id="centre_regional"
                                                        required>
                                                    <option>{{$vehicule->centreRegional}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="chauffeur-titulaire" role="tabpanel"
                                 aria-labelledby="chauffeur-titulaire-tab">
                                <div class="container">
                                    <div class="row" style="align-items: center;">
                                        <div class="col-2">
                                            <h6>Chauffeur titulaire</h6>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label class="col-md-3">Matricule</label>
                                                <select class="editbox col-md-4" name="chauffeurTitulaire"
                                                        id="chauffeurTitulaire">
                                                    <option
                                                        value="{{$vehicule->chauffeurTitulaire}}">{{$vehicule->chauffeurTitulaires->matricule ?? $vehicule->chauffeurTitulaire}}</option>
                                                    @foreach($personnels as $personnel)
                                                        <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                            | {{$personnel->nomPrenoms}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3">Nom</label>
                                                <input type="text" class="editbox col-md-4"
                                                       name="chauffeurTitulaireNomPrenoms"
                                                       id="chauffeurTitulaireNomPrenoms"
                                                       value="{{$vehicule->chauffeurTitulaires->nomPrenoms ?? ''}}"
                                                       readonly/>
                                            </div>
                                            {{--<div class="form-group row">
                                                <label class="col-md-3">Prénom</label>
                                                <input type="text" class="editbox col-md-4" name="chauffeurTitulairePrenom"
                                                       id="chauffeurTitulairePrenom"/>
                                            </div>--}}
                                            <div class="form-group row">
                                                <label class="col-md-3">Fonction</label>
                                                <input type="text" class="editbox col-md-4"
                                                       name="chauffeurTitulaireFonction"
                                                       id="chauffeurTitulaireFonction"
                                                       value="{{$vehicule->chauffeurTitulaires->fonction ?? ''}}"
                                                       readonly/>
                                            </div>
                                            {{--<div class="form-group row">
                                                <label class="col-md-3">Matricule</label>
                                                <input type="text" class="editbox col-md-4" name="chauffeurTitulaireMatricule"
                                                       id="chauffeurTitulaireMatricule" readonly/>
                                            </div>--}}
                                            <div class="form-group row">
                                                <label class="col-md-3">Date d'affection</label>
                                                <input type="date" class="editbox col-md-4"
                                                       name="chauffeurTitulaireDateAffection"
                                                       id="chauffeurTitulaireDateAffection" readonly
                                                       value="{{$vehicule->chauffeurTitulaires->dateEntreeSociete ?? ''}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="chauffeur-suppleant" role="tabpanel"
                                 aria-labelledby="chauffeur-suppleant-tab">
                                <div class="container">
                                    <div class="row" style="align-items: center;">
                                        <div class="col-2">
                                            <h6>Chauffeur Suppléant</h6>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label class="col-md-3">Matricule</label>
                                                <select class="editbox col-md-4" name="chauffeurSuppleant"
                                                        id="chauffeurSuppleant">
                                                    <option
                                                        value="{{$vehicule->chauffeurSuppleant}}">{{$vehicule->chauffeurSuppleants->matricule ?? $vehicule->chauffeurSuppleant}}</option>
                                                    @foreach($personnels as $personnel)
                                                        <option value="{{$personnel->id}}">{{$personnel->matricule}}
                                                            | {{$personnel->nomPrenoms}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3">Nom</label>
                                                <input type="text" class="editbox col-md-4"
                                                       name="chauffeurSuppleantNomPrenoms"
                                                       id="chauffeurSuppleantNomPrenoms"
                                                       value="{{$vehicule->chauffeurSuppleants->nomPrenoms ?? ''}}"
                                                       readonly/>
                                            </div>
                                            {{--<div class="form-group row">
                                                <label class="col-md-3">Prénom</label>
                                                <input type="text" class="editbox col-md-4" name="chauffeurSuppleantPrenom"
                                                       id="chauffeurSuppleantPrenom" readonly/>
                                            </div>--}}
                                            <div class="form-group row">
                                                <label class="col-md-3">Fonction</label>
                                                <input type="text" class="editbox col-md-4"
                                                       name="chauffeurSuppleantFonction"
                                                       id="chauffeurSuppleantFonction"
                                                       value="{{$vehicule->chauffeurSuppleants->fonction ?? ''}}"
                                                       readonly/>
                                            </div>
                                            {{--<div class="form-group row">
                                                <label class="col-md-3">Matricule</label>
                                                <input type="text" class="editbox col-md-4" name="chauffeurSuppleantMatricule"
                                                       id="chauffeurSuppleantMatricule" readonly/>
                                            </div>--}}
                                            <div class="form-group row">
                                                <label class="col-md-3">Date d'affection</label>
                                                <input type="date" class="editbox col-md-4"
                                                       name="chauffeurSuppleantDateAffection"
                                                       id="chauffeurSuppleantDateAffection"
                                                       value="{{$vehicule->chauffeurSuppleants->dateEntreeSociete ?? ''}}"
                                                       readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.history.back()">Annuler</button>
                        <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        let personnels = {!! json_encode($personnels) !!};

        $(document).ready(function () {
            $("#chauffeurTitulaire").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                console.log(personnel);
                if (personnel) {
                    $("#chauffeurTitulaireNomPrenoms").val(personnel.nomPrenoms);
                    $("#chauffeurTitulaireFonction").val(personnel.fonction);
                    $("#chauffeurTitulaireMatricule").val(personnel.matricule);
                    $("#chauffeurTitulaireDateAffection").val(personnel.dateEntreeSociete);
                }
            });
        });

        $(document).ready(function () {
            $("#chauffeurSuppleant").on("change", function () {
                const personnel = personnels.find(p => p.id === parseInt(this.value));
                console.log(personnel);
                if (personnel) {
                    $("#chauffeurSuppleantNomPrenoms").val(personnel.nomPrenoms);
                    $("#chauffeurSuppleantFonction").val(personnel.fonction);
                    $("#chauffeurSuppleantMatricule").val(personnel.matricule);
                    $("#chauffeurSuppleantDateAffection").val(personnel.dateEntreeSociete);
                }
            });
        });

        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                $('#centre_regional').append($('<option>', {text: ""}));

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
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
@endsection
