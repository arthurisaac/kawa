@extends('base-v1')

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
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">Liste entrée colis</small>
                    <!--end::Description--></h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Wrapper-->
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
                        <!--end::Svg Icon-->Filtrer</a>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                         id="kt_menu_61484bf44d957">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Options de filtre</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
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
{{--                                        <option>{{$client}}</option>--}}
{{--                                        @foreach ($clients_com as $client)--}}
{{--                                            <option value="{{$client->id}}">{{ $client->client_nom }}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Menu-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Button-->
                <a href="/caisse-entree-colis" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"
                   id="kt_toolbar_primary_button">Nouveau</a>
                <!--end::Button-->
            </div>
            <!--end::Actions-->
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
        <br>
        <br>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-sm-7">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col-sm-7">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="text-align: right;">
                    <button class="btn btn-primary btn-sm">Rechercher</button>
                </div>
            </div>
        </form>
            <br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                        <tr>
                            <td>N°</td>
                            <td>Date</td>
                            <td>Centre régional</td>
                            <td>Centre</td>
                            <td>Nbre Total colis</td>
                            <th>Remettant</th>
                            {{--<td>Total valeur colis</td>
                            <td>Total device etrangere (XOF)</td>
                            <td>Total device etrangere (Dollar)</td>
                            <td>Total device etrangere (EURO)</td>--}}
                            <td>No Tournée</td>
                            <td>Equipage</td>
                            {{--<td>Montant total</td>--}}
                            <td style="width: 50px;">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($colis as $coli)
                        <tr>
                            <td>{{$coli->id}}</td>
                            <td>{{$coli->date}}</td>
                            <td>{{$coli->centre}}</td>
                            <td>{{$coli->centre_regional}}</td>
                            <td>{{$coli->items->sum('nbre_colis')}}</td>
                            <td>{{$coli->remettant}}</td>
                            {{--<td>{{$coli->items->sum("valeur_colis_xof_entree")}}</td>
                            <td>{{$coli->items->sum("device_etrangere_dollar_entree")}}</td>
                            <td>{{$coli->items->sum("device_etrangere_euro_entree")}}</td>
                            <td>{{$coli->items->sum("pierre_precieuse_entree")}}</td>--}}
                            <td>{{$coli->tournees->numeroTournee ?? ''}}</td>
                            <td>{{$coli->tournees->chefDeBords->nomPrenoms ?? ""}} //
                                {{$coli->tournees->agentDeGardes->nomPrenoms ?? ""}} //
                                {{$coli->tournees->chauffeurs->nomPrenoms ?? ""}} //</td>
                            <td>
                                <a href="{{ route('caisse-entree-colis.edit',$coli->id)}}" class="btn btn-primary btn-sm"></a>
                                <a class="btn btn-danger btn-sm" onclick="supprimer('{{$coli->id}}', this)"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "caisse-entree-colis/" + id,
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
