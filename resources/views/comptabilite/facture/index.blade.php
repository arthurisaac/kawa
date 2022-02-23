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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">N° Facture</label>
                                    <div class="col-lg-6">
                                     <input type="number" class="form-control" name="numeroFacture" placeholder="Numero de facture" required value="{{$nextId}}"/>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Client</label>
                                    <div class="col-lg-6">
                                        <select class="col form-select" name="client" data-kt-select2="true" data-allow-clear="true" data-placeholder="Selectionner" required>
                                            <option></option>
                                            @foreach($clients as $client)
                                                <option value="{{$client->id}}">{{$client->client_nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Periode</label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" name="periode" required />
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Montant</label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" name="montant" required />
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Date Dépôt</label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" name="dateDepot" required />
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Date échéance</label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" name="dateEcheance" required />
                                    </div>
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
