@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Sortie stock</h2></div>
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

        <form method="post" action="{{ route('regulation-stock-sortie.update', $stock->id) }}">
            @csrf
            @method("PATCH")
            <div class="row">

                <div class="col-6">
                    <div class="form-group row">
                        <label for="date_appro" class="col-4">Date sortie</label>
                        <input type="date" id="date" name="date" value="{{$stock->date}}"
                               class="form-control col-8" required/>
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
                        <label for="service" class="col-4">Service</label>
                        <input id="service" name="service" value="{{$stock->service}}" class="form-control col-8"
                               required/>
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
                        <input type="hidden" name="item_ids[]" value="{{$item->id}}"/>
                        <td><input type="number" min="0" class="form-control" name="qte_prevu_edit[]" value="{{$item->qte_prevu}}"/></td>
                        <td><input type="number" min="0" class="form-control" name="qte_sortie_edit[]" value="{{$item->qte_sortie}}"/></td>
                        <td><input type="text" class="form-control" name="debut_edit[]" value="{{$item->debut}}"/></td>
                        <td><input type="text" class="form-control" name="fin_edit[]" value="{{$item->fin}}"/></td>
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
                    '                    <td><input type="number" min="0" class="form-control" name="qte_prevu[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="qte_sortie[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="debut[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="fin[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="reste[]"/></td>\n' +
                    '                </tr>');
            });
        })
    </script>
    <script>
        $(document).on('DOMNodeInserted', function () {
            $("input[name='qte_sortie[]']").on("change", function () {

                $.each($("input[name='qte_sortie[]']"), function (i) {
                    const qte_sortie = $("input[name='qte_sortie[]'").get(i).value;
                    const qte_prevu = $("input[name='qte_prevu[]'").get(i).value;
                    const reste = parseFloat(qte_prevu ?? 0) - parseFloat(qte_sortie ?? 0);
                    $("input[name='reste[]'").eq(i).val(reste);
                });
            });

            $("input[name='qte_sortie_edit[]']").on("change", function () {
                $.each($("input[name='qte_sortie_edit[]']"), function (i) {
                    const qte_sortie = $("input[name='qte_sortie_edit[]'").get(i).value;
                    const qte_prevu = $("input[name='qte_prevu_edit[]'").get(i).value;
                    const reste = parseFloat(qte_prevu ?? 0) - parseFloat(qte_sortie ?? 0);
                    $("input[name='reste_edit[]'").eq(i).val(reste);
                });
            });
        });
    </script>
@endsection
