@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Carburant comptant</h2></div>
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

    <form method="post" action="{{ route('carburant-comptant.store') }}">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Immatriculation</label>
                    <select class="form-control form-control-sm col-md-7" name="idVehicule">
                        <option>Selectionnez immatriculation</option>
                        @foreach($vehicules as $vehicule)
                        <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Date</label>
                    <input type="date" class="form-control col-sm-7" name="date"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Montant</label>
                    <input type="number" min="0" class="form-control col-sm-7" name="montant"/>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-5">Qté servie (L)</label>
                    <input type="number" min="0" class="form-control col-sm-7" name="qteServie"/>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-5">Lieu</label>
                    <input type="text" class="form-control col-sm-7" name="lieu"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Utilisation</label>
                    <select class="form-control form-control-sm col-md-7" name="utilisation">
                        <option value="Vidange">Vidange</option>
                        <option value="Carburant">Carburant</option>
                        <option value="Lavage">Lavage</option>
                        <option value="Lubrifiant">Lubrifiant</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-sm btn-block">OK</button>
                <button type="reset" class="btn btn-danger btn-sm btn-block">Annuler</button>
            </div>
            <div class="col"></div>
        </div>
    </form>
</div>
@endsection
