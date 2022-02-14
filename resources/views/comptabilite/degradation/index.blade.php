@extends('bases.informatique')

@section('main')
    @extends('bases.toolbar', ["title" => "Informatique", "subTitle" => "Dégradation"])
    <div class="burval-container">
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

        <form class="form-horizontal" method="post" action="{{ route('comptabilite-degradation.store') }}">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Date de dégradation</label>
                        <input type="date" name="dateDegradation" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Lieu</label>
                        <input type="text" name="lieu" class="form-control col-sm-7" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">N° Conteneur</label>
                        <select name="conteneur" class="form-control col-sm-7" required>
                            <option></option>
                            @foreach($conteneurs as $conteneur)
                                <option value="{{$conteneur->id}}">{{$conteneur->conteneur}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Détails</label>
                        <input name="details" class="form-control col-sm-7" required/>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Destination/Provenance</label>
                        <input type="text" name="destinationProvenance" class="form-control col-sm-7" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Site propriétaire</label>
                        <select type="text" name="site" class="form-control col-sm-7" required>
                            <option></option>
                            @foreach($sites as $site)
                                <option value="{{$site->id}}">{{$site->site}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Client</label>
                        <select type="text" name="client" class="form-control col-sm-7" required>
                            <option></option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->client_nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Commentaire</label>
                        <textarea name="commentaire" class="form-control col-sm-7"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Conteneur enlevé?</label>
                        <select name="conteneurEnleve" class="form-control col-sm-7" required>
                            <option>OUI</option>
                            <option>NON</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Conteneur avec des fonds?</label>
                        <select name="conteneurAvecFonds" class="form-control col-sm-7" required>
                            <option>OUI</option>
                            <option>NON</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Montant</label>
                        <input type="number" name="montant" class="form-control col-sm-7" required/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Date déclaration</label>
                        <input type="date" name="dateDeclaration" class="form-control col-sm-7" required/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">N°Bordereau</label>
                        <input type="number" name="bordereau" class="form-control col-sm-7" required/>
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                    <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                </div>
            </div>

        </form>

    </div>
@endsection
