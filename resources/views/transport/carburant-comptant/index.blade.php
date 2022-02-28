@extends('bases.carburant')

@section('main')
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "Carburant comptant"])
<div class="burval-container">
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

    <div class="row gy-5 g-xxl-8">
        <div class="col-xxl-9">
            <form method="post" action="{{ route('carburant-comptant.store') }}">
                <div class="card card-xl-stretch">
                    <div class="card-header border-0 py-5 bg-warning">
                        <h3 class="card-title fw-bolder">Nouveau Carburant Comptant</h3>
                    </div>
                    <div class="card-body bg-card-kawa 5">
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="idVehicule" class="col-5">Immatriculation</label>
                                    <select class="form-control col" name="idVehicule">
                                        <option>Selectionnez véhicule</option>
                                        @foreach($vehicules as $vehicule)
                                            <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="date" class="col-5">Date</label>
                                    <input type="date" class="form-control col" id="date" name="date"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="montant" class="col-5">Montant</label>
                                    <input name="montant" id="montant" class="form-control col" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label  class="col-5">Qté servie (L)</label>
                                    <input type="number" min="0" class="form-control col" name="qteServie"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="lieu"  class="col-5">Lieu</label>
                                    <input id="lieu" type="text" class="form-control col" name="lieu"/>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label id="utilisation" class="col-5">Utilisation</label>
                                    <select id="utilisation" class="form-control col" name="utilisation">
                                        <option value="Vidange">Vidange</option>
                                        <option value="Carburant">Carburant</option>
                                        <option value="Lavage">Lavage</option>
                                        <option value="Lubrifiant">Lubrifiant</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col text-right"></div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="reset" class="btn btn-info btn-sm">Annuler</button>
                        <button class="btn btn-primary btn-sm" type="submit">OK</button>
                    </div>
                </div>
                @csrf

            </form>
        </div>
    </div>
</div>
@endsection
