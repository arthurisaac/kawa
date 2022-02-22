@extends('bases.caisse')

@section('main')
    @extends('bases.toolbar', ["title" => "Caisse Centrale", "subTitle" => "Vidéo surveillance"])
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

        <form class="form-horizontal" method="post" action="{{ route('caisse-video-surveillance.store') }}">
            @csrf

            <div class="row">
                <div class="col-3">
                    <div class="form-group row">
                        <label class="col-sm-4">Date</label>
                        <input type="date" name="date" class="form-control col-sm-8" value="{{date('Y-m-d')}}" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Heure début</label>
                        <input type="time" name="heureDebut" class="form-control col-sm-8" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Heure fin</label>
                        <input type="time" name="heureFin" class="form-control col-sm-8" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Numéro de box</label>
                        <select name="numeroBox" class="form-control col-sm-8" required>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group row">
                        <label for="centre" class="col-sm-5">Centre Régional</label>
                        <select name="centre" id="centre" class="form-control col-sm-7" required>
                            <option></option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="centre_regional col-sm-5">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col-sm-7" required>
                            <option></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" style="align-items: center;">
                <div class="col">
                    <div class="row" style="align-items: center;">
                        <div class="col-4">
                            <h6>Opératrice de caisse</h6>
                        </div>
                        <div class="col-1">
                            <hr class="burval-separator">
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-5">Nom</label>
                                <select type="text" name="operatrice" id="operatrice" class="form-control col-sm-7"
                                        required>
                                    <option></option>
                                    @foreach ($operatrices as $operatrice)
                                        <option
                                            value="{{$operatrice->id}}"> {{$operatrice->operatrice->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5">Nom et Prenom(s)</label>
                                <input type="text" name="nomOperatrice" id="nomOperatrice"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5">Matricule</label>
                                <input type="text" name="matriculeOperatrice" id="matriculeOperatrice"
                                       class="form-control col-sm-7"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row" style="align-items: center;">
                <div class="col-6">
                    <div class="row" style="align-items: center;">
                        <div class="col-4">
                            <h6>Colis</h6>
                        </div>
                        <div class="col-1">
                            <hr class="burval-separator" style="height: 13vh">
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-5">Sécuripack</label>
                                <select type="text" name="securipack" class="form-control col-sm-7">
                                    <option></option>
                                    <option>Extra grand</option>
                                    <option>Grand</option>
                                    <option>Moyen</option>
                                    <option>Petit</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5">Sac jute</label>
                                <select type="text" name="sacjute" class="form-control col-sm-7">
                                    <option></option>
                                    <option>Extra grand</option>
                                    <option>Grand</option>
                                    <option>Moyen</option>
                                    <option>Petit</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group row">
                        <label class="col-sm-6">Numéro de scellé</label>
                        <input type="number" name="numeroScelle" class="form-control col-sm-6">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="numero_bord" class="col-sm-5">N˚bord</label>
                        <input type="text" id="numero_bord" name="numero_bord" class="form-control col-sm-7" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row" style="align-items: center;">
                        <div class="col-4">
                            <h6>Incident</h6>
                        </div>
                        <div class="col-1">
                            <hr class="burval-separator" style="height: 28vh">
                        </div>
                        <div class="col">
                            <div class="row" style="align-items: center;">
                                <div class="col-4">
                                    <label>Ecart</label>
                                </div>
                                <div class="col-1">
                                    <hr class="burval-separator" style="height: 5vh">
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Montant annooncé"
                                               name="ecart">
                                        <label class="form-check-label">
                                            Montant annoncé
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="align-items: center;">
                                <div class="col-4">
                                    <label>Erreur</label>
                                </div>
                                <div class="col-1">
                                    <hr class="burval-separator" style="height: 7vh">
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Montant annoncé"
                                               name="erreur">
                                        <label class="form-check-label">
                                            Billetage
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Numéro de scellé"
                                               name="erreur">
                                        <label class="form-check-label">
                                            Numéro de scellé
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="align-items: center;">
                                <div class="col-4">
                                    <label>Absence</label>
                                </div>
                                <div class="col-1">
                                    <hr class="burval-separator" style="height: 5vh">
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Billetage"
                                               name="absence">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Billetage
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4" style="display: none">
                    <div class="form-group row">
                        <label for="remarque" class="col-5">Remarque</label>
                        <textarea id="remarque" name="remarque" class="form-control col-7"></textarea>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-4">Commentaire</label>
                        <textarea name="commentaire" rows="5" class="form-control col-sm-8"></textarea>
                    </div>
                    <br/>
                    <br/>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        <button class="btn btn-danger btn-sm" type="submit">Annuler</button>
                    </div>
                </div>
            </div>
        </form>

        <script>
            let operatrices = {!! json_encode($operatrices) !!};
            let centres = {!! json_encode($centres) !!};
            let centres_regionaux = {!! json_encode($centres_regionaux) !!};
            $(document).ready(function () {
                $("#operatrice").on("change", function () {
                    const operatrice = operatrices.find(p => p.id === parseInt(this.value));
                    if (operatrice) {
                        $("#nomOperatrice").val(operatrice.operatrice.nomPrenoms);
                        $("#matriculeOperatrice").val(operatrice.operatrice.matricule);
                    }
                });
                $("#centre").on("change", function () {
                    $("#centre_regional option").remove();
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
    </div>
@endsection
