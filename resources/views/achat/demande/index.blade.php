@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Demande achat</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('achat-demande.store') }}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label class="col-sm-5">Date de la demande</label>
                        <input type="date" name="date" class="form-control col-sm-7" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Identité du demandeur</label>
                        <input type="text" name="identite" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Service ou Département</label>
                        <input type="text" name="service" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Nom du demandeur</label>
                        <input type="text" name="nom_demandeur" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Téléphone</label>
                        <input type="tel" name="telephone_demandeur" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Adresse éléctronique</label>
                        <input type="email" name="adresse_electronique_demandeur" class="form-control col-sm-7" required>
                    </div>
                </div>
                <div class="col">
                    <h6>Nature de la demande</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Investissement" name="nature_demande" id="defaultCheck" >
                        <label class="form-check-label" for="defaultCheck">
                            Investissement
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Charges" name="nature_demande" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Charges
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Location ELS/Contrat" name="nature_demande" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Location ELS/Contrat
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Location ELS/Appel" name="nature_demande" id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">
                            Location ELS/Appel
                        </label>
                    </div>
                </div>
            </div>
            <h6>Description de l'achat</h6>
            <br />
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Objet de l'achat</label>
                        <input type="text" name="objet_achat" class="form-control col-sm-7" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Famille d'achat</label>
                        <input type="text" name="famille_achat" class="form-control col-sm-7" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Sous famille d'achat</label>
                        <input type="text" name="sous_famille_achat" class="form-control col-sm-7" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Imputation budgétaire</label>
                        <input type="text" name="famille_achat" class="form-control col-sm-7" required>
                    </div>
                </div>
            </div>
            <h6>Utilité / justification de l'achat</h6>
            <br />
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Fournisseur retenu</label>
                        <select class="form-control col-sm-7" name="fournisseur_retenu">
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Montant retenu</label>
                        <input type="text" name="montant_retenu" class="form-control col-sm-7" required>
                    </div>
                </div>
            </div>
            <h6>Fournisseurs consultés</h6><br />
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Gré à Gré" name="type_demande[]">
                <label class="form-check-label" for="inlineCheckbox1">Gré à Gré</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Consultation restreinte" name="type_demande[]">
                <label class="form-check-label" for="inlineCheckbox2">Consultation restreinte</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Appel d'offre" name="type_demande[]">
                <label class="form-check-label" for="inlineCheckbox2">Appel d'offre</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Contrat en cours" name="type_demande[]">
                <label class="form-check-label" for="inlineCheckbox2">Contrat en cours</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Décision Groupe" name="type_demande[]">
                <label class="form-check-label" for="inlineCheckbox2">Décision Groupe</label>
            </div>
            <br />
            <div class="row">
                <div class="col-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fournisseurs</th>
                                <th>Cotation technique</th>
                                <th>Prix proposé</th>
                                <th>Choix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="fournisseurs[]">
                                        <option></option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="cotation_technique[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="prix_propose[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="choix[]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="fournisseurs[]">
                                        <option></option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="cotation_technique[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="prix_propose[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="choix[]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="fournisseurs[]">
                                        <option></option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="cotation_technique[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="prix_propose[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="choix[]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="fournisseurs[]">
                                        <option></option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="cotation_technique[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="prix_propose[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="choix[]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="fournisseurs[]">
                                        <option></option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="cotation_technique[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="prix_propose[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="choix[]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="fournisseurs[]">
                                        <option></option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="cotation_technique[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="prix_propose[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="choix[]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="fournisseurs[]">
                                        <option></option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="cotation_technique[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="prix_propose[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="choix[]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="fournisseurs[]">
                                        <option></option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="cotation_technique[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="prix_propose[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="choix[]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="fournisseur[]">
                                        <option></option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="cotation_technique[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="prix_propose[]" />
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="choix[]" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-block btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-block btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>

        </form>
    </div>

@endsection
