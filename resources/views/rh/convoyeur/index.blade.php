@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Convoyeur</h2></div><br />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    <br />

    @endif
    <form method="post" action="{{ route('convoyeur.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Matricule</label>
                    <input type="text" class="form-control col-sm-8" name="matricule">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Nom et prénoms</label>
                    <input type="text" class="form-control col-sm-8" name="nomPrenoms">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Date de naissance</label>
                    <input type="date" class="form-control col-sm-8" name="dateNaissance">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Fonction</label>
                    <input type="text" class="form-control col-sm-8" name="fonction">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Date embauche</label>
                    <input type="date" class="form-control col-sm-8" name="dateEmbauche">
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-3">Photo</label>
                    <input type="file" class="form-control-file col-sm-9" name="photo">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <button class="btn btn-primary btn-sm btn-block" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm btn-block" type="reset">Annuler</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
