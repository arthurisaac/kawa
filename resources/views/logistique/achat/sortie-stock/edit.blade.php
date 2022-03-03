@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Sortie stock"])
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
            @endif

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form class="form-horizontal" method="post" action="{{ route('logistique-sortie-stock.update', $stock->id) }}">
                    <div class="card card-xxl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Sortie stock</h3>
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
                                            <option>{{$stock->id}}</option>
                                            @foreach($produits as $produit)
                                                <option value="{{$produit->id}}">{{$produit->reference}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="libelle" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Quantité</label>
                                        <input type="number" value="{{$stock->quantite}}" class="form-control col" name="libelle" id="libelle" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="dateSortie" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date de sortie</label>
                                        <input type="date" value="{{$stock->dateSortie}}" class="form-control col" id="dateSortie" name="dateSortie" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="motif" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Motif</label>
                                        <input type="text" value="{{$stock->motif}}" class="form-control col" name="motif" id="motif" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="dateSaisie" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Saisie le</label>
                                        <input type="date" value="{{$stock->dateSaisie}}" class="form-control col" name="dateSaisie" id="dateSaisie" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="observation" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Observation</label>
                                        <textarea class="form-control col" name="observation" id="observation" required>{{$stock->observation}}</textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="service" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Service/Centre</label>
                                        <input type="text" value="{{$stock->service}}" class="form-control col" name="service" id="service" required>
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
