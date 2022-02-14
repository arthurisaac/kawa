@extends('bases.regulation')

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
                               class="form-control col-8" required/>
                    </div>
                    <div class="form-group row">
                        <label for="site" class="col-4">Site</label>
                        <select id="site" name="site" class="form-control col-8" required>
                            @foreach($sites as $site)
                                <option>{{$site->site}}</option>
                            @endforeach
                        </select>
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
                    <th>Date</th>
                    <th>Qté attendue</th>
                    <th>Qté livrée</th>
                    <th>N° début</th>
                    <th>N° Fin</th>
                    <th>Reste</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <input type="hidden" value="{{$item->id}}" name="item_ids[]">
                        <td><input type="date" class="form-control" name="date[]" value="{{$item->date}}"/></td>
                        <td><input type="number" min="0" class="form-control" name="qte_attendu[]" value="{{$item->qte_attendu}}"/></td>
                        <td><input type="number" min="0" class="form-control" name="qte_livree[]" value="{{$item->qte_livree}}"/></td>
                        <td><input type="text" class="form-control" name="no_debut[]" value="{{$item->debut}}"/></td>
                        <td><input type="text" class="form-control" name="no_fin[]" value="{{$item->fin}}"/></td>
                        <td><input type="number" min="0" class="form-control" name="reste[]" value="{{$item->reste}}"/></td>
                        <td><a class="btn btn-danger btn-sm" onclick="supprimerItem('{{$item->id}}', this)"></a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control" name="totalLivree" id="totalLivree"/></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tfoot>
            </table>

            <br>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="/regulation-stock-entree-liste-detaillee" class="btn btn-outline-info">Liste entrée stock detaillée</a>
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
            qteLivree2();
            $("#add").on("click", function () {
                $('#table').append('<tr>\n' +
                    '                    <input type="hidden" name="item_ids[]">\n' +
                    '                    <td><input type="date" class="form-control" name="date[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="qte_attendu[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="qte_livree[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="no_debut[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="no_fin[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="reste[]"/></td>\n' +
                    '                    <td><a class="btn btn-danger btn-sm" onclick="supprimer(this)"></a></td>\n' +
                    '                </tr>');
            });
        })
    </script>
    <script>
        function supprimerItem(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "/regulation-stock-entree-item/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("table").deleteRow(indexLigne);
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
            qteLivreeReste();
            qteLivree2();
        }
        function qteLivreeReste() {

            $.each($("input[name='qte_livree[]']"), function (i) {
                const qte_livree = $("input[name='qte_livree[]'").get(i).value;
                const qte_attendu = $("input[name='qte_attendu[]'").get(i).value;
                const reste = parseFloat(qte_attendu ?? 0) - parseFloat(qte_livree ?? 0);
                $("input[name='reste[]'").eq(i).val(reste);
            });
        }
        function qteLivree2() {
            let totalQteAttendu = 0;
            $.each($("input[name='qte_livree[]']"), function (i) {
                const nbre = $("input[name='qte_livree[]'").get(i).value;
                totalQteAttendu += parseFloat(nbre) ?? 0;
            });
            $("#totalLivree").val(totalQteAttendu);
        }
    </script>
    <script>
        $(document).on('DOMNodeInserted', function () {
            $("input[name='qte_livree[]']").on("change", qteLivreeReste);

            $("input[name='qte_livree[]']").on("change", qteLivree2);
        });
    </script>
@endsection
