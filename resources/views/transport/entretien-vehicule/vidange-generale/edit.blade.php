@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entretien</h2></div>
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
            <div>
                <form method="post" action="{{ route('vidange-generale.update', $vidange->id) }}">
                    @csrf
                    @method("PATCH")

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-md-4">Date</label>
                                <input type="date" class="form-control col-md-8" value="{{$vidange->date}}" required/>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Véhicule</label>
                                <input type="text" class="form-control form-control-sm col-md-8" value="{{$vidange->vehicules->immatriculation ??  ""}}" name="vehicule" id="vehicule" readonly />
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Centre</label>
                                <input type="text" class="form-control form-control-sm col-md-8" name="centre" value="{{$vidange->vehicules->centre ?? ""}}" id="centre" readonly/>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Centre régional</label>
                                <input type="text" class="form-control form-control-sm col-md-8" name="centreRegional" value="{{$vidange->vehicules->centreRegional ?? ''}}"
                                       id="centreRegional" readonly/>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-md-4">Km actuel</label>
                                <input type="number" class="form-control form-control-sm col-md-8" name="kmActuel" value="{{$vidange->kmActuel}}"
                                       required/>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Prochain km</label>
                                <input type="number" class="form-control form-control-sm col-md-8" name="prochainKm" value="{{$vidange->prochainKm}}"
                                       required/>
                            </div>
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
                                                       name="huileMoteur" value="{{$vidange->huileMoteur}}"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Non</label><br/>
                                                <input type="radio" class="form-check-input col-md-10" value="0"
                                                       name="huileMoteur" value="{{$vidange->huileMoteur}}"/>
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
                                       name="huileMoteurMarque" value="{{$vidange->huileMoteurMarque}}"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Nombre de km</label>
                                <input type="text" class="form-control form-control-sm" name="huileMoteurKm" value="{{$vidange->huileMoteurKm}}"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Fournisseur</label>
                                <input type="text" class="form-control form-control-sm" name="huileMoteurFournisseur" value="{{$vidange->huileMoteurFournisseur}}"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" min="0" class="form-control form-control-sm" name="huileMoteurmontant" value="{{$vidange->huileMoteurmontant}}"/>
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
                                                   name="filtreHuile" value="{{$vidange->filtreHuile}}"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Non</label><br/>
                                            <input type="radio" class="form-check-input col-md-10" value="0"
                                                   name="filtreHuile"  value="{{$vidange->filtreHuile}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="number" min="0" class="form-control form-control-sm" name="filtreHuileMontant"  value="{{$vidange->filtreHuileMontant}}"/>
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
                                                   name="filtreGazoil" name="{{$vidange->filtreGazoil}}"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Non</label><br/>
                                            <input type="radio" class="form-check-input col-md-10" value="0"
                                                   name="filtreGazoil" value="{{$vidange->filtreGazoil}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="number" min="0" class="form-control form-control-sm"
                                       name="filtreGazoilMontant" value="{{$vidange->filtreGazoilMontant}}"/>
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

                    <br>
                    <br>
                </form>
            </div>
            <br>
        </div>
    </div>
@endsection
