@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Produit"])
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

            <div class="row">
                    <div class="col">
                        <form class="form-horizontal" method="post" action="{{ route('logistique-produit.store') }}">
                            <div class="card card-xxl-stretch">
                                <div class="card-header border-0 py-5 bg-warning">
                                    <h3 class="card-title fw-bolder">Produit</h3>
                                </div>
                                <div class="card-body bg-card-kawa pt-5">
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="fournisseur" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Société (Fournisseur)</label>
                                                <select
                                                        class="form-select form-select-solid select2-hidden-accessible combobox"
                                                        data-control="select2"
                                                        data-placeholder="Société (Fournisseur)"
                                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                        data-kt-select2="true"
                                                        aria-hidden="true"
                                                        name="fournisseur" id="fournisseur" required>
                                                    <option value=""></option>
                                                    @foreach($fournisseurs as $fournisseur)
                                                        <option value="{{$fournisseur->id}}">{{$fournisseur->societe}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="reference" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Référence</label>
                                                <input type="text" class="form-control col" id="reference" name="reference" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="libelle" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Libellé</label>
                                                <input type="text" class="form-control col" name="libelle" id="libelle" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="description" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Description</label>
                                                <textarea class="form-control col" name="description" id="description" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="seuil" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Seuil de réapprovisionnement</label>
                                                <input type="number" class="form-control col" name="seuil" id="seuil" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="stockAlert" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Stock alert</label>
                                                <input type="number" class="form-control col" name="stockAlert" id="stockAlert" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="ves" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Ves (Vital ou non)</label>
                                                <input type="text" class="form-control col" name="ves" id="ves" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="prix" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Prix (HT)</label>
                                                <input type="number" class="form-control col" name="prix" id="prix" required>
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
                    @csrf
                    </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
