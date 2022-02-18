@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Fournisseur"])
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
            <div class="row gy-5 g-xxl-12">
                <div class="col-xxl-12">
                    <form class="form-horizontal" method="post" action="{{ route('logistique-fournisseur.store') }}">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Fournisseur</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="societe" class="col-sm-5">Société</label>
                                            <input type="text" class="form-control col" name="societe" id="societe" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="civilite" class="col-sm-5">Civilité</label>
                                            <select type="text" class="form-control col" id="civilite" name="civilite" required>
                                                <option></option>
                                                <option>M</option>
                                                <option>Mme</option>
                                                <option>Mlle</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="nom" class="col-sm-5">Nom</label>
                                            <input type="text" class="form-control col" name="nom" id="nom" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="prenom" class="col-sm-5">Prénom(s)</label>
                                            <input type="text" class="form-control col" name="prenom" id="prenom" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="adresse" class="col-sm-5">Adresse</label>
                                            <input type="text" class="form-control col" name="adresse" id="adresse" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="pays" class="col-sm-5">Pays</label>
                                            <input type="text" class="form-control col" name="pays" id="pays" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="telephone" class="col-sm-5">Téléphone</label>
                                            <input type="tel" class="form-control col" name="telephone" id="telephone" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="mobile" class="col-sm-5">Mobile</label>
                                            <input type="tel" class="form-control col" name="mobile" id="mobile" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="fax" class="col-sm-5">Fax</label>
                                            <input type="tel" class="form-control col" name="fax" id="fax" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-5">Email</label>
                                            <input type="email" class="form-control col" name="email" id="email" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="observation" class="col-sm-5">Observation</label>
                                            <textarea type="text" class="form-control col" name="observation" id="observation" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="domaine" class="col-sm-5">Domaine de compétence</label>
                                            <input type="text" class="form-control col" name="domaine" id="domaine" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="delaiLivraison" class="col-sm-5">Delai de livraison</label>
                                            <input type="text" class="form-control col" name="delaiLivraison" id="delaiLivraison" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="conditionPaiement" class="col-sm-5">Condition de paiement</label>
                                            <textarea type="text" class="form-control col" name="conditionPaiement" id="conditionPaiement" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                            <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                            <br>
                        </div>
                </div>
                @csrf
                </form>
            </div>

{{--        <form class="form-horizontal" method="post" action="{{ route('logistique-fournisseur.store') }}">--}}
{{--            @csrf--}}

{{--            <div class="row">--}}
{{--                <div class="col-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Société</label>--}}
{{--                        <input type="text" class="form-control" name="societe" required>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Civilité</label>--}}
{{--                        <select type="text" class="form-control" name="civilite" required>--}}
{{--                            <option>M</option>--}}
{{--                            <option>Mme</option>--}}
{{--                            <option>Mlle</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Nom</label>--}}
{{--                        <input type="text" class="form-control" name="nom" required>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Prénom</label>--}}
{{--                        <input type="text" class="form-control" name="prenom">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Adresse</label>--}}
{{--                        <input type="text" class="form-control" name="adresse">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Pays</label>--}}
{{--                        <input type="text" class="form-control" name="pays" required>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Téléphone</label>--}}
{{--                        <input type="tel" class="form-control" name="telephone">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Mobile</label>--}}
{{--                        <input type="tel" class="form-control" name="mobile">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Fax</label>--}}
{{--                        <input type="tel" class="form-control" name="fax">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Email</label>--}}
{{--                        <input type="email" class="form-control" name="email">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Observation</label>--}}
{{--                        <textarea class="form-control" name="observation"></textarea>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Domaine de compétence</label>--}}
{{--                        <input type="text" class="form-control" name="domaine">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Delai de livraison</label>--}}
{{--                        <input type="text" class="form-control" name="delaiLivraison">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Condition de paiement</label>--}}
{{--                        <textarea class="form-control" name="conditionPaiement"></textarea>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>--}}
{{--                        <button class="btn btn-danger btn-sm" type="reset">Annuler</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}

    </div>
@endsection
