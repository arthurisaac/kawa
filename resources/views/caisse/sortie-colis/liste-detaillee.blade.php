@extends('bases.caisse')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/burval.css') }}">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Caisse Centrale
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">Liste caisse sortie colis detaillées</small>
                    <!--end::Description--></h1>
                <!--end::Title-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            {{--<div class="titre"><span class="titre">Chiffre d'affaire</span> : <span id="chiffreAffaire"
                                                                                    class="text-danger chiffreAffaire"></span>
                <span
                    style="margin-left: 10px;">Nombre de passage : <span
                        class="text-danger">{{count($sites)}}</span></span>
            </div>--}}
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
        <br>
            <div class="row gy-5 g-xxl-8">
                <div class="col-xxl-3">
                    <!--begin::List Widget 2-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bolder text-dark">Résultats</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2">
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">TOTAL COLIS</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1 chiffreAffaire" id="chiffreAffaire">{{$colis->sum("nbre_colis")}}</span>
                                <!--end::Lable-->
                            </div>
                            <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">
                                <!--begin::Icon-->
                                <span class="svg-icon svg-icon-info me-5">
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">TOTAL VALEUR COLIS</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1">{{$colis->sum("valeur")}}</span>
                                <!--end::Lable-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 2-->
                </div>
                <div class="col-xxl-9">
                    <form action="#" method="get">

                        <div class="card card-xl-stretch">
                            <div class="card-header border-0 bg-warning py-5"  style="background-color: #FFD801;">
                                <h3 class="card-title fw-bolder text-white">Option de filtre</h3>
                            </div>
                            <div class="card-body  pt-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Centre Régional</label>
                                            <select name="centre" id="centre"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Centre Régional"
                                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option>{{$centre}}</option>
                                                @foreach ($centres as $centre)
                                                    <option value="{{$centre->centre}}">{{ $centre->centre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="centre_regional" class="col-5">Centre</label>
                                            <select id="centre_regional" name="centre_regional"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Centre"
                                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option>{{$centre_regional}}</option>
                                                @foreach ($centres_regionaux as $centre)
                                                    <option value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="client" class="col-5">Clients</label>
                                            <select id="client" name="client"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Clients"
                                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option></option>
                                                @foreach ($clients_com as $client)
                                                    <option value="{{$client->id}}">{{ $client->client_nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="site" class="col-5">Site</label>
                                            <select id="site" name="site"
                                                    class="form-select form-select-solid select2-hidden-accessible"
                                                    data-control="select2"
                                                    data-placeholder="Site"
                                                    data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                                    data-kt-select2="true"
                                                    aria-hidden="true">
                                                <option>{{$site}}</option>
                                                @foreach ($sites_com as $site)
                                                    <option value="{{$site->id}}">{{ $site->site }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date début</label>
                                            <input type="date" name="debut"
                                                   class="col-sm-6 form-control" value="{{$debut}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date fin</label>
                                            <input type="date" name="fin" class="col-sm-6 form-control" value="{{$fin}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="receveur" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Receveur</label>
                                            <input type="text" id="receveur" name="receveur" class="col-sm-6 form-control" value="{{$receveur}}" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="scelle" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Numéro scellé</label>
                                            <input type="text" id="scelle" name="scelle" class="col-sm-6 form-control" value="{{$scelle}}" />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">

                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col text-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="/caisse-sortie-colis-liste-detaillee" class="btn btn-info btn-sm">Effacer</a>
                                <button class="btn btn-dark btn-sm" type="submit">Rechercher</button>
                                <a href="/caisse-sortie-colis" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"
                                   id="kt_toolbar_primary_button">Nouveau</a>
                            </div>
                        </div>
                        @csrf

                    </form>
                </div>
            </div>

            <br>
        <br>
        <br/>
        <div class="row">
            <div class="col">
                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%;" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                            <th>No</th>
                            <th>Date</th>
                            <th>Site</th>
                            <th>Client</th>
                            <th>Nbre colis</th>
                            <th>Receveur</th>
                            <th>Scelle</th>
                            <th>Valeur colis</th>
                            <th>No Tournee</th>
                            <th>Equipage</th>
                            <td style="width: 50px;">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($colis as $coli)
                        <tr>
                            <td>{{$coli->id}}</td>
                            <td>{{$coli->caisses->tournees->date ?? ""}}</td>
                            <td>{{$coli->sites->site ?? ""}}</td>
                            <td>{{$coli->sites->clients->client_nom ?? ""}}</td>
                            <td>{{$coli->nbre_colis}}</td>
                            <td>{{$coli->caisses->receveur}}</td>
                            <td>{{$coli->scelle}}</td>
                            <td>{{$coli->valeur}}</td>
                            <td>{{$coli->caisses->tournees->numeroTournee ?? ""}}</td>
                            <td>{{$coli->caisses->tournees->chefDeBords->nomPrenoms ?? ""}} //
                                {{$coli->caisses->tournees->agentDeGardes->nomPrenoms ?? ""}} //
                                {{$coli->caisses->tournees->chauffeurs->nomPrenoms ?? ""}} //</td>
                            <td>
                                <a href="{{ route('caisse-sortie-colis.edit',$coli->caisses->id ?? 0)}}" class="btn btn-primary btn-sm"></a>
                                <a class="btn btn-danger btn-sm" onclick="supprimer('{{$coli->caisses->id}}', this)"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        let sites = {!! json_encode($sites_com) !!};
        let clients = {!! json_encode($clients_com) !!};
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [[ 0, "desc" ]]
            });

            const siteInput = $("#site");
            if (siteInput.val()) {
                const site = sites.find(s => s.id === parseInt(siteInput.val() ?? 0));
                if (site) $("select[name='site'] option[value="+ site?.id +"]").attr('selected','selected');
            }
            const clientInput = $("#client");
            if (clientInput.val()) {
                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
                if (client) $("select[name='client'] option[value="+ client?.id +"]").attr('selected','selected');
            }
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "caisse-sortie-colis/" + id,
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
@endsection
