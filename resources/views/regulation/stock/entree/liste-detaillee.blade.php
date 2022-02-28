@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Entrée stock"])
    <div class="burval-container">
        @php
            $totalQte = 0;
            foreach ($stocks as $stock) {
                $totalQte += $stock->items->sum("qte_livree");
            }
        @endphp
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

        <div class="row gy-5 g-xxl-8">
            <div class="col-xxl-3">
                <!--begin::List Widget 2-->
                <div class="card card-xl-stretch mb-xxl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%);">
                        <h3 class="card-title fw-bolder text-dark">Stats</h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body bg-card-kawa 2">
                        <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-warning me-5">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                              fill="black"></path>
                                        <path
                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Quantité en stock :</a>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="fw-bolder text-danger py-1 quantiteStock" id="quantiteStock">{{$totalQte}}</span>
                            <!--end::Lable-->
                        </div>
{{--                        <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">--}}
{{--                            <!--begin::Icon-->--}}
{{--                            <span class="svg-icon svg-icon-info me-5">--}}
{{--                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--                                <span class="svg-icon svg-icon-1">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                                    <path opacity="0.3"--}}
{{--                                          d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                          fill="black"></path>--}}
{{--                                    <path--}}
{{--                                        d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                        fill="black"></path>--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                                <!--end::Svg Icon-->--}}
{{--                        </span>--}}
{{--                            <!--end::Icon-->--}}
{{--                            <!--begin::Title-->--}}
{{--                            <div class="flex-grow-1 me-2">--}}
{{--                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total valeur Colis :</a>--}}
{{--                                <span class="text-muted fw-bold d-block"></span>--}}
{{--                            </div>--}}
{{--                            <!--end::Title-->--}}
{{--                            <!--begin::Lable-->--}}
{{--                            <span class="fw-bolder text-danger py-1">{{$colisArrivees->sum("regulation_arrivee_valeur_colis")}}</span>--}}
{{--                            <!--end::Lable-->--}}
{{--                        </div>--}}
{{--                        <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">--}}
{{--                            <!--begin::Icon-->--}}
{{--                            <span class="svg-icon svg-icon-info me-5">--}}
{{--                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--                                    <span class="svg-icon svg-icon-1">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                             height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                                        <path opacity="0.3"--}}
{{--                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                                              fill="black"></path>--}}
{{--                                        <path--}}
{{--                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                                            fill="black"></path>--}}
{{--                                    </svg>--}}
{{--                                </span>--}}
{{--                                <!--end::Svg Icon-->--}}
{{--                            </span>--}}
{{--                            <!--end::Icon-->--}}
{{--                            <!--begin::Title-->--}}
{{--                            <div class="flex-grow-1 me-2">--}}
{{--                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Nombre de colis :</a>--}}
{{--                                <span class="text-muted fw-bold d-block"></span>--}}
{{--                            </div>--}}
{{--                            <!--end::Title-->--}}
{{--                            <!--begin::Lable-->--}}
{{--                            <span class="fw-bolder text-danger py-1">{{$colisArrivees->sum("nbre_colis_arrivee")}}</span>--}}
{{--                            <!--end::Lable-->--}}
{{--                        </div>--}}
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 2-->
            </div>
            <div class="col-xxl-9">
                <form action="#" method="get">

                    <div class="card card-xl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Option de filtre</h3>
                        </div>
                        <div class="card-body bg-card-kawa 5">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="centre" class="col-5">Centre Régional</label>
                                        <select name="centre" id="centre" class="form-control col">
                                            <option>{{$centre}}</option>
                                            @foreach ($centres as $centre)
                                                <option value="{{$centre->centre}}">{{ $centre->centre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="centre_regional" class="col-5">Centre</label>
                                        <select id="centre_regional" name="centre_regional" class="form-control col">
                                            <option>{{$centre_regional}}</option>
                                            @foreach ($centres_regionaux as $centre)
                                                <option value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="fournisseur" class="col-5">Fournisseur</label>
                                        <select id="fournisseur" name="fournisseur" class="form-control col">
                                            <option>{{$fournisseur}}</option>
                                            <option>VECTIS</option>
                                            <option>SOSIV</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="libelle" class="col-5">Libelle</label>
                                        <select class="form-control col" name="libelle" id="libelle">
                                            <option>{{$libelle}}</option>
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
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="" class="col-5">Date début</label>
                                        <input type="date" name="debut" class="form-control col" value="{{$debut}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="" class="col-5">Date fin</label>
                                        <input type="date" name="fin" class="form-control col" value="{{$fin}}">
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>

                            </div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col text-right"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/regulation-stock-entree-liste-detaillee" class="btn btn-info btn-sm">Effacer</a>
                            <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            <a href="/regulation-stock-entree" class="btn btn-sm btn-primary">Nouveau</a>
                        </div>
                    </div>
                    @csrf

                </form>
            </div>
        </div>
        <br>
{{--        <form action="#" method="get">--}}
{{--            @csrf--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="centre" class="col-5">Centre Régional</label>--}}
{{--                        <select name="centre" id="centre" class="form-control col">--}}
{{--                            <option>{{$centre}}</option>--}}
{{--                            @foreach ($centres as $centre)--}}
{{--                                <option value="{{$centre->centre}}">{{ $centre->centre }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="centre_regional" class="col-5">Centre</label>--}}
{{--                        <select id="centre_regional" name="centre_regional" class="form-control col">--}}
{{--                            <option>{{$centre_regional}}</option>--}}
{{--                            @foreach ($centres_regionaux as $centre)--}}
{{--                                <option value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="fournisseur" class="col-5">Fournisseur</label>--}}
{{--                        <select id="fournisseur" name="fournisseur" class="form-control col">--}}
{{--                            <option>{{$fournisseur}}</option>--}}
{{--                            <option>VECTIS</option>--}}
{{--                            <option>SOSIV</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col"></div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="" class="col-5">Date début</label>--}}
{{--                        <input type="date" name="debut" class="form-control col-7" value="{{$debut}}">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="" class="col-5">Date fin</label>--}}
{{--                        <input type="date" name="fin" class="form-control col-sm-7" value="{{$fin}}">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="libelle" class="col-5">Libelle</label>--}}
{{--                        <select class="form-control col" name="libelle" id="libelle">--}}
{{--                            <option>{{$libelle}}</option>--}}
{{--                            <option>bordereau de transport</option>--}}
{{--                            <option>bordereau de collecte</option>--}}
{{--                            <option>cahier de maintenance</option>--}}
{{--                            <option>cahier d’appro</option>--}}
{{--                            <option>securipack extra</option>--}}
{{--                            <option>securipack grand</option>--}}
{{--                            <option>securipack moyen</option>--}}
{{--                            <option>securipack petit</option>--}}
{{--                            <option>pochette</option>--}}
{{--                            <option>scellé DAB</option>--}}
{{--                            <option>scellé caisse</option>--}}
{{--                            <option>coiffe 10000</option>--}}
{{--                            <option>coiffe 5000</option>--}}
{{--                            <option>coiffe 2000</option>--}}
{{--                            <option>coiffe 1000</option>--}}
{{--                            <option>coiffe 500</option>--}}
{{--                            <option>sac jute grand</option>--}}
{{--                            <option>sac jute moyen</option>--}}
{{--                            <option>TAG bleu</option>--}}
{{--                            <option>TAG vert</option>--}}
{{--                            <option>TAG jaune</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col"></div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col"></div>--}}
{{--                <div class="col"></div>--}}
{{--                <div class="col"></div>--}}
{{--                <div class="col text-right">--}}
{{--                    <a href="/regulation-stock-entree-liste-detaillee" class="btn btn-info btn-sm">Effacer</a> <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
        <br>
        <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="liste">
            <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                <th>ID</th>
                <th>Date</th>
                <th>Centre</th>
                <th>Centre regional</th>
                <th>Libelle</th>
                <th>Fournisseur</th>
                <th>Quantité en stock</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$stock->date}}</td>
                    <td>{{$stock->centre}}</td>
                    <td>{{$stock->centre_regional}}</td>
                    <td>{{$stock->libelle}}</td>
                    <td>{{$stock->fournisseur}}</td>
                    <td>{{$stock->items->sum('qte_livree')}}</td>
                    <td>
                        <a href="regulation-stock-entree/{{$stock->id}}/edit" class="btn btn-primary btn-sm"></a>
                        <a class="btn btn-danger btn-sm" onclick="supprimer('{{$stock->id}}', this)"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "regulation-stock-entree/" + id,
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
                        document.getElementById("liste").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
