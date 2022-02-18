@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Sortie stock"])
    <div class="burval-container">
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

        <form class="form-horizontal" method="post" action="{{ route('logistique-sortie-stock.update', $stock->id) }}">
            @method('PATCH')
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label class="col-sm-5">Ref produit</label>
                        <select class="form-control col-sm-7" name="produit" required>
                            <option>{{$stock->id}}</option>
                            @foreach($produits as $produit)
                                <option value="{{$produit->id}}">{{$produit->reference}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Quantité</label>
                        <input type="number" name="quantite" class="form-control col-sm-7" value="{{$stock->quantite}}" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Date de sortie</label>
                        <input type="date" name="dateSortie" class="form-control col-sm-7" value="{{$stock->dateSortie}}" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Motif</label>
                        <input type="text" name="motif" class="form-control col-sm-7" value="{{$stock->motif}}" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Saisi le</label>
                        <input type="date" name="dateSaisie" class="form-control col-sm-7" value="{{$stock->dateSaisie}}" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Observation</label>
                        <textarea name="observation" class="form-control col-sm-7">{{$stock->observation}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Service/centre</label>
                        <input type="text" name="service" class="form-control col-sm-7" value="{{$stock->service}}" />
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
