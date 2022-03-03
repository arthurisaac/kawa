@extends('bases.informatique')

@section('main')
    @extends('bases.toolbar', ["title" => "Informatique", "subTitle" => "Fournisseur"])
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
            <form class="form-horizontal" method="post" action="{{ route('informatique-fournisseur.store') }}">
                @csrf
                <div class="card card-xl-stretch">
                    <div class="card-header border-0 py-5 bg-warning">
                        <div class="card-title fw-bolder">
                            Fournisseur
                        </div>
                    </div>
                    <div class="card-body bg-card-kawa pt-3">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Libelle fournisseur</label>
                                    <input class="form-control col-md-7" type="text" name="libelleFournisseur" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Spécialité</label>
                                    <input class="form-control col-md-7" type="text" name="specialite" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Localisation</label>
                                    <input class="form-control col-md-7" type="text" name="localisation" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nationalité</label>
                                    <input class="form-control col-md-7" type="text" name="nationalite" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Email</label>
                                    <input class="form-control col-md-7" type="email" name="email" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Contact</label>
                                    <input class="form-control col-md-7" type="tel" name="contact" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
