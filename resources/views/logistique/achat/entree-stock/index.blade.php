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

            <div class="row gy-5 g-xxl-12">
                <div class="col-xxl-12">
                    <form class="form-horizontal" method="post" action="{{ route('logistique-entree-stock.store') }}">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Entrée stock</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="produit" class="col-sm-5">Ref produit</label>
                                            <select class="form-control col" name="produit" id="produit" required>
                                                <option value=""></option>
                                                @foreach($produits as $produit)
                                                    <option value="{{$produit->id}}">{{$produit->reference}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="dateApprovisionnement" class="col-sm-5">Date approvisionnement</label>
                                            <input type="date" class="form-control col" id="dateApprovisionnement" name="dateApprovisionnement" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="fournisseur" class="col-sm-5">Fournisseur</label>
                                            <select class="form-control col" name="fournisseur" id="fournisseur" required>
                                                <option value=""></option>
                                                @foreach($fournisseurs as $fournisseur)
                                                    <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="quantite" class="col-sm-5">Quantité</label>
                                            <input type="number" class="form-control col" name="quantite" id="quantite" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="prixAchat" class="col-sm-5">Prix achat</label>
                                            <input type="number" class="form-control col" name="prixAchat" id="prixAchat" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="observation" class="col-sm-5">Observation</label>
                                            <textarea class="form-control col" name="observation" id="observation" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="facture" class="col-sm-5">N° facture</label>
                                            <input type="text" class="form-control col" name="facture" id="facture" required>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                            <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                            <br>
                        </div>
                </div>
                @csrf
                </form>
            </div>

{{--        <form class="form-horizontal" method="post" action="{{ route('logistique-entree-stock.store') }}">--}}
{{--            @csrf--}}

{{--            <div class="row">--}}
{{--                <div class="col-6">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Réf Produits</label>--}}
{{--                        <select class="form-control col-sm-7" name="produit" required>--}}
{{--                            <option></option>--}}
{{--                            @foreach($produits as $produit)--}}
{{--                                <option value="{{$produit->id}}">{{$produit->reference}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Date Approvisionnement</label>--}}
{{--                        <input type="date" class="form-control col-sm-7" name="dateApprovisionnement" required />--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Fournisseur</label>--}}
{{--                        <select class="form-control col-sm-7" name="fournisseur" required>--}}
{{--                            <option></option>--}}
{{--                            @foreach($fournisseurs as $fournisseur)--}}
{{--                                <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Quantité</label>--}}
{{--                        <input type="number" class="form-control col-sm-7" name="quantite" required />--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Prix d'achat</label>--}}
{{--                        <input type="number" class="form-control col-sm-7" name="prixAchat" required />--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Observation</label>--}}
{{--                        <textarea class="form-control col-sm-7" name="observation"></textarea>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">N°Facture</label>--}}
{{--                        <input type="text" class="form-control col-sm-7" name="facture" />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-2">--}}
{{--                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>--}}
{{--                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}

    </div>
@endsection
