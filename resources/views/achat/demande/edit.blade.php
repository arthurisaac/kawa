@extends('bases.achat')

@section('main')
    @extends('bases.toolbar', ["title" => "Achat", "subTitle" => "Demande achat"])
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
    <div class="burval-container">
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

        <form class="form-horizontal" method="post" action="{{ route('achat-demande.update', $demande->id) }}">
            @method('PATCH')
            @csrf

            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(Session::get('user')->compte ?? '', 'operateur') ? '' : '' }}"
                       id="entreprise-tab" data-toggle="tab" href="#demande" role="tab"
                       aria-controls="demande" aria-selected="true">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(Session::get('user')->compte ?? 'operateur', 'operateur') ? '' : '' }}"
                       id="imputations-tab" data-toggle="tab" href="#imputations" role="tab"
                       aria-controls="imputations" aria-selected="false">Imputation</a>
                </li>
            </ul>
            <br>
            <div class="tab-content">
                <div class="tab-pane fade show" id="demande" role="tabpanel"
                     aria-labelledby="entreprise-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-5">Date de la demande</label>
                                    <input type="date" name="date" value="{{$demande->date}}"
                                           class="form-control col-sm-7" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="centre" class="col-sm-5">Centre</label>
                                    <select name="centre" id="centre" class="form-control col-sm-7" required>
                                        <option>{{$demande->centre}}</option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="centre_regional" class="col-sm-5">Centre régional</label>
                                    <select id="centre_regional" name="centre_regional" class="form-control col-sm-7"
                                            required>
                                        <option>{{$demande->centre_regional}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-5">Identité du demandeur</label>
                                    <input type="text" name="identite" value="{{$demande->identite}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Service ou Département</label>
                                    <input type="text" name="service" value="{{$demande->service}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Nom du responsable</label>
                                    <input type="text" name="nom_demandeur" value="{{$demande->nom_demandeur}}"
                                           class="form-control col-sm-7" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Téléphone</label>
                                    <input type="tel" name="telephone_demandeur"
                                           value="{{$demande->telephone_demandeur}}" class="form-control col-sm-7"
                                           required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Adresse éléctronique</label>
                                    <input type="email" name="adresse_electronique_demandeur"
                                           value="{{$demande->adresse_electronique_demandeur}}"
                                           class="form-control col-sm-7" required>
                                </div>
                            </div>
                            <div class="col">
                                <h6>Nature de la demande</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Investissement"
                                           name="nature_demande" id="defaultCheck">
                                    <label class="form-check-label" for="defaultCheck">
                                        Investissement
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Charges" name="nature_demande"
                                           id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Charges
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Location ELS/Contrat"
                                           name="nature_demande" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        Location ELS/Contrat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Location ELS/Appel"
                                           name="nature_demande" id="defaultCheck3">
                                    <label class="form-check-label" for="defaultCheck3">
                                        Location ELS/Appel
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h6>Description de l'achat</h6>
                        <br/>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-5">Objet de l'achat</label>
                                    <input type="text" name="objet_achat" value="{{$demande->objet_achat}}"
                                           class="form-control col-sm-7" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-5">Famille d'achat</label>
                                    <input type="text" name="famille_achat" value="{{$demande->famille_achat}}"
                                           class="form-control col-sm-7" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-5">Sous famille d'achat</label>
                                    <input type="text" name="sous_famille_achat"
                                           value="{{$demande->sous_famille_achat}}" class="form-control col-sm-7"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-5">Imputation budgétaire</label>
                                    <input type="text" name="famille_achat" value="{{$demande->famille_achat}}"
                                           class="form-control col-sm-7" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="imputations" role="tabpanel" aria-labelledby="imputations-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-5">ETAT DE LA DEMANDE</label>
                                    <select name="demande" class="form-control col-sm-7" required>
                                        <option>{{$demande->demande}}</option>
                                        <option>Demande en cours</option>
                                        <option>Demande refusée</option>
                                        <option>Demande validée</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h6>Utilité / justification de l'achat</h6>
                        <br/>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-5">Fournisseur retenu</label>
                                    <select class="form-control col-sm-7" name="fournisseur_retenu">
                                        <option
                                            value="{{$demande->fournisseur_retenu}}">{{$demande->fournisseurs->denomination ?? $demande->fournisseur_retenu}}</option>
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5">Montant retenu</label>
                                    <input type="text" name="montant_retenu" value="{{$demande->montant_retenu}}"
                                           class="form-control col-sm-7" required>
                                </div>
                            </div>
                        </div>
                        <h6>Fournisseurs consultés</h6><br/>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Gré à Gré"
                                   name="type_demande[]">
                            <label class="form-check-label" for="inlineCheckbox1">Gré à Gré</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                   value="Consultation restreinte" name="type_demande[]">
                            <label class="form-check-label" for="inlineCheckbox2">Consultation restreinte</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Appel d'offre"
                                   name="type_demande[]">
                            <label class="form-check-label" for="inlineCheckbox3">Appel d'offre</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox4"
                                   value="Contrat en cours" name="type_demande[]">
                            <label class="form-check-label" for="inlineCheckbox4">Contrat en cours</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="Décision Groupe"
                                   name="type_demande[]">
                            <label class="form-check-label" for="inlineCheckbox5">Décision Groupe</label>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-8">
                                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%">
                                    <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                                        <th>Fournisseurs</th>
                                        <th>Cotation technique</th>
                                        <th>Prix proposé</th>
                                        <th>Choix</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($consultes as $consulte)
                                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                                            <td>
                                                <select class="form-control" name="fournisseur[]">
                                                    <option
                                                        value="{{$consulte->fournisseur}}">{{$consulte->fournisseurs->denomination ?? $consulte->fournisseur}}</option>
                                                    @foreach($fournisseurs as $fournisseur)
                                                        <option
                                                            value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text"
                                                       value="{{$consulte->cotation_technique}}"
                                                       name="cotation_technique[]"/>
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="prix_propose[]"
                                                       value="{{$consulte->prix_propose}}"/>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="choix[]"
                                                       value="{{$consulte->choix}}"/>
                                                <input class="form-control" type="hidden" name="id[]"
                                                       value="{{$consulte->id}}"/>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @for($i = 0; $i<5; $i++)
                                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                                            <td>
                                                <select class="form-control" name="fournisseur_n[]">
                                                    <option></option>
                                                    @foreach($fournisseurs as $fournisseur)
                                                        <option
                                                            value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="cotation_technique_n[]"/>
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="prix_propose_n[]"/>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="choix_n[]"/>
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br/>
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-block btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-block btn-danger btn-sm" type="button" onclick="window.history.back()">
                        Annuler
                    </button>
                </div>
            </div>

        </form>

    </div>
    <script>
        let centres = {!! json_encode($centres) !!};
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
    <script>
        let demandes = {!! json_encode($demande) !!};
        $(document).ready(function () {
            const type_demande_objet = demandes.type_demande + "";
            const type_demande_objet_array = type_demande_objet.split(',');
            console.log(type_demande_objet_array)
            $("input[name='type_demande[]']").map(function () {
                const value = $(this).val();
                if (type_demande_objet_array.includes(value)) $(this).prop("checked", true);
            });

            $("input[name='nature_demande']").map(function () {
                const value = $(this).val();
                if (demandes.nature_demande === value) $(this).prop("checked", true);
            });
        });

    </script>
@endsection
