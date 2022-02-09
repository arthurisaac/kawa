@extends('bases.caisse')

@section('main')

    @extends('bases.toolbar', ["title" => "Comptabilité", "subTitle" => "Facture"])

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
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

            <form class="form-horizontal" method="post" action="{{ route('comptabilite-fature.update', $facture->id) }}">
                @method('PATCH')
                @csrf

                <div class="card card-xl-stretch">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-5">N° Facture</label>
                                    <input type="number" class="form-control col-sm-7" name="numeroFacture" required value="{{$facture->numeroFacture}}" />
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Client</label>
                                    <select class="form-control col-sm-7" name="client" required>
                                        <option>{{$facture->client}}</option>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->client_nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Periode</label>
                                    <input type="number" class="form-control col-sm-7" name="periode" value="{{$facture->periode}}" required />
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Montant</label>
                                    <input type="number" class="form-control col-sm-7" name="montant" value="{{$facture->montant}}" required />
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Date Dépôt</label>
                                    <input type="date" class="form-control col-sm-7" name="dateDepot" value="{{$facture->dateDepot}}" required />
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Date échéance</label>
                                    <input type="date" class="form-control col-sm-7" name="dateEcheance" value="{{$facture->dateEcheance}}" required />
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
