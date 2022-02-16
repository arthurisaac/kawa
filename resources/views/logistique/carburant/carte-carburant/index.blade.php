@extends('bases.carburant')

@section('main')
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "Ticket carburant"])
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
            <form method="post" action="{{ route('carte-carburant.store') }}">
                <div class="card card-xl-stretch">
                    <div class="card-header border-0 py-5 bg-warning">
                        <h3 class="card-title fw-bolder">Nouvelle Carte Carburant</h3>
                    </div>
                    <div class="card-body pt-5">
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="numeroCarte" class="col-5">Numéro carte</label>
                                    <input id="numeroCarte" type="number" class="form-control col" name="numeroCarte" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="societe" class="col-5">Societe</label>
                                    <input id="societe" type="text" class="form-control col" name="societe" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="idVehicule" class="col-5">Num véhicule</label>
                                    <select id="idVehicule" class="form-control col" name="idVehicule" required>
                                        <option>Selectionnez véhicule</option>
                                        @foreach($vehicules as $vehicule)
                                            <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="dateAquisition"  class="col-5 pt-3">Date acquisition</label>
                                    <input id="dateAquisition" type="date" class="form-control col" name="dateAquisition"/>
                                </div>
                            </div>
                            <div class="col"></div>

                            <div class="col"></div>
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
