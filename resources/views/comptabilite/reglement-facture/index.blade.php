@extends('bases.caisse')

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

        <form class="form-horizontal" method="post" action="{{ route('comptabilite-reglement-fature.store') }}">
            @csrf

            <div class="card card-xl-stretch">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-5">N°Facture</label>
                                <select name="facture" class="form-control col-sm-7">
                                    <option></option>
                                    @foreach($factures as $facture)
                                        <option>{{$facture->numeroFacture}}</option>
                                    @endforeach
                                </select>
                            </div></div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-5">Date</label>
                                <input type="date" name="date" class="form-control col-sm-7">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-5">Mode de règlement</label>
                                <select name="modeReglement" class="form-control col-sm-7">
                                    <option>Espèce</option>
                                    <option>Chèque</option>
                                    <option>Virement bancaire</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-sm-5">Pièce comptable</label>
                                <input type="text" name="pieceComptable" class="form-control col-sm-7" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-sm-5">Montant versé</label>
                                <input type="number" name="montantVerse" class="form-control col-sm-7" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <!-- TODO -->
                                <label class="col-sm-5">Montant restant</label>
                                <input type="number" name="montantRestant" class="form-control col-sm-7" required>
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
@endsection
