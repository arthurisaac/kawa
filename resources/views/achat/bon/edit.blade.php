@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Bon de commande</h2></div>
        <br/>
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

        <form class="form-horizontal" method="post" action="{{ route('achat-bon.update', $bon->id) }}">
            @method('PATCH')
            @csrf

            <div class="form-group row">
                <label class="col-sm-5">Numero bon</label>
                <input type="text" name="numero" value="{{$bon->numero}}" class="form-control col-sm-7" required readonly>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Date</label>
                <input type="date" name="date" class="form-control col-sm-7" value="{{$bon->date}}" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Fournisseur</label>
                <select class="form-control col-sm-7" name="fournisseur_fk">
                    <option value="{{$bon->fournisseur_fk}}">{{$bon->fournisseurs->denomination ?? $bon->fournisseur_fk}}</option>
                    @foreach($fournisseurs as $fournisseur)
                        <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Proforma</label>
                <input type="text" name="proforma" value="{{$bon->proforma}}" class="form-control col-sm-7" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Tel</label>
                <input type="text" name="telephone" value="{{$bon->telephone}}" class="form-control col-sm-7" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Note</label>
                <input type="text" name="operation" value="{{$bon->operation}}" class="form-control col-sm-7">
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Objet</label>
                <input type="text" name="objet" value="{{$bon->objet}}" class="form-control col-sm-7" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Total</label>
                <input type="text" name="total" value="{{$bon->total}}" class="form-control col-sm-7" required>
            </div>

            <div class="row">
                <div class="col-2">
                    <button class="btn btn-block btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-block btn-danger btn-sm" type="button" onclick="window.history.back()">
                        Annuler
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
