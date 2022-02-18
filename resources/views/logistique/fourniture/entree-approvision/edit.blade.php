@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Entree fiche approvisionnement DAB"])
<div class="burval-container">
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

    <form method="post" action="{{ route('logistique-entree-approvision.update', $entree->id) }}">
        @method('PATCH')
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Debut série</label>
                    <input type="text" class="form-control col-sm-7" name="debutSerie" value="{{$entree->debutSerie}}" required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Fin série</label>
                    <input type="text" class="form-control col-sm-7" name="finSerie" value="{{$entree->finSerie}}"  required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Date</label>
                    <input type="date" class="form-control col-sm-7" name="date" value="{{$entree->date}}"  required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Fournisseurs</label>
                    <select class="form-control col-sm-7" name="fournisseur" required>
                        <option>{{$entree->fournisseur}}</option>
                        @foreach($fournisseurs as $fournisseur)
                            <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Prix unitaire</label>
                    <input type="number" class="form-control col-sm-7" name="prixUnitaire" value="{{$entree->prixUnitaire}}"  required />
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
