@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Fournisseur</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('ctv.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Societe</label>
                        <input type="text" name="societe" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Civilité</label>
                        <select name="civilite" class="form-control col-sm-7">
                            <option>M</option>
                            <option>Mme</option>
                            <option>Mlle</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Nom</label>
                        <input type="text" name="nom" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Prénom</label>
                        <input type="text" name="prenom" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Prénom</label>
                        <input type="text" name="prenom" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Adresse</label>
                        <input type="text" name="adresse" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Pays</label>
                        <input type="text" name="pays" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Téléphone</label>
                        <input type="tel" name="telepgone" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Fax</label>
                        <input type="tel" name="fax" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Mobile</label>
                        <input type="tel" name="mobile" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Email</label>
                        <input type="email" name="email" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Observation</label>
                        <textarea name="observation" class="form-control col-sm-7"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Domaine de compétence</label>
                        <input type="text" name="domaine" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Delai de livraison</label>
                        <input type="number" name="delaiLivraison" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Condition de paiement</label>
                        <input type="text" name="conditionPaiement" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Numéro d'agrément</label>
                        <input type="text" name="numeroAgrement" class="form-control col-sm-7" required>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-block btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-block btn-danger btn-sm" type="annuler">Annuler</button>
                </div>
                <div class="col"></div>
            </div>

        </form>
    </div>

@endsection
