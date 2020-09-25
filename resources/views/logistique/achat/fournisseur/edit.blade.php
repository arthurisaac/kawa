@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Fournisseur</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('logistique-fournisseur.update', $fournisseur->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Société</label>
                        <input type="text" class="form-control" name="societe" value="{{$fournisseur->societe}}" required>
                    </div>
                    <div class="form-group">
                        <label>Civilité</label>
                        <select type="text" class="form-control" name="civilite"  value="{{$fournisseur->civilite}}">
                            <option>M</option>
                            <option>Mme</option>
                            <option>Mlle</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="nom"  value="{{$fournisseur->nom}}">
                    </div>
                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" class="form-control" name="prenom" value="{{$fournisseur->prenom}}">
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control" name="adresse" value="{{$fournisseur->adresse}}">
                    </div>
                    <div class="form-group">
                        <label>Pays</label>
                        <input type="text" class="form-control" name="pays" value="{{$fournisseur->pays}}">
                    </div>
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="tel" class="form-control" name="telephone" value="{{$fournisseur->telephone}}">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="tel" class="form-control" name="mobile" value="{{$fournisseur->mobile}}">
                    </div>
                    <div class="form-group">
                        <label>Fax</label>
                        <input type="tel" class="form-control" name="fax" value="{{$fournisseur->fax}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$fournisseur->email}}">
                    </div>
                    <div class="form-group">
                        <label>Observation</label>
                        <textarea class="form-control" name="observation"> {{$fournisseur->observation}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Domaine de compétence</label>
                        <input type="text" class="form-control" name="domaine" value="{{$fournisseur->domaine}}">
                    </div>
                    <div class="form-group">
                        <label>Delai de livraison</label>
                        <input type="text" class="form-control" name="delaiLivraison" value="{{$fournisseur->delaiLivraison}}">
                    </div>
                    <div class="form-group">
                        <label>Condition de paiement</label>
                        <textarea class="form-control" name="conditionPaiement">{{$fournisseur->conditionPaiement}}</textarea>
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
