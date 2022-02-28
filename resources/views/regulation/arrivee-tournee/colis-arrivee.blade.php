@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Colis arrivés tournée"])
@section("filter")
    <div class="me-4">
        <!--begin::Menu-->
        <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none">
                <path
                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                    fill="black"/>
                </svg>
            </span>
            <!--end::Svg Icon-->Filtrer
        </a>
        <!--begin::Menu 1-->
        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_61484bf44d957">
            <!--begin::Header-->
            <div class="px-7 py-5">
                <div class="fs-5 text-dark fw-bolder">Options de filtre</div>
            </div>
            <!--end::Header-->
            <!--begin::Menu separator-->
            <div class="separator border-gray-200"></div>
            <!--end::Menu separator-->
            <!--begin::Form-->
            <form action="#" method="GET">
                <div class="px-7 py-5">
                    <!--begin::Input group-->
                    <div class="mb-10">
                        <!--begin::Label-->
                        <label class="form-label fw-bold">Client:</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div>
                            <select id="client" class="form-select form-select-solid" data-kt-select2="true"
                                    data-placeholder="Selectionner un client"
                                    data-dropdown-parent="#kt_menu_61484bf44d957" data-allow-clear="true">
{{--                                <option>{{$client}}</option>--}}
{{--                                @foreach ($clients as $clt)--}}
{{--                                    <option value="{{$clt->id}}">{{ $clt->client_nom }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                        <!--end::Input-->
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Menu 1-->
        <!--end::Menu-->
    </div>
@endsection

    <style>
        .dataTables_filter, .dataTables_info {
            display: none;
        }
    </style>
    <div class="burval-container">
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
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total Site</a>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="fw-bolder text-danger py-1 totalSite" id="totalSite">{{count($colisArrivees)}}</span>
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
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total valeur Colis :</a>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="fw-bolder text-danger py-1">{{$colisArrivees->sum("regulation_arrivee_valeur_colis")}}</span>
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
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Nombre de colis :</a>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="fw-bolder text-danger py-1">{{$colisArrivees->sum("nbre_colis_arrivee")}}</span>
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
                                        <label for="client" class="col-5">Clients</label>
                                        <select id="client" name="client" class="form-control col">
                                            <option>{{$client}}</option>
                                            @foreach ($clients as $client)
                                                <option value="{{$client->id}}">{{ $client->client_nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="site" class="col-5">Site</label>
                                        <select id="site" name="site" class="form-control col">
                                            <option>{{$site}}</option>
                                            @foreach ($sites_com as $site)
                                                <option value="{{$site->id}}">{{ $site->site }}</option>
                                            @endforeach
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
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="nature" class="col-5">Nature</label>
                                        <select name="nature" id="nature" class="form-control col">
                                            <option>{{$nature}}</option>
                                            <option>retour de cession</option>
                                            <option>tri</option>
                                            <option>transite</option>
                                            <option>approvisionnement</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="devise" class="col-5">Devise</label>
                                        <select name="devise" id="devise" class="form-control col">
                                            <option>{{$devise}}</option>
                                            @foreach($devises as $device)
                                                <option>{{$devise}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col text-right"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/regulation-arrivee-colis" class="btn btn-info btn-sm">Effacer</a>
                            <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            <a href="#" class="btn btn-sm btn-primary">Nouveau</a>
                        </div>
                    </div>
                    @csrf

                </form>
            </div>
        </div>
        <br>
        <br>
    </div>
    <table class="table table-bordered table-hover" id="table" style="width: 100%">
        <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
            <th>N°</th>
            <th>Centre régional</th>
            <th>Centre</th>
            <th>Date</th>
            <th>Site</th>
            <th>Client</th>
            <th>Type</th>
            <th>Nature</th>
            <th>Valeur Colis</th>
            <th>Dévise</th>
            <th>N° Tournée</th>
            <th>Bordereau</th>
            <th>Nombre de colis</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($colisArrivees as $colis)
            <tr>
                <td>{{$colis->id}}</td>
                <td>{{$colis->tournees->centre_regional ?? ''}}</td>
                <td>{{$colis->tournees->centre ?? ''}}</td>
                <td>{{$colis->tournees->date ?? ''}}</td>
                <td>{{$colis->sites->site ?? ''}}</td>
                <td>{{$colis->sites->clients->client_nom ?? ''}}</td>
                <td>{{$colis->type ?? ''}}</td>
                <td>{{$colis->nature ?? ''}}</td>
                <td>{{$colis->regulation_arrivee_valeur_colis}}</td>
                <td>{{$colis->regulation_arrivee_devise}}</td>
                <td>{{$colis->tournees->numeroTournee ?? ''}}</td>
                <td>{{$colis->bordereau ?? ''}}</td>
                <td>{{$colis->nbre_colis_arrivee}}</td>
                <td><a href="{{ route('regulation-arrivee-tournee.edit',$colis->idTourneeDepart)}}"
                       class="btn btn-primary btn-sm"></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        let sites = {!! json_encode($sites_com) !!};
        let clients = {!! json_encode($clients) !!};
        $(document).ready(function () {
            //let oTable = $('#table').DataTable({
            $('#table').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [[0, "desc"]]
            });

            const valeur_colis = $("#valeur_colis");
            const valeur_colis_parsed = parseFloat(valeur_colis.html() ?? 0);
            valeur_colis.html(Number(valeur_colis_parsed).toLocaleString());

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
                    url: "depart-tournee-item/" + id,
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
                    error: function (err) {
                        console.error(err.responseJSON.message);
                        alert(err.responseJSON.message ?? "Une erreur s'est produite");
                    }
                });
            }
        }
    </script>
@endsection
