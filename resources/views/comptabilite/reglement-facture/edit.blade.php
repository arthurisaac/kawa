@extends('bases.comptabilite')

@section('main')

    @extends('bases.toolbar', ["title" => "Comptabilité", "subTitle" => "Règlement de facture"])

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            {{--<div class="titre"><span class="titre">Chiffre d'affaire</span> : <span id="chiffreAffaire"
                                                                                    class="text-danger chiffreAffaire"></span>
                <span
                    style="margin-left: 10px;">Nombre de passage : <span
                        class="text-danger">{{count($sites)}}</span></span>
            </div>--}}
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

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <form class="form-horizontal" method="post" action="{{ route('comptabilite-reglement-fature.update', $facture->id) }}">
                @csrf

                <div class="card card-xl-stretch">
                    <div class="card-body bg-card-kawa">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">N°Facture</label>
                                    <select name="facture"
                                            class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="N° Facture"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true">
                                        <option></option>
                                        @foreach($factures as $facture)
                                            <option>{{$facture->numeroFacture}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date</label>
                                    <input type="date" name="date" class="form-control col editbox">
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="col-sm-5">Mode de règlement</label>
                                    <select name="modeReglement"
                                            class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Mode de règlement"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true">
                                        <option>Espèce</option>
                                        <option>Chèque</option>
                                        <option>Virement bancaire</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Pièce comptable</label>
                                    <input type="text" name="pieceComptable" class="form-control col editbox" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Montant versé</label>
                                    <input type="number" name="montantVerse" class="form-control col editbox" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <!-- TODO -->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Montant restant</label>
                                    <input type="number" name="montantRestant" class="form-control col editbox" required>
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
        <form class="form-horizontal" method="post" action="{{ route('comptabilite-reglement-fature.update', $facture->id) }}">
            @method('PATCH')
            @csrf


        </form>

    </div>
@endsection
