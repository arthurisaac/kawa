@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Produit</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('logistique-produit.store') }}">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label class="col-sm-5">Socitété (Fournisseur)</label>
                        <select name="fournisseur" class="form-control col-sm-7" required>
                            <option></option>
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}">{{$fournisseur->societe}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Référence</label>
                        <input type="text" name="reference" class="form-control col-sm-7" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Libellé</label>
                        <input type="text" name="libelle" class="form-control col-sm-7" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Description</label>
                        <textarea type="text" name="description" class="form-control col-sm-7"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Seuil de réapprovisionnement</label>
                        <input type="number" name="seuil" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Stock alert</label>
                        <input type="number" name="stockAlert" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Ves (Vital ou non)</label>
                        <input type="text" name="ves" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Prix (HT)</label>
                        <input type="number" name="prix" class="form-control col-sm-7">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                        <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
