@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Entrée stock"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
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
                    <div class="card card-xxl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Entrée stock</h3>
                        </div>
                        <div class="card-body bg-card-kawa pt-5">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="produit" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Ref produit</label>
                                        <select
                                            class="form-select form-select-solid select2-hidden-accessible combobox"
                                            data-control="select2"
                                            data-placeholder="Ref produit"
                                            data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            name="produit" id="produit" required>
                                            <option>{{ $entreeStock->produit }}</option>
                                            @foreach($produits as $produit)
                                                <option value="{{$produit->reference}}">{{$produit->reference}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="dateApprovisionnement" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date approvisionnement</label>
                                        <input type="date" value="{{$entreeStock->dateApprovisionnement}}" class="form-control col" id="dateApprovisionnement" name="dateApprovisionnement" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="fournisseur" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fournisseur</label>
                                        <select
                                            class="form-select form-select-solid select2-hidden-accessible combobox"
                                            data-control="select2"
                                            data-placeholder="Fournisseur"
                                            data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            name="fournisseur" id="fournisseur" required>
                                            <option>{{$entreeStock->fournisseur}}</option>
                                            @foreach($fournisseurs as $fournisseur)
                                                <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="quantite" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Quantité</label>
                                        <input type="number" value="{{$entreeStock->quantite}}" class="form-control col" name="quantite" id="quantite" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="prixAchat" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Prix achat</label>
                                        <input type="number" value="{{$entreeStock->prixAchat}}" class="form-control col" name="prixAchat" id="prixAchat" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="observation" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Observation</label>
                                        <textarea class="form-control col" name="observation" id="observation" required>{{$entreeStock->observation}}</textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="facture" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">N° facture</label>
                                        <input type="text" value="{{$entreeStock->facture}}" class="form-control col" name="facture" id="facture" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        <br>
                    </div>
                    @method('PATCH')
                    @csrf
                </form>
        </div>
    </div>
@endsection
