@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée stock</h2></div>
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

        <form method="post" action="{{ route('regulation-stock-entree.update', $stock->id) }}">
            @csrf
            @method("PATCH")
            <div class="row">

                <div class="col-6">
                    <div class="form-group row">
                        <label for="centre" class="col-4">Centre Régional</label>
                        <select name="centre" id="centre" class="form-control col-8" required>
                            <option>{{$stock->centre}}</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="centre_regional" class="col-4">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col-8" required>
                            <option>{{$stock->centre_regional}}</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="date_appro" class="col-4">Date</label>
                        <input type="date" id="date_appro" name="date_appro" value="{{$stock->date}}"
                               class="form-control col-8" required readonly/>
                    </div>
                    <div class="form-group row">
                        <label for="libelle" class="col-4">Libellé</label>
                        <select id="libelle" name="libelle" class="form-control col-8" required>
                            <option>{{$stock->libelle}}</option>
                            <option>bordereau de transport</option>
                            <option>bordereau de collecte</option>
                            <option>cahier de maintenance</option>
                            <option>cahier d’appro</option>
                            <option>securipack extra</option>
                            <option>securipack grand</option>
                            <option>securipack moyen</option>
                            <option>securipack petit</option>
                            <option>pochette</option>
                            <option>scellé DAB</option>
                            <option>scellé caisse</option>
                            <option>coiffe 10000</option>
                            <option>coiffe 5000</option>
                            <option>coiffe 2000</option>
                            <option>coiffe 1000</option>
                            <option>coiffe 500</option>
                            <option>sac jute grand</option>
                            <option>sac jute moyen</option>
                            <option>TAG bleu</option>
                            <option>TAG vert</option>
                            <option>TAG jaune</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="fournisseur" class="col-4">Fournisseur</label>
                        <select id="fournisseur" name="fournisseur" class="form-control col-8" required>
                            <option>{{$stock->fournisseur}}</option>
                            <option>VECTIS</option>
                            <option>SOSIV</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-4">Numero</label>
                        <input type="text" name="numero" id="numero" value="{{$stock->numero}}"
                               class="form-control col-8  " required/>
                    </div>
                </div>
            </div>
            <br/>

            <button type="button" class="btn btn-sm btn-primary" id="add">+</button>
            <br>
            <br>
            <table class="table table-bordered" style="width: 100%" id="table">
                <thead>
                <tr>
                    <th>Qté attendue</th>
                    <th>Qté livrée</th>
                    <th>N° début</th>
                    <th>N° Fin</th>
                    <th>Reste</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <input type="hidden" value="{{$item->id}}" name="item_ids[]">
                        <td><input type="number" min="0" class="form-control" name="qte_attendu_edit[]" value="{{$item->qte_attendu}}"/></td>
                        <td><input type="number" min="0" class="form-control" name="qte_livree_edit[]" value="{{$item->qte_livree}}"/></td>
                        <td><input type="text" class="form-control" name="no_debut_edit[]" value="{{$item->debut}}"/></td>
                        <td><input type="text" class="form-control" name="no_fin_edit[]" value="{{$item->fin}}"/></td>
                        <td><input type="number" min="0" class="form-control" name="reste_edit[]" value="{{$item->reste}}"/></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <br>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
    <script>
        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

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
        $(document).ready(function () {
            $("#add").on("click", function () {
                $('#table').append('<tr>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="qte_attendu[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="qte_livree[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="no_debut[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="no_fin[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="reste[]"/></td>\n' +
                    '                </tr>');
            });
        })
    </script>
@endsection
