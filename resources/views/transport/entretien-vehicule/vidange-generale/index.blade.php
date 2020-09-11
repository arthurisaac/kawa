@extends('base')

@section('main')
<div class="row">
    <div class="col">
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
    </div>

    <form method="post" action="{{ route('vidange-generale.store') }}">
        @csrf
        <div class="form-group">
            <label>date</label>
            <input type="date" class="form-control" name="date"/>
        </div>
        <div class="form-group">
            <label>idVehicule</label>
            <select class="form-control" name="idVehicule">
                <option>Selectionnez véhicule</option>
                @foreach($vehicules as $vehicule)
                <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>centre</label>
            <input type="text" class="form-control" name="centre"/>
        </div>
        <div class="form-group">
            <label>centreRegional</label>
            <input type="text" class="form-control" name="centreRegional"/>
        </div>
        <div class="form-group">
            <label>kmActuel</label>
            <input type="number" class="form-control" name="kmActuel"/>
        </div>
        <div class="form-group">
            <label>prochainKm</label>
            <input type="time" class="form-control" name="prochainKm"/>
        </div>
        <div class="form-group">
            <label>prochainKm</label>
            <input type="number" class="form-control" name="prochainKm"/>
        </div>
        <div class="form-group">
            <label>huileMoteur</label>
            <input type="radio" class="form-control" value="1" name="huileMoteur"/>
        </div>
        <div class="form-group">
            <label>huileMoteurMarque</label>
            <input type="text" class="form-control" name="huileMoteurMarque"/>
        </div>
        <div class="form-group">
            <label>huileMoteurKm</label>
            <input type="text" class="form-control" name="huileMoteurKm"/>
        </div>
        <div class="form-group">
            <label>huileMoteurmontant</label>
            <input type="text" min="0" class="form-control" name="huileMoteurmontant"/>
        </div>
        <div class="form-group">
            <label>filtreHuile</label>
            <input type="radio" class="form-control" value="1" name="filtreHuile"/>
        </div>
        <div class="form-group">
            <label>filtreHuileMontant</label>
            <input type="number" min="0" class="form-control" value="1" name="filtreHuileMontant"/>
        </div>
        <div class="form-group">
            <label>filtreGazoil</label>
            <input type="radio" class="form-control" value="1" name="filtreGazoil"/>
        </div>
        <div class="form-group">
            <label>filtreGazoilMontant</label>
            <input type="number" min="0" class="form-control" value="1" name="filtreGazoilMontant"/>
        </div>
        <div class="form-group">
            <label>filtreAir</label>
            <input type="radio" class="form-control" value="1" name="filtreAir"/>
        </div>
        <div class="form-group">
            <label>filtreAirMontant</label>
            <input type="number" min="0" class="form-control" value="1" name="filtreAirMontant"/>
        </div>
        <div class="form-group">
            <label>autresConsommables</label>
            <input type="radio" class="form-control" value="1" name="autresConsommables"/>
        </div>
        <div class="form-group">
            <label>autresConsommablesMontant</label>
            <input type="number" min="0" class="form-control" value="1" name="autresConsommablesMontant"/>
        </div>

        <button type="submit" class="btn btn-primary-outline">Valider</button>
    </form>
</div>
