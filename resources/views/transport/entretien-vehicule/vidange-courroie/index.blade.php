@extends('bases.transport')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Courroie</h2></div>
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

        <form method="post" action="{{ route('vidange-courroie.store') }}">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-md-4">Date</label>
                        <input type="date" class="form-control col-md-8" name="date" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Véhicule</label>
                        <select class="form-control form-control-sm col-md-8" name="idVehicule" id="vehicule" required>
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
                    <div class="form-group row">
                        <label class="col-md-4">Km actuel</label>
                        <input type="number" class="form-control form-control-sm col-md-8" name="kmActuel" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Prochain km</label>
                        <input type="number" class="form-control form-control-sm col-md-8" name="prochainKm" required/>
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block btn-sm">Valider</button>
                    <br/>
                    <button type="reset" class="btn btn-danger btn-block btn-sm">Annuler</button>
                    <br/>
                </div>
                <div class="col-6">
                    <table class="table table-bordered" id="liste">
                        <thead>
                        <tr>
                            <th>Véhicule</th>
                            <th>Total vidange</th>
                            <th>Prochain changement de courroie</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($vidanges as $vidange)
                            <tr>
                                <td>{{$vidange->idVehicule}}</td>
                                <td>{{$vidange->huileMoteurmontant + $vidange->filtreHuileMontant +
                            $vidange->filtreGazoilMontant + $vidange->filtreAirMontant }}
                                </td>
                                <td>{{date('d/m/Y', strtotime($vidange->date . " + 7 day"))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br/>

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
                        <input type="text" class="form-control form-control-sm" name="courroieFournisseur"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Montant</label>
                        <input type="text" min="0" class="form-control form-control-sm" name="courroieMontant"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        let centres = {!!json_encode($centres)!!};
        let centres_regionaux = {!!json_encode($centres_regionaux)!!};

        let vehicules = {!! json_encode($vehicules) !!};

        $(document).ready(function () {
            $("#vehicule").on("change", function () {
                const vehicule = vehicules.find(v => v.id === parseInt(this.value));
                if (vehicule) {
                    $("#centre").val(vehicule.centre);
                    $("#centreRegional").val(vehicule.centreRegional);
                }
            });
        });

        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
