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

        <form class="form-horizontal" method="post" action="{{ route('caisse-video-surveillance.update', $video->id) }}">
            @method('PATCH')
            @csrf

            <div class="card card-xxl-stretch">
                <div class="card-body pt-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date</label>
                                <input type="date" name="date" class="form-control col editbox" value="{{$video->date}}" required>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure début</label>
                                <input type="time" name="heureDebut" value="{{$video->heureDebut}}" class="form-control col editbox" required>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Heure fin</label>
                                <input type="time" name="heureFin" value="{{$video->heureFin}}" class="form-control col editbox" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre Régional</label>
                                <select name="centre" id="centre"
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Centre Régional"
                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        required>
                                    <option>{{$video->centre}}</option>
                                    @foreach ($centres as $centre)
                                        <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre</label>
                                <select id="centre_regional" name="centre_regional"
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Centre"
                                        data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        required>
                                    <option>{{$video->centre_regional}}</option>
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Numéro de box</label>
                                <select name="numeroBox" class="form-control col editbox" required>
                                    <option>{{$video->numeroBox}}</option>
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
                    </div>
                <hr>
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
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom</label>
                                <select type="text" name="operatrice" id="operatrice"
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Nom"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        required>
                                    <option value="{{$video->operatrice}}">{{$video->operatrices->operatrice->nomPrenoms ?? ''}}</option>
                                    @foreach ($operatrices as $operatrice)
                                        <option value="{{$operatrice->id}}"> {{$operatrice->operatrice->nomPrenoms}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Nom et Prenom(s)</label>
                                <input type="text" name="nomOperatrice" id="nomOperatrice" value="{{$video->operatrices->operatrice->nomPrenoms ?? ''}}" class="form-control col editbox"/>
                            </div>
                             <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Matricule</label>
                                <input type="text" name="matriculeOperatrice" id="matriculeOperatrice" value="{{$video->operatrices->operatrice->matricule ?? ''}}" class="form-control col editbox"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
                    <hr>
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
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Sécuripack</label>
                                <select type="text" name="securipack"
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Sécuripack"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true">
                                    <option>{{$video->securipack}}</option>
                                    <option>Extra grand</option>
                                    <option>Grand</option>
                                    <option>Moyen</option>
                                    <option>Petit</option>
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Sac jute</label>
                                <select type="text" name="sacjute"
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Sac jute"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true">
                                    <option>{{$video->sacjute}}</option>
                                    <option>Extra grand</option>
                                    <option>Grand</option>
                                    <option>Moyen</option>
                                    <option>Petit</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Numéro de scellé</label>
                        <input type="number" name="numeroScelle" value="{{$video->numeroScelle}}" class="form-control col-sm-6">
                    </div>
                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                        <label for="numero_bord" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">N˚bord</label>
                        <input type="text" id="numero_bord" name="numero_bord" value="{{$video->numero_bord}}" class="form-control col-sm-7" />
                    </div>
                </div>
            </div>
                    <hr>
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
                                        <input type="hidden" name="ecart" value="{{$video->ecart}}">
                                        <input class="form-check-input" type="checkbox" value="Montant annoncé" name="ecart" {{($video->ecart == 'Montant annoncé') ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                            Montant annoncé {{$video->absence}}
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
                                    <div class="form-check pt-2">
                                        <input type="hidden" name="erreur" value="{{$video->erreur}}">
                                        <input class="form-check-input" type="radio" value="Montant annoncé" name="erreur" {{($video->erreur == 'Montant annoncé') ? 'checked' : ''}}>
                                        <label class="form-check-label">
                                            Billetage
                                        </label>
                                    </div>
                                    <div class="form-check pt-3">
                                        <input class="form-check-input" type="radio" value="Numéro de scellé" name="erreur" {{($video->erreur == 'Numéro de scellé') ? 'checked' : ''}}>
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
                                        <input type="hidden" name="erreur" value="{{$video->absence}}">
                                        <input class="form-check-input" type="checkbox" value="Billetage" name="absence" checked="{{$video->absence == 'abscence' ? true : false}}">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Billetage
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                        <label for="remarque" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Remarque</label>
                        <textarea id="remarque" name="remarque" class="form-control col editbox">{{$video->remarque}}</textarea>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-4">Commentaire</label>
                        <textarea name="commentaire" rows="5" class="form-control col-sm-8">{{$video->commentaire}}</textarea>
                    </div>
                    <br />
                    <br />
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
            $(document).ready(function() {
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

