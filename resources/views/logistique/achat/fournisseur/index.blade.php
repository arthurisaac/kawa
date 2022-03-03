@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Fournisseur"])
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
            <div class="row gy-5 g-xxl-12">
                <div class="col-xxl-12">
                    <form class="form-horizontal" method="post" action="{{ route('logistique-fournisseur.store') }}">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Fournisseur</h3>
                            </div>
                            <div class="card-body bg-card-kawa pt-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="societe" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Société</label>
                                            <input type="text" class="form-control col" name="societe" id="societe" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="civilite" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Civilité</label>
                                            <select
                                                    class="form-select form-select-solid select2-hidden-accessible combobox"
                                                    data-control="select2"
                                                    data-placeholder="Civilité"
                                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true"
                                                    id="civilite" name="civilite" required>
                                                <option></option>
                                                <option>M</option>
                                                <option>Mme</option>
                                                <option>Mlle</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="nom" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom</label>
                                            <input type="text" class="form-control col" name="nom" id="nom" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="prenom" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Prénom(s)</label>
                                            <input type="text" class="form-control col" name="prenom" id="prenom" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="adresse" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Adresse</label>
                                            <input type="text" class="form-control col" name="adresse" id="adresse" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="pays" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Pays</label>
                                            <input type="text" class="form-control col" name="pays" id="pays" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="telephone" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Téléphone</label>
                                            <input type="tel" class="form-control col" name="telephone" id="telephone" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="mobile" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Mobile</label>
                                            <input type="tel" class="form-control col" name="mobile" id="mobile" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="fax" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fax</label>
                                            <input type="tel" class="form-control col" name="fax" id="fax" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="email" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Email</label>
                                            <input type="email" class="form-control col" name="email" id="email" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="domaine" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Domaine de compétence</label>
                                            <input type="text" class="form-control col" name="domaine" id="domaine" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="delaiLivraison" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Delai de livraison</label>
                                            <input type="text" class="form-control col" name="delaiLivraison" id="delaiLivraison" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="observation" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Observation</label>
                                            <textarea type="text" class="form-control col" name="observation" id="observation" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="conditionPaiement" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Condition de paiement</label>
                                            <textarea type="text" class="form-control col" name="conditionPaiement" id="conditionPaiement" required></textarea>
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
