@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Entrée stock"])
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

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form class="form-horizontal" method="post" action="{{ route('logistique-entree-stock.update', $entreeStock->id) }}">
            @method('PATCH')
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label class="col-sm-5">Réf Produits</label>
                        <select class="form-control col-sm-7" name="produit" required>
                            <option>{{ $entreeStock->produit }}</option>
                            @foreach($produits as $produit)
                                <option value="{{$produit->id}}">{{$produit->reference}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Date Approvisionnement</label>
                        <input value="{{$entreeStock->dateApprovisionnement}}" type="date" class="form-control col-sm-7" name="dateApprovisionnement" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Fournisseur</label>
                        <select class="form-control col-sm-7" name="fournisseur" required>
                            <option>{{$entreeStock->fournisseur}}</option>
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Quantité</label>
                        <input type="number" class="form-control col-sm-7" name="quantite" value="{{$entreeStock->quantite}}" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Prix d'achat</label>
                        <input type="number" class="form-control col-sm-7" name="prixAchat" value="{{$entreeStock->prixAchat}}" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Observation</label>
                        <textarea class="form-control col-sm-7" name="observation">{{$entreeStock->observation}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">N°Facture</label>
                        <input type="text" class="form-control col-sm-7" name="facture" value="{{$entreeStock->facture}}" />
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>

    </div>
@endsection
