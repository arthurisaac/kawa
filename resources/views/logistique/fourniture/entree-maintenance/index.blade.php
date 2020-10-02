@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Entree maintenance DAB</h2></div>
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

    <form method="post" action="{{ route('logistique-entree-maintenance.store') }}">
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Debut série</label>
                    <input type="text" class="form-control col-sm-7" required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Fin série</label>
                    <input type="text" class="form-control col-sm-7" required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Date</label>
                    <input type="text" class="form-control col-sm-7" required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Fournisseurs</label>
                    <select class="form-control col-sm-7" required>
                        <option></option>
                        @foreach($fournisseurs as $fournisseur)
                            <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Prix unitaire</label>
                    <input type="number" class="form-control col-sm-7" required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Référence</label>
                    <input type="text" class="form-control col-sm-7" required />
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
            </div>
            <div class="col"></div>
        </div>
    </form>
</div>
@endsection
