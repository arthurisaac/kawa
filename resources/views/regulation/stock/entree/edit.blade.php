@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Régulation", "subTitle" => "Entrée stock modification"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
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
            <form class="form-horizontal"  action="{{ route('regulation-stock-entree.update', $stock->id) }}" method="post">
            @csrf
            @method("PATCH")
            <div class="card card-xxl-stretch">
                <div class="card-body bg-card-kawa pt-5">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="date_appro" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date</label>
                                <input type="date" id="date_appro" name="date_appro" value="{{$stock->date}}" class="form-control col editbox" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="numero" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Numero</label>
                                <input type="text" id="numero" name="numero" value="{{$stock->numero}}" class="form-control col editbox" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre régional</label>
                                <select
                                    class="form-select form-select-solid select2-hidden-accessible"
                                    data-control="select2"
                                    data-placeholder="Centre régional"
                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                    data-kt-select2="true"
                                    aria-hidden="true"
                                    id="centre" name="centre" >
                                    <option>{{$stock->centre}}</option>
                                    @foreach ($centres as $centre)
                                        <option value="{{$centre->centre}}">Centre
                                            de {{ $centre->centre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre</label>
                                <select id="centre_regional" name="centre_regional"
                                        class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Centre"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        required>
                                    <option>{{$stock->centre_regional}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="site" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Site</label>
                                <select class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Site"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        name="site" id="site">
                                        @foreach($sites as $site)
                                            <option>{{$site->site}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="libelle" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Libellé</label>
                                <select class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="Libellé"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        name="libelle" id="libelle">
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
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="fournisseur" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fournisseur</label>
                                <select
                                    class="form-select form-select-solid select2-hidden-accessible"
                                    data-control="select2"
                                    data-placeholder="Fournisseur"
                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                    data-kt-select2="true"
                                    aria-hidden="true"
                                    id="fournisseur" name="fournisseur">
                                    <option>{{$stock->fournisseur}}</option>
                                    <option>VECTIS</option>
                                    <option>SOSIV</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card card-xl-stretch">
                <div class="card-body bg-card-kawa">
                    <button type="button" class="btn btn-sm btn-primary" id="add">+</button>
                    <table id="table" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                           style="width: 100%;">
                        <thead>

                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient">
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
                                    <td><input type="date" class="form-control"  value="{{$item->date}}" name="date[]"/></td>
                                    <td><input type="number" min="0" class="form-control" value="{{$item->qte_attendu}}" name="qte_attendu[]"/></td>
                                    <td><input type="number" min="0" class="form-control" value="{{$item->qte_livree}}" name="qte_livree[]"/></td>
                                    <td><input type="text" class="form-control" value="{{$item->debut}}" name="no_debut[]"/></td>
                                    <td><input type="text" class="form-control" value="{{$item->fin}}" name="no_fin[]"/></td>
                                    <td><input type="number" min="0" class="form-control" value="{{$item->reste}}" name="reste[]"/></td>
                                    <td><a class="btn btn-danger btn-sm" onclick="supprimer(this)"></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td><input type="text" class="form-control" name="totalLivree" id="totalLivree"/></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                    <a href="/regulation-stock-entree-liste-detaillee" class="btn btn-outline-info">Liste entrée stock detaillée</a>
                    <br>
                </div>
            </div>
        </form>
        </div>
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
