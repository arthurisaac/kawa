@extends('base')

@section('main')
    <div class="burval-container">
        <h2>Sortie stock</h2>
        <a href="/regulation-stock-sortie-liste" class="btn btn-link">Liste</a>
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
                        <select id="service" name="service" class="form-control col-8" required>
                            <option>{{$stock->service}}</option>
                            <option>Informatique</option>
                            <option>Sécurité</option>
                            <option>Caisse</option>
                            <option>DAB</option>
                            <option>Comptabilite</option>
                            <option>Regulation</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="receveur" class="col-4">Receveur</label>
                        <input id="receveur" name="receveur" value="{{$stock->receveur}}" class="form-control col-8"
                               required/>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <br/>

            <button type="button" class="btn btn-sm btn-primary" id="add">+</button>
            <br>
            <br>
            <table class="table table-bordered" style="width: 100%" id="table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Libellé</th>
                    <th>Qté sortie</th>
                    <th>N° début</th>
                    <th>N° Fin</th>
                    <th>Référence</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <input type="hidden" name="item_ids[]" value="{{$item->id}}"/>
                        <td><input type="date" class="form-control" name="date_item[]" value="{{$item->date}}"/></td>
                        <td><select id="libelle" name="libelle[]" class="form-control" required>
                                <option>{{$item->libelle}}</option>
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
                            </select></td>
                        <td><input type="number" min="0" class="form-control" name="qte_sortie[]" value="{{$item->qte_sortie}}"/></td>
                        <td><input type="text" class="form-control" name="debut[]" value="{{$item->debut}}"/></td>
                        <td><input type="text" class="form-control" name="fin[]" value="{{$item->fin}}"/></td>
                        <td><input type="text" class="form-control" name="reference[]" value="{{$item->reference}}"/></td>
                        <td><a class="btn btn-danger btn-sm" onclick="supprimerItem('{{$item->id}}', this)"></a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2" style="font-weight: bold; text-transform: uppercase;"> Total</td>
                    <td><input type="number" class="form-control" name="totalSortie"  id="totalSortie" value="{{$stock->items->sum('qte_sortie')}}" /> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tfoot>
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
        function supprimerItem(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "/regulation-stock-sortie-item/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function () {
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("table").deleteRow(indexLigne);
                        changeQte();
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
        function supprimer(e) {
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("table").deleteRow(indexLigne);
            changeQte();
        }
        function changeQte() {
            let totalQte = 0;

            $.each($("input[name='qte_sortie[]']"), function (i) {
                const qte_sortie = $("input[name='qte_sortie[]'").get(i).value;
                totalQte += parseFloat(qte_sortie) ?? 0;
            });
            $("#totalSortie").val(totalQte);
        }
        $(document).ready(function () {
            $("#add").on("click", function () {
                $('#table').append('<tr>\n' +
                    '                        <input type="hidden" name="item_ids[]"/>\n' +
                    '                        <td><input type="date" class="form-control" name="date_item[]"/></td>\n' +
                    '                        <td><select id="libelle" name="libelle[]" class="form-control" required>\n' +
                    '                                <option></option>\n' +
                    '                                <option>bordereau de transport</option>\n' +
                    '                                <option>bordereau de collecte</option>\n' +
                    '                                <option>cahier de maintenance</option>\n' +
                    '                                <option>cahier d’appro</option>\n' +
                    '                                <option>securipack extra</option>\n' +
                    '                                <option>securipack grand</option>\n' +
                    '                                <option>securipack moyen</option>\n' +
                    '                                <option>securipack petit</option>\n' +
                    '                                <option>pochette</option>\n' +
                    '                                <option>scellé DAB</option>\n' +
                    '                                <option>scellé caisse</option>\n' +
                    '                                <option>coiffe 10000</option>\n' +
                    '                                <option>coiffe 5000</option>\n' +
                    '                                <option>coiffe 2000</option>\n' +
                    '                                <option>coiffe 1000</option>\n' +
                    '                                <option>coiffe 500</option>\n' +
                    '                                <option>sac jute grand</option>\n' +
                    '                                <option>sac jute moyen</option>\n' +
                    '                                <option>TAG bleu</option>\n' +
                    '                                <option>TAG vert</option>\n' +
                    '                                <option>TAG jaune</option>\n' +
                    '                            </select></td>\n' +
                    '                        <td><input type="number" min="0" class="form-control" name="qte_sortie[]" /></td>\n' +
                    '                        <td><input type="text" class="form-control" name="debut[]"/></td>\n' +
                    '                        <td><input type="text" class="form-control" name="fin[]"/></td>\n' +
                    '                        <td><input type="text" class="form-control" name="reference[]"/></td>\n' +
                    '                        <td><a class="btn btn-danger btn-sm" onclick="supprimer(this)"></a></td>\n' +
                    '                    </tr>');
            });
        })
    </script>
    <script>
        $(document).on('DOMNodeInserted', function () {
            $("input[name='qte_sortie[]']").on("change", changeQte);

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
