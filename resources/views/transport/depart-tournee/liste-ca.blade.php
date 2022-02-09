@extends('bases.comptabilite')

@section('main')
<!--begin::Toolbar-->
@extends('bases.toolbar', ["title" => "Comptabilité", "subTitle" => "Chiffre d'affaire des tournées"])
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
    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"id="kt_menu_61484bf44d957">
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
                                <option>{{$client}}</option>
                                @foreach ($clients as $clt)
                                <option value="{{$clt->id}}">{{ $clt->client_nom }}</option>
                                @endforeach
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
@section("nouveau")
<a href="#" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
<!--end::Toolbar-->

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
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

        <div class="row gy-5 g-xl-8">
            <div class="col-xl-3">
                <!--begin::List Widget 2-->
                <div class="card card-xl-stretch mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Stats</h3>
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
                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Chiffre d'affaire</a>
                            <span class="text-muted fw-bold d-block"></span>
                        </div>
                        <!--end::Title-->
                        <!--begin::Lable-->
                        <span class="fw-bolder text-warning py-1 chiffreAffaire" id="chiffreAffaire"></span>
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
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Nombre de
                            passage</a>
                            <span class="text-muted fw-bold d-block"></span>
                        </div>
                        <!--end::Title-->
                        <!--begin::Lable-->
                        <span class="fw-bolder text-warning py-1">{{count($sites)}}</span>
                        <!--end::Lable-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 2-->
        </div>
        <div class="col-xl-9">
            <form action="#" method="get">

                <div class="card card-xl-stretch">
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title fw-bolder">Option de filtre</h3>
                    </div>
                    <div class="card-body pt-5">
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="centre" class="col-5">Centre Régional</label>
                                    <select name="centre" id="centre" class="form-select col">
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
                                    <select id="centre_regional" name="centre_regional" class="form-select col">
                                        <option>{{$centre_regional}}</option>
                                        @foreach ($centres_regionaux as $centre)
                                        <option
                                        value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="client" class="col-5">Clients</label>
                                    <select id="client" name="client" class="form-select col">
                                        <option>{{$client}}</option>
                                        @foreach ($clients as $clt)
                                        <option value="{{$clt->id}}">{{ $clt->client_nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="site" class="col-5">Site</label>
                                    <select id="site" name="site" class="form-select col">
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
                                    <label for="tdf" class="col-5">TDF</label>
                                    <select name="tdf" id="tdf" class="form-select col">
                                        <option>{{$tdf}}</option>
                                        <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                        <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                        <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                        <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                        <option value="oo_vb_intramuros">VB</option>
                                        <option value="oo_vl_intramuros">VL</option>
                                        <option value="oo_ass_appro">Assistance appro DAB</option>
                                        <option value="oo_dnf">Dépôt non facturé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="caisse" class="col-5">Caisse</label>
                                    <select name="caisse" id="caisse" class="form-select col">
                                        <option>{{$caisse}}</option>
                                        <option value="oo_mad">MAD</option>
                                        <option value="oo_collecte">Collecte</option>
                                        <option value="oo_cctv">CCTV</option>
                                        <option value="oo_collecte_caisse">Collecte Caisse</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="typeOP" class="col-5">Type OP</label>
                                    <select name="typeOP" id="typeOP" class="form-select col">
                                        <option>{{$typeOP}}</option>
                                        <option value="Enlèvement">Enlèvement</option>
                                        <option value="Dépôt">Dépôt</option>
                                        <option value="Enlèvement + Dépôt">Enlèvement + Dépôt</option>
                                        <option value="Enlèvement / R">Enlèvement / R</option>
                                        <option value="Dépôt / R">Dépôt / R</option>
                                        <option value="Enlèvement + Dépôt / R">Enlèvement + Dépôt / R</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="" class="col-5">Véhicule</label>
                                    <select name="vehicule" id="vehicule" class="form-select col">
                                        <option>{{$vehicule}}</option>
                                        @foreach($vehicules as $vehicule)
                                        <option
                                        value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col text-right">

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/ca-liste" class="btn btn-info btn-sm">Effacer</a>
                        <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                    </div>
                </div>
                @csrf

            </form>
        </div>
    </div>
    <br>

    <div class="card card-xl-stretch">
        <table id="table" class="table table-striped gy-7 gs-7" style="width: 100%">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <th scope="col">No</th>
                    <th scope="col">Centre regional</th>
                    <th scope="col">Centre</th>
                    <th scope="col">No. Tournée</th>
                    <th scope="col">Date</th>
                    <th scope="col">Client</th>
                    <th scope="col">Site</th>
                    <th scope="col">Op</th>
                    <th scope="col">TDF</th>
                    <th scope="col">Montant TDF</th>
                    <th scope="col">Caisse</th>
                    <th scope="col">Montant Caisse</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sites as $site)
                <tr>
                    <td>{{$site->id}}</td>
                    <td>{{$site->tournees->centre ?? ""}}</td>
                    <td>{{$site->tournees->centre_regional ?? ""}}</td>
                    <td>{{$site->tournees->numeroTournee}}</td>
                    <td>{{$site->tournees->date}}</td>
                    <td>{{$site->sites->clients->client_nom ?? ""}}</td>
                    <td>{{$site->sites->site ?? ""}}</td>
                    <td>{{$site->type ?? ""}}</td>
                    <td>
                        @switch($site->tdf)
                        @case("oo_vb_extamuros_bitume")
                        VB extramuros bitume
                        @break
                        @case("oo_vb_extramuros_piste")
                        VB extramuros piste
                        @break
                        @case("oo_vl_extramuros_bitume")
                        VL extramuros bitume
                        @break
                        @case("oo_vl_extramuros_piste")
                        VL extramuros piste
                        @break
                        @case("oo_vb_intramuros")
                        VB
                        @break
                        @case("oo_vl_intramuros")
                        VL
                        @break
                        @case("oo_ass_appro")
                        Assistance appro DAB
                        @break
                        @case("oo_dnf")
                        Dépôt non facturé
                        @break
                        @default
                        RAS
                        @endswitch
                    </td>
                    <td class="tdf">{{$site->sites["$site->tdf"] ?? 0}}</td>
                    <td>@switch($site->caisse)
                        @case("oo_mad")
                        MAD
                        @break
                        @case("oo_collecte")
                        Collecte
                        @break
                        @case("oo_cctv")
                        CCTV
                        @break
                        @case("oo_collecte_caisse")
                        Collecte caisse
                        @break
                        @default
                        RAS
                        @break
                        @endswitch</td>
                        <td class="caisse">{{$site->sites["$site->caisse"] ?? 0}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "language": {
                "url": "French.json"
            }
        });

        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        let sites = {!! json_encode($sites_com) !!};
        let clients = {!! json_encode($clients) !!};
        let vehicules = {!! json_encode($vehicules) !!};

        const siteInput = $("#site");
        if (siteInput.val()) {
            console.log(siteInput.val())
            const site = sites.find(s => s.id === parseInt(siteInput.val() ?? 0));
            if (site) $("select[name='site'] option[value=" + site?.id + "]").attr('selected', 'selected');
        }
        const clientInput = $("#client");
        if (clientInput.val()) {
            const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
            if (client) $("select[name='client'] option[value=" + client?.id + "]").attr('selected', 'selected');
        }
        const vehiculeInput = $("#vehicule");
        if (vehiculeInput.val()) {
            const vehicule = vehicules.find(s => s.id === parseInt(vehiculeInput.val() ?? 0));
            if (vehicule) $("select[name='vehicule'] option[value=" + vehicule?.id + "]").attr('selected', 'selected');
        }
        const tdfInput = $("#tdf");
        if (tdfInput.val()) {
            switch (tdfInput.val()) {
                case "oo_vb_extamuros_bitume":
                $("select[name='tdf'] option[value=oo_vb_extamuros_bitume]").attr('selected', 'selected');
                break;
                case "oo_vb_extramuros_piste":
                $("select[name='tdf'] option[value=oo_vb_extramuros_piste]").attr('selected', 'selected');
                break;
                case "oo_vl_extramuros_bitume":
                $("select[name='tdf'] option[value=oo_vl_extramuros_bitume]").attr('selected', 'selected');
                break;
                case "oo_vl_extramuros_piste":
                $("select[name='tdf'] option[value=oo_vl_extramuros_piste]").attr('selected', 'selected');
                break;
                case "oo_vb_intramuros":
                $("select[name='tdf'] option[value=oo_vb_intramuros]").attr('selected', 'selected');
                break;
                case "oo_vl_intramuros":
                $("select[name='tdf'] option[value=oo_vl_intramuros]").attr('selected', 'selected');
                break;
                case "oo_ass_appro":
                $("select[name='tdf'] option[value=oo_ass_appro]").attr('selected', 'selected');
                break;
                case "oo_dnf":
                $("select[name='tdf'] option[value=oo_dnf]").attr('selected', 'selected');
                break;
                default:
                //tdf.eq(i).val("");
                //console.log("aucun tdf");
                break;
            }
        }

        const caisseInput = $("#caisse");
        if (caisseInput.val()) {
            switch (caisseInput.val()) {
                case "oo_mad":
                $("select[name='caisse'] option[value=oo_mad]").attr('selected', 'selected');
                break;
                case "oo_collecte":
                $("select[name='caisse'] option[value=oo_collecte]").attr('selected', 'selected');
                break;
                case "oo_cctv":
                $("select[name='caisse'] option[value=oo_cctv]").attr('selected', 'selected');
                break;
                case "oo_collecte_caisse":
                $("select[name='caisse'] option[value=oo_collecte_caisse]").attr('selected', 'selected');
                break;
                default:
                //caisse.eq(i).val("");
                break;
            }
        }

        let totalTDF = 0;
        let totalCaisse = 0;
        $('table tr').each(function () {
            const rowTdf = $(this).find('.tdf');
            const rowCaisse = $(this).find('.caisse');
            if (rowTdf) totalTDF += parseFloat(rowTdf.html() ?? 0);
            if (rowCaisse) totalCaisse += parseFloat(rowCaisse.html() ?? 0);
        });
        $(".chiffreAffaire").html(Number(totalTDF + totalCaisse).toLocaleString());
    });
</script>
@endsection
