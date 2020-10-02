@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Règlement Facture</h2></div>
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

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
