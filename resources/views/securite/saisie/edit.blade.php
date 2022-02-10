@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Saisie Modifier une saisie"])
@section("nouveau")
    <a href="/saisie" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
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

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('saisie.update', $saisie->id) }}">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Date de tournée</label>
                    <input type="date" class="form-control col-sm-8" name="date" value="{{$saisie->date}}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Type de date</label>
                    <input type="text" class="form-control col-sm-8" name="typeDate" value="{{$saisie->typeDate}}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Nom et prénoms</label>
                    <select class="form-control col-sm-8" name="idPersonnel">
                        <option>{{$saisie->idPersonne}}</option>
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
                    <input type="time" class="form-control col-sm-8" name="heureArrivee" value="{{$saisie->heureArrivee}}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure arrivée 1</label>
                    <input type="time" class="form-control col-sm-8" name="heureArrivee1" value="{{$saisie->heureArrivee1}}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure arrivée 2</label>
                    <input type="time" class="form-control col-sm-8" name="heureArrivee2" value="{{$saisie->heureArrivee2}}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure arrivée 3</label>
                    <input type="time" class="form-control col-sm-8" name="heureArrivee3" value="{{$saisie->heureArrivee3}}">
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Heure départ</label>
                    <input type="time" class="form-control col-sm-8" name="heureDepart" value="{{$saisie->heureDepart}}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure départ 1</label>
                    <input type="time" class="form-control col-sm-8" name="heureDepart1" value="{{$saisie->heureDepart1}}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure départ 2</label>
                    <input type="time" class="form-control col-sm-8" name="heureDepart2" value="{{$saisie->heureDepart2}}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Heure départ 3</label>
                    <input type="time" class="form-control col-sm-8"  name="heureDepart3" value="{{$saisie->heureDepart3}}">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
