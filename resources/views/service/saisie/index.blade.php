@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Saisie</h2></div>
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

    <form method="post" action="{{ route('saisie.store') }}">
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Date de tournée</label>
                    <input type="date" class="form-control col-sm-8" name="date">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Type de date</label>
                    <input type="text" class="form-control col-sm-8" name="typeDate">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Nom et prénoms</label>
                    <select class="form-control col-sm-8" name="idPersonnel">
                        <option>Selectionnez</option>
                        @foreach($personnels as $personnel)
                        <option value="{{$personnel->id}}">{{$personnel->nomPrenoms}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-2">
                <button class="btn btn-primary btn-sm btn-block" type="submit">Valider</button>
                <button class="btn btn-danger btn-sm btn-block" type="reset">Annuler</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Heure arrivée</label>
                    <input type="time" class="form-control col-sm-8" name="heureArrivee">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure arrivée 1</label>
                    <input type="time" class="form-control col-sm-8" name="heureArrivee1">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure arrivée 2</label>
                    <input type="time" class="form-control col-sm-8" name="heureArrivee2">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure arrivée 3</label>
                    <input type="time" class="form-control col-sm-8" name="heureArrivee3">
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Heure départ</label>
                    <input type="time" class="form-control col-sm-8" name="heureDepart">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure départ 1</label>
                    <input type="time" class="form-control col-sm-8" name="heureDepart1">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure départ 2</label>
                    <input type="time" class="form-control col-sm-8" name="heureDepart2">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure départ 3</label>
                    <input type="time" class="form-control col-sm-8"  name="heureDepart3">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
