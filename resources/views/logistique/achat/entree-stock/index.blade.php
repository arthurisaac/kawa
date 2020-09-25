@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée stock</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('logistique-entree-stock.store') }}">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label class="col-sm-5">Réf Produits</label>
                        <select class="form-control col-sm-7" name="produit" required>
                            <option></option>
                            @foreach($produits as $produit)
                                <option value="{{$produit->id}}">{{$produit->reference}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Date Approvisionnement</label>
                        <input type="date" class="form-control col-sm-7" name="dateApprovisionnement" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Fournisseur</label>
                        <select class="form-control col-sm-7" name="fournisseur" required>
                            <option></option>
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Quantité</label>
                        <input type="number" class="form-control col-sm-7" name="quantite" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Prix d'achat</label>
                        <input type="number" class="form-control col-sm-7" name="prixAchat" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Observation</label>
                        <textarea class="form-control col-sm-7" name="observation"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">N°Facture</label>
                        <input type="text" class="form-control col-sm-7" name="facture" />
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
