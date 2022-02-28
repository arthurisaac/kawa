@extends('bases.comptabilite')

@section('main')

    @extends('bases.toolbar', ["title" => "Comptabilité", "subTitle" => "Nouvelle facture"])

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

            <form class="form-horizontal" method="post" action="{{ route('comptabilite-fature.store') }}">
                @csrf

                <div class="card card-xl-stretch">
                    <div class="card-header bg-gradient-kawa">
                        <h3 class="card-title fw-bolder text-white">Nouvelle facture</h3>
                    </div>
                    <div class="card-body bg-card-kawa">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">N° Facture</label>
                                     <input type="number" class="form-control col editbox" name="numeroFacture" placeholder="Numero de facture" required value="{{$nextId}}"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Client</label>
                                    <select
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Client"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        name="client" required>
                                        <option></option>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->client_nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Periode</label>
                                    <input type="number" class="form-control col editbox" name="periode" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Montant</label>
                                    <input type="number" class="form-control col editbox" name="montant" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date Dépôt</label>
                                    <input type="date" class="form-control col editbox" name="dateDepot" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date échéance</label>
                                    <input type="date" class="form-control col editbox" name="dateEcheance" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </form>
        </div>
    </div>
@endsection
