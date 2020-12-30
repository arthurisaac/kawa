@extends('base')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
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

        <form class="form-horizontal" method="post" action="{{ route('achat-fournisseur.update', $fournisseur->id) }}">
            @method('PATCH')
            @csrf

            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="entreprise-tab" data-toggle="tab" href="#entreprise" role="tab"
                       aria-controls="entreprise" aria-selected="true">Identification entreprise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab"
                       aria-controls="contacts" aria-selected="false">Principaux contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#position" role="tab"
                       aria-controls="position" aria-selected="false">Position commerciale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="finances-tab" data-toggle="tab" href="#finances" role="tab"
                       aria-controls="finances" aria-selected="false">Informations financières</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="demarche-tab" data-toggle="tab" href="#demarche" role="tab"
                       aria-controls="demarche" aria-selected="false">Démarche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="paiement-tab" data-toggle="tab" href="#paiement" role="tab"
                       aria-controls="paiement" aria-selected="false">Mode de paiement</a>
                </li>
            </ul>
            <br/>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="entreprise" role="tabpanel"
                     aria-labelledby="entreprise-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-5">Denomination</label>
                                    <input type="text" name="denomination" value="{{$fournisseur->denomination}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Sigle</label>
                                    <input type="text" name="sigle" value="{{$fournisseur->sigle}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Secteur activité</label>
                                    <input type="text" name="secteur_activite"
                                           value="{{$fournisseur->secteur_activite}}" class="form-control col-sm-7"
                                           required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">RCCM</label>
                                    <input type="text" name="rccm" value="{{$fournisseur->rccm}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">CNPS</label>
                                    <input type="text" name="cnps" value="{{$fournisseur->cnps}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">cpt</label>
                                    <input type="text" name="cpt" value="{{$fournisseur->cpt}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Adresse postale</label>
                                    <input type="text" name="adresse_postale" value="{{$fournisseur->adresse_postale}}"
                                           class="form-control col-sm-7">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Adresse géographique</label>
                                    <input type="text" name="adresse_geo" value="{{$fournisseur->adresse_geo}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Téléphone de l'entreprise</label>
                                    <input type="tel" name="telephone_entreprise"
                                           value="{{$fournisseur->telephone_entreprise}}" class="form-control col-sm-7"
                                           required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Email de l'entreprise</label>
                                    <input type="email" name="email_entreprise"
                                           value="{{$fournisseur->email_entreprise}}" class="form-control col-sm-7"
                                           required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Fax</label>
                                    <input type="tel" name="fax" value="{{$fournisseur->fax}}"
                                           class="form-control col-sm-7">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Site internet</label>
                                    <input type="url" name="siteweb" value="{{$fournisseur->siteweb}}"
                                           class="form-control col-sm-7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-5">Fonction</label>
                                    <input type="text" name="fonction" value="{{$fournisseur->fonction}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">nom</label>
                                    <input type="text" name="nom" value="{{$fournisseur->nom}}"
                                           class="form-control col-sm-7">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Prenoms</label>
                                    <input type="text" name="prenoms" value="{{$fournisseur->prenoms}}"
                                           class="form-control col-sm-7">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Téléphone</label>
                                    <input type="tel" name="telephone" value="{{$fournisseur->telephone}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Email</label>
                                    <input type="email" name="email" value="{{$fournisseur->email}}"
                                           class="form-control col-sm-7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="position" role="tabpanel" aria-labelledby="position-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-5">Part de marché</label>
                                    <input type="number" name="part_marche" value="{{$fournisseur->part_marche}}"
                                           class="form-control col-sm-7">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">% croissance</label>
                                    <input type="number" name="taux_croissance"
                                           value="{{$fournisseur->taux_croissance}}" class="form-control col-sm-7">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">chaine_valeur</label>
                                    <input type="text" name="chaine_valeur" value="{{$fournisseur->chaine_valeur}}"
                                           class="form-control col-sm-7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="finances" role="tabpanel" aria-labelledby="finances-tab">
                    <div class="container">
                        <!-- TODO : chiffres d'affaire-->

                        <table id="financeTable">
                            <thead>
                            <tr>
                                <th>Année</th>
                                <th>CA</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cas as $ca)
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="ids[]" value="{{$ca->id}}"/>
                                        <input type="number" class="form-control" name="annee[]" placeholder="xxxx" value="{{$ca->annee}}"/>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="ca[]"
                                               placeholder="chiffre d'affaire" value="{{$ca->ca}}"/>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--<br/>
                        <button class="btn btn-primary btn-sm" type="button" id="addRow">Ajouter +</button>--}}
                    </div>
                </div>
                <div class="tab-pane fade" id="demarche" role="tabpanel" aria-labelledby="demarche-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-5">Certification</label>
                                    <input type="text" name="certification" value="{{$fournisseur->certification}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Sous traitant</label>
                                    <input type="text" name="sous_traitant" value="{{$fournisseur->sous_traitant}}"
                                           class="form-control col-sm-7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="paiement" role="tabpanel" aria-labelledby="paiement-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-5">Credit 30 jours</label>
                                    <input type="text" name="credit_30_jours" value="{{$fournisseur->credit_30_jours}}"
                                           class="form-control col-sm-7">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Credit 60 jours</label>
                                    <input type="text" name="credit_60_jours" value="{{$fournisseur->credit_60_jours}}"
                                           class="form-control col-sm-7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br/>
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-block btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-block btn-danger btn-sm" type="button" onclick="window.history.back();">
                        Retour
                    </button>
                </div>
                <div class="col"></div>
            </div>

        </form>

    </div>
@endsection
