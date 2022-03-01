@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Régulation", "subTitle" => "Sortie stock"])
    @section('nouveau')
        <a href="/regulation-stock-sortie-liste" class="btn btn-info">Liste sortie stock</a>
    @endsection
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
                <form class="form-horizontal"  action="{{ route('regulation-stock-sortie.store') }}" method="post">
                    @csrf
                    <div class="card card-xxl-stretch">
                        <div class="card-body bg-card-kawa pt-5">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="date" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date sortie</label>
                                        <input type="date" id="date" name="date" value="{{date('Y-m-d')}}" class="form-control col editbox" >
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
                                            <option></option>
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
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="service" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Service</label>
                                        <select class="form-select form-select-solid select2-hidden-accessible"
                                                data-control="select2"
                                                data-placeholder="Service"
                                                data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true"
                                                name="service" id="service">
                                            <option></option>
                                            <option>Informatique</option>
                                            <option>Sécurité</option>
                                            <option>Caisse</option>
                                            <option>DAB</option>
                                            <option>Comptabilite</option>
                                            <option>Regulation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="receveur" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Receveur</label>
                                        <input type="text" id="receveur" name="receveur"  class="form-control col editbox" >
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
                                    <th>Libellé</th>
                                    <th>Qté sortie</th>
                                    <th>N° début</th>
                                    <th>N° Fin</th>
                                    <th>Référence</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <input type="hidden" name="item_ids[]" />
                                        <td><input type="date" class="form-control" name="date_item[]"/></td>
                                        <td><select id="libelle" name="libelle[]" class="form-control" required>
                                                <option></option>
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
                                        <td><input type="number" min="0" class="form-control" name="qte_sortie[]"/></td>
                                        <td><input type="text" class="form-control" name="debut[]"/></td>
                                        <td><input type="text" class="form-control" name="fin[]"/></td>
                                        <td><input type="text" class="form-control" name="reference[]"/></td>
                                        <td><a class="btn btn-danger btn-sm" onclick="supprimer(this)"></a></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2" style="font-weight: bold; text-transform: uppercase;"> Total</td>
                                    <td><input type="number" class="form-control" name="totalSortie"  id="totalSortie"/> </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <br>
                        </div>
                    </div>
                </form>
        </div>
    <script>
        function supprimer(e) {
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("table").deleteRow(indexLigne);
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
                    '                    <td><input type="date" class="form-control" name="date[]"/></td>\n' +
                    '                    <td><select id="libelle" name="libelle[]" class="form-control" required>\n' +
                    '                            <option>bordereau de transport</option>\n' +
                    '                            <option>bordereau de collecte</option>\n' +
                    '                            <option>cahier de maintenance</option>\n' +
                    '                            <option>cahier d’appro</option>\n' +
                    '                            <option>securipack extra</option>\n' +
                    '                            <option>securipack grand</option>\n' +
                    '                            <option>securipack moyen</option>\n' +
                    '                            <option>securipack petit</option>\n' +
                    '                            <option>pochette</option>\n' +
                    '                            <option>scellé DAB</option>\n' +
                    '                            <option>scellé caisse</option>\n' +
                    '                            <option>coiffe 10000</option>\n' +
                    '                            <option>coiffe 5000</option>\n' +
                    '                            <option>coiffe 2000</option>\n' +
                    '                            <option>coiffe 1000</option>\n' +
                    '                            <option>coiffe 500</option>\n' +
                    '                            <option>sac jute grand</option>\n' +
                    '                            <option>sac jute moyen</option>\n' +
                    '                            <option>TAG bleu</option>\n' +
                    '                            <option>TAG vert</option>\n' +
                    '                            <option>TAG jaune</option>\n' +
                    '                        </select></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="qte_sortie[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="debut[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="fin[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="reference[]"/></td>\n' +
                    '                    <td><a class="btn btn-danger btn-sm" onclick="supprimer(this)"></a></td>\n' +
                    '                </tr>');
            });
        })
    </script>
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
