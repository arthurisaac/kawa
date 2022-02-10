@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Entretien Véhicule"])
@section("nouveau")
    <a href="/entretien-vehicule" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
    <div class="burval-container">
        <div><h2 class="heading">Entretien véhicule</h2></div>
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
            </div><br/>
        @endif
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-md-4">Date</label>
                        <input type="date" class="form-control col-md-8" value="{{date('Y-m-d')}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Véhicule</label>
                        <select class="form-control form-control-sm col-md-8" name="vehicule" id="vehicule" required>
                            <option></option>
                            @foreach($vehicules as $vehicule)
                                <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Centre</label>
                        <input type="text" class="form-control form-control-sm col-md-8" name="centre" id="centre"
                               required readonly/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Centre régional</label>
                        <input type="text" class="form-control form-control-sm col-md-8" name="centreRegional"
                               id="centreRegional"
                               required readonly/>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <br/>
            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="vidange-generale-tab" data-toggle="tab" href="#vidange-generale"
                       role="tab"
                       aria-controls="vidange-generale" aria-selected="true">Vidange générale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="vidange-huile-tab" data-toggle="tab" href="#vidange-huile" role="tab"
                       aria-controls="vidange-huile" aria-selected="false">Vidange huile de pont</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="patente-tab" data-toggle="tab" href="#patente" role="tab"
                       aria-controls="patente" aria-selected="false">Patente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courroie-tab" data-toggle="tab" href="#courroie" role="tab"
                       aria-controls="courroie" aria-selected="false">Courroie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="vignette-tab" data-toggle="tab" href="#vignette" role="tab"
                       aria-controls="vignette" aria-selected="false">Vignette</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="carte-transport-tab" data-toggle="tab" href="#carte-transport" role="tab"
                       aria-controls="carte-transport" aria-selected="false">Carte de transport</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="vidange-visite-tab" data-toggle="tab" href="#vidange-visite" role="tab"
                       aria-controls="vidange-visite" aria-selected="false">Visite technique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="assurance-tab" data-toggle="tab" href="#assurance" role="tab"
                       aria-controls="assurance" aria-selected="false">Assurance</a>
                </li>
            </ul>
            <br>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="vidange-generale" role="tabpanel"
                     aria-labelledby="vidange-generale-tab">
                    <form method="post" action="{{ route('vidange-generale.store') }}">
                        @csrf
                        <div class="container">
                            <input type="hidden" name="idVehicule_generale" required>
                            <input type="hidden" name="date" value="{{date('Y-m-d')}}" required/>
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-md-4">Km actuel</label>
                                    <input type="number" class="form-control form-control-sm col-md-8" name="kmActuel"
                                           required/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Prochain km</label>
                                    <input type="number" class="form-control form-control-sm col-md-8" name="prochainKm"
                                           required/>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label>Huile de moteur</label>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Oui</label><br/>
                                                        <input type="radio" class="form-check-input col-md-10" value="1"
                                                               name="huileMoteur"/>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Non</label><br/>
                                                        <input type="radio" class="form-check-input col-md-10" value="0"
                                                               name="huileMoteur"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Marque</label>
                                        <input type="text" class="form-control form-control-sm"
                                               name="huileMoteurMarque"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nombre de km</label>
                                        <input type="text" class="form-control form-control-sm" name="huileMoteurKm"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Fournisseur</label>
                                        <input type="text" class="form-control form-control-sm"
                                               name="huileMoteurFournisseur"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Montant</label>
                                        <input type="text" min="0" class="form-control form-control-sm"
                                               name="huileMoteurmontant"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Filtre à huile</label>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Oui</label><br/>
                                                    <input type="radio" class="form-check-input col-md-10" value="1"
                                                           name="filtreHuile"/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Non</label><br/>
                                                    <input type="radio" class="form-check-input col-md-10" value="0"
                                                           name="filtreHuile"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Montant</label>
                                        <input type="number" min="0" class="form-control form-control-sm"
                                               name="filtreHuileMontant"/>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Filtre à gazoil</label>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Oui</label><br/>
                                                    <input type="radio" class="form-check-input col-md-10" value="1"
                                                           name="filtreGazoil"/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Non</label><br/>
                                                    <input type="radio" class="form-check-input col-md-10" value="0"
                                                           name="filtreGazoil"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Montant</label>
                                        <input type="number" min="0" class="form-control form-control-sm"
                                               name="filtreGazoilMontant"/>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Filtre à air</label>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Oui</label><br/>
                                                    <input type="radio" class="form-check-input col-md-10" value="1"
                                                           name="filtreAir"/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Non</label><br/>
                                                    <input type="radio" class="form-check-input col-md-10" value="0"
                                                           name="filtreAir"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Montant</label>
                                        <input type="number" min="0" class="form-control form-control-sm"
                                               name="filtreAirMontant"/>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label>Autres consommables</label>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Oui</label><br/>
                                                    <input type="radio" class="form-check-input col-md-10" value="1"
                                                           name="autresConsommables"/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Non</label><br/>
                                                    <input type="radio" class="form-check-input col-md-10" value="0"
                                                           name="autresConsommables"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Montant</label>
                                        <input type="number" min="0" class="form-control form-control-sm"
                                               name="autresConsommablesMontant"/>
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="vidange-huile" role="tabpanel" aria-labelledby="vidange-huile-tab">
                    <div class="container">
                        <form method="post" action="{{ route('vidange-pont.store') }}">
                            @csrf

                            <input type="hidden" name="idVehicule" required>
                            <input type="hidden" name="date" value="{{date('Y-m-d')}}" required/>
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-md-4">Km actuel</label>
                                    <input type="number" class="form-control form-control-sm col-md-8" name="kmActuel"
                                           required/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Prochain km</label>
                                    <input type="number" class="form-control form-control-sm col-md-8" name="prochainKm"
                                           required/>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="courroie" role="tabpanel" aria-labelledby="courroie-tab">
                    <div class="container">
                        <form method="post" action="{{ route('vidange-courroie.store') }}">
                            @csrf

                            <input type="hidden" name="idVehicule_courroie" required>
                            <input type="hidden" name="date" value="{{date('Y-m-d')}}" required/>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label class="col-md-4">Km actuel</label>
                                        <input type="number" class="form-control form-control-sm col-md-8"
                                               name="kmActuel"
                                               required/>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Prochain km</label>
                                        <input type="number" class="form-control form-control-sm col-md-8"
                                               name="prochainKm"
                                               required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Courroie</label>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Oui</label><br/>
                                                        <input type="radio" class="form-check-input col-md-10" value="1"
                                                               name="courroie"/>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Non</label><br/>
                                                        <input type="radio" class="form-check-input col-md-10" value="0"
                                                               name="courroie"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Marque</label>
                                        <input type="text" class="form-control form-control-sm" name="courroieMarque"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nombre de km</label>
                                        <input type="text" class="form-control form-control-sm" name="courroieKm"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Fournisseur</label>
                                        <input type="text" class="form-control form-control-sm"
                                               name="courroieFournisseur"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Montant</label>
                                        <input type="text" min="0" class="form-control form-control-sm"
                                               name="courroieMontant"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>

                            <br>
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="patente" role="tabpanel" aria-labelledby="patente-tab">
                    <div class="container">
                        <form method="post" action="{{ route('vidange-patente.store') }}">
                            @csrf
                            <input type="hidden" name="idVehicule_patente" required>
                            <input type="hidden" name="date" value="{{date('Y-m-d')}}" required/>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-md-4">Date de renouvellement</label>
                                        <input type="date" class="form-control form-control-sm col-md-8" name="dateRenouvellement"/>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Prochain renouvellement</label>
                                        <input type="date" class="form-control form-control-sm col-md-8" name="prochainRenouvellement"/>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Montant</label>
                                        <input type="number" min="0" class="form-control form-control-sm col-md-8" name="montant"/>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Valider</button>
                                    <br/>
                                    <button type="reset" class="btn btn-danger btn-block btn-sm">Annuler</button>
                                    <br/>
                                </div>
                            </div>
                            <br/>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="vignette" role="tabpanel" arialabelledby="vignette-tab">
                    <div class="container">
                        <form method="post" action="{{ route('vidange-vignette.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group row">
                                        <label class="col-md-4">Date de renouvellement</label>
                                        <input type="date" class="form-control form-control-sm col-md-8"
                                               name="dateRenouvellement"/>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Prochain renouvellement</label>
                                        <input type="date" class="form-control form-control-sm col-md-8"
                                               name="prochainRenouvellement"/>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Montant</label>
                                        <input type="number" min="0" class="form-control form-control-sm col-md-8"
                                               name="montant"/>
                                    </div>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                            <input type="hidden" name="idVehicule_vignette" required>
                            <input type="hidden" name="date" value="{{date('Y-m-d')}}" required/>

                            <br/>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="carte-transport" role="tabpanel"
                     aria-labelledby="carte-transport-tab">
                    <form method="post" action="{{ route('vidange-transport.store') }}">
                        @csrf
                        <input type="hidden" name="idVehicule_transport" required>
                        <br>
                        <input type="hidden" name="date" value="{{date('Y-m-d')}}" required/>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-md-4">Date de renouvellement</label>
                                    <input type="date" class="form-control form-control-sm col-md-8"
                                           name="dateRenouvellement"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Prochain renouvellement</label>
                                    <input type="date" class="form-control form-control-sm col-md-8"
                                           name="prochainRenouvellement"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Montant</label>
                                    <input type="number" min="0" class="form-control form-control-sm col-md-8"
                                           name="montant"/>
                                </div>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="vidange-visite" role="tabpanel"
                     aria-labelledby="vidange-visite-tab">
                    <form method="post" action="{{ route('vidange-visite.store') }}">
                        @csrf

                        <input type="hidden" name="idVehicule_visite" required>
                        <input type="hidden" name="date" value="{{date('Y-m-d')}}" required/>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                    <label class="col-md-4">Date de renouvellement</label>
                                    <input type="date" class="form-control form-control-sm col-md-8" name="dateRenouvellement"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Prochain renouvellement</label>
                                    <input type="date" class="form-control form-control-sm col-md-8" name="prochainRenouvellement"/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Montant</label>
                                    <input type="number" min="0" class="form-control form-control-sm col-md-8" name="montant"/>
                                </div>
                            </div>
                            <div class="col-6">
                            </div>
                        </div>
                        <br/>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="assurance" role="tabpanel"
                     aria-labelledby="assurance-tab">
                    <form method="post" action="{{ route('vidange-assurance.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-4">

                                <input type="hidden" name="idVehicule_assurance" required>
                                <input type="hidden" name="date" value="{{date('Y-m-d')}}" required/>
                                <div class="form-group row">
                                    <label class="col-md-4">Date de renouvellement</label>
                                    <input type="date" class="form-control form-control-sm col-md-8" name="dateRenouvellement" required/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Prochain renouvellement</label>
                                    <input type="date" class="form-control form-control-sm col-md-8" name="prochainRenouvellement" required/>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Montant</label>
                                    <input type="number" min="0" class="form-control form-control-sm col-md-8" name="montant" required/>
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary btn-block btn-sm">Valider</button>
                                <br/>
                                <button type="reset" class="btn btn-danger btn-block btn-sm">Annuler</button>
                                <br/>
                            </div>
                            <div class="col-6">

                            </div>
                        </div>
                        <br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let centres = {!!json_encode($centres)!!};
        let centres_regionaux = {!!json_encode($centres_regionaux)!!};

        let vehicules =  {!! json_encode($vehicules) !!};

        $(document).ready(function () {
            $("#vehicule").on("change", function () {
                const vehicule = vehicules.find(v => v.id === parseInt(this.value));
                if (vehicule) {
                    $("#centre").val(vehicule.centre);
                    $("#centreRegional").val(vehicule.centreRegional);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#vehicule").on("change", function () {
                $("input[name='idVehicule']").val(this.value);
                $("input[name='idVehicule_generale']").val(this.value);
                $("input[name='idVehicule_courroie']").val(this.value);
                $("input[name='idVehicule_vignette']").val(this.value);
                $("input[name='idVehicule_transport']").val(this.value);
                $("input[name='idVehicule_visite']").val(this.value);
                $("input[name='idVehicule_patente']").val(this.value);
                $("input[name='idVehicule_assurance']").val(this.value);
            })
        })
    </script>
    <script>
        function supprimerVHM(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-pont/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVHM").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
        function supprimerVCT(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-transport/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVCT").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
        function supprimerVVT(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-visite/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVVT").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
        function supprimerVC(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-courroie/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVC").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
        function supprimerVV(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-vignette/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVV").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
    </script>
@endsection
