@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Facture</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('comptabilite-fature.store') }}">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label class="col-sm-5">N° Facture</label>
                        <input type="number" class="form-control col-sm-7" name="numeroFacture" required value="{{$nextId}}" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Client</label>
                        <select class="form-control col-sm-7" name="client" required>
                            <option></option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->client_nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Periode</label>
                        <input type="number" class="form-control col-sm-7" name="periode" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Montant</label>
                        <input type="number" class="form-control col-sm-7" name="montant" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Date Dépôt</label>
                        <input type="date" class="form-control col-sm-7" name="dateDepot" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Date échéance</label>
                        <input type="date" class="form-control col-sm-7" name="dateEcheance" required />
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>

    </div>
@endsection
