@extends('base')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">

    <div class="burval-container">
        <div><h2 class="heading">Personnel</h2></div>
        <br/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('personnel.store') }}">
            @csrf

            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="personnel-tab" data-toggle="tab" href="#personnel" role="tab"
                       aria-controls="personne" aria-selected="true">Information personnel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="affectation-tab" data-toggle="tab" href="#affectation" role="tab"
                       aria-controls="affectation" aria-selected="false">Affectation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="conges-tab" data-toggle="tab" href="#conges" role="tab"
                       aria-controls="conges" aria-selected="false">Gestion des conges</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sanctions-tab" data-toggle="tab" href="#sanctions" role="tab"
                       aria-controls="sanctions" aria-selected="false">Gestion des sanctions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="infos-tab" data-toggle="tab" href="#infos" role="tab"
                       aria-controls="infos" aria-selected="false">Informations complementaires</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="personnel" role="tabpanel" aria-labelledby="personnel-tab">
                    <div class="container">
                        <br>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom et prénoms</label>
                                    <input type="text" name="nomPrenoms" class="form-control col-sm-6" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date de naissance</label>
                                    <input type="date" name="dateNaissance" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date d’entrée dans la société</label>
                                    <input type="date" name="dateEntreeSociete" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date de sortie</label>
                                    <input type="date" name="dateSortie" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Type de sortie</label>
                                    <select name="typeSortie" class="form-control col-sm-6">
                                        <option></option>
                                        <option value="Fin contrat">Fin contrat</option>
                                        <option value="Fin contrat">Licenciement</option>
                                        <option value="Fin contrat">Abandon de poste</option>
                                        <option value="Fin contrat">Retraite</option>
                                        <option value="Fin contrat">Décès</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Fontion</label>
                                    <input type="text" name="fonction" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Service</label>
                                    <input type="text" name="service" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nature du contrat</label>
                                    <select name="natureContrat" class="form-control col-sm-6">
                                        <option value="CDD">CDD</option>
                                        <option value="CDI">CDI</option>
                                        <option value="PRESTATAIRE">PRESTATAIRE</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Numéro CNPS</label>
                                    <input type="number" name="numeroCNPS" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Situation matrimoniale</label>
                                    <input type="text" name="situationMatrimoniale" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nombre d'enfants</label>
                                    <input type="number" min="0" name="nombreEnfants" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Photo</label>
                                    <input type="file" name="photo" class="form-control-file col-sm-6">
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="affectation" role="tabpanel" aria-labelledby="affectation-tab">
                    <div class="container">
                        <br/>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-md-2">Matricule</label>
                                    <input type="text" class="form-control col-md-4" name="matricule"
                                           value={{$nextId}} required/>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2">Centre</label>
                                    <select class="Combobox col-md-4" name="centre" id="centre" required>
                                        <option>Choisir centre</option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Centre régional</label>
                                    <select class="Combobox col-md-4" name="centreRegional" id="centre_regional"
                                            required></select>
                                </div>
                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Sécurité</label></div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="securite"
                                                   value="Responsable de sécurité">
                                            <label class="form-check-label">
                                                Responsable de sécurité
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="securite"
                                                   value="Chargé de sécurité">
                                            <label class="form-check-label">
                                                Chargé de sécurité
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="securite"
                                                   value="Opérateur radio">
                                            <label class="form-check-label">
                                                Opérateur radio
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br/>

                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Transport</label></div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="transport"
                                                   value="Responsable de sécurité">
                                            <label class="form-check-label">
                                                Responsable de sécurité
                                            </label>
                                        </div>
                                        <div class="row" style="align-items: center;">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport"
                                                           value="Convoyeur">
                                                    <label class="form-check-label">
                                                        Convoyeur
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport"
                                                           value="Chef de bord">
                                                    <label class="form-check-label">
                                                        Chef de bord
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport"
                                                           value="Chauffeur">
                                                    <label class="form-check-label">
                                                        Chauffeur
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="transport"
                                                           value="Garde">
                                                    <label class="form-check-label">
                                                        Garde
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <br/>

                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Caisse</label></div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caisse"
                                                   value="Chargée de caisse">
                                            <label class="form-check-label">
                                                Chargée de caisse
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caisse"
                                                   value="Chargée adjointe de caisse">
                                            <label class="form-check-label">
                                                Chargée adjointe de caisse
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caisse"
                                                   value="Caissière">
                                            <label class="form-check-label">
                                                Caissière
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caisse" value="Trieuse">
                                            <label class="form-check-label">
                                                Trieuse
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <br/>

                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Régulation</label></div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="regulation"
                                                   value="Chargée de la régulation">
                                            <label class="form-check-label">
                                                Chargée de la régulation
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="regulation"
                                                   value="Chargée adjointe de la régulation">
                                            <label class="form-check-label">
                                                Chargée adjointe de la régulation
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br/>

                                <div class="row" style="align-items: center;">
                                    <div class="col-2"><label>Siège</label></div>
                                    <div class="col">
                                        <div class="row" style="align-items: center;">
                                            <div class="col-3"><label>Service</label></div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="RESSOURCES HUMAINES">
                                                    <label class="form-check-label">
                                                        RESSOURCES HUMAINES
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="INFORMATIQUE">
                                                    <label class="form-check-label">
                                                        INFORMATIQUE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="LOGISTIQUE">
                                                    <label class="form-check-label">
                                                        LOGISTIQUE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="MONETIQUE">
                                                    <label class="form-check-label">
                                                        MONETIQUE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="GARAGE">
                                                    <label class="form-check-label">
                                                        GARAGE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeService"
                                                           value="SSB">
                                                    <label class="form-check-label">
                                                        SSB
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row" style="align-items: center;">
                                            <div class="col-3"><label>Direction</label></div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeDirection"
                                                           value="DIRECTION FINANCIERE ET COMPTABLE">
                                                    <label class="form-check-label">
                                                        DIRECTION FINANCIERE ET COMPTABLE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeDirection"
                                                           value="DIRECTION COMMERCIALE ET MARKETING">
                                                    <label class="form-check-label">
                                                        DIRECTION COMMERCIALE ET MARKETING
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siegeDirection"
                                                           value="DIRECTION DES OPERATIONS">
                                                    <label class="form-check-label">
                                                        DIRECTION DES OPERATIONS
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row" style="align-items: center;">
                                            <div class="col-3"><label>Direction générale</label></div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="siegeDirectionGenerale"
                                                           value="DIRECTION GENERALE ADJOINTE">
                                                    <label class="form-check-label">
                                                        DIRECTION GENERALE ADJOINTE
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="siegeDirectionGenerale" value="ASISTANTE EXECUTIVE">
                                                    <label class="form-check-label">
                                                        ASISTANTE EXECUTIVE
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="conges" role="tabpanel" aria-labelledby="conges-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-5">
                                <br/>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date du dernier départ en congé</label>
                                    <input type="date" name="dateDernierDepartConge" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Date du prochain départ en congé</label>
                                    <input type="date" name="dateProchainDepartConge" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nombre de jours pris</label>
                                    <input type="number" min="0" name="nombreJourPris" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nombre de jours pris</label>
                                    <input type="number" min="0" name="nombreJourRestant" class="form-control col-sm-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="sanctions" role="tabpanel" aria-labelledby="sanctions-tab">
                    <div class="container">
                        <div class="row">
                            <br>
                            <div class="col-5">
                                <br/>
                                <div class="form-group row">
                                    <label class="col-sm-4">Avertissement</label>
                                    <input type="date" name="avertissement" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Mise à pied</label>
                                    <input type="date" name="miseAPied" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Licenciement</label>
                                    <input type="number" min="0" name="licenciement" class="form-control col-sm-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="infos" role="tabpanel" aria-labelledby="infos-tab">
                    <div class="container">
                        <div class="row">
                            <br>
                            <div class="col-5">
                                <br/>
                                <div class="form-group row">
                                    <label class="col-sm-4">Adresse géographique</label>
                                    <input type="text" name="adresseGeographique" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Contact personnels</label>
                                    <input type="text" name="contactPersonnel" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom du père</label>
                                    <input type="text" name="nomPere" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom de la mère</label>
                                    <input type="text" name="nomMere" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Nom du conjoint</label>
                                    <input type="text" name="nomConjoint" class="form-control col-sm-6">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Personnes à contacter en cas d'urgence</label>
                                    <input type="text" name="personneContacter" class="form-control col-sm-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
            </div>

        </form>
    </div>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                $('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

                const centre = centres.find(c => c.centre === this.value);
                const regions = centres_regionaux.filter(region => {
                    return region.id_centre === centre.id;
                });
                regions.map(({centre_regional}) => {
                    $('#centre_regional').append($('<option>', {
                        value: centre_regional,
                        text: centre_regional
                    }));
                })
            });
        });
    </script>
@endsection
