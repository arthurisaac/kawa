@extends('bases.informatique')

@section('main')
    @extends('bases.toolbar', ["title" => "Informatique", "subTitle" => "Liste Achat matériel"])
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
        <div class="row gy-5 g-xxl-8">
                <div class="col-xxl-3">
                    <div class="card card-xl-stretch mb-xxl-8">
                        <div class="card-header border-0" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%);">
                            <h3 class="card-title fw-bolder text-dark">Résultats</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body bg-card-kawa pt-2">
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">TOTAL QUANTITE</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1 totalVb" id="totalVb">{{$achats->sum('quantite')}}</span>
                                <!--end::Lable-->
                            </div>

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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">TOTAL MONTANT</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1 totalVl" id="totalVl">{{$achats->sum('montant')}}</span>
                                <!--end::Lable-->
                            </div>
                            {{--                            <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">--}}
                            {{--                                <!--begin::Icon-->--}}
                            {{--                                <span class="svg-icon svg-icon-info me-5">--}}
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
                            {{--                                    <!--end::Svg Icon-->--}}
                            {{--                            </span>--}}
                            {{--                                <!--end::Icon-->--}}
                            {{--                                <!--begin::Title-->--}}
                            {{--                                <div class="flex-grow-1 me-2">--}}
                            {{--                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total moto</a>--}}
                            {{--                                    <span class="text-muted fw-bold d-block"></span>--}}
                            {{--                                </div>--}}
                            {{--                                <!--end::Title-->--}}
                            {{--                                <!--begin::Lable-->--}}
                            {{--                                <span class="fw-bolder text-danger py-1">{{$motos}}</span>--}}
                            {{--                                <!--end::Lable-->--}}
                            {{--                            </div>--}}
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
                        <div class="card-body bg-card-kawa pt-5">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre Régional</label>
                                        <select name="centre_regional" id="centre_regional"
                                                class="form-select form-select-solid select2-hidden-accessible combobox"
                                                data-control="select2"
                                                data-placeholder="Centre régional"
                                                data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true">
                                            <option></option>
                                            @foreach ($centres_regionaux as $centre)
                                                <option value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre</label>
                                        <select id="centre" name="centre"
                                                class="form-select form-select-solid select2-hidden-accessible combobox"
                                                data-control="select2"
                                                data-placeholder="Centre"
                                                data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true">
                                            <option></option>
                                            @foreach ($centres as $centre)
                                                <option value="{{$centre->centre}}">{{ $centre->centre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="categorie" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Catégorie</label>
                                        <select id="categorie" name="categorie"
                                                class="form-select form-select-solid select2-hidden-accessible combobox"
                                                data-control="select2"
                                                data-placeholder="Catégorie"
                                                data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true">
                                            <option>{{$categorie}}</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{$categorie->categorie}}">{{ $categorie->categorie }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="libelle" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Libellé</label>
                                        <select id="libelle" name="libelle"
                                                class="form-select form-select-solid select2-hidden-accessible combobox"
                                                data-control="select2"
                                                data-placeholder="Libellé"
                                                data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                data-kt-select2="true"
                                                aria-hidden="true">
                                            <option>{{$libelle}}</option>
                                            @foreach ($libelles as $libelle)
                                                <option value="{{$libelle->libelle}}">{{ $libelle->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/informatique-achat-materiel-liste" class="btn btn-info btn-sm">Effacer</a>
                            <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            <a href="/informatique-achat-materiel" class="btn btn-sm btn-primary">Nouveau</a>
                        </div>
                    </div>
                    @csrf

                </form>
            </div>
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
{{--                        <label for="categorie" class="col-5">Categorie</label>--}}
{{--                        <select id="categorie" name="categorie" class="form-control col">--}}
{{--                            <option>{{$categorie}}</option>--}}
{{--                            @foreach ($categories as $categorie)--}}
{{--                                <option value="{{$categorie->categorie}}">{{ $categorie->categorie }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="libelle" class="col-5">Libelle</label>--}}
{{--                        <select id="libelle" name="libelle" class="form-control col">--}}
{{--                            <option>{{$libelle}}</option>--}}
{{--                            @foreach ($libelles as $libelle)--}}
{{--                                <option value="{{$libelle->libelle}}">{{ $libelle->libelle }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col"></div>--}}
{{--                <div class="col"></div>--}}
{{--                <div class="col"></div>--}}
{{--                <div class="col text-right">--}}
{{--                    <a href="/informatique-achat-materiel-liste" class="btn btn-info btn-sm">Effacer</a>--}}
{{--                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
        <br/>
        <br>
            <div class="row">
                <div class="col">
                <table class="table table-bordered table-hover"  style="width: 100%" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <td>ID</td>
                        <td>Centre régional</td>
                        <td>Centre</td>
                        <td>Service</td>
                        <td>Fournisseur</td>
                        <td>Catégorie</td>
                        <td>Date achat</td>
                        <td>Référence</td>
                        <td>Libellé</td>
                        <td>Quantité</td>
                        <td>Prix unitaire</td>
                        <td>Montant</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($achats as $achat)
                        <tr>
                            <td>{{$achat->id}}</td>
                            <td>{{$achat->centre}}</td>
                            <td>{{$achat->centreRegional}}</td>
                            <td>{{$achat->service}}</td>
                            <td>{{$achat->fournisseurs->libelleFournisseur ?? ""}}</td>
                            <td>{{$achat->categorie}}</td>
                            <td>{{$achat->date_achat}}</td>
                            <td>{{$achat->reference}}</td>
                            <td>{{$achat->libelle}}</td>
                            <td>{{$achat->quantite}}</td>
                            <td>{{$achat->prixUnitaire}}</td>
                            <td>{{$achat->montant}}</td>
                            <td>
                                <a href="{{ route('informatique-achat-materiel.edit',$achat->id)}}"
                                   class="btn btn-primary btn-sm"></a>
                                <button class="btn btn-danger btn-sm"
                                        onclick="supprimer('{{$achat->id}}', this)"></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    </div>
        <script>
            let fournisseurs = {!! json_encode($fournisseurs) !!};
            $(document).ready(function () {
                $('#liste').DataTable({
                    "language": {
                        "url": "French.json"
                    }
                });

                const fournInput = $("#fournisseur");
                if (fournInput.val()) {
                    const fournisseur = fournisseurs.find(f => f.id === parseInt(fournInput.val() ?? 0));
                    if (fournisseur) $("select[name='fournisseur'] option[value="+ fournisseur?.id +"]").attr('selected','selected');
                }
            });
        </script>
        <script>
            function supprimer(id, e) {
                if (confirm("Confirmer la suppression?")) {
                    const token = "{{ csrf_token() }}";
                    $.ajax({
                        url: "/informatique-achat-materiel/" + id,
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
                        error: function (xhr) {
                            alert("Une erreur s'est produite");
                        }
                    }).done(function () {
                        // TODO hide loader
                    });


                }

            }
        </script>
@endsection
