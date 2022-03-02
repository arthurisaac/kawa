@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Mofification Facturation"])
    <div class="burval-container">
        <h2>Facturation</h2>
        <a href="/regulation-facturation-liste" class="btn btn-link btn-sm">Liste</a>
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
        <form class="form-horizontal"  action="{{ route('regulation-facturation.update', $regulation->id) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="card card-xxl-stretch">
                <div class="card-body bg-card-kawa pt-5">
                    <div class="row">
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
                                    id="centre" name="centre">
                                    <option>{{$regulation->centre}}</option>
                                    @foreach ($centres as $centre)
                                        <option value="{{$centre->centre}}">Centre
                                            de {{ $centre->centre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                                    <option>{{$regulation->centre_regional}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="date_appro" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date</label>
                                <input type="date" id="date_appro" name="date_appro" value="{{$regulation->date}}" class="form-control col editbox" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="numero" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Numero</label>
                                <input type="text" id="numero" name="numero"  value="{{$regulation->numero}}" class="form-control col editbox" >
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="client" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Clients</label>
                                <select class="form-select form-select-solid select2-hidden-accessible"
                                        data-control="select2"
                                        data-placeholder="client"
                                        data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                        data-kt-select2="true"
                                        aria-hidden="true"
                                        name="client" id="client">
                                    <option value="{{$regulation->client}}">{{$regulation->clients->client_nom ?? ""}}</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->client_nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="type " class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Type de facture</label>
                                <select
                                    class="form-select form-select-solid select2-hidden-accessible"
                                    data-control="select2"
                                    data-placeholder="Type facture"
                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                    data-kt-select2="true"
                                    aria-hidden="true"
                                    id="type " name="type ">
                                    <option>{{$regulation->type}}</option>
                                    <option>Facture</option>
                                    <option>Proforma</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                <label for="site " class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Site</label>
                                <select
                                    class="form-select form-select-solid select2-hidden-accessible"
                                    data-control="select2"
                                    data-placeholder="Site"
                                    data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                    data-kt-select2="true"
                                    aria-hidden="true"
                                    id="site " name="site ">
                                    <option value="{{$regulation->site}}">{{$regulation->sites->site ?? ""}}</option>
                                    @foreach($sites as $site)
                                        <option value="{{$site->id}}">{{$site->site}}</option>
                                    @endforeach
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
                            <th>Libellé</th>
                            <th>Qté</th>
                            <th>Pu</th>
                            <th>Référence</th>
                            <th>N° début</th>
                            <th>N° fin</th>
                            <th>Montant</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                            <td><select type="text" class="form-control" name="libelle[]">
                                    <option>{{$item->libelle}}</option>
                                    <option>Securipack grand</option>
                                    <option>Securipack moyen</option>
                                    <option>Securipack petit</option>
                                    <option>Sacs jutes grand</option>
                                    <option>Sacs jutes moyen</option>
                                    <option>Sacs jutes petit</option>
                                    <option>Scellé</option>
                                </select></td>
                                <td><input type="number" min="0" class="form-control" name="qte[]" value="{{$item->qte}}"/></td>
                                <td><input type="number" min="0" class="form-control" name="pu[]" value="{{$item->pu}}"/></td>
                                <td><input type="text" class="form-control" name="reference[]" value="{{$item->reference}}"/></td>
                                <td><input type="text" class="form-control" name="debut[]" value="{{$item->debut}}"/></td>
                                <td><input type="text" class="form-control" name="fin[]" value="{{$item->fin}}"/></td>
                                <td><input type="number" min="0" class="form-control" name="montant[]" value="{{$item->qte * $item->pu}}"/></td>
                                <td><a class="btn btn-danger btn-sm" onclick="supprimerItem('{{$item->id}}', this)"></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">Total</td>
                                <td><input type="number" class="form-control" name="montantTotal" id="montantTotal"/></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                    <br>
                </div>
            </div>
        </form>


{{--        <form method="post" action="{{ route('regulation-facturation.update', $regulation->id) }}">--}}
{{--            @method('PATCH')--}}
{{--            @csrf--}}


{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="centre" class="col-4">Centre Régional</label>--}}
{{--                        <select name="centre" id="centre" class="form-control col-8" required>--}}
{{--                            <option>{{$regulation->centre}}</option>--}}
{{--                            @foreach ($centres as $centre)--}}
{{--                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="centre_regional" class="col-4">Centre</label>--}}
{{--                        <select id="centre_regional" name="centre_regional" class="form-control col-8" required>--}}
{{--                            <option>{{$regulation->centre_regional}}</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col"></div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="date" class="col-4">Date</label>--}}
{{--                        <input type="date" id="date" name="date" value="{{$regulation->date}}"--}}
{{--                               class="form-control col-8" required/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="centre" class="col-4">Numero</label>--}}
{{--                        <input type="text" name="numero" id="numero" value="{{$regulation->numero}}" class="form-control col-8  "--}}
{{--                               required/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col"></div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="client" class="col-4">Client</label>--}}
{{--                        <select id="client" name="client" class="form-control col-8" required>--}}
{{--                            <option value="{{$regulation->client}}">{{$regulation->clients->client_nom ?? ""}}</option>--}}
{{--                            @foreach($clients as $client)--}}
{{--                                <option value="{{$client->id}}">{{$client->client_nom}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="type" class="col-4">Type facture</label>--}}
{{--                        <select id="type" name="type" class="form-control col-8" required>--}}
{{--                            <option>{{$regulation->type}}</option>--}}
{{--                            <option>Facture</option>--}}
{{--                            <option>Proforma</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col"></div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="centre_regional" class="col-4">Site</label>--}}
{{--                        <select id="site" name="site" class="form-control col-8" required>--}}
{{--                            <option value="{{$regulation->site}}">{{$regulation->sites->site ?? ""}}</option>--}}
{{--                            @foreach($sites as $site)--}}
{{--                                <option value="{{$site->id}}">{{$site->site}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col"></div>--}}
{{--                <div class="col"></div>--}}
{{--            </div>--}}
{{--            <br/>--}}

{{--            <button type="button" class="btn btn-sm btn-primary" id="add">+</button>--}}
{{--            <br>--}}
{{--            <br>--}}
{{--            <table class="table table-bordered" style="width: 100%" id="table">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>Libellé</th>--}}
{{--                    <th>Qté</th>--}}
{{--                    <th>Pu</th>--}}
{{--                    <th>Référence</th>--}}
{{--                    <th>N° début</th>--}}
{{--                    <th>N° fin</th>--}}
{{--                    <th>Montant</th>--}}
{{--                    <th></th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($items as $item)--}}
{{--                    <input type="hidden" name="ids[]" value="{{$item->id}}">--}}
{{--                    <tr>--}}
{{--                        <td><select type="text" class="form-control" name="libelle[]">--}}
{{--                                <option>{{$item->libelle}}</option>--}}
{{--                                <option>Securipack grand</option>--}}
{{--                                <option>Securipack moyen</option>--}}
{{--                                <option>Securipack petit</option>--}}
{{--                                <option>Sacs jutes grand</option>--}}
{{--                                <option>Sacs jutes moyen</option>--}}
{{--                                <option>Sacs jutes petit</option>--}}
{{--                                <option>Scellé</option>--}}
{{--                            </select></td>--}}
{{--                        <td><input type="number" min="0" class="form-control" name="qte[]" value="{{$item->qte}}"/></td>--}}
{{--                        <td><input type="number" min="0" class="form-control" name="pu[]" value="{{$item->pu}}"/></td>--}}
{{--                        <td><input type="text" class="form-control" name="reference[]" value="{{$item->reference}}"/></td>--}}
{{--                        <td><input type="text" class="form-control" name="debut[]" value="{{$item->debut}}"/></td>--}}
{{--                        <td><input type="text" class="form-control" name="fin[]" value="{{$item->fin}}"/></td>--}}
{{--                        <td><input type="number" min="0" class="form-control" name="montant[]" value="{{$item->qte * $item->pu}}"/></td>--}}
{{--                        <td><a class="btn btn-danger btn-sm" onclick="supprimerItem('{{$item->id}}', this)"></a></td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--                <tfoot>--}}
{{--                <tr>--}}
{{--                    <td colspan="6">Total</td>--}}
{{--                    <td><input type="number" class="form-control" name="montantTotal" id="montantTotal"/></td>--}}
{{--                </tr>--}}
{{--                </tfoot>--}}
{{--            </table>--}}

{{--            <br>--}}
{{--            <button type="submit" class="btn btn-primary">Enregistrer</button>--}}
{{--        </form>--}}


    </div>
    <script>
        $(document).ready(function () {
            $("#add").on("click", function () {
                $('#table').append('<tr>\n' +
                    '                    <input type="hidden" name="ids[]">\n' +
                    '                    <td><select type="text" class="form-control" name="libelle[]">\n' +
                    '                            <option>Securipack grand</option>\n' +
                    '                            <option>Securipack moyen</option>\n' +
                    '                            <option>Securipack petit</option>\n' +
                    '                            <option>Sacs jutes grand</option>\n' +
                    '                            <option>Sacs jutes moyen</option>\n' +
                    '                            <option>Sacs jutes petit</option>\n' +
                    '                            <option>Scellé</option>\n' +
                    '                        </select></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="qte[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="pu[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="reference[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="debut[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="fin[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="montant[]"/></td>\n' +
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
        function totalMontant() {
            let total = 0;

            $.each($("input[name='montant[]']"), function (i) {
                const montant = $("input[name='montant[]'").get(i).value;
                total += parseFloat(montant) ?? 0;
            });
            $("#montantTotal").val(total);
        }
        function changePU() {
            $.each($("input[name='pu[]']"), function (i) {
                const qte = $("input[name='qte[]'").get(i).value;
                const pu = $("input[name='pu[]'").get(i).value;
                const total = (parseFloat(pu) ?? 0) * (parseFloat(qte) ?? 0);
                $("input[name='montant[]'").eq(i).val(total);
            });
            totalMontant();
        }
        function changeQte() {
            $.each($("input[name='pu[]']"), function (i) {
                const qte = $("input[name='qte[]'").get(i).value;
                const pu = $("input[name='pu[]'").get(i).value;
                if (pu && qte) {
                    const total = (parseFloat(pu) ?? 0) * (parseFloat(qte) ?? 0);
                    $("input[name='montant[]'").eq(i).val(total);
                    totalMontant();
                }
            });
        }
        function supprimerItem(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "/regulation-facturation-item/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function () {
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("table").deleteRow(indexLigne);
                        totalMontant();
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
            totalMontant();
        }
        $(document).ready(function () {
            totalMontant();
        });
        $(document).on('DOMNodeInserted', function () {
            $("input[name='pu[]']").on("change", changePU);
            $("input[name='qte[]']").on("change", changeQte);
        });
    </script>

@endsection
