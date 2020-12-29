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

        <form class="form-horizontal" method="post" action="{{ route('achat-fournisseur.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Denomination</label>
                        <input type="text" name="denomination" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Sigle</label>
                        <input type="text" name="sigle" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Secteur activité</label>
                        <input type="text" name="secteur_activite" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">RCCM</label>
                        <input type="text" name="rccm" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">CNPS</label>
                        <input type="text" name="cnps" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">cpt</label>
                        <input type="text" name="cpt" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Adresse postale</label>
                        <input type="text" name="adresse_postale" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Adresse géographique</label>
                        <input type="text" name="adresse_geo" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Téléphone de l'entreprise</label>
                        <input type="tel" name="telephone_entreprise" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Email de l'entreprise</label>
                        <input type="email" name="email_entreprise" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Fax</label>
                        <input type="tel" name="fax" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Site internet</label>
                        <input type="url" name="siteweb" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Fonction</label>
                        <input type="text" name="fonction" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">nom</label>
                        <input type="text" name="nom" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Prenoms</label>
                        <input type="text" name="prenoms" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Téléphone</label>
                        <input type="tel" name="telephone" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Email</label>
                        <input type="email" name="email" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Part de marché</label>
                        <input type="number" name="part_marche" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">% croissance</label>
                        <input type="number" name="taux_croissance" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">chaine_valeur</label>
                        <input type="text" name="chaine_valeur" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Certification</label>
                        <input type="text" name="certification" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Sous traitant</label>
                        <input type="text" name="sous_traitant" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Credit 30 jours</label>
                        <input type="text" name="credit_30_jours" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Credit 60 jours</label>
                        <input type="text" name="credit_60_jours" class="form-control col-sm-7">
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-block btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-block btn-danger btn-sm" type="reset">Annuler</button>
                </div>
                <div class="col"></div>
            </div>

        </form>
    </div>

@endsection
